# Style Guide

## Colors

| Role | Name | Hex | Usage |
|---|---|---|---|
| Accent | Coral Glow | `#EF8354` | CTAs, highlights, hover states, badges |
| Secondary | Tea Green | `#D6FFB7` | Backgrounds, supporting UI elements, success states |
| Primary | Dark Amethyst | `#190933` | Headings, logo, brand elements, nav/footer backgrounds |

**Note:** Dark Amethyst (`#190933`) is reserved for headings and brand elements, not body copy — it's too dark/saturated for comfortable long-form reading. Body text uses a neutral dark gray (see Typography below) for readability.

### SCSS Variables

```scss
$color-accent:     #EF8354; // Coral Glow
$color-secondary:  #D6FFB7; // Tea Green
$color-primary:    #190933; // Dark Amethyst

$color-text:       #2D2D2D; // body copy
$color-text-light: #6B6B6B; // muted/secondary text
$color-bg:         #FFFFFF;
$color-white:      #FFFFFF;
```

---

## Typography

**Font family:** Poppins (all weights)

**Scale:** Major Third (ratio 1.25)

| Element | Size (rem) | Size (px @16px base) | Suggested weight |
|---|---|---|---|
| h1 | 3.815rem | ~61px | 700 (Bold) |
| h2 | 3.052rem | ~49px | 700 (Bold) |
| h3 | 2.441rem | ~39px | 600 (SemiBold) |
| h4 | 1.953rem | ~31px | 600 (SemiBold) |
| h5 | 1.563rem | ~25px | 500 (Medium) |
| h6 | 1.25rem | ~20px | 500 (Medium) |
| p (body) | 1rem | 16px | 400 (Regular) |
| small | 0.8rem | ~13px | 400 (Regular) |
| caption | 0.64rem | ~10px | 400 (Regular) |

### SCSS Variables

```scss
$font-family: 'Poppins', sans-serif;

$fs-h1: 3.815rem;
$fs-h2: 3.052rem;
$fs-h3: 2.441rem;
$fs-h4: 1.953rem;
$fs-h5: 1.563rem;
$fs-h6: 1.25rem;
$fs-body: 1rem;
$fs-small: 0.8rem;
$fs-caption: 0.64rem;
```

### Sample Usage

```scss
h1 { font-family: $font-family; font-size: $fs-h1; font-weight: 700; color: $color-primary; }
h2 { font-family: $font-family; font-size: $fs-h2; font-weight: 700; color: $color-primary; }
body, p { font-family: $font-family; font-size: $fs-body; font-weight: 400; color: $color-text; }
```

---

## Quick Reference

- **Primary brand color (headings/UI chrome):** `#190933`
- **Accent (CTAs/highlights):** `#EF8354`
- **Secondary (backgrounds/support):** `#D6FFB7`
- **Body text color:** `#2D2D2D` (not the primary brand color — kept neutral for readability)
- **Font:** Poppins, Major Third type scale (1.25 ratio)