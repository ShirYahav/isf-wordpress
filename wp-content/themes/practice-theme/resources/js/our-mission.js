jQuery(document).ready(function ($) {
    const $missionItems = $('.our-mission .mission-item');

    $missionItems.on('click', function() {
        const $this = $(this);
        const wasActive = $this.hasClass('is-active');

        $missionItems.removeClass('is-active');

        if (!wasActive) {
            $this.addClass('is-active');
        }
    });
});