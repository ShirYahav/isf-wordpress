<?php

$id = 'feature-banner-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$background_image_url = get_field('background_image');
$headline = get_field('headline');
$description = get_field('description');

$inline_style = '';
if ($background_image_url) {
    $bg = esc_url($background_image_url);
    $inline_style = sprintf(
        'style="background-image: linear-gradient(to right, rgba(0,0,0,0.9) 0%%, rgba(0,0,0,0.1) 100%%), url(\'%1$s\');"',
        $bg
    );
}
?>

<div id="<?php echo esc_attr($id); ?>" class="feature-banner" <?php echo $inline_style; ?>>
    <div class="feature-banner-content">
        <?php if ($headline) : ?>
            <h2 class="feature-banner-headline"><?php echo esc_html($headline); ?></h2>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="feature-banner-description">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>
    </div>
</div>