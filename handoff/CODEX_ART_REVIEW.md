# Codex Art Review

## Verdict

- Overall: keep Claude's implementation direction, with art-direction guardrails.
- Claude appears to have improved the technical foundation without flattening the concept.
- The effects layer is acceptable if it stays slow, subtle, and secondary to the contact path.
- Final approval still needs visual inspection of screenshots or the live page because this review is based on `handoff/FROM_CLAUDE.md`, not a rendered capture.

## Decision 1: Wood Grain Wordmark

- Verdict: adapt, do not fully lock it in as-is.
- The idea is brand-relevant because it ties the name to wood/flooring and makes the hero feel custom.
- Risk: if the hero image changes, the wordmark may become brittle or visually muddy.
- Direction: keep it as a homepage-only premium flourish, but add a static gold/bronze fallback treatment.
- Requirement: the wordmark must remain legible, quiet, and premium. If the grain competes with the headline or CTA, use the static gold treatment instead.

## Decision 2: Inner Page Copy

- Verdict: provisional placeholder only.
- Claude's Services/About copy can stay for development and layout testing.
- Do not treat it as final client copy yet.
- Direction: rewrite later into shorter, sharper, contact-forward copy once service details and business claims are confirmed.
- Brand rule: avoid mission fluff, long paragraphs, and vague premium claims.

## Decision 3: Gallery Images

- Verdict: keep the real client photos for now.
- Real flooring work is more trustworthy than AI lifestyle renders for a service business.
- The warm-tone overlay is acceptable as a unifying treatment if it does not make the photos look fake, muddy, or over-filtered.
- Do not replace the gallery with GPT-generated lifestyle renders for client-ready proof.
- Direction: use generated lifestyle renders only as supplemental concept/hero/atmosphere assets, not as proof of work.

## Adopt

- `wp_body_open` injection for decorative/fixed elements to avoid the FSE block-gap trap.
- Mobile fixes around hero heading scale, header spacing, button width, wordmark fit, and stacked feature columns.
- Gallery curation using Codex's selected image order.
- Slow 6-8s animation timing for gold/premium effects.
- Shared CTA band pattern across pages.
- `@supports` guards for scroll-driven and advanced CSS effects.
- Warm gallery overlay if visual inspection confirms it stays natural.

## Reject

- Any effect that becomes the first thing the user notices before the headline, proof, or `CONTACT US`.
- Any wordmark treatment that becomes illegible or dependent on a single exact hero crop.
- Any generated lifestyle image presented as real project proof.
- Any inner-page copy that sounds like generic contractor filler or corporate mission text.

## Modify

- Wood grain wordmark: add/keep a static gold fallback and tune opacity/contrast for legibility.
- Button shine: keep subtle and slow; reduce if it feels like ecommerce or game UI.
- Film grain: keep only if it is nearly invisible and adds warmth, not dirt.
- Inner page hero bands: approve the dark premium direction, but confirm height by viewport. They should feel confident, not heavy.
- Services/About copy: keep short, specific, and conversion-oriented. Rewrite before client handoff.

## Implementation Notes For Claude

- Preserve the core homepage rhythm: light architectural hero, 3-value trust strip, dark proof/gallery section, light/contact close.
- Keep `CONTACT US` visually dominant and always easy to reach.
- Advanced CSS is welcome, but unsupported browsers must receive a calm static premium layout with no missing content.
- If Site Editor preview suffers because of raw HTML blocks, document that tradeoff clearly.
- Avoid making the Codex concept feel like a demo of effects. The effects should feel discovered, not advertised.

## Next Visual QA Needed

- Desktop front page first viewport.
- Mobile 390x844 front page.
- Gallery section with warm overlay.
- Services page hero and service cards.
- About page hero and copy block.
- Hover/focus states for CTA buttons.
- Unsupported-browser fallback if practical.
