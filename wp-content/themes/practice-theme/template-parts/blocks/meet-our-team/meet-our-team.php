<?php

$id = 'meet-our-team-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

$icon         = get_field('icon');
$headline     = get_field('headline');
$linkedin_icon = get_field('linkedin_icon');
$team_members = get_field('team_members');

?>

<div id="<?php echo esc_attr($id); ?>" class="meet-our-team-section">
    <div class="team-header">
        <?php if (! empty($icon['url'])) : ?>
            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo ! empty($icon['alt']) ? esc_attr($icon['alt']) : 'Team Header Icon'; ?>" class="team-header-icon" />
        <?php endif; ?>
        <?php if ($headline) : ?>
            <h2 class="team-headline"><?php echo esc_html($headline); ?></h2>
        <?php endif; ?>
    </div>

    <?php if ($team_members) : ?>
        <div class="team-grid">
            <?php
            foreach ($team_members as $member) :
                get_template_part(
                    'template-parts/components/team-member',
                    null,
                    [
                        'member' => $member,
                        'linkedin_icon' => $linkedin_icon,
                    ]
                );
            endforeach;
            ?>
        </div>
    <?php endif; ?>
</div>