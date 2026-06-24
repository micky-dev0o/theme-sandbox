<?php
/**
 * Site Header (Top Bar + Main Navigation) — used on all pages via header.php.
 * Include via: get_template_part( 'template-parts/header/site-header' )
 *
 * Expected $args (all optional — sensible fallbacks provided):
 *   'address'         (string) Physical address text.             Default: 'New Jesrsy, 07023, USA'
 *   'address_url'     (string) Google Maps URL for the address.   Default: 'https://maps.google.com/?q=New+Jersey,+07023,+USA'
 *   'email'           (string) Support email address.             Default: 'Support@Company.com'
 *   'phone'           (string) Display phone number.              Default: '+123-4669-1234'
 *   'phone_url'       (string) tel: href for the phone number.    Default: 'tel:+12346691234'
 *   'facebook_url'    (string) Facebook profile URL.
 *   'twitter_url'     (string) X / Twitter profile URL.
 *   'dribbble_url'    (string) Dribbble profile URL.
 *   'linkedin_url'    (string) LinkedIn profile URL.
 *   'logo_src'        (string) Logo image URL.
 *   'logo_alt'        (string) Logo image alt text.               Default: 'Techtlk logo'
 *   'cta_label'       (string) CTA button label.                  Default: "Let's Talk"
 *   'cta_url'         (string) CTA button href.                   Default: '/contact'
 *   'active_page'     (string) Slug of the currently active nav item, e.g. 'home'.
 */

// ── Top-bar contact info ──────────────────────────────────────────────────────
$address     = $args['address']     ?? 'New Jesrsy, 07023, USA';
$address_url = $args['address_url'] ?? 'https://maps.google.com/?q=New+Jersey,+07023,+USA';
$email       = $args['email']       ?? 'Support@Company.com';

// ── Utility nav links (static; extend via $args if needed) ───────────────────
$pricing_url = $args['pricing_url'] ?? '#pricing';
$blog_url    = $args['blog_url']    ?? get_permalink( get_option( 'page_for_posts' ) ) ?: '/blog';
$reviews_url = $args['reviews_url'] ?? '#reviews';

// ── Social links ─────────────────────────────────────────────────────────────
$facebook_url = $args['facebook_url'] ?? 'https://facebook.com';
$twitter_url  = $args['twitter_url']  ?? 'https://twitter.com';
$dribbble_url = $args['dribbble_url'] ?? 'https://dribbble.com';
$linkedin_url = $args['linkedin_url'] ?? 'https://linkedin.com';

// ── Logo ─────────────────────────────────────────────────────────────────────
$logo_src = $args['logo_src'] ?? get_template_directory_uri() . '/assets/images/logo.svg';
$logo_alt = $args['logo_alt'] ?? 'Techtlk logo';

// ── Phone CTA ────────────────────────────────────────────────────────────────
$phone     = $args['phone']     ?? '+123-4669-1234';
$phone_url = $args['phone_url'] ?? 'tel:+12346691234';

// ── Button CTA ───────────────────────────────────────────────────────────────
$cta_label = $args['cta_label'] ?? "Let's Talk";
$cta_url   = $args['cta_url']   ?? '/contact';

// ── Active page ───────────────────────────────────────────────────────────────
$active_page = $args['active_page'] ?? 'home';

// ── Primary nav items ─────────────────────────────────────────────────────────
$primary_nav_items = [
    [ 'label' => 'Home',         'slug' => 'home',         'url' => home_url( '/' ),       'has_dropdown' => true  ],
    [ 'label' => 'Pages',        'slug' => 'pages',        'url' => home_url( '/pages' ),   'has_dropdown' => true  ],
    [ 'label' => 'Services',     'slug' => 'services',     'url' => home_url( '/services' ),'has_dropdown' => true  ],
    [ 'label' => 'Industries',   'slug' => 'industries',   'url' => home_url( '/industries' ), 'has_dropdown' => true ],
    [ 'label' => 'Case Studies', 'slug' => 'case-studies', 'url' => home_url( '/case-studies' ), 'has_dropdown' => true ],
    [ 'label' => 'Blog',         'slug' => 'blog',         'url' => esc_url( $blog_url ),  'has_dropdown' => true  ],
    [ 'label' => 'Contact',      'slug' => 'contact',      'url' => home_url( '/contact' ), 'has_dropdown' => false ],
];
?>

<!-- Site Header: Top Bar + Main Navigation -->

<header class="site-header" role="banner">

  <!-- Top Bar -->
  <div class="topbar">
    <div class="container topbar__inner">

      <div class="topbar__contact">
        <address class="topbar__address">
          <a href="<?php echo esc_url( $address_url ); ?>" class="topbar__link" aria-label="<?php echo esc_attr( 'Our address: ' . $address ); ?>">
            <svg class="topbar__icon" aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" fill="currentColor"/>
            </svg>
            <?php echo esc_html( $address ); ?>
          </a>
        </address>

        <a href="<?php echo esc_url( 'mailto:' . $email ); ?>" class="topbar__link topbar__link--email">
          <svg class="topbar__icon" aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="currentColor"/>
          </svg>
          <?php echo esc_html( $email ); ?>
        </a>
      </div>

      <nav class="topbar__nav" aria-label="Utility navigation">
        <ul class="topbar__nav-list" role="list">
          <li class="topbar__nav-item">
            <a href="<?php echo esc_url( $pricing_url ); ?>" class="topbar__nav-link">
              <svg class="topbar__icon" aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" fill="currentColor"/>
              </svg>
              <?php esc_html_e( 'Pricing', 'techtlk' ); ?>
            </a>
          </li>
          <li class="topbar__nav-item">
            <a href="<?php echo esc_url( $blog_url ); ?>" class="topbar__nav-link">
              <svg class="topbar__icon" aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 000-1.41l-2.34-2.34a1 1 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" fill="currentColor"/>
              </svg>
              <?php esc_html_e( 'Blog', 'techtlk' ); ?>
            </a>
          </li>
          <li class="topbar__nav-item">
            <a href="<?php echo esc_url( $reviews_url ); ?>" class="topbar__nav-link">
              <svg class="topbar__icon" aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" fill="currentColor"/>
              </svg>
              <?php esc_html_e( 'Reviews', 'techtlk' ); ?>
            </a>
          </li>
        </ul>

        <div class="topbar__divider" aria-hidden="true"></div>

        <ul class="topbar__social" role="list" aria-label="<?php esc_attr_e( 'Social media links', 'techtlk' ); ?>">
          <li class="topbar__social-item">
            <a href="<?php echo esc_url( $facebook_url ); ?>" class="topbar__social-link" aria-label="<?php esc_attr_e( 'Follow us on Facebook', 'techtlk' ); ?>" target="_blank" rel="noopener noreferrer">
              <svg aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
              </svg>
            </a>
          </li>
          <li class="topbar__social-item">
            <a href="<?php echo esc_url( $twitter_url ); ?>" class="topbar__social-link" aria-label="<?php esc_attr_e( 'Follow us on X (formerly Twitter)', 'techtlk' ); ?>" target="_blank" rel="noopener noreferrer">
              <svg aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
              </svg>
            </a>
          </li>
          <li class="topbar__social-item">
            <a href="<?php echo esc_url( $dribbble_url ); ?>" class="topbar__social-link" aria-label="<?php esc_attr_e( 'Follow us on Dribbble', 'techtlk' ); ?>" target="_blank" rel="noopener noreferrer">
              <svg aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2"/>
                <path d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32" stroke="currentColor" stroke-width="1.5" fill="none"/>
              </svg>
            </a>
          </li>
          <li class="topbar__social-item">
            <a href="<?php echo esc_url( $linkedin_url ); ?>" class="topbar__social-link" aria-label="<?php esc_attr_e( 'Follow us on LinkedIn', 'techtlk' ); ?>" target="_blank" rel="noopener noreferrer">
              <svg aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                <circle cx="4" cy="4" r="2"/>
              </svg>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </div><!-- /.topbar -->

  <!-- Main Navigation -->
  <div class="main-nav">
    <div class="container main-nav__inner">

      <!-- Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="main-nav__logo" aria-label="<?php echo esc_attr( $logo_alt . ' — ' . __( 'Back to homepage', 'techtlk' ) ); ?>">
        <img
          src="<?php echo esc_url( $logo_src ); ?>"
          alt="<?php echo esc_attr( $logo_alt ); ?>"
          width="160"
          height="40"
          loading="eager"
        />
      </a>

      <!-- Primary Navigation -->
      <nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'techtlk' ); ?>">
        <!-- JS needed: dropdown menus require toggling aria-expanded on parent anchor triggers and closing on outside click / Escape key -->
        <ul class="primary-nav__list" role="list">

          <?php foreach ( $primary_nav_items as $nav_item ) :
            $is_active      = ( $active_page === $nav_item['slug'] );
            $has_dropdown   = ! empty( $nav_item['has_dropdown'] );
            $item_classes   = 'primary-nav__item';
            if ( $has_dropdown ) {
              $item_classes .= ' primary-nav__item--has-dropdown';
            }
            $link_classes   = 'primary-nav__link';
            if ( $is_active ) {
              $link_classes .= ' primary-nav__link--active';
            }
          ?>
          <li class="<?php echo esc_attr( $item_classes ); ?>">
            <a
              href="<?php echo esc_url( $nav_item['url'] ); ?>"
              class="<?php echo esc_attr( $link_classes ); ?>"
              <?php if ( $is_active ) : ?>aria-current="page"<?php endif; ?>
              <?php if ( $has_dropdown ) : ?>aria-expanded="false" aria-haspopup="true"<?php endif; ?>
            >
              <?php echo esc_html( $nav_item['label'] ); ?>
              <?php if ( $has_dropdown ) : ?>
              <svg class="primary-nav__chevron" aria-hidden="true" focusable="false" width="12" height="12" viewBox="0 0 24 24" fill="none">
                <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <?php endif; ?>
            </a>
            <?php if ( $has_dropdown ) : ?>
            <ul class="primary-nav__dropdown" role="list" aria-label="<?php echo esc_attr( $nav_item['label'] . ' ' . __( 'submenu', 'techtlk' ) ); ?>">
              <!-- Dropdown items for <?php echo esc_html( $nav_item['label'] ); ?> inserted here -->
            </ul>
            <?php endif; ?>
          </li>
          <?php endforeach; ?>

        </ul>
      </nav>
      <!-- JS needed: handle aria-expanded toggling on .primary-nav__item--has-dropdown and close on outside click / Escape key -->

      <!-- Header CTA Group -->
      <div class="header-cta">
        <a href="<?php echo esc_url( $phone_url ); ?>" class="header-cta__phone-block" aria-label="<?php echo esc_attr( __( 'Call us today at ', 'techtlk' ) . $phone ); ?>">
          <span class="header-cta__phone-icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
              <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.47 11.47 0 003.59.57 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.47 11.47 0 00.57 3.59 1 1 0 01-.25 1.01l-2.2 2.19z"/>
            </svg>
          </span>
          <span class="header-cta__phone-text">
            <span class="header-cta__phone-label"><?php esc_html_e( 'Call us today', 'techtlk' ); ?></span>
            <span class="header-cta__phone-number"><?php echo esc_html( $phone ); ?></span>
          </span>
        </a>

        <a href="<?php echo esc_url( $cta_url ); ?>" class="btn btn--primary btn--lg header-cta__talk-btn">
          <?php echo esc_html( $cta_label ); ?>
          <svg aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>

        <!-- Mobile hamburger (visible on small screens via CSS) -->
        <button
          class="main-nav__hamburger"
          aria-label="<?php esc_attr_e( 'Open navigation menu', 'techtlk' ); ?>"
          aria-expanded="false"
          aria-controls="primary-nav-mobile"
        >
          <span class="main-nav__hamburger-bar" aria-hidden="true"></span>
          <span class="main-nav__hamburger-bar" aria-hidden="true"></span>
          <span class="main-nav__hamburger-bar" aria-hidden="true"></span>
        </button>
        <!-- JS needed: toggle aria-expanded and show/hide mobile nav panel on hamburger click -->
      </div>

    </div>
  </div><!-- /.main-nav -->

</header>