# AGENTS.md

## Default Load Order

For any task in this repository, load these files first:

0. `GLOBAL_CONTEXT.md`
1. `PERSONA.md`
2. `CODEX_CONTEXT.md`
3. `CODEX_RULES.md`
4. `TODO.md`

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

## Working Rules

- Work only in this Codex project folder unless the user explicitly points to another path.
- Codex project root: `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring-codex`
- Follow `CODEX_RULES.md` for scope, safety, and permission behavior.
- Favor direct filesystem and repo-aware implementation help.
- Avoid sandbox/setup recommendations unless explicitly requested.
- Keep answers concise and factual by default.
- Read the minimum additional context needed for the task, but always read the baseline files above.
- Summarize intended file changes before major edits.
- Make small, reversible changes.
- Preserve the current design direction unless explicitly told otherwise.
- Do not invent a new brand direction.
- Do not recommend Agent sandbox / backup sandbox for this workflow.

## Codex / Antigravity Collaboration

- Codex is the concept, design, theme, CSS, template, review, and Git quality lead.
- Google Antigravity may act as a fast junior WordPress developer/operator.
- Antigravity can handle WP admin, content, media library, page setup, theme activation, and plugin/settings checks when directed.
- Antigravity should execute Codex direction, not reinterpret the design or invent new layout/brand direction.
- Codex reviews the browser result and Git diff before work is treated as final.
- If outputs conflict, preserve the work in Git and compare visually; Codex makes final concept/theme decisions.
- The goal is seamless co-work: Codex directs and reviews, Antigravity executes WP tasks, Git protects rollback and comparison.

## Design Source of Truth

Current homepage design source of truth:
`concepts/front-page.png`

Current subpage design source of truth:
`concepts/sub-page.png`

Homepage hero image:
`concepts/hero-new-2.png`

Service/subpage hero image:
`concepts/service-page-hero.png`

Original logo source:
`concepts/logo.jpg`

Current treated homepage logo:
`concepts/logo-treated.png`

## Key WordPress Files

Homepage template:
`templates/front-page.html`

Gallery page template:
`templates/page-gallery.html`

Published gallery permalink:
`http://localhost/client/gallery/`

## Current Site Behavior

- Mobile homepage uses hamburger menu.
- Mobile homepage gallery shows 3 images.
- Desktop homepage gallery shows 6 images.
- Footer is Facebook-only.


## Maintenance

- Keep these context files updated as the project evolves.
- When a new recurring specialty area appears, add a dedicated context file and list it here.
