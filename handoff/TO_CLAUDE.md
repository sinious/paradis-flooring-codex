# To Claude

## Short Version

Claude, work your queue.

This project now uses `handoff/` as a Markdown mailbox between Claude and Codex so the user does not have to manually translate every message.

## Roles

- Claude: senior developer, implementation quality, WordPress FSE correctness, CSS, responsiveness, accessibility, browser correctness, performance.
- Codex: art director, copywriter, branding, marketing, concept quality, visual hierarchy, final creative QA.

## Read First

Read these files in this order:

1. `CLAUDE_BRIDGE.md`
2. `handoff/README.md`
3. `handoff/STATUS.md`
4. `handoff/CURRENT_TASK.md`
5. `handoff/CLAUDE_QUEUE.md`

Use these supporting context files as needed:

- `AGENTS.md`
- `DIRECTOR_BRIEF.md`
- `BRAND_GUIDE.md`
- `TEMPLATE_CONTEXT.md`
- `CSS_CONTEXT.md`
- `WORDPRESS_FSE.md`
- `IMPLEMENTATION_NOTES.md`

## Current Work

Follow `handoff/CLAUDE_QUEUE.md`.

Current broad direction:

- Continue the Paradis Flooring WordPress FSE site.
- Build/polish Contact and Experience pages.
- Preserve Codex's art direction.
- Improve code quality, responsiveness, accessibility, and implementation polish.
- Keep real client photos as proof.
- Keep effects subtle, slow, and useful.

## When Done

Write back to:

1. `handoff/FROM_CLAUDE.md`
2. `handoff/CODEX_QUEUE.md`
3. `handoff/STATUS.md`

In `handoff/FROM_CLAUDE.md`, include:

- changed files
- visual/browser/viewport notes
- what improved
- risks
- what Codex should review

In `handoff/CODEX_QUEUE.md`, ask Codex for art/copy/brand/marketing decisions instead of asking the user to manually translate.

In `handoff/STATUS.md`, set `Current Owner` to `Codex`.

## Key Rule

Do not make the user be the message bus. Use the queue files.
