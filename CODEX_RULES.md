# Codex Rules

## Scope

- Work only inside this project unless the user explicitly points to another path.
- Project root: `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring-codex`
- This is the only folder assigned to the current Codex project.
- Do not switch to or edit `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring` unless the user explicitly asks for that path in the current task.
- Related WordPress paths are allowed only when directly needed for this project:
  - `C:\Work\wamp64\www\client\wp-content\uploads`
  - `C:\Work\wamp64\www\client\wp-content\plugins`
  - `C:\Work\wamp64\www\client\wp-content\themes`

## Hard Rules

- Do not run destructive commands unless the user explicitly requests the exact action.
- Do not delete Windows files, user profile files, app data, system files, or unrelated project files.
- Do not install software, Linux, WSL distributions, global packages, or system tools without explicit approval.
- Do not use full-system access unless the user explicitly asks for it for a specific task.
- Do not use broad arbitrary scripting outside the project.
- Do not store, echo into files, commit, or log secrets such as passphrases, private keys, API keys, WP credentials, or tokens.
- Do not modify another theme, plugin, upload, database, or WordPress setting unless it is required for this project and the user has approved the direction.
- Do not change credentials, users, roles, security settings, SMTP settings, or production-like data unless explicitly requested.

## Allowed Default Work

- Read files inside the project.
- Edit files inside the project.
- Inspect the local WordPress site at `http://localhost/client/`.
- Inspect local WordPress admin when the user has logged Codex in for this session.
- Read uploads/plugin/theme files when directly relevant to the active WordPress theme build.
- Validate project files such as JSON, CSS, PHP, and block template markup.
- Use browser inspection to verify rendering.
- Use Git inside this project for commits and pushes when requested or when saving completed project context updates.

## Permission Warm-Up Commands

These are safe commands Codex may run to establish session approvals for normal project work:

- List project files:
  - `Get-ChildItem -Force`
  - `Get-ChildItem -Recurse -File`
- Search project files:
  - `Get-ChildItem -Recurse -File | Select-String -Pattern "<term>"`
- Read project files:
  - `Get-Content -Path "<project-file>"`
  - `Get-Content -Raw -Path "<project-file>"`
- Validate JSON:
  - `Get-Content -Raw -Path "<json-file>" | ConvertFrom-Json | Out-Null`
- Inspect project metadata:
  - `Get-ChildItem -Path "<project-folder>" -File | Select-Object Name,Length`
- Inspect WordPress uploads for this project:
  - `Get-ChildItem -Path "C:\Work\wamp64\www\client\wp-content\uploads" -Recurse -File`
- Browser checks:
  - Open or reload `http://localhost/client/`
  - Open or inspect `http://localhost/client/wp-admin/` after user login

## Commands That Require Fresh User Approval

- Any delete, move, or overwrite outside the project.
- Any package install or system install.
- Any network download not clearly tied to project docs or local verification.
- Any command touching Windows system folders.
- Any command touching unrelated repositories.
- Any database write or WordPress admin setting change.
- Any operation involving credentials, users, roles, email, SMTP, or security settings.
- Any request to place secrets in commands, files, docs, commits, screenshots, or issue text.

## Behavior

- Keep working automatically inside the allowed scope.
- Stop only for real blockers, destructive actions, broad access, credentials, or unclear high-risk changes.
- Prefer direct, factual status updates.
- Record durable project decisions in the appropriate context file.
- If Git/SSH fails because a passphrase prompt cannot be shown inside Codex, use the Windows OpenSSH project config documented in `GIT_CONTEXT.md`.
