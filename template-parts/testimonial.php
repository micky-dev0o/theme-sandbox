<?php
/**
 * Testimonial card — matches .testimonial-card SCSS component.
 * Expected $args: 'quote', 'author', 'role', 'avatar' (URL)
 */

$quote  = $args['quote']  ?? '';
$author = $args['author'] ?? '';
$role   = $args['role']   ?? '';
$avatar = $args['avatar'] ?? '';
?>
<div class="testimonial-card">
    <p class="testimonial-quote">&ldquo;<?php echo esc_html( $quote ); ?>&rdquo;</p>
    <div class="testimonial-author">
        <?php if ( $avatar ) : ?>
            <img src="<?php echo esc_url( $avatar ); ?>" alt="<?php echo esc_attr( $author ); ?>">
        <?php endif; ?>
        <div class="text-left">
            <strong><?php echo esc_html( $author ); ?></strong>
            <?php if ( $role ) : ?>
                <div class="text-muted" style="font-size:0.875rem;"><?php echo esc_html( $role ); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
