<?php

$id = 'logo-wall-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

$headline = get_field( 'headline' );
$logos    = get_field( 'logos' );

?>

<section id="<?php echo esc_attr( $id ); ?>" class="logo-wall">
    <?php if ( $headline ) : ?>
        <h2 class="logo-wall-headline"><?php echo esc_html( $headline ); ?></h2>
    <?php endif; ?>

    <?php if ( $logos ) : ?>
        <div class="logo-wall-logos">
            <?php foreach ( $logos as $image ) : ?>
                <div class="logo-item">
                    <img src="<?php echo esc_url( $image['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
