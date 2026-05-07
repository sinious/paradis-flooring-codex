# Director Brief

## Purpose

- Capture the user's preferred high-level creative command and multi-tool collaboration model.
- Use when the task is broad, creative, competitor-aware, or involves coordinating Codex with another tool such as Claude.

## Desired One-Command Workflow

The user wants to be able to say something like:

```text
Make a website for <business>. Target WordPress FSE. Research competitors, understand what they do, make it better, and have fun.
```

Interpret that as a request to start a coordinated creative build process, not as a request for a generic one-shot page.

## Creative Build Brief Template

```text
Goal: Build a memorable, conversion-focused WordPress FSE website for <business>.
Research: Inspect relevant competitors for common patterns, weaknesses, offers, CTA strategy, trust signals, visual cliches, and missed opportunities.
Direction: Beat competitors with a stronger first impression, clearer contact path, better visual hierarchy, stronger trust cues, and more memorable interaction.
Fun: Explore tasteful creative ideas, motion, depth, 3D transforms, layout moments, and image treatments when they improve the goal.
Rule: Cool effects must serve clarity, trust, performance, and contact intent.
Output: Working FSE theme files, screenshots/browser verification, context updates, and a short decision log.
```

## Tool Roles

- Codex role: art direction, concept evaluation, brand coherence, FSE structure, strategy, context files, and final creative QA.
- Claude role: code polish, responsiveness, implementation detail, browser fixes, and complex CSS/interaction experiments.

## Collaboration Model

- Keep tool workspaces isolated when possible.
- Use `CLAUDE_BRIDGE.md` as the detailed Markdown protocol for Claude/Codex handoff.
- Exchange artifacts rather than letting tools trample the same files:
  - screenshots
  - rendered page captures
  - diffs
  - copied snippets
  - notes
  - specific changed files
- Codex should review external tool output as art director:
  - what to keep
  - what to reject
  - what to adapt
  - what weakens the brand or conversion path
- Claude or another implementation-focused tool can then apply precise code fixes in its own environment or provide changes to adapt.

## Paradis Flooring Current Split

- Codex created the stronger initial concept-to-FSE template interpretation.
- Claude may be better for detailed repair, responsiveness, and code polishing.
- The preferred combined workflow is not competition; it is Codex as art director and Claude as code perfectionist.

## Creative Standards

- Do not default to generic layouts.
- Do not let "cool" become decorative noise.
- Fun is good when it makes the site more memorable, premium, trustworthy, or easier to act on.
- For service businesses, the site must quickly answer:
  - what they do
  - why trust them
  - what makes them better
  - how to contact them

## When To Load

- Load for broad website creation requests.
- Load when the user mentions competitors, art direction, multi-agent workflow, Claude collaboration, "have fun," or one-command site generation.
