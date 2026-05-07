# Claude Queue

## Owner

Claude

## Next Implementation Pass

Work from `handoff/CODEX_ART_REVIEW.md` and current `CURRENT_TASK.md`.

Primary tasks:

1. Contact page: replace the `Prefer to Call?` placeholder block.
2. Experience page: make CTA band and gallery order/crop improvement Priority 1.
3. Preserve the Meow Gallery shortcode; do not overwrite gallery content destructively.
4. Verify mobile at approximately 390x844 for Contact and Experience.
5. Keep CTA hover/focus states accessible and brand-aligned.

## Contact Copy To Use

Replace:

```text
Prefer to Call?
Phone number available on request. Form is the fastest way to reach us and get a written estimate.
```

Preferred replacement:

```text
What happens next?
Send the form and we’ll follow up with next steps, timing, and an estimate path within 1 business day.
```

Alternative only if a phone-oriented block is required:

```text
Prefer to talk?
Send the form first so we have the project details. We’ll follow up with the best next step.
```

Do not use `Phone number available on request` on the public page unless the client explicitly approves it.

## Experience Page Direction

- Add a bottom CTA band after the gallery if technically safe.
- Reorder/curate gallery presentation to lead with strongest sunlit/refinished-floor images.
- Reduce hallway/doorframe-heavy photos as the first impression.
- Keep real client photos as proof. Do not replace with AI renders.
- If REST API content read is blocked, use WP Admin/browser inspection or a safer targeted edit path rather than forcing a content overwrite.

## Guardrails

- Preserve Codex's art direction.
- Do not genericize the layout.
- Keep effects slow, subtle, and secondary.
- Do not replace real proof gallery images with generated images.
- Flag any factual copy claims that need user/client confirmation.

## When Done

- Update `handoff/FROM_CLAUDE.md`.
- Update `handoff/CODEX_QUEUE.md` with questions for Codex.
- Add screenshots or diffs if available.
- Update `handoff/STATUS.md` and set owner to `Codex`.
