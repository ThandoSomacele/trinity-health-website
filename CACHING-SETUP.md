# Trinity Health - Caching Setup

## WP Fastest Cache Configuration

WP Fastest Cache has been installed to improve site performance on staging and production environments.

### Features Enabled

✅ **Page Caching** - Caches full HTML pages for faster loading
✅ **Browser Caching** - Instructs browsers to cache static assets
✅ **HTML Minification** - Removes unnecessary whitespace from HTML
✅ **CSS Minification** - Compresses CSS files
✅ **CSS Combination** - Combines multiple CSS files into one
✅ **GZIP Compression** - Compresses files before sending to browser
✅ **Mobile Caching** - Separate cache for mobile devices
✅ **Disable Emojis** - Removes unnecessary emoji scripts

### Admin Panel Access

1. Log into WordPress admin
2. Navigate to **WP Fastest Cache** in the left sidebar
3. Configure settings as needed

### Recommended Settings for Staging

- ✅ Enable Cache System
- ✅ Preload (creates cache automatically)
- ✅ New Post (clear cache when new post published)
- ✅ Update Post (clear cache when post updated)
- ✅ Minify HTML
- ✅ Minify CSS
- ✅ Combine CSS
- ✅ GZIP
- ✅ Browser Caching
- ✅ Disable Emojis

### Cache Management

**Clear Cache Manually:**
```bash
# Via WP-CLI
ddev exec wp cache flush

# Or from admin panel
# Admin > WP Fastest Cache > Delete Cache
```

**Clear Cache Automatically:**
- Cache clears automatically when content is updated
- Cache clears when theme is updated
- Cache clears when plugins are updated

### Exclude Pages from Cache

If certain pages shouldn't be cached (like checkout, cart, account pages):

1. Go to WP Fastest Cache settings
2. Click "Exclude" tab
3. Add page URLs to exclude

Common exclusions:
- `/cart/`
- `/checkout/`
- `/my-account/`
- `/wp-admin/`

### Troubleshooting

**Site showing old content:**
- Clear the cache from admin panel
- Clear browser cache (Ctrl+Shift+R or Cmd+Shift+R)

**Changes not appearing:**
- Ensure you're logged out (cache doesn't work for logged-in users)
- Clear both plugin cache and browser cache

**Performance not improved:**
- Check if cache files are being created in `/wp-content/cache/`
- Verify .htaccess has caching rules
- Check server supports GZIP compression

### Alternative Free Caching Plugins

If WP Fastest Cache doesn't meet your needs, consider these alternatives:

1. **WP Super Cache** (by Automattic)
   - Very reliable, simple to configure
   - Good for shared hosting

2. **LiteSpeed Cache**
   - Excellent if your server runs LiteSpeed
   - Advanced optimization features

3. **W3 Total Cache**
   - Most comprehensive but complex
   - Good for advanced users

4. **Breeze** (by Cloudways)
   - Simple and lightweight
   - Good for beginners

### Deployment Notes

When deploying to staging/production:
1. Cache will be automatically cleared on plugin activation
2. Verify caching is working by checking page source for cache comments
3. Monitor site performance improvements
4. Adjust settings based on server capabilities

### Performance Tips

1. **Use a CDN** - Consider free Cloudflare CDN for static assets
2. **Optimize Images** - We already have WebP converter installed
3. **Lazy Load** - Enable lazy loading for images below the fold
4. **Database Optimization** - Regular cleanup with WP-Optimize plugin
5. **Limit Plugins** - Only use essential plugins

### Monitoring Performance

Test site speed with:
- Google PageSpeed Insights
- GTmetrix
- Pingdom Tools
- WebPageTest

Target metrics:
- Page load time: < 3 seconds
- Time to First Byte (TTFB): < 600ms
- First Contentful Paint (FCP): < 1.8s
- Largest Contentful Paint (LCP): < 2.5s