# Handoff

## Purpose

Shared artifact folder for Codex/Claude collaboration.

Use this folder to pass instructions, results, screenshots, diffs, and assets between isolated tool workspaces without letting both tools edit the same live files at the same time.

## Files

- `TO_CLAUDE.md`: Codex/user instructions for Claude.
- `FROM_CLAUDE.md`: Claude's implementation handoff back to Codex/user.
- `CODEX_ART_REVIEW.md`: Codex art-direction review of Claude's output.
- `screenshots/`: rendered screenshots from either tool.
- `diffs/`: patch/diff files from Claude or Codex.
- `assets/`: temporary handoff assets.

## Rule

Artifacts here are coordination files. Do not treat them as production theme files.
