# Claude Bridge

## Purpose

This file is the Markdown handoff protocol for collaboration between Claude and Codex on the Paradis Flooring WordPress FSE theme.

The goal is to let Claude contribute senior implementation/code polish while Codex contributes stronger concept generation, art direction, visual QA, and brand coherence.

## Operating Model

- Keep Claude and Codex workspaces separate unless the user explicitly says otherwise.
- Do not require branches or a second repo.
- Do not let both tools freely edit the same live folder at the same time.
- Exchange artifacts through Markdown, screenshots, diffs, and copied files.
- The user should not need to manually explain the same context repeatedly.

## Roles

### Codex Role

- Art director
- Concept generator
- Brand and visual hierarchy reviewer
- WordPress FSE structure strategist
- Context-file maintainer
- Final creative QA

### Claude Role

- Senior developer / code perfectionist
- CSS and responsiveness repair
- Browser/rendering correctness
- Accessibility and maintainability improvements
- WordPress FSE implementation polish
- Tasteful interaction experiments when they serve the goal

## Non-Negotiables

- Preserve the strongest parts of Codex's art direction.
- Do not replace the concept with a generic layout.
- "Cool" must improve trust, clarity, premium feel, memorability, or conversion.
- Do not add effects that make the site feel gimmicky, slow, confusing, or less credible.
- Target WordPress FSE/block theme behavior.
- Prefer clean, maintainable code over clever code.

## Claude Startup Instructions

Give Claude this prompt when asking it to collaborate:

```text
Read this file: CLAUDE_BRIDGE.md.

You are the senior developer/code perfectionist. Codex is the art director/concept generator.

Read any provided context files:
- AGENTS.md
- DIRECTOR_BRIEF.md
- BRAND_GUIDE.md
- TEMPLATE_CONTEXT.md
- CSS_CONTEXT.md
- WORDPRESS_FSE.md
- IMPLEMENTATION_NOTES.md

Preserve Codex's strongest art direction. Improve implementation quality, responsiveness, accessibility, WordPress FSE correctness, CSS maintainability, and browser rendering.

Add tasteful "cool" only when it improves trust, clarity, premium feel, memorability, or conversion.

Keep your work isolated unless explicitly told otherwise. When done, write a concise handoff with changed files, screenshots/render notes, what changed, why, risks, and what Codex should art-review.
```

## Claude Output Contract

Claude should return a Markdown handoff using this structure:

```markdown
# Claude Handoff

## Summary

- Short description of what changed.

## Changed Files

- `path/to/file`
- `path/to/file`

## Visual Result

- Screenshot path or attached screenshot reference.
- Browser/viewport tested.

## What Improved

- Implementation quality improvement.
- Responsive/layout improvement.
- Visual polish improvement.
- Interaction/motion improvement, if any.

## What Codex Should Review

- Art direction concern.
- Brand fit concern.
- Hierarchy/CTA concern.
- Anything experimental.

## Risks

- Known technical risk.
- Browser risk.
- FSE/Site Editor risk.
- Performance/accessibility risk.

## Suggested Adoption

- Keep:
- Reject:
- Adapt:
```

## Codex Review Contract

When Codex receives Claude's handoff, Codex should review as art director:

- Does it preserve the approved concept direction?
- Does the added polish improve or weaken premium flooring trust?
- Is the CTA path clearer or more distracted?
- Does the page still feel custom and memorable?
- Are interactions tasteful and purposeful?
- What should be copied into the Codex theme?
- What should be rejected?
- What should be modified before adoption?

Codex should then produce:

```markdown
# Codex Art Review

## Verdict

- Keep / adapt / reject summary.

## Adopt

- Specific changes worth bringing over.

## Reject

- Specific changes that weaken the concept or goal.

## Modify

- Specific changes that are promising but need adjustment.

## Implementation Notes

- Practical notes for applying the approved ideas in the Codex theme.
```

## Preferred Artifact Folder

If using file handoff, use:

```text
handoff/
  TO_CLAUDE.md
  FROM_CLAUDE.md
  CODEX_ART_REVIEW.md
  screenshots/
  diffs/
  assets/
```

This project now includes that folder structure. Use `handoff/TO_CLAUDE.md` for outbound instructions and `handoff/FROM_CLAUDE.md` for Claude's return notes.

## Automation Goal

The long-term goal is a near one-command workflow:

```text
Make a website for <business>. Target WordPress FSE. Research competitors, make it better, and have fun.
```

Until tooling can fully automate the bridge, this Markdown protocol is the stable collaboration layer.
