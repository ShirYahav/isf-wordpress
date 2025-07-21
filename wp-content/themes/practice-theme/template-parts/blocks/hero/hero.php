<?php

$id = 'hero-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

$background_image_url = get_field('background_image');
$headline = get_field('headline');
$highlight_text = get_field('highlight_text');
$description = get_field('description');
$button = get_field('button');

$inline_style = '';
if ($background_image_url) {
    $inline_style = "style=\"background-image: url('" . esc_url($background_image_url) . "');\"";
}

?>

<div id="<?php echo esc_attr($id); ?>" class="hero-block" <?php echo $inline_style; ?>>
    <div class="hero-content">
        <h1 class="hero-headline">
            <?php echo esc_html($headline); ?>
            <span class="hero-highlight"><?php echo esc_html($highlight_text); ?></span>
        </h1>
        <p class="hero-text"><?php echo esc_html($description); ?></p>

        <?php
        if (! empty($button['url']) && ! empty($button['title'])) {
            get_template_part(
                'template-parts/components/link-button',
                '',
                ['class' => 'hero-button']
            );
        }
        ?>
    </div>
</div>