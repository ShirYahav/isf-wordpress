<?php

$headline = get_field('headline') ?: 'Your Headline Here';
$highlight_text = get_field('highlight_text') ?: 'Highlight';
$description = get_field('description') ?: 'Your descriptive text here.';
$button = get_field('button');

$id = 'hero-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

$class_name = 'hero-block';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (! empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="hero-content">
        <h1 class="hero-headline">
            <?php echo esc_html($headline); ?>
            <span class="hero-highlight"><?php echo esc_html($highlight_text); ?></span>
        </h1>
        <p class="hero-text"><?php echo esc_html($description); ?></p>

        <?php if ($button && isset($button['url']) && isset($button['title'])) : ?>
            <a href="<?php echo esc_url($button['url']); ?>" class="hero-button" target="<?php echo esc_attr($button['target'] ? $button['target'] : '_self'); ?>">
                <?php echo esc_html($button['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</div>