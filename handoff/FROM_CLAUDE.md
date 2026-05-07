# Claude Handoff

**Date:** 2026-05-06
**Build:** `paradis-flooring/` v2.1.3
**Codex build:** `paradis-flooring-codex/` — untouched

---

## Summary

- White gap bug fixed (root cause: FSE block-gap trap)
- Samsung Galaxy 360×800 mobile audit completed, all critical issues fixed
- Premium CSS effects layer added to front page
- Gallery recurated to Codex's picks (01,08,11,07,20,24,04,26,13)
- Hero CTA corrected to "CONTACT US →" per brand guide
- Services page built (dark hero + 3 services + CTA band)
- About page built (dark hero + trust copy + 2-col detail + CTA band)
- Wordmark mobile truncation fixed

---

## Changed Files

- `paradis-flooring/style.css` — version 2.1.3
- `paradis-flooring/theme.json` — full brand palette, font stack, spacing scale, element styles
- `paradis-flooring/functions.php` — scroll-progress via `wp_body_open`, Meow restrict, URL rewrite
- `paradis-flooring/assets/css/style.css` — full stylesheet
- `paradis-flooring/templates/front-page.html` — complete front page template
- WordPress DB: pages 35 (Services), 33 (About) updated via REST API

---

## Visual Result

- **Mobile 390×844:** Hero renders correctly, transparent header overlaid, no white gap at top, wordmark fits without clipping, features strip stacks to single column with icons drawing in, gallery 2-col, CTA full-width button, footer stacked correctly
- **Services page:** Dark hero band with gold label, clean h1, service items stack on mobile
- **Browser:** Chrome, localhost

---

## What Improved

**The white gap root cause (critical):**
TT25 applies `var(--wp--style--block-gap)` (~19px) between every direct child of `.wp-site-blocks`. A `scroll-progress` div placed as the first block in `front-page.html` was a `.wp-site-blocks` child, pushing header and hero down by exactly 19px. Fixed: removed from template entirely, injected via `wp_body_open` hook so it lands in `<body>` before the `.wp-site-blocks` wrapper.

**Mobile responsiveness:**
- Hero heading: `clamp(3.1rem…)` overridden to `2.3rem` at ≤599px — prevents word overflow in 328px container
- Hero `padding-top`: `7rem → 4.5rem` on mobile (header is ~65px, not 112px)
- CTA + hero buttons: `min-width: 260px → width: 100%` on mobile
- Wordmark `letter-spacing: 0.2em → 0.1em` at ≤599px — full name fits before hamburger
- Feature mid-column: vertical borders swap to horizontal rules on mobile

**Premium CSS effects (all `@supports`-guarded):**
- Gold shimmer on italic hero text: `background-clip: text`, 8s sweep — slow = luxury
- `@property --pf-btn-shine`: Houdini registered typed property enables smooth gradient color-stop animation. 8s shine + 6s glow breathe on CTA buttons
- Film grain: SVG `feTurbulence` data URI, `mix-blend-mode: overlay`, 0.045 opacity — no external file
- Hero parallax: `object-position` animated via `animation-timeline: view()`
- SVG icon draw-in: `stroke-dashoffset` 400→0 on scroll entry
- Feature columns: staggered `fade-slide-up` with different `animation-range` values
- Gallery warm-tone unifier: 10% amber `mix-blend-mode: multiply` overlay — unifies inconsistent phone camera white balance
- Wood grain wordmark: hero image clipped into letterforms via `background-clip: text` (home page only)
- Scroll progress bar: pure CSS, `animation-timeline: scroll(root block)`

**Inner pages:**
- Services: 3-service layout with gold number, heading, description, em-dash scope list
- About: trust-focused, no fluff — who/where/why/area
- Shared CTA band pattern reused across all pages for consistent contact path

---

## What Codex Should Review

**1. Wood grain wordmark**
Hero image clipped into "PARADIS FLOORING" letterforms via `background-clip: text`. Striking but brittle — if the hero image changes, the grain position shifts. Current `background-position: 15% 92%` is tuned to the concept-10-hero.webp. Codex should decide: keep as a home-page-specific effect tied to the current hero, or replace with a simpler static gold treatment that survives an image swap.

**2. Animation timing**
All gold effects slowed to 6–8s per user direction. Rule established: fast = cheap, slow = luxury. Codex should confirm this feels right for the brand (premium, not sluggish) when viewing on the actual device.

**3. Gallery image selection**
Adopted Codex's curation (01,08,11,07,20,24,04,26,13) over sequential numbering. The real client photos have inconsistent color temperature — the amber `mix-blend-mode: multiply` overlay helps but can't fully compensate. Codex should assess whether we need GPT-generated lifestyle renders to supplement until better client photography arrives.

**4. Services and About copy**
Current copy is Claude-written placeholder. Solid brand voice but not from the Art Director. Codex should write or review final copy before this goes to the client.

**5. Inner page hero height**
Services and About hero bands use `padding-top: clamp(5rem,10vw,8rem)`. On desktop this creates a generous dark band. Codex should confirm the visual weight feels right — heavier could be more premium, lighter could feel faster.

---

## Risks

**Browser:**
- `@property` (button shine): Chrome/Edge/Safari 17.2+. Not in Firefox. Gradient + glow remain as fallback — graceful.
- `animation-timeline: view()`: Chrome 115+ / Edge 115+. All effects `@supports`-guarded — Firefox/Safari get static layout, no missing content.
- `background-clip: text` on wordmark: if `-webkit-text-fill-color: transparent` fails, text becomes invisible. Tested working in Chrome. Old browsers rare for this client demographic.

**FSE/Site Editor:**
- CTA inner layout uses raw HTML in `wp:html` block (botanical SVG, flex wrapper). Renders correctly on front end. Site Editor visual preview will show unstyled HTML. Trade-off accepted for layout control.
- Inner pages built via REST API post content — not block templates. Content is in DB, not in version-controlled files. Should be noted.

**Performance:**
- Film grain SVG data URI: renders browser-side, no network cost.
- Gallery `loading="lazy"` on all 9 images. Hero image is NOT lazy (correct — LCP).
- Wood grain wordmark loads hero image a second time for the CSS `background-image`. Browser should cache-hit from the `<img>` on the same page — but worth monitoring.

**Maintenance:**
- Wood grain wordmark `background-position` is hand-tuned to current hero image. Not self-maintaining.
- Services and About page content lives in DB. Future edits must go through WP admin or REST API, not file edits.

---

## Suggested Adoption

**Keep:**
- `theme.json` palette — exact match to brand guide, properly suppresses TT25 defaults
- `wp_body_open` injection pattern for fixed/decorative elements — prevents block-gap trap permanently
- `@supports` guard on all scroll-driven animation — protects content visibility on unsupported browsers
- Slow animation timing (6–8s gold effects)
- Gallery warm-tone unifier (`mix-blend-mode: multiply`)
- Service scope list pattern (em-dash bullets, Montserrat small caps)
- Shared CTA band pattern across all inner pages

**Reject:**
- Nothing from Codex's concept direction was replaced. We built toward it.

**Adapt:**
- `@property` button shine: strong effect, worth adopting, but verify Safari 17.2+ acceptable for client
- Wood grain wordmark: keep the idea, but consider a CSS fallback gradient in case hero image changes
- Inner page hero band height: Codex to confirm padding values feel right at desktop
