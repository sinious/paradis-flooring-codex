<?php

require 'C:/Work/wamp64/www/client/wp-load.php';

$post_id = 42;
$post = get_post($post_id);

if (!$post) {
    fwrite(STDERR, "Post {$post_id} not found.\n");
    exit(1);
}

$before = '<details class="pfc-mobile-nav"><summary><span class="screen-reader-text">Open menu</span></summary><div class="pfc-mobile-nav-panel">
<a class="is-current" href="http://localhost/client/">Home</a>
<a href="http://localhost/client/services/">Services</a>
<a href="http://localhost/client/gallery/">Gallery</a>
<a href="http://localhost/client/experience/">Experience</a>
<a href="http://localhost/client/about/">About</a>
<a href="http://localhost/client/contact/">Contact</a>
</div></details>';

$after = "<!-- wp:html -->\n{$before}\n<!-- /wp:html -->";

if (strpos($post->post_content, $after) !== false) {
    echo "Home mobile nav is already wrapped in a Custom HTML block.\n";
    exit(0);
}

if (strpos($post->post_content, $before) === false) {
    fwrite(STDERR, "Expected raw mobile nav markup was not found in Home post_content.\n");
    exit(1);
}

$updated_content = str_replace($before, $after, $post->post_content, $count);

if ($count !== 1) {
    fwrite(STDERR, "Expected to replace exactly one mobile nav fragment, replaced {$count}.\n");
    exit(1);
}

$result = wp_update_post(
    [
        'ID' => $post_id,
        'post_content' => $updated_content,
    ],
    true
);

if (is_wp_error($result)) {
    fwrite(STDERR, $result->get_error_message() . "\n");
    exit(1);
}

echo "Updated Home mobile nav markup.\n";
