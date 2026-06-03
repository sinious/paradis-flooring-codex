# Codex Context

## Project

- Project root: `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring-codex`
- Theme base: custom block theme derived from an earlier Twenty Twenty-Five copy
- Workspace intent: use this exact folder as the Codex project/workspace
- This folder is reserved for Codex work and is the only folder assigned to this Codex project
- Reusable Codex context has been copied to global path: `C:\Work\Codex\contexts\paradis-flooring`
- Start future context loading from `C:\Work\Codex\contexts\paradis-flooring\README.md`
- Other theme folders, including `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring`, are reference/handoff folders only unless the user explicitly asks Codex to work there

## Goal

1. Create a website concept image
2. Turn that into a WordPress FSE theme/template implementation
3. Produce a branding guide
4. Exercise browser-connected workflow and related tooling

## Workflow Preferences

- Work in the assigned Codex project folder only unless explicitly redirected
- Prefer direct filesystem access and real terminal behavior
- Prefer concise answers and factual responses
- Avoid sandbox/setup guidance unless explicitly requested
- Favor explicit file paths and repo-aware implementation help
- Do not recommend or encourage Agent sandbox / backup sandbox for this workflow
- The right-side Codex panel is not a normal filesystem tree; reference files by project-relative paths such as `concepts/concept-2.png`

## Current Status

- Project is attached in Codex using the existing local folder
- Assigned Codex workspace: `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring-codex`
- This folder is now a Git repository with private GitHub remote `git@github.com:sinious/paradis-flooring-codex.git`
- Current branch: `main`
- Latest pushed commit: `b7dd75c` (`Cap site width to 1600px and fix split-hero vertical scaling using absolute image and percentage columns`)
- `PERSONA.md` exists and should be used as communication guidance
- Current source-of-truth concept image: `concepts/concept-2.png`
- Active hero image: `concepts/hero.png`
- Homepage rebuild is live locally at `http://localhost/client/`
- Gallery page has been created and published at `http://localhost/client/gallery/`
- Additional design decisions still remain for deeper inner-page systems and final non-FPO details
- `BRAND_GUIDE.md` should be treated as the canonical reusable brand/context file
- No dedicated brand guide or implementation notes existed before this setup

## Context Files

- `PERSONA.md`: communication and collaboration preferences
- `CODEX_CONTEXT.md`: project purpose, constraints, handoff summary
- `BRAND_GUIDE.md`: visual direction, palette, typography, brand decisions
- `IMPLEMENTATION_NOTES.md`: build decisions, file changes, technical notes
- `CSS_CONTEXT.md`: reusable CSS/front-end preferences, patterns, and tricks
- `TEMPLATE_CONTEXT.md`: template structure, section mapping, responsive assumptions, and asset usage for FSE implementation
- `WORDPRESS_FSE.md`: distilled WordPress block theme/FSE docs and project-specific implementation rules
- `CODEX_RULES.md`: safe operating boundaries and permission warm-up commands
- `GIT_CONTEXT.md`: GitHub remote, SSH fix, push workflow, and secret-safety notes

## Memory / Context Rule

- Do not rely on remembered project state for specialty work.
- For Git tasks, read `GIT_CONTEXT.md` before checking, staging, committing, or pushing.
- For design/CSS/template/WordPress tasks, read the relevant specialized context before acting.

## Resume Instructions

- Read `PERSONA.md` first for tone and working style
- Read `CODEX_RULES.md` for safety/scope
- Read this file next for project purpose and constraints
- Read only the specialized file needed for the current task:
  - `BRAND_GUIDE.md` for visual/design work
  - `IMPLEMENTATION_NOTES.md` for theme build state
  - `CSS_CONTEXT.md` for styling-specific work
  - `TEMPLATE_CONTEXT.md` for FSE template-building work
  - `WORDPRESS_FSE.md` for WordPress block theme/FSE mechanics
  - `GIT_CONTEXT.md` for Git commits, pushes, remotes, SSH, or repo safety
