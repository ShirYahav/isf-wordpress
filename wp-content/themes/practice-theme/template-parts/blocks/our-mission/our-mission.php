<?php

$id = 'our-mission-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

$mission_headline_icon = get_field('mission_headline_icon');
$mission_headline  = get_field('mission_headline');
$mission_description = get_field('mission_description');
$mission_items = get_field('mission_items');

?>

<section id="<?php echo esc_attr($id); ?>" class="our-mission">
    <div class="our-mission-header">
        <div class="our-mission-headline-wrapper">
            <?php if (! empty($mission_headline_icon['url'])) : ?>
                <img src="<?php echo esc_url($mission_headline_icon['url']); ?>" alt="<?php echo esc_attr($mission_headline_icon['alt']); ?>" class="mission-title-icon" />
            <?php endif; ?>
            <?php if ($mission_headline) : ?>
                <h2 class="mission-headline"><?php echo esc_html($mission_headline); ?></h2>
            <?php endif; ?>
        </div>
        <div class="our-mission-description">
            <?php if ($mission_description) : ?>
                <p><?php echo esc_html($mission_description); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($mission_items) : ?>
        <div class="mission-items-grid">
            <?php
            foreach ($mission_items as $item) :
                get_template_part('template-parts/components/mission-item', null, $item);
            endforeach;
            ?>
        </div>
    <?php endif; ?>
</section>