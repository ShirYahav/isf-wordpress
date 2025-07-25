<?php

$id = 'stats-stripe-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

$data_provided_by = get_field('data_provided_by');
?>

<div id="<?php echo esc_attr($id); ?>" class="stats-stripe-block">
    <div class="stats-stripe-gradient-background">
        <div class="stats-stripe-container">
            <?php while (have_rows('stats')) : the_row();
                $number = get_sub_field('number');
                $number_postfix   = get_sub_field('number_postfix');
                $text   = get_sub_field('text');
            ?>
                <div class="stat-item">
                    <div class="stat-item-number">
                        <?php echo esc_html($number); ?><?php if ($number_postfix) : ?><span class="stat-item-sign"><?php echo esc_html($number_postfix); ?></span><?php endif; ?>
                    </div>
                    <div class="stat-item-text"><?php echo esc_html($text); ?></div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php if ($data_provided_by) : ?>
            <div class="stats-data-provider">
                <?php echo esc_html($data_provided_by); ?>
            </div>
        <?php endif; ?>
    </div>
</div>