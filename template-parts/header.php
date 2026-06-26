<?php

/**
 * Site Header — used on all pages via header.php.
 * Includes the top contact/nav bar and the main sticky header with logo,
 * primary navigation, phone CTA, and Let's Talk button.
 *
 * Rendered automatically via get_header() — no manual get_template_part() call needed.
 * To override individual values, filter the options or extend via child theme.
 *
 * Expected $args (all optional — falls back to Customizer/options):
 *   'logo_url'          (string) URL of the logo image
 *   'logo_alt'          (string) Alt text for the logo image
 *   'logo_link'         (string) URL the logo links to — defaults to home_url('/')
 *   'address'           (string) Physical address shown in top bar
 *   'email'             (string) Support email shown in top bar
 *   'phone_label'       (string) Label above the phone number, e.g. "Call us today"
 *   'phone_number'      (string) Phone number (human-readable, e.g. +123-4669-1234)
 *   'phone_number_raw'  (string) Phone number for href (digits + country code, e.g. +12346691234)
 *   'cta_label'         (string) Text for the header CTA button
 *   'cta_url'           (string) URL for the header CTA button
 *   'facebook_url'      (string) Facebook profile URL
 *   'twitter_url'       (string) X/Twitter profile URL
 *   'dribbble_url'      (string) Dribbble profile URL
 *   'linkedin_url'      (string) LinkedIn profile URL
 *   'topbar_links'      (array)  Array of ['label' => '', 'url' => ''] for Pricing/Blog/Reviews
 *   'nav_items'         (array)  Array of ['label' => '', 'url' => '', 'has_dropdown' => bool, 'is_current' => bool]
 */

// ── Defaults ──────────────────────────────────────────────────────────────────
$logo_url         = $args['logo_url']         ?? get_template_directory_uri() . '/assets/images/logo.png';
$logo_alt         = $args['logo_alt']         ?? 'Techtlk';
$logo_link        = $args['logo_link']        ?? home_url('/');
$address          = $args['address']          ?? 'New Jersey, 07023, USA';
$email            = $args['email']            ?? 'Support@Company.com';
$phone_label      = $args['phone_label']      ?? 'Call us today';
$phone_number     = $args['phone_number']     ?? '+123-4669-1234';
$phone_number_raw = $args['phone_number_raw'] ?? '+12346691234';
$cta_label        = $args['cta_label']        ?? "Let's Talk";
$cta_url          = $args['cta_url']          ?? home_url('/contact');
$facebook_url     = $args['facebook_url']     ?? 'https://facebook.com';
$twitter_url      = $args['twitter_url']      ?? 'https://x.com';
$dribbble_url     = $args['dribbble_url']     ?? 'https://dribbble.com';
$linkedin_url     = $args['linkedin_url']     ?? 'https://linkedin.com';

$nav_items = $args['nav_items'] ?? array(
  array('label' => 'Home',         'url' => home_url('/'),             'has_dropdown' => true,  'is_current' => is_front_page()),
  array('label' => 'Pages',        'url' => home_url('/pages'),        'has_dropdown' => true,  'is_current' => false),
  array('label' => 'Services',     'url' => home_url('/services'),     'has_dropdown' => true,  'is_current' => false),
  array('label' => 'Industries',   'url' => home_url('/industries'),   'has_dropdown' => true,  'is_current' => false),
  array('label' => 'Case Studies', 'url' => home_url('/case-studies'), 'has_dropdown' => true,  'is_current' => false),
  array('label' => 'Blog',         'url' => home_url('/blog'),         'has_dropdown' => true,  'is_current' => false),
  array('label' => 'Contact',      'url' => home_url('/contact'),      'has_dropdown' => false, 'is_current' => false),
);
?>

<!-- ============================================================
     Site Header
     Contains: topbar, main nav bar, mobile nav panel.
     All three are children of .site-header so every piece
     can be targeted as .site-header__* in a single SCSS block.
     ============================================================ -->
<header class="container site-header" role="banner">

  <!-- ── Top Bar ─────────────────────────────────────────────── -->
  <div class="site-header__topbar">
    <div class="container site-header__topbar-inner">

      <!-- Left: Contact info -->
      <address class="site-header__contact">
        <span class="site-header__contact-item">
          <svg class="site-header__icon" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          <span><?php echo esc_html($address); ?></span>
        </span>
        <span class="site-header__contact-item">
          <svg class="site-header__icon" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          <a href="mailto:<?php echo esc_attr($email); ?>" class="site-header__topbar-link">
            <?php echo esc_html($email); ?>
          </a>
        </span>
      </address>

      <!-- Right: Quick links + social -->
      <div class="site-header__topbar-right">

        <nav class="site-header__topbar-nav" aria-label="Top bar navigation">
          <ul role="list">
            <li>
              <a href="" class="site-header__topbar-link">
                <svg class="site-header__icon" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M6 6h.008v.008H6V6Z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Pricing
              </a>
            </li>
            <li>
              <a href="" class="site-header__topbar-link">
                <svg class="site-header__icon" data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Reviews
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <!-- ── /Top Bar ─────────────────────────────────────────────── -->

  <!-- Logo -->
  <a href="<?php echo esc_url($logo_link); ?>" class="site-header__logo" aria-label="<?php echo esc_attr($logo_alt); ?> — Return to homepage">
    <img
      src="<?php echo esc_url($logo_url); ?>"
      alt="<?php echo esc_attr($logo_alt); ?>"
      class="site-header__logo-img" />
  </a>

  <!-- ── Main Bar ─────────────────────────────────────────────── -->
  <div class="site-header__bar">
    <div class="container site-header__bar-inner">

      <!-- Primary nav (desktop) -->
      <nav class="site-header__primary-nav" aria-label="Primary navigation">
        <ul class="site-header__nav-list" role="list">
          <?php foreach ($nav_items as $item) :
            $has_dropdown = ! empty($item['has_dropdown']);
            $is_current   = ! empty($item['is_current']);
          ?>
            <li class="site-header__nav-item<?php echo $has_dropdown ? ' site-header__nav-item--has-dropdown' : ''; ?>">
              <?php if ($has_dropdown) : ?>
                <a
                  class="site-header__nav-link<?php echo $is_current ? ' site-header__nav-link--active' : ''; ?>"
                  aria-haspopup="true"
                  aria-expanded="false"
                  <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                  <?php echo esc_html($item['label']); ?>
                  <svg class="site-header__chevron" data-slot="icon" width="12" height="12" aria-hidden="true" fill="none" stroke-width="2.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m19.5 8.25-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </a>
                <?php /* JS needed: toggle aria-expanded on click/keypress to reveal dropdown panel */ ?>
              <?php else : ?>
                <a
                  href="<?php echo esc_url($item['url']); ?>"
                  class="site-header__nav-link<?php echo $is_current ? ' site-header__nav-link--active' : ''; ?>"
                  <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                  <?php echo esc_html($item['label']); ?>
                </a>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>

      <!-- Actions: phone CTA + button -->
      <div class="site-header__actions">

        <!-- Phone CTA -->
        <!-- <div class="site-header__phone">
          <a href="tel:<?php echo esc_attr($phone_number_raw); ?>" class="site-header__phone-icon-wrap btn btn--primary" aria-label="<?php echo esc_attr($phone_label); ?>">
            <svg class="site-header__phone-icon" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
              <path d="M6.62 10.79a15.053 15.053 0 0 0 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1C10.85 21 3 13.15 3 4c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.24 1.02l-2.21 2.2z" />
            </svg>
          </a>
          <div class="site-header__phone-text">
            <span class="site-header__phone-label"><?php echo esc_html($phone_label); ?></span>
            <a href="tel:<?php echo esc_attr($phone_number_raw); ?>" class="site-header__phone-number">
              <?php echo esc_html($phone_number); ?>
            </a>
          </div>
        </div> -->

        <!-- CTA button -->
        <a href="<?php echo esc_url($cta_url); ?>" class="btn btn--primary site-header__cta">
          <?php echo esc_html($cta_label); ?>
          <svg class="site-header__cta-arrow" width="30" height="30" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
          </svg>
        </a>
      </div>
      <?php /* JS needed: toggle aria-expanded + hidden attribute on #site-header__mobile-nav */ ?>

    </div>
  </div>
  <!-- ── /Main Bar ─────────────────────────────────────────────── -->
  <!-- Hamburger (hidden on desktop via CSS) -->
  <button
    class="site-header__hamburger"
    aria-label="Open navigation menu"
    aria-expanded="false"
    aria-controls="site-header__mobile-nav">
    <svg class="site-header__hamburger-bar nav_menu--closed" data-slot=" icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
    <svg class="site-header__hamburger-bar nav_menu--opened btn--primary btn--full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
    </svg>

  </button>
  <!-- ── Mobile Nav Panel (hidden by default, toggled via JS) ─── -->
  <nav
    id="site-header__mobile-nav"
    class="site-header__mobile-nav"
    aria-label="Mobile navigation">
    <ul class="site-header__mobile-nav-list" role="list">
      <?php foreach ($nav_items as $item) :
        $is_current = ! empty($item['is_current']);
      ?>
        <li class="site-header__mobile-nav-item">
          <a
            href="<?php echo esc_url($item['url']); ?>"
            class="site-header__mobile-nav-link"
            <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
            <?php echo esc_html($item['label']); ?>
          </a>
        </li>
      <?php endforeach; ?>
      <!-- CTA button -->
      <a href="<?php echo esc_url($cta_url); ?>" class="btn btn--primary site-header__cta">
        <?php echo esc_html($cta_label); ?>
        <svg class="site-header__cta-arrow" width="30" height="30" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
        </svg>
      </a>
    </ul>
  </nav>
  <!-- ── /Mobile Nav Panel ─────────────────────────────────────── -->

</header>
<!-- /Site Header -->