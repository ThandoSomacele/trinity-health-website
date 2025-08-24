# Hot Reload Setup - Trinity Health Theme

## Clean Hot Reload Solution

This setup uses official WordPress and DDEV tools for a clean, reliable hot reload experience.

## Usage

### Start Development Environment

1. **Start DDEV** (if not already running):
   ```bash
   ddev start
   ```

2. **Hot Reload for JS/CSS** (Terminal 1):
   ```bash
   ddev exec "cd /var/www/html/web/wp-content/themes/trinity-health-theme && npm run start:hot"
   ```

3. **BrowserSync for PHP** (Terminal 2):
   ```bash
   ddev browsersync
   ```

4. **Open Development URLs**:
   - Main site: `https://trinity-health-website.ddev.site`
   - BrowserSync: `https://trinity-health-website.ddev.site:3000`

## What Gets Hot Reloaded

- ✅ **JavaScript changes**: Instant hot module replacement
- ✅ **SCSS/CSS changes**: Instant style injection
- ✅ **Tailwind classes in PHP**: Automatic rebuild and reload
- ✅ **PHP file changes**: Browser refresh via BrowserSync

## Alternative Commands

From local machine (not in DDEV):
```bash
# Standard build
ddev npm run build

# Development watch (no hot reload)
ddev npm run start
```

## Technical Details

- **@wordpress/scripts**: Provides webpack-based hot module replacement
- **DDEV BrowserSync Add-on**: Handles PHP file watching and browser refresh
- **Webpack Dev Server**: Serves assets with hot reload on port 8887
- **BrowserSync**: Proxies main site with live reload on port 3000

## Removed Components

The following custom files were removed in favor of this clean solution:
- `bs-config.js` (custom BrowserSync config)
- `watch-and-reload.js` (custom file watcher)
- Various npm dependencies for custom hot reload

This setup is production-ready and uses officially supported tools.