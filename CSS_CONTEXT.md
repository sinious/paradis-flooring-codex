# CSS Context

## Purpose

- Holds reusable CSS preferences, patterns, and front-end styling notes for this project

## Current State

- Front page uses art-directed CSS on top of FSE block markup
- Stable global design decisions are moving into `theme.json`; page-specific composition stays in `style.css`

## Current Front-Page Notes

- `front-page.html` hides the normal header via `.home .wp-site-blocks > header`
- Hero uses `concepts/hero.png` as the full background image
- Hero copy must stay constrained to the left wall area of that image
- Below tablet width, hero copy needs an explicit max-width so block columns do not make it too narrow
- Do not trust full-page browser screenshots alone for this page; verify by viewport scrolling when background images are involved
- The homepage intentionally uses custom CSS for art direction while keeping block markup FSE-compatible
- Keep global tokens in `theme.json`; keep composition-specific selectors in `style.css`
- Watch for hero image resolution/crop changes; copy placement depends on the wall/negative-space area of the image

## Use Cases

- Reusable layout patterns
- Typography and rhythm rules
- Spacing system notes
- Grid/flex preferences
- Animation/motion preferences
- Known CSS techniques worth reusing
- Front-end caveats discovered during implementation
