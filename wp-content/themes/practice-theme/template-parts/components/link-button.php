<?php

$class = $args['class'] ?? '';

$btn = get_field('button');

if (empty($btn['url']) || empty($btn['title'])) {
    return;
}
?>
<a
    href="<?php echo esc_url($btn['url']); ?>"
    class="<?php echo esc_attr($class); ?>"
    target="<?php echo esc_attr($btn['target'] ?? '_self'); ?>">
    <?php echo esc_html($btn['title']); ?>
</a>