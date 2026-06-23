# WP Theme Boilerplate — Freelancer Edition

Your reusable starting point. Copy this folder for every new client, rename it, change a few variables, and you've already saved 4–6 hours of setup.

## Quick Start (per new project)

1. **Copy the whole folder**, rename it to the client's theme slug (e.g. `acme-dental`).
2. Edit `style.css` header comment — Theme Name, Author, Description.
3. Open `src/scss/abstracts/_variables.scss` — change:
   - `$color-primary`, `$color-secondary`, `$color-accent` to the client's brand colors
   - `$font-heading`, `$font-body` to the client's fonts
4. Run:
   ```
   npm install
   npm run watch
   ```
   This watches `src/scss` and auto-compiles to `dist/style.css` as you work.
5. Zip the theme folder and upload via WP Admin → Appearance → Themes → Add New → Upload, or drop it in `wp-content/themes/` via FTP/hosting file manager.
6. Activate, set your menus (Appearance → Menus → assign to "Primary Menu" / "Footer Menu"), set a custom logo, add widgets to "Footer Widget Area."

## How the SCSS system works

- **`_variables.scss`** — change once, the whole theme's look updates. This is the only file you *must* touch per project.
- **`_mixins.scss`** — reusable patterns: `@include flex-center`, `@include grid-auto-fit(280px, 2rem)`, `@include bp(md) { ... }` for breakpoints. Stop writing raw `display:flex` — use these.
- **`layout/_grid.scss`** — gives you `.row`/`.col-6`, plus `.grid-2`, `.grid-3`, `.grid-4`, `.grid-auto` classes you can drop straight into PHP templates for service cards, blog grids, portfolios.
- **`components/`** — buttons, cards, forms. Extend these rather than writing new CSS for every client (e.g. add a `.btn--outline` instead of one-off classes).
- **`utilities/_helpers.scss`** — spacing/text helper classes (`.mt-4`, `.text-center`, `.hide-mobile`) for quick tweaks without touching SCSS files.

### Build commands
```
npm run build       # one-time minified build for production
npm run build:dev   # one-time expanded/readable build for debugging
npm run watch       # auto-rebuild on every save while you're working
```

## Folder map

| Folder/file | Purpose |
|---|---|
| `style.css` | WP theme metadata ONLY (not your real styles) |
| `functions.php` | Thin — just requires files from `/inc` |
| `inc/theme-setup.php` | Menus, thumbnails, widget areas, cleanup |
| `inc/enqueue.php` | Loads compiled CSS/JS with cache-busting |
| `header.php` / `footer.php` | Site shell, matches `.site-header`/`.site-footer` SCSS |
| `index.php` | WP-required fallback template |
| `template-parts/` | Reusable PHP chunks (hero, card, CTA, testimonial) — build these out per project |
| `src/scss/` | All your source styles — edit here, never edit `dist/` directly |
| `src/js/main.js` | Mobile nav toggle + any small interactivity |
| `dist/style.css` | Auto-generated. Don't hand-edit. |

## Adding a new template part (example)

```php
<?php // template-parts/hero.php ?>
<section class="section hero">
    <div class="container flex flex-col items-center text-center">
        <h1><?php the_title(); ?></h1>
        <p class="text-muted"><?php the_field('hero_subtitle'); ?></p>
        <a href="#contact" class="btn btn--primary btn--lg">Get a Quote</a>
    </div>
</section>
```
Then call it from `front-page.php` with `get_template_part('template-parts/hero');`.

## What makes this 10x faster
- You never write flexbox/grid CSS from scratch again — `@include flex-center` etc.
- Brand colors/fonts are swapped in ONE file per client.
- Buttons, cards, forms are pre-styled and consistent across every project.
- Spacing is on a scale (`$space-1` to `$space-12`) so you stop guessing px values.
- Mobile responsiveness is baked into the grid/mixins, not bolted on later.
