# Git Context

## Purpose

- Tracks Git/GitHub setup, SSH behavior, and repo-safety notes for this project.

## Repository

- Local project: `C:\Work\wamp64\www\client\wp-content\themes\paradis-flooring-codex`
- GitHub repo: `https://github.com/sinious/paradis-flooring-codex`
- Remote: `git@github.com:sinious/paradis-flooring-codex.git`
- Branch: `main`
- Repository visibility: private

## Current State

- Git has been initialized in this project.
- Initial theme/context commit was pushed to GitHub.
- `.gitignore` has been hardened for local secrets, SSH key names, cert/key formats, env files, and credential folders.
- The user passphrase was not written to project files, Git config, or commits.

## SSH Notes

- Direct SSH auth test succeeded for the user:
  - `ssh -T git@github.com`
  - Expected message: `Hi sinious! You've successfully authenticated, but GitHub does not provide shell access.`
- Initial Codex `git push` failed because Git could not unlock the passphrase-protected SSH key in a non-interactive prompt.
- Fix applied locally in this project:
  - `git config core.sshCommand "C:/Windows/System32/OpenSSH/ssh.exe"`
- After that, `git push` succeeded.

## Safe Git Workflow

- Read this file before checking, staging, committing, or pushing. Do not rely on remembered Git setup.
- Use normal Git commands inside the project folder.
- Commit context-file updates when they materially improve future handoff.
- Push after meaningful commits when the user asks to save or publish work.
- Do not run destructive Git commands such as reset/checkout/clean unless explicitly requested.
- Do not commit secrets, passphrases, private keys, local environment files, database dumps, or generated archives.

## Useful Checks

- Check state: `git status --short --branch`
- Check remote: `git remote -v`
- Check ignored SSH key filename: `git check-ignore -v id_ed25519`
- Push current branch: `git push`
