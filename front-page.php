<?php
/**
 * front-page.php — the homepage template. This is the file you'll customize
 * most per client. Example below shows hero -> services grid -> testimonials -> CTA,
 * the most common structure for local business / freelancer client sites.
 */
get_header();
?>

<?php
get_template_part( 'template-parts/hero', null, array(
    'title'    => get_bloginfo( 'name' ),
    'subtitle' => get_bloginfo( 'description' ),
    'cta_text' => __( 'Get a Free Quote', 'client-theme' ),
    'cta_link' => '#contact',
) );
?>

<section class="section">
    <div class="container">
        <h2 class="text-center mb-6"><?php esc_html_e( 'Our Services', 'client-theme' ); ?></h2>
        <div class="grid-3">
            <?php
            // Replace with a real WP_Query loop (e.g. a "Service" CPT) once content is ready.
            $placeholder_services = array(
                array( 'title' => 'Service One', 'text' => 'Short description of this service.' ),
                array( 'title' => 'Service Two', 'text' => 'Short description of this service.' ),
                array( 'title' => 'Service Three', 'text' => 'Short description of this service.' ),
            );
            foreach ( $placeholder_services as $service ) {
                get_template_part( 'template-parts/card', null, $service );
            }
            ?>
        </div>
    </div>
</section>

<?php
get_template_part( 'template-parts/cta', null, array(
    'heading' => __( 'Ready to get started?', 'client-theme' ),
    'text'    => __( 'Reach out today for a free consultation.', 'client-theme' ),
) );
?>

<?php get_footer(); ?>
