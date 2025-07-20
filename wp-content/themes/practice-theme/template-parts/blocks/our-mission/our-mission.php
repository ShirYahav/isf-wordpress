<?php

$id = 'our-mission-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$mission_headline_icon = get_field('mission_headline_icon');
$mission_headline = get_field('mission_headline');
$mission_description = get_field('mission_description');
$mission_items = get_field('mission_items');

?>

<section id="<?php echo esc_attr($id); ?>" class="our-mission">
    <div class="our-mission-header">
        <div class="our-mission-headline-wrapper">
            <?php if ($mission_headline_icon) : ?>
                <img src="<?php echo esc_url($mission_headline_icon); ?>" alt="" class="mission-title-icon" />
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
            <?php foreach ($mission_items as $item) :
                $item_icon = $item['item_icon'];
                $item_headline = $item['item_headline'];
                $item_description = $item['item_description'];
            ?>
                <div class="mission-item">
                    <?php if ($item_icon) : ?>
                        <div class="mission-item-icon-wrapper">
                            <img src="<?php echo esc_url($item_icon); ?>" alt="" class="mission-item-icon" />
                        </div>
                    <?php endif; ?>
                    <div class="mission-item-text-content">
                        <?php if ($item_headline) : ?>
                            <h3 class="mission-item-headline"><?php echo esc_html($item_headline); ?></h3>
                        <?php endif; ?>
                        <?php if ($item_description) : ?>
                            <p class="mission-item-description"><?php echo esc_html($item_description); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>