<?php

if (! $args) {
    return;
}

$item_icon  = $args['item_icon'] ?? null;
$item_headline = $args['item_headline'] ?? '';
$item_description = $args['item_description'] ?? '';
?>
<div class="mission-item">
    <?php if (! empty($item_icon['url'])) : ?>
        <div class="mission-item-icon-wrapper">
            <img src="<?php echo esc_url($item_icon['url']); ?>" alt="<?php echo ! empty($item_icon['alt']) ? esc_attr($item_icon['alt']) : esc_attr($item_headline); ?>" class="mission-item-icon" />
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