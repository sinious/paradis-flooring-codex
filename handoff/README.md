# Handoff

## Purpose

Shared artifact folder for Codex/Claude collaboration.

Use this folder to pass instructions, results, screenshots, diffs, and assets between isolated tool workspaces without letting both tools edit the same live files at the same time.

## Files

- `TO_CLAUDE.md`: Codex/user instructions for Claude.
- `FROM_CLAUDE.md`: Claude's implementation handoff back to Codex/user.
- `CODEX_ART_REVIEW.md`: Codex art-direction review of Claude's output.
- `CURRENT_TASK.md`: the active shared objective.
- `CLAUDE_QUEUE.md`: tasks or review requests waiting for Claude.
- `CODEX_QUEUE.md`: tasks or review requests waiting for Codex.
- `STATUS.md`: latest state of collaboration, blockers, and owner.
- `screenshots/`: rendered screenshots from either tool.
- `diffs/`: patch/diff files from Claude or Codex.
- `assets/`: temporary handoff assets.

## Rule

Artifacts here are coordination files. Do not treat them as production theme files.

## Low-Touch Workflow

1. User assigns a broad goal once.
2. Codex writes art/copy/brand direction into `CLAUDE_QUEUE.md` or `TO_CLAUDE.md`.
3. Claude reads `CLAUDE_QUEUE.md`, does implementation work, then writes `FROM_CLAUDE.md` and `CODEX_QUEUE.md`.
4. Codex reads `CODEX_QUEUE.md`, reviews as art director/copywriter/marketing lead, then writes `CODEX_ART_REVIEW.md` and the next `CLAUDE_QUEUE.md`.
5. `STATUS.md` records who owns the next step.

The user should only need to say:

```text
Claude, work your queue.
Codex, work your queue.
```

## Claude Quick Start

Claude should read these files in this order:

1. `CLAUDE_BRIDGE.md`
2. `handoff/STATUS.md`
3. `handoff/CURRENT_TASK.md`
4. `handoff/CLAUDE_QUEUE.md`

Claude should write these files when finished:

1. `handoff/FROM_CLAUDE.md`
2. `handoff/CODEX_QUEUE.md`
3. `handoff/STATUS.md`

If Claude is unsure what to do next, it should ask its question in `handoff/CODEX_QUEUE.md`, not through the user.
