<?php
class Practice_Newsletter_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'practice_newsletter',
            __('Newsletter Signup', 'practice-theme'),
            ['description' => __('A simple AJAX newsletter form.', 'practice-theme')]
        );
    }

    // Front-end display
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $heading = ! empty($instance['heading'])
            ? $instance['heading']
            : __('Follow Our Newsletter', 'practice-theme');
        printf('<h3 class="newsletter-signup-heading">%s</h3>', esc_html($heading));

        $desc = ! empty($instance['description'])
            ? $instance['description']
            : __('Subscribe to the ISF newsletter to receive the latest announcements, opportunities, events and more.', 'practice-theme');
        printf('<p class="newsletter-signup-description">%s</p>', esc_html($desc));

        get_template_part('template-parts/footer/newsletter-signup');

        echo $args['after_widget'];
    }

    // Admin form
    public function form($instance)
    {
        $heading    = isset($instance['heading'])    ? $instance['heading']    : '';
        $description = isset($instance['description']) ? $instance['description'] : '';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('heading')); ?>">
                <?php esc_html_e('Heading:', 'practice-theme'); ?>
            </label>
            <input
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('heading')); ?>"
                name="<?php echo esc_attr($this->get_field_name('heading')); ?>"
                type="text"
                value="<?php echo esc_attr($heading); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>">
                <?php esc_html_e('Description:', 'practice-theme'); ?>
            </label>
            <textarea
                class="widefat"
                rows="3"
                id="<?php echo esc_attr($this->get_field_id('description')); ?>"
                name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_textarea($description); ?></textarea>
        </p>
<?php
    }

    // Save & sanitize
    public function update($new, $old)
    {
        $instance = $old;
        $instance['heading']     = sanitize_text_field($new['heading']);
        $instance['description'] = sanitize_textarea_field($new['description']);
        return $instance;
    }
}

// Register the widget
function practice_register_newsletter_widget()
{
    register_widget('Practice_Newsletter_Widget');
}
add_action('widgets_init', 'practice_register_newsletter_widget');
