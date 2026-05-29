<?php

require 'C:/Work/wamp64/www/client/wp-load.php';

$post_ids = [171, 24, 33, 37];

foreach ($post_ids as $post_id) {
    $post = get_post($post_id);

    if (!$post) {
        fwrite(STDERR, "Post {$post_id} not found.\n");
        exit(1);
    }

    $content = $post->post_content;

    $content = preg_replace_callback(
        '/(?<!<!-- wp:html -->\n)(<details class="pfc-mobile-nav">.*?<\/details>)/s',
        static function (array $matches): string {
            return "<!-- wp:html -->\n" . $matches[1] . "\n<!-- /wp:html -->";
        },
        $content,
        1,
        $mobile_nav_count
    );

    $content = preg_replace_callback(
        '/<!-- wp:column \{"className":"pfc-info-card"\} -->\s*<div class="wp-block-column pfc-info-card"><h3>(.*?)<\/h3><p>(.*?)<\/p><\/div>\s*<!-- \/wp:column -->/s',
        static function (array $matches): string {
            $title = trim($matches[1]);
            $body = trim($matches[2]);

            return <<<HTML
<!-- wp:column {"className":"pfc-info-card"} -->
<div class="wp-block-column pfc-info-card">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">{$title}</h3>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>{$body}</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
HTML;
        },
        $content,
        -1,
        $info_card_count
    );

    if (($mobile_nav_count + $info_card_count) === 0) {
        fwrite(STDERR, "No expected invalid fragments were replaced for post {$post_id}.\n");
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

    echo "Updated post {$post_id}: mobile_nav={$mobile_nav_count}, info_cards={$info_card_count}\n";
}
