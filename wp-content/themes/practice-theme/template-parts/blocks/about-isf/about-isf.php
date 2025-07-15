<?php

$id = 'about-isf-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

$headline = get_field('headline');
$description = get_field('description');
$description_bold = get_field('description_bold');
$button = get_field('button');
$background_image = get_field('background_image');

?>

<div id="<?php echo esc_attr($id); ?>" class="about-isf">

    <?php if ($background_image) : ?>
        <div class="about-isf-image">
            <?php echo wp_get_attachment_image($background_image['id'], 'large'); ?>
        </div>
    <?php endif; ?>

    <div class="about-isf-content">
        <?php if ($headline) : ?>
            <h2 class="about-isf-headline"><?php echo esc_html($headline); ?></h2>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="about-isf-description">
                <?php echo wp_kses_post($description); ?>
                <?php echo wp_kses_post($description_bold); ?>
            </div>
        <?php endif; ?>

        <?php
        if (! empty($button['url']) && ! empty($button['title'])) {
            get_template_part(
                'template-parts/components/link-button',
                '',
                ['class' => 'about-isf-button']
            );
        }
        ?>
    </div>
</div>