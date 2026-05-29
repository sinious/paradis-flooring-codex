<?php

require 'C:/Work/wamp64/www/client/wp-load.php';

$post_id = 35;
$post = get_post($post_id);

if (!$post) {
    fwrite(STDERR, "Post {$post_id} not found.\n");
    exit(1);
}

$content = $post->post_content;

$raw_mobile_nav = '<details class="pfc-mobile-nav"><summary><span class="screen-reader-text">Open menu</span></summary><div class="pfc-mobile-nav-panel">
<a href="http://localhost/client/">Home</a>
<a class="is-current" href="http://localhost/client/services/">Services</a>
<a href="http://localhost/client/gallery/">Gallery</a>
<a href="http://localhost/client/experience/">Experience</a>
<a href="http://localhost/client/about/">About</a>
<a href="http://localhost/client/contact/">Contact</a>
</div></details>';

$wrapped_mobile_nav = "<!-- wp:html -->\n{$raw_mobile_nav}\n<!-- /wp:html -->";

$raw_info_cards = <<<'HTML'
		<!-- wp:column {"className":"pfc-info-card"} -->
		<div class="wp-block-column pfc-info-card"><h3>Recoat</h3><p>For floors that are dull but structurally sound, a screen and recoat can add a fresh protective layer without sanding to bare wood.</p></div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"pfc-info-card"} -->
		<div class="wp-block-column pfc-info-card"><h3>Refinish</h3><p>For deeper scratches, dark stains, peeling finish, or a color change, sanding and refinishing gives the floor a true reset.</p></div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"pfc-info-card"} -->
		<div class="wp-block-column pfc-info-card"><h3>Repair Or Replace</h3><p>For warped boards, water damage, loose areas, or unstable sections, repair or new installation may be the cleaner long-term choice.</p></div>
		<!-- /wp:column -->
HTML;

$fixed_info_cards = <<<'HTML'
		<!-- wp:column {"className":"pfc-info-card"} -->
		<div class="wp-block-column pfc-info-card">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Recoat</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>For floors that are dull but structurally sound, a screen and recoat can add a fresh protective layer without sanding to bare wood.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"pfc-info-card"} -->
		<div class="wp-block-column pfc-info-card">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Refinish</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>For deeper scratches, dark stains, peeling finish, or a color change, sanding and refinishing gives the floor a true reset.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"className":"pfc-info-card"} -->
		<div class="wp-block-column pfc-info-card">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">Repair Or Replace</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>For warped boards, water damage, loose areas, or unstable sections, repair or new installation may be the cleaner long-term choice.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
HTML;

$replacements = 0;

if (strpos($content, $wrapped_mobile_nav) === false) {
    $content = str_replace($raw_mobile_nav, $wrapped_mobile_nav, $content, $count);
    $replacements += $count;
}

if (strpos($content, $raw_info_cards) !== false) {
    $content = str_replace($raw_info_cards, $fixed_info_cards, $content, $count);
    $replacements += $count;
}

if ($replacements === 0) {
    fwrite(STDERR, "No expected Services invalid fragments were replaced.\n");
    exit(1);
}

$result = wp_update_post(
    [
        'ID' => $post_id,
        'post_content' => $content,
    ],
    true
);

if (is_wp_error($result)) {
    fwrite(STDERR, $result->get_error_message() . "\n");
    exit(1);
}

echo "Updated Services invalid block markup.\n";
