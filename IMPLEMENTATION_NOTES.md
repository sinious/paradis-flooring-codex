# Implementation Notes

## Purpose

- Tracks technical decisions and implementation state for the theme

## Current State

- Starting from a `twentytwentyfive` copy
- Current build reference: `concepts/concept-10.png`
- Hero asset available: `concepts/concept-10-hero.webp`
- Canonical brand/design reference: `BRAND_GUIDE.md`
- Typography constraint: Google Fonts only
- `Paradis Flooring Codex` is activated in local WordPress
- `templates/front-page.html` now drives the homepage
- Front page uses the uploaded hero image at `/wp-content/uploads/2026/05/concept-10-hero.webp`
- Front page uses uploaded real flooring images from `/wp-content/uploads/2026/05/paradis_flooring_*.webp`
- The hero was adjusted to fit the higher-resolution generated hero image as a background field with overlay copy in the wall area
- WordPress/FSE docs were distilled into `WORDPRESS_FSE.md`; use it for future FSE/theme.json/template decisions
- `theme.json` palette and font presets were updated from Twenty Twenty-Five defaults to the Paradis brand palette plus Google Font family presets (`Inter`, `Playfair Display`)
- `parts/header.html` and `parts/footer.html` were replaced with Paradis-specific block template parts for inner pages
- Default Twenty Twenty-Five footer/header pattern references are no longer used by the main page templates
- `templates/front-page.html` keeps the homepage custom: no normal header, custom hero/body, and a minimal copyright footer

## Verification Notes

- Local URL checked in browser: `http://localhost/client/`
- Active front page renders from the Codex theme
- Desktop first viewport shows hero plus the top of the value strip
- Gallery, CTA band, and footer render below the hero
- Inner `Services` page was checked and now shows the Paradis header with simple navigation
- Full-page screenshots can visually repeat the hero due browser capture stitching; scroll-by-scroll verification showed the actual page order is correct

## Track Here

- Template and pattern decisions
- Theme JSON decisions
- Template part structure
- CSS architecture decisions
- Asset paths used by the build
- Testing notes
- Browser-check notes
