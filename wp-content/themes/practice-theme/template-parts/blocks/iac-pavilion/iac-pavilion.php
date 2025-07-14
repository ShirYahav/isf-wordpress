<?php

$id = 'iac-pavilion-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

$class_name = 'iac-pavilion-block';
if (! empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

$background_text_mobile = get_field('background_text_mobile');
$background_text_desktop = get_field('background_text_desktop');
$star_image = get_field('star_image');
$headline = get_field('headline');
$logo = get_field('logo');
$description = get_field('description');
$button = get_field('button');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">

    <div class="iac-background-text iac-background-text--mobile" aria-hidden="true"><?php echo nl2br(esc_html($background_text_mobile)); ?></div>
    <div class="iac-background-text iac-background-text--desktop" aria-hidden="true"><?php echo nl2br(esc_html($background_text_desktop)); ?></div>

    <div class="iac-content-grid">

        <div class="iac-column-main">
            <?php if ($star_image) : ?>
                <img src="<?php echo esc_url($star_image['url']); ?>" alt="<?php echo esc_attr($star_image['alt']); ?>" class="iac-star-image">
            <?php endif; ?>

            <div class="iac-headline-group">
                <h2 class="iac-headline"><?php echo nl2br(esc_html($headline)); ?></h2>
                <?php if ($logo) : ?>
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="iac-logo">
                <?php endif; ?>
            </div>
        </div>

        <div class="iac-column-side">
            <div class="iac-description">
                <?php echo wp_kses_post($description); ?>
            </div>

            <?php if ($button && !empty($button['url']) && !empty($button['title'])) : ?>
                <a href="<?php echo esc_url($button['url']); ?>" class="iac-button" target="<?php echo esc_attr($button['target'] ?: '_self'); ?>">
                    <?php echo esc_html($button['title']); ?>
                </a>
            <?php endif; ?>
        </div>

    </div>
</div>