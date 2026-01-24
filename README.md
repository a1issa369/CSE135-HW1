# CSE135-HW1

## Team members:
- Rosario Ortiz
- Ahmed Issa


## GitHub Auto-Deploy Setup

This site is deployed automatically using GitHub Actions.

On every push to the Main branch:
- GitHub Actions runs a workflow
- The workflow connects to the DigitalOcean droplet using SSH
- Files are synced to `/var/www/html` using rsync

Authentication is handled using an SSH deploy key stored in GitHub Secrets.
No private keys are committed to the repository.

## Server Header Removal Summary

To prevent disclosure of the underlying web server software, the default Server response header was removed and replaced.

Apache was placed behind an Nginx reverse proxy. Apache listens on port 8080, while Nginx listens on port 80, then it forwards any incoming requests directly to Apache. Nginx was configured to remove any upstream Server headers and place our custom header


## HTTP Compression Summary

Text-based resources are compressed using gzip.

After enabling compression, DevTools shows the following changes when loading HTML pages:
- The Content-Encoding response header is set to gzip
- The size of HTML files is way smaller than the original size
- Pages render correctly in the browser

This confirms that compression is successfully applied to HTML content.

