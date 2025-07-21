<?php

$member = $args['member'] ?? null;
$linkedin_icon = $args['linkedin_icon'] ?? null;

if (! $member) {
    return;
}

$photo = $member['photo'] ?? null;
$name = $member['name'] ?? '';
$role = $member['role'] ?? '';
$linkedin_url = $member['linkedin_url'] ?? '';

?>
<div class="team-member-card">
    <div class="team-member-photo-wrapper">
        <?php if (!empty($photo['url'])) : ?>
            <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo ! empty($photo['alt']) ? esc_attr($photo['alt']) : esc_attr($name); ?>" class="team-member-photo" />
        <?php endif; ?>

        <?php if (!empty($linkedin_url) && ! empty($linkedin_icon['url'])) : ?>
            <a href="<?php echo esc_url($linkedin_url); ?>" class="team-member-linkedin-link" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url($linkedin_icon['url']); ?>" alt="LinkedIn Profile" />
            </a>
        <?php endif; ?>
    </div>
    <div class="team-member-details">
        <?php if ($name) : ?>
            <h3 class="team-member-name"><?php echo esc_html($name); ?></h3>
        <?php endif; ?>
        <?php if ($role) : ?>
            <p class="team-member-role"><?php echo esc_html($role); ?></p>
        <?php endif; ?>
    </div>
</div>