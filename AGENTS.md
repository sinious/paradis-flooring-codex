# AGENTS.md

## Default Load Order

For any task in this repository, load these files first:

1. `PERSONA.md`
2. `CODEX_CONTEXT.md`
3. `CODEX_RULES.md`

These files are the baseline context for all work in this project.

## Specialized Context Files

Load additional context files when the task calls for them:

- `CSS_CONTEXT.md` for CSS, styling, layout, spacing, responsiveness, animation, or front-end presentation work
- `BRAND_GUIDE.md` for concept generation, visual design, brand direction, typography, palette, or art direction work
- `TEMPLATE_CONTEXT.md` for FSE template structure, section mapping, asset usage, and implementation planning
- `WORDPRESS_FSE.md` for WordPress block theme, FSE, `theme.json`, template hierarchy, template part, and Site Editor behavior
- `IMPLEMENTATION_NOTES.md` when resuming implementation, reviewing prior build decisions, or recording technical decisions
- `CODEX_RULES.md` for safe operating boundaries and permission warm-up commands
- `GIT_CONTEXT.md` for GitHub remote, SSH behavior, commits, pushes, and repo safety
- `DIRECTOR_BRIEF.md` for multi-tool creative direction, agent roles, competitor-aware site briefs, and "have fun but serve the goal" guidance
- `CLAUDE_BRIDGE.md` for Claude/Codex handoff instructions, artifact contracts, and collaboration protocol
- `handoff/` for active Claude/Codex handoff artifacts, screenshots, diffs, and reviews

## Working Rules

- Work only in the real local project folder.
- Follow `CODEX_RULES.md` for scope, safety, and permission behavior.
- Favor direct filesystem and repo-aware implementation help.
- Avoid sandbox/setup recommendations unless explicitly requested.
- Keep answers concise and factual by default.
- Read the minimum additional context needed for the task, but always read the baseline files above.
- Do not recommend Agent sandbox / backup sandbox for this workflow.

## Maintenance

- Keep these context files updated as the project evolves.
- When a new recurring specialty area appears, add a dedicated context file and list it here.
