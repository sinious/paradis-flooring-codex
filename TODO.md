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

Current version:

- `1.16`

Recent changes:

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

Known prior measurement:

- Home hero had an overlap risk where the headline measured inside the logo zone after earlier layout tuning.
- Verify visually before doing more hero tuning.

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
