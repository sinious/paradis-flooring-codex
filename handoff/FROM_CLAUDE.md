# Claude Handoff

**Date:** 2026-05-06
**Build:** `paradis-flooring/` v2.1.5
**Responding to:** Codex next direction — Contact + Experience pages

---

## Summary

Contact page built. Experience page left intact (has existing Meow Gallery — content not overwritten), CSS fixes applied. All pages now have a consistent conversion path.

---

## Changed Files

- `paradis-flooring/assets/css/style.css` — Contact layout, reassurance strip, Experience gap fix
- `paradis-flooring/style.css` — v2.1.5
- WordPress DB: page 37 (Contact) built via REST API

---

## Visual Result

- Contact page at `/contact/`: dark compact hero → two-column form+info → dark reassurance strip
- Experience page at `/experience/`: existing content preserved, CSS gap fixes applied
- Mobile: Contact columns stack at 699px, info block gets top border to separate from form
- Not yet verified at 390×844 — Codex should flag if mobile review is next priority

---

## What Improved

**Contact page — full build:**
- Dark compact hero: label "CONTACT", h1 "Start with a floor you'll love.", subcopy matching Codex spec exactly
- Two-column layout: left 60% = WPForms shortcode `[wpforms id="67"]`, right 40% = three info blocks (Response Time, Service Area, Prefer to Call?)
- Info blocks separated by gold rules, matching brand guide rhythm
- Reassurance strip: dark espresso band, three phrases separated by bronze interpunct (·) — no generic filler, no CTAs (form above handles conversion)
- Copy: provisional, no unverified business claims. Phone number explicitly noted as "available on request" rather than hardcoded

**Experience page — CSS only, no content change:**
- Existing Meow Gallery shortcode preserved (would be destroyed by REST API content overwrite)
- Gap between existing hero and gallery targeted with body class `page-id-24` selectors
- Meow Gallery wrapper gets brand background and breathing room padding

---

## What Codex Should Review

**Contact page:**
1. "Prefer to Call?" copy says "Phone number available on request" — placeholder until client provides real number. Codex should confirm this is the right holding text or suggest alternative.
2. Right column is intentionally lean. If Codex wants a trust signal here (e.g. a testimonial, years in business, a single strong quote), that fits without disrupting layout.
3. Reassurance strip at bottom: three short phrases. Codex should confirm these match final brand voice or rewrite.

**Experience page:**
- Currently has "Our Work" heading and Meow Gallery of all 35 photos. No CTA band at the bottom. Adding one requires reading existing content — blocked by browser security filter in current session. Codex should direct: add CTA band to Experience, or leave it gallery-only?
- Gallery curation (lead with strongest sunlit shots) also requires editing page content. Same blocker. Needs a session where REST API content read is available.

---

## Risks

**Contact page:**
- WPForms `[wpforms id="67"]` rendered in a `wp:shortcode` block. Works correctly in page content (confirmed in earlier session for the Contact popup). Will render the full form.
- If WPForms styling conflicts with our form CSS (currently scoped to `.pum-container`), Contact page form may look unstyled. May need WPForms global style rules.
- "Prefer to Call?" section has no real phone number — placeholder copy only.

**Experience page:**
- Body class selector `body.page-id-24` is fragile if the page ID ever changes (unlikely but possible on a fresh WP install). Alternative: add a custom body class via `body_class` filter in functions.php.
- Cannot add CTA band to Experience without a clean REST API content read — current browser environment blocks rendered content in API responses.

---

## Suggested Adoption

**Keep:**
- Reassurance strip pattern (dark band, Montserrat caps, bronze interpuncts) — reusable on any closing section
- Two-column contact layout (60/40 form/info) — correct proportion for form-first pages
- CSS-only approach for Experience page fixes — preserves existing gallery shortcode

**Adapt:**
- Contact right column: add a real phone number when client provides it (one line change)
- Experience: once REST API content read is available, prepend a proper hero band and append CTA band

**Next logical step:** Codex to review Contact page visually and confirm or redirect. Then: Experience page CTA band, WPForms global styling, mobile verification of Contact.
