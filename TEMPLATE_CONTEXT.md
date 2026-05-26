# Template Context

## Purpose

- Holds implementation-ready template guidance for converting the approved concept into a WordPress FSE build

## Active References

- Primary concept: `concepts/concept-2.png`
- Hero asset: `concepts/hero.png`
- Canonical brand rules: `BRAND_GUIDE.md`

## Scope

- Current targets:
  - homepage / front page
  - Gallery page
- Build as a strong FSE interpretation of the approved concept

## Required Homepage Sections

1. Quiet header with branding and simple navigation trigger
2. Split hero with branded copy, supporting copy, and primary CTA
3. Exactly 3 value statements
4. Work/examples section with gallery imagery
5. Bottom CTA band with reassurance copy
6. Minimal footer

## FSE Mapping

- `templates/front-page.html`: homepage assembly
- `templates/page-gallery.html`: gallery page assembly
- `parts/header.html`: minimal top navigation / branding
- `parts/footer.html`: minimal footer

## Layout Assumptions

- Desktop should follow the concept closely
- Tablet and mobile behavior must be inferred cleanly from the concept
- Mobile should preserve hierarchy over exact composition
- The value strip must not exceed 3 items
- Homepage mobile nav currently uses a hamburger/details menu
- Homepage gallery may collapse by breakpoint while preserving order and emphasis

## Asset Use

- Use `concepts/hero.png` as the homepage hero image
- Use `concepts/logo-treated.png` for the current homepage logo treatment while preserving `concepts/logo.jpg` as the untouched source
- Current gallery uses real uploaded flooring images from `/wp-content/uploads/2026/05/paradis_flooring_*.webp`
- Treat gallery imagery in the bitmap concept as structure and mood reference when final assets are not explicitly provided

## Typography Constraints

- Google Fonts only
- Current implementation uses `Playfair Display` for editorial serif and `Inter` for clean sans/body/UI

## Implementation Priorities

- Preserve the light-hero / dark-gallery / light-footer rhythm
- Keep CTA visibility strong
- Match the luxury editorial tone without overbuilding
- Use the concept as the source of truth for section order and hierarchy

## Known Unknowns

- Exact final mobile composition
- Exact final font pair unless explicitly locked
- Whether all gallery images are real production assets or placeholders
- Final navigation behavior
- Final long-term Gallery page direction versus this first-pass masonry implementation
