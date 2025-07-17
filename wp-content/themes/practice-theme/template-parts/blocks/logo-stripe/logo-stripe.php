<?php

$id = 'logo-stripe-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

$logos = get_field('logos');

?>

<section id="<?php echo esc_attr($id); ?>" class="logo-stripe">
    <?php if ($logos) : ?>
        <div class="logo-stripe-logos">
            <?php foreach ($logos as $image) : ?>
                <div class="logo-item">
                    <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>