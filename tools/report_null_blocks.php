<?php

require 'C:/Work/wamp64/www/client/wp-load.php';

$page_ids = [42, 35, 171, 24, 33, 37, 3];

$count_null_blocks = static function (array $blocks) use (&$count_null_blocks): int {
    $count = 0;

    foreach ($blocks as $block) {
        if (empty($block['blockName'])) {
            $inner_html = trim($block['innerHTML'] ?? '');
            if ($inner_html !== '') {
                $count++;
            }
        }

        if (!empty($block['innerBlocks'])) {
            $count += $count_null_blocks($block['innerBlocks']);
        }
    }

    return $count;
};

foreach ($page_ids as $page_id) {
    $post = get_post($page_id);

    if (!$post) {
        continue;
    }

    $blocks = parse_blocks($post->post_content);
    $null_count = $count_null_blocks($blocks);

    echo "{$post->post_title} ({$page_id}): {$null_count}\n";
}
