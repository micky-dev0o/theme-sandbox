<?php
/**
 * Card — used inside a .grid-3 / .grid-auto loop for services, portfolio, blog.
 * Expected $args: 'title', 'text', 'image' (URL), 'link'
 */

$title = $args['title'] ?? get_the_title();
$text  = $args['text']  ?? get_the_excerpt();
$image = $args['image'] ?? get_the_post_thumbnail_url( null, 'medium_large' );
$link  = $args['link']  ?? get_permalink();
?>
<div class="card">
    <?php if ( $image ) : ?>
        <div class="card-image">
            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
        </div>
    <?php endif; ?>
    <div class="card-body">
        <h3 class="card-title">
            <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
        </h3>
        <p class="card-text"><?php echo esc_html( $text ); ?></p>
    </div>
</div>
