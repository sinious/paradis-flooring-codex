# Implementation Notes

## Purpose

- Tracks technical decisions and implementation state for the theme

## Current State

- Starting from an earlier Twenty Twenty-Five copy that has now been heavily stripped down
- Current homepage build reference: `concepts/front-page.png`
- Current subpage build reference: `concepts/sub-page.png`
- Homepage hero reference/source asset available: `concepts/hero-new-2.png`
- Original logo source of truth kept at `concepts/logo.jpg`
- Current treated homepage logo asset: `concepts/logo-treated.png`
- Canonical brand/design reference: `BRAND_GUIDE.md`
- Typography constraint: Google Fonts only
- `Paradis Flooring Codex` is activated in local WordPress
- `templates/front-page.html` provides the homepage shell; homepage section content lives in the WordPress page editor
- `templates/page-gallery.html` now exists for the Gallery page
- Site-used concept images should be uploaded to the WordPress Media Library before being placed in page content
- Homepage/subpage hero, logo, and six gallery cutouts were registered as WordPress Media Library attachments in `/wp-content/uploads/2026/05/`
- Homepage and subpages use editable WordPress block content for copy, imagery, and section bodies
- Theme template files should define shells and reusable styling only; do not hardcode page-specific content in template files
- Mobile homepage now swaps the full nav for a hamburger/details menu
- Mobile homepage gallery is intentionally limited to the first 3 gallery images; desktop keeps 6
- Footer social is now Facebook-only and points to the provided client profile
- A published WordPress page now exists at `http://localhost/client/gallery/`
- WordPress/FSE docs were distilled into `WORDPRESS_FSE.md`; use it for future FSE/theme.json/template decisions
- `theme.json` palette and font presets were updated from Twenty Twenty-Five defaults to the Paradis brand palette plus Google Font family presets (`Inter`, `Playfair Display`)
- `parts/header.html` and `parts/footer.html` were replaced with Paradis-specific block template parts for inner pages
- Default Twenty Twenty-Five footer/header pattern references are no longer used by the main page templates
- `templates/front-page.html` keeps the homepage custom: no normal header, custom hero/body, and a minimal copyright footer
- `functions.php` enqueues `style.css` directly and the old minified build workflow was removed
- Google Fonts currently enqueued: `Inter` and `Playfair Display`
- Theme metadata in `style.css` identifies the theme as `Paradis Flooring Codex`
- `.gitignore` now blocks common local secrets and SSH key filenames
- `style.css` version `1.16` adds a premium polish pass: warmer page background, richer brown logo panel, refined CTA depth, subtle image/card radius and shadows, cleaner gallery hover behavior, corrected homepage hero stack alignment, and a non-scroll mobile homepage gallery grid.
- `functions.php` links homepage gallery thumbnails to `/client/gallery/` on the front end.
- `style.css` version `1.19` adds reusable info-card styling and contact form polish.
- Home, Services, Gallery, Experience, About, and Contact page content was tightened with practical service/expectation copy from `concepts/Website-Copy.md`; FPO-specific names, license numbers, and unverifiable certification claims were avoided.
- Additional web research informed the next copy pass: Bona dust-containment/refinishing guidance, Stanley Steemer tile/grout cleaning and sealing guidance, Mr. Sandless disruption-focused refinishing messaging, and screen/recoat vs. refinish explainer pages. Copy remains conservative and does not claim certifications, proprietary systems, exact percentages, or guarantees unless the client verifies them.
- `templates/page.html` was switched from constrained layout to default layout so the shared footer can render full-width on inner pages.
- Homepage content now uses the uploaded WordPress media asset `front-page-hero.webp`; inner-page hero assets were intentionally left in place for later replacement by the user.
- Inner-page structure/content was refined in WordPress page content: About, Experience, Gallery, Services, and Contact now carry more page-specific copy, and Contact now includes stronger intake guidance plus a lower support section.
- May 29, 2026 diagnosis: invalid Gutenberg block warnings are coming from saved page `post_content`, not the shell templates or template parts.
- Confirmed broken pages in the editor: Home, Services, Gallery, Experience, About, and Contact. Privacy Policy did not show invalid block warnings.
- First confirmed cause: `Home` contains raw `<details class="pfc-mobile-nav">...</details>` markup inserted directly into the block stream instead of being wrapped in a valid block.
- Going forward, custom structural HTML must live in a Custom HTML block or reusable template part; editable page content should stay as normal core blocks with classes for styling.

## Verification Notes

- Local URL checked in browser: `http://localhost/client/`
- Active front page renders from the Codex theme
- Desktop homepage, Services, Gallery, Experience, Contact, lower CTA, footer, and mobile menu behavior were browser-checked
- Mobile homepage was browser-checked after nav, hero, and gallery adjustments
- Inner `Services` page was browser-checked against the shared subpage concept direction
- Desktop and mobile homepage/Services/Gallery were browser-checked after the `1.12` polish pass.
- Mobile homepage gallery grid and thumbnail links were browser-checked after the `1.16` update.
- Gallery page permalink was created and published in local WordPress
- Full-page screenshots can visually repeat the hero due browser capture stitching; scroll-by-scroll verification showed the actual page order is correct
- Browser plugin/local browser workflow worked after Node was updated to v24.15.0/npm 11.12.1
- GitHub push succeeded after setting this project to use Windows OpenSSH for Git SSH commands

## Git State

Repo branch:
`main`

Latest pushed rebuild commit:
`86dc5c8`

## Next Likely Focus

- Refine the new Gallery page design beyond the initial masonry build
- Build or restyle additional inner pages: Services, About, Contact, Experience
- Replace any remaining FPO icon treatments if better assets or clearer direction arrive

## Track Here

- Template and pattern decisions
- Theme JSON decisions
- Template part structure
- CSS architecture decisions
- Asset paths used by the build
- Testing notes
- Browser-check notes
