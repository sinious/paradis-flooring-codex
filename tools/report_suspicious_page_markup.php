<?php

require 'C:/Work/wamp64/www/client/wp-load.php';

$page_ids = [42, 35, 171, 24, 33, 37, 3];

$patterns = [
    'raw_mobile_nav' => '<details class="pfc-mobile-nav">',
    'html_block_mobile_nav' => '<!-- wp:html -->' . "\n" . '<details class="pfc-mobile-nav">',
    'raw_info_card_h3' => '<div class="wp-block-column pfc-info-card"><h3>',
    'raw_info_card_h2' => '<div class="wp-block-column pfc-info-card"><h2>',
    'shortcode_text' => '<p>Shortcode</p>',
    'shortcode_block' => '<!-- wp:shortcode -->',
];

foreach ($page_ids as $page_id) {
    $post = get_post($page_id);

    if (!$post) {
        continue;
    }

    echo "--- {$post->post_title} ({$page_id}) ---\n";

    foreach ($patterns as $label => $needle) {
        $found = strpos($post->post_content, $needle) !== false ? 'yes' : 'no';
        echo "{$label}: {$found}\n";
    }

    echo "\n";
}
