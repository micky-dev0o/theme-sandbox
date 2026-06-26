<?php

/**
 * Hero Section — used on the front page / homepage.
 * Pass args via get_template_part('template-parts/hero', null, array(...))
 *
 * Expected $args:
 *   'eyebrow'              (string)  Small label above the heading.           Default: '[ Smart IT solutions ]'
 *   'heading'              (string)  Main H1 headline text.                   Default: 'Smart IT Solutions For Smarter Businesses'
 *   'description'          (string)  Paragraph beneath the heading.           Default: see below
 *   'cta_primary_label'    (string)  Label for the primary CTA button.        Default: 'Free Consultation'
 *   'cta_primary_url'      (string)  URL for the primary CTA button.          Default: '#contact'
 *   'cta_secondary_label'  (string)  Label for the secondary text link.       Default: 'How We Work'
 *   'cta_secondary_url'    (string)  URL for the secondary text link.         Default: '#how-we-work'
 *   'bg_image_url'         (string)  URL of the hero background image.        Default: theme /assets/images/hero-bg.jpg
 *   'promo_video_url'      (string)  URL of the promotional video.            Default: '#'
 *   'features'             (array)   Array of feature cards, each with keys:
 *                                      'icon_url'  (string) URL of the icon image
 *                                      'icon_alt'  (string) Alt text for the icon
 *                                      'title'     (string) Card heading
 *                                      'text'      (string) Card body text
 */

// ── Scalar args ──────────────────────────────────────────────────────────────
$eyebrow             = $args['eyebrow']             ?? '[ Smart IT solutions ]';
$heading             = $args['heading']             ?? 'Smart IT Solutions For Smarter Businesses';
$description         = $args['description']         ?? 'Provide world wide survival strategies to ensure proactive domination at the end of the day fueling digital transformation with expert solutions.';
$cta_primary_label   = $args['cta_primary_label']   ?? 'Free Consultation';
$cta_primary_url     = $args['cta_primary_url']     ?? '#contact';
$cta_secondary_label = $args['cta_secondary_label'] ?? 'How We Work';
$cta_secondary_url   = $args['cta_secondary_url']   ?? '#how-we-work';
$bg_image_url        = $args['bg_image_url']        ?? get_template_directory_uri() . '/assets/images/hero-bg.jpg';
$promo_video_url     = $args['promo_video_url']     ?? '#';

// ── Feature cards ────────────────────────────────────────────────────────────
$features = $args['features'] ?? array(
    array(
        'icon_url' => get_template_directory_uri() . '/assets/images/icon-devops.svg',
        'icon_alt' => 'DevOps and Automation service icon',
        'title'    => 'DevOps &amp; Automation',
        'text'     => 'Protecting network infrastructure with firewalls, intrusion more.',
    ),
    array(
        'icon_url' => get_template_directory_uri() . '/assets/images/icon-emerging-tech.svg',
        'icon_alt' => 'Emerging Technologies service icon',
        'title'    => 'Emerging Technologies',
        'text'     => 'Protecting network infrastructure with firewalls, intrusion more.',
    ),
);
?>

<!-- Hero Section -->
<!-- JS needed: slider prev/next controls (.hero__slider-prev / .hero__slider-next) and video modal trigger (.hero__promo-btn) -->

<section
    class="hero"
    aria-label="<?php echo esc_attr($heading); ?> hero banner"
    style="background-image: url('<?php echo esc_url($bg_image_url); ?>');">

    <div class="container">

        <div class="hero__inner flex items-center">

            <!-- ── Left: primary content column ── -->
            <div class="hero__content">

                <p class="hero__eyebrow"><?php echo esc_html($eyebrow); ?></p>

                <h1 class="hero__heading">
                    <?php echo esc_html($heading); ?>
                </h1>

                <p class="hero__description">
                    <?php echo esc_html($description); ?>
                </p>

                <div class="hero__actions flex items-center gap-4">
                    <a href="<?php echo esc_url($cta_primary_url); ?>" class="btn btn--primary btn--lg hero__cta-primary">
                        <?php echo esc_html($cta_primary_label); ?>
                    </a>
                    <a href="<?php echo esc_url($cta_secondary_url); ?>" class="hero__cta-secondary">
                        <?php echo esc_html($cta_secondary_label); ?>
                    </a>
                </div>

            </div><!-- /.hero__content -->

        </div><!-- /.hero__inner -->

        <!-- ── Bottom bar: video promo + feature cards ── -->
        <div class="hero__bottom flex items-center">

            <!-- Video promo trigger -->
            <div class="hero__promo flex items-center gap-4">

                <!-- Decorative arrow-box graphic (purely visual) -->
                <div class="hero__promo-graphic" aria-hidden="true"></div>

                <button
                    type="button"
                    class="hero__promo-btn"
                    aria-label="Play promotional video"
                    data-video-trigger
                    data-video-url="<?php echo esc_url($promo_video_url); ?>">
                    <!-- Play icon -->
                    <svg class="hero__promo-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true" focusable="false">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                </button>

                <p class="hero__promo-label fw-bold">View<br>Promo</p>

            </div><!-- /.hero__promo -->

            <!-- Feature service cards -->
            <div class="hero__features grid-2">

                <?php foreach ($features as $feature) :
                    $icon_url  = $feature['icon_url']  ?? '';
                    $icon_alt  = $feature['icon_alt']  ?? '';
                    $feat_title = $feature['title']    ?? '';
                    $feat_text  = $feature['text']     ?? '';
                ?>
                    <article class="hero__feature-card">

                        <div class="hero__feature-icon" aria-hidden="true">
                            <?php if (! empty($icon_url)) : ?>
                                <img
                                    src="<?php echo esc_url($icon_url); ?>"
                                    alt="<?php echo esc_attr($icon_alt); ?>"
                                    width="40"
                                    height="40">
                            <?php endif; ?>
                        </div>

                        <div class="hero__feature-body">
                            <h3 class="hero__feature-title"><?php echo esc_html($feat_title); ?></h3>
                            <p class="hero__feature-text"><?php echo esc_html($feat_text); ?></p>
                        </div>

                    </article>
                <?php endforeach; ?>

            </div><!-- /.hero__features -->

        </div><!-- /.hero__bottom -->

    </div><!-- /.container -->

    <!-- Slider navigation (JS needed to wire up slide transitions) -->
    <nav class="hero__slider-nav" aria-label="Hero slider controls">
        <button
            type="button"
            class="hero__slider-btn hero__slider-btn--prev"
            aria-label="Previous slide">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
                <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z" />
            </svg>
        </button>
        <button
            type="button"
            class="hero__slider-btn hero__slider-btn--next"
            aria-label="Next slide">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
            </svg>
        </button>
    </nav>

</section><!-- /.hero -->