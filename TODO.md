# TODO / Restart Handoff

## Read First

Baseline project context:

1. `GLOBAL_CONTEXT.md`
2. `PERSONA.md`
3. `CODEX_CONTEXT.md`
4. `CODEX_RULES.md`

Then read the specialized files for this task:

- `BRAND_GUIDE.md`
- `CSS_CONTEXT.md`
- `TEMPLATE_CONTEXT.md`
- `WORDPRESS_FSE.md`
- `IMPLEMENTATION_NOTES.md`

Also read:

- `C:\Work\Codex\contexts\paradis-flooring\README.md`

## Project Boundary

- Work in `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring-codex`.
- Do not switch to `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring` unless the user explicitly asks.
- Related WordPress uploads may be inspected/used only when needed for this theme build.

## Current User Direction

- Continue matching the new concept references, using the brown color direction.
- Active brown: `#623111`.
- Focus on Home first, then Services/subpage structure.
- `Services` is the only generated subpage concept; all other subpages should follow the Services concept system.
- Content thumbnails on Home and Services should be much smaller like the concepts, not large/full-size cards.
- Logos are not properly sized yet; keep tuning them.
- Gallery page should stay masonry.
- Home/Services can use the six `img-gal-*.webp` cutout/reference images.
- Gallery/Experience should use existing real gallery media, not the `img-gal-*.webp` content cutouts.
- All site-used images must be registered in the WordPress Media Library before page content uses them.
- Page content belongs in WordPress/FSE page content. Theme template files should be shells/structure only, not hardcoded page content.

## Current Concept References

- Homepage concept: `concepts/front-page.png`
- Subpage/services concept: `concepts/sub-page.png`
- New home hero source: `concepts/hero-new-2.png`
- Service page hero source: `concepts/service-page-hero.png`
- Current treated logo: `concepts/logo-treated.png`
- Copy reference: `concepts/Website-Copy.md`
- The `concepts/` folder contains additional assets for reference only.
- All media used on the live site must be uploaded/registered through WordPress Media Library before use.

Older context files still mention `concepts/concept-2.png` and `concepts/hero.png`; those are outdated for the current user direction.

## WordPress Content State

The local WordPress site is at:

- `http://localhost/client/`
- `http://localhost/client/services/`
- `http://localhost/client/gallery/`
- `http://localhost/client/experience/`
- `http://localhost/client/about/`
- `http://localhost/client/contact/`

Media Library attachments were created for:

- `logo-treated.png`
- `hero-new-2.png`
- `service-page-hero.png`
- `img-gal-1.webp` through `img-gal-6.webp`

Page content has been populated in WordPress for Home, Services, Gallery, Experience, About, and Contact.

## Template State

Template files should remain shells:

- `templates/front-page.html`: post content + footer
- `templates/page.html`: post content + footer
- `templates/page-gallery.html`: post content + footer

Removed earlier hardcoded page templates:

- `page-services.html`
- `page-about.html`
- `page-experience.html`
- `page-contact.html`

Do not recreate hardcoded page-content templates unless the user changes direction.

## Recent CSS Work

Last edited file:

- `style.css`

- `1.48`

Recent changes:

- Corrected mobile navigation menu alignment, text centering, and layout position on the home page (Version 1.48). Placed `.pfc-mobile-nav-panel` flush below the top brown bar by using `top: 100%` and `right: 0` on the full-height `100%` wrapper. Added `box-sizing: border-box` to links to fix padding width breakout and center text perfectly.
- Remade the mobile navigation on the front page as a pure-CSS checkbox toggle (`.pfc-mobile-nav-wrapper`) and updated `style.css` to hide it on desktop and show it on tablet/mobile (Version 1.46). This allows flawless bidirectional cascading transitions (top-to-bottom on open, bottom-to-top on close) without layout cutoff from native browser details elements.
- Implemented pure-CSS bidirectional cascading dropdown animation on the native `<details>` element (Version 1.45). Overrode User Agent stylesheets to allow transition timing on close (sliding links up bottom-to-top) and opening timing (sliding links down top-to-bottom). Removed duplicate navigation overrides under the `782px` breakpoint.
- Refactored mobile navigation dropdown toggle for bidirectional cascading animation (Version 1.44). Links stagger down sequentially on open, and stagger back up sequentially on close.
- Aligned custom responsive breakpoints in `style.css` to Gutenberg's native mobile stack threshold of `782px` (Version 1.43). Updated mobile query limits to `782px` and tablet start bounds to `783px` to prevent layout overlaps and drift.
- Refactored the brand values section layout engine into a clean 3-state viewport architecture (Version 1.42):
  - State 1: Global & Desktop Baseline (981px+) using a clean flex row and 24px gap with border dividers.
  - State 2: Tablet Breakpoint (768px-980px) utilizing a tighter flex row flow with 12px gap, 0.75rem titles, and adjusted typography.
  - State 3: Ultra-Compact Mobile (767px and below) utilizing absolute card stacking, height-locked container (110px), cubic-bezier fading carousel, and inline radial-gradient indicator dots.
  - Surgically removed all legacy, experimental, and disconnected media query overrides for the values section.
- Mobile homepage gallery now uses a 2-column grid showing all six thumbnails; thumbnails link to the Gallery page.
- Aligned the homepage hero headline, divider, body text, and CTA to one left edge.
- Corrected hero typography scale, divider alignment, and CTA spacing on desktop/mobile.
- Added premium visual polish: richer brown logo panel, subtle page warmth, refined CTA shadows, image/card radius, gallery hover treatment, and softer hero/image depth.
- Hid the mobile homepage thumbnail-strip scrollbar while preserving horizontal scrolling.
- Reduced desktop logo scale: `.pfc-brand-logo { width: min(230px, 74%); }`
- Reduced mobile logo scale: `.pfc-brand-logo { width: min(176px, 46vw); }`
- Home `.pfc-gallery` changed to a compact six-column thumbnail strip on desktop.
- Home mobile `.pfc-gallery` changed to compact horizontal scrolling thumbnails.
- Services `.pfc-service-grid` tightened to smaller six-up cards on desktop.
- Services mobile cards changed to small thumbnail rows.
- Home hero headline now clears the logo panel, wraps to three lines, and keeps the CTA above the value strip.
- Services/subpage hero headline scale now matches the two-line concept direction.
- Gallery page masonry CSS should remain separate and unchanged.
- Added 1600px page max-width capping and shadow wrappers on widescreen viewports (version 1.25).
- Fixed giant desktop hero vertical heights using absolute positioning on `.pfc-hero-image` to prevent intrinsic size breakout (version 1.25).
- Converted split-hero columns from `vw` to percentages to scale properly within bounded width limits (version 1.25).
- Updated subpage header template part (`parts/header.html`) to use dynamic FSE `wp:site-logo` block with dynamic link pointing to the site root, set up database `site_logo` option to point to attachment ID `172`, updated database site name `blogname` to `"PARADIS FLOORING LLC"`, and added a fallback hook filter in `functions.php` to handle `wp:site-title` text replacements.
- Fixed homepage logo link stripping conflict in inline JS `cleanupImageLinks` function inside `functions.php`.
- Center-aligned the split-hero copy area globally on all pages (desktop and mobile) to unify the design and fix the left-alignment issue on subpages, and corrected a syntax error in the mobile `.pfc-hero-copy > *` margin rule (version 1.33).
- Normalized vertical spacing, margins, and container padding inside `.pfc-hero-copy` globally across all templates to remove discrepancies caused by varying browser/Gutenberg heading default styles (version 1.34).
- Converted all subpage hero title blocks in the database from H1 to H4 tag structure, unified global hero title sizes across all pages on all screens to match the homepage, and removed all subpage-specific stylesheet overrides (version 1.35).

## Known Issues / Verify Next

After restart, open and visually verify:

- `http://localhost/client/?cachebust=concept-19`
- `http://localhost/client/services/?cachebust=concept-19`
- `http://localhost/client/gallery/?cachebust=concept-19`

Check these first:

- Home content thumbnails are now compact enough and resemble `front-page.png`.
- Services content thumbnails/cards resemble `sub-page.png`.
- Logo size and brown-panel fit on desktop and mobile.
- Home hero headline no longer visually collides with the logo/brown panel.
- Gallery still renders masonry and still uses the real gallery images.
- Page layout remains centered and capped at 1600px width on viewports >= 1600px.
- Split-hero heights on widescreen monitors remain compact (around 530px-570px) and do not balloon.

## Browser Note

Before restart, the in-app browser helper failed because `browser-client.mjs` was missing from the Browser plugin folder after a handoff/crash. User is restarting Codex properly. If browser automation still fails, use direct local page checks and concise user-visible refresh URLs until the browser helper is stable.

## Git / Dirty State

Worktree is dirty. Do not revert unrelated changes.

Recent `git status --short` included:

- Modified context files: `AGENTS.md`, `CODEX_CONTEXT.md`, `IMPLEMENTATION_NOTES.md`, `TEMPLATE_CONTEXT.md`
- Deleted old concept refs: `concepts/concept-2.png`, `concepts/hero.png`
- Modified theme files: `parts/footer.html`, `style.css`, `templates/front-page.html`, `templates/page-gallery.html`, `templates/page.html`
- New concept assets: `concepts/front-page.png`, `concepts/sub-page.png`, `concepts/hero-new-2.png`, `concepts/service-page-hero.png`, `concepts/img-gal-1.webp` through `img-gal-6.webp`, `concepts/Website-Copy.md`

Do not stage/commit unless the user asks.

## Communication Preference

User wants concise, useful status. Not one-word answers, but do not overexplain. Keep working unless blocked.
