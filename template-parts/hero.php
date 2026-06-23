<?php
/**
 * Hero section — used on front-page.php or any landing page.
 * Pass args via get_template_part('template-parts/hero', null, array(...))
 *
 * Expected $args:
 *   'title'     (string) override headline, defaults to the_title()
 *   'subtitle'  (string) supporting text
 *   'cta_text'  (string) button label
 *   'cta_link'  (string) button URL
 */

$title    = $args['title']    ?? get_the_title();
$subtitle = $args['subtitle'] ?? '';
$cta_text = $args['cta_text'] ?? '';
$cta_link = $args['cta_link'] ?? '#';
?>
<section class="section hero">
    <div class="container flex-col items-center text-center" style="display:flex;">
        <h1><?php echo esc_html( $title ); ?></h1>

        <?php if ( $subtitle ) : ?>
            <p class="text-muted mb-4"><?php echo esc_html( $subtitle ); ?></p>
        <?php endif; ?>

        <?php if ( $cta_text ) : ?>
            <a href="<?php echo esc_url( $cta_link ); ?>" class="btn btn--primary btn--lg">
                <?php echo esc_html( $cta_text ); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
