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

## Setting Custom Server Header
I was able to accomplish this in Apache by adding the following lines to /etc/apache2/sites-enabled/default-ssl.conf under the virtual host on port 80 and etc/apache2/sites-enabled/000-default.conf on port 8080
```
Header unset Server
Header always set Server "CSE 135 Server"
```

You can see proof of the header update in header-verify.jpg

