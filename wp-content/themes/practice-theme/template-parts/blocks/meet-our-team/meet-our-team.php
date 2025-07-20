<?php

$id = 'meet-our-team-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$icon = get_field('icon');
$headline = get_field('headline');
$linkedin_icon = get_field('linkedin_icon');
$team_members = get_field('team_members');

?>

<div id="<?php echo esc_attr($id); ?>" class="meet-our-team-section">
    <div class="team-header">
        <?php if ($icon) : ?>
            <img src="<?php echo esc_url($icon['url']); ?>" alt="" class="team-header-icon" />
        <?php endif; ?>
        <?php if ($headline) : ?>
            <h2 class="team-headline"><?php echo esc_html($headline); ?></h2>
        <?php endif; ?>
    </div>

    <?php if ($team_members) : ?>
        <div class="team-grid">
            <?php foreach ($team_members as $member) :
                $photo = $member['photo'];
                $name = $member['name'];
                $role = $member['role'];
                $linkedin_url = $member['linkedin_url'];
            ?>
                <div class="team-member-card">
                    <div class="team-member-photo-wrapper">
                        <?php if ($photo) : ?>
                            <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" class="team-member-photo" />
                        <?php endif; ?>

                        <?php if ($linkedin_url && $linkedin_icon) : ?>
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
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>