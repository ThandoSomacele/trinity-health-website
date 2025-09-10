# Trinity Health Website - Deployment Best Practices Review

## Current Issues Identified

### 1. Third-Party Scripts Not Loading
- **Issue**: CDN scripts (Swiper) may be blocked or slow on staging
- **Current**: Loading from `cdn.jsdelivr.net`
- **Solution**: Bundle critical dependencies or use reliable CDN with fallback

### 2. Plugin Asset Issues
- **WP Fastest Cache**: Missing files causing 404 errors
- **WooCommerce**: Assets not found on staging
- **Solution**: Properly sync plugin files or deactivate unused plugins

### 3. Build Process Issues
- **Current Setup**: Using @wordpress/scripts (good)
- **Problems**: 
  - Navigation.js was incorrectly enqueued separately
  - Assets not consistently deployed
  - No production optimization flags

### 4. Deployment Process Issues
- **Current**: Manual FTP deployment via scripts
- **Problems**:
  - No atomic deployments
  - No rollback capability
  - Database not synced properly
  - Plugin files missing on staging

## Recommended Best Practices

### 1. Build Process Improvements

```json
// package.json improvements
{
  "scripts": {
    "build": "wp-scripts build --mode production",
    "build:dev": "wp-scripts build --mode development",
    "build:analyze": "wp-scripts build --webpack-bundle-analyzer",
    "clean": "rm -rf build/",
    "prebuild": "npm run clean"
  }
}
```

### 2. Asset Management

```php
// Better CDN handling with fallback
function trinity_health_enqueue_assets() {
    // Local fallback for Swiper
    $swiper_cdn = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
    $swiper_local = TRINITY_THEME_URL . '/assets/vendor/swiper-bundle.min.js';
    
    // Try CDN first, fallback to local
    wp_enqueue_script('swiper-js', $swiper_cdn, array(), '11.0.0', true);
    wp_add_inline_script('swiper-js', 
        'if (typeof Swiper === "undefined") {
            document.write("<script src=\"' . $swiper_local . '\"><\/script>");
        }'
    );
}
```

### 3. Deployment Strategy

#### Option A: Git-based Deployment (Recommended)
```bash
# Use git for version control and deployment
git push staging master
# Staging server pulls latest changes via webhook or CI/CD
```

#### Option B: Improved FTP Deployment
```bash
# Better rsync-based deployment
rsync -avz --delete \
  --exclude 'node_modules' \
  --exclude '.git' \
  --exclude '.env' \
  --exclude 'wp-config.php' \
  ./web/ staging-server:/path/to/site/
```

### 4. Database Sync Strategy

```bash
# Export local database
wp db export local-backup.sql

# Import to staging (after backup)
wp db import staging-backup.sql --ssh=staging

# Search-replace URLs
wp search-replace 'http://localhost' 'https://staging.object91.co.za' --ssh=staging
```

### 5. Environment Configuration

```php
// wp-config.php environment detection
if (getenv('WP_ENV') === 'staging') {
    define('WP_DEBUG', true);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);
    define('DISALLOW_FILE_MODS', false); // Allow plugin management on staging
} elseif (getenv('WP_ENV') === 'production') {
    define('WP_DEBUG', false);
    define('DISALLOW_FILE_MODS', true); // Secure production
}
```

## Immediate Actions Required

1. **Fix Third-Party Scripts**
   - Download Swiper locally as fallback
   - Bundle with webpack for better performance

2. **Clean Up Plugins**
   - Deactivate WP Fastest Cache
   - Remove unused WooCommerce if not needed yet

3. **Optimize Build**
   - Add production build flags
   - Minify and optimize assets

4. **Fix Deployment**
   - Create proper staging sync script
   - Include all necessary files
   - Add database sync capability

## Implementation Priority

1. **High Priority** (Do Now)
   - Fix third-party script loading
   - Deactivate broken plugins
   - Deploy complete theme assets

2. **Medium Priority** (This Week)
   - Implement CDN fallbacks
   - Optimize build process
   - Create staging sync script

3. **Low Priority** (Future)
   - Set up CI/CD pipeline
   - Implement automated testing
   - Add monitoring and alerts