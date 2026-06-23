<?php
/**
 * CTA band — full-width call-to-action section. Common on service/local biz sites,
 * usually placed right before the footer ("Ready to get started? Contact us today").
 * Expected $args: 'heading', 'text', 'button_text', 'button_link'
 */

$heading     = $args['heading']     ?? __( 'Ready to get started?', 'client-theme' );
$text        = $args['text']        ?? '';
$button_text = $args['button_text'] ?? __( 'Contact Us', 'client-theme' );
$button_link = $args['button_link'] ?? '#contact';
?>
<section class="section section--alt cta-band">
    <div class="container flex-col items-center text-center" style="display:flex;">
        <h2><?php echo esc_html( $heading ); ?></h2>
        <?php if ( $text ) : ?>
            <p class="text-muted mb-4"><?php echo esc_html( $text ); ?></p>
        <?php endif; ?>
        <a href="<?php echo esc_url( $button_link ); ?>" class="btn btn--primary btn--lg">
            <?php echo esc_html( $button_text ); ?>
        </a>
    </div>
</section>
