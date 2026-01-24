# CSE135-HW1


## GitHub Auto-Deploy Setup

This site is deployed automatically using GitHub Actions.

On every push to the Main branch:
- GitHub Actions runs a workflow
- The workflow connects to the DigitalOcean droplet using SSH
- Files are synced to `/var/www/html` using rsync

Authentication is handled using an SSH deploy key stored in GitHub Secrets.
No private keys are committed to the repository.

See `github-deploy.gif` for a demonstration.
