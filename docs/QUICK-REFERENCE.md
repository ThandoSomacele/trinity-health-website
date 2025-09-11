# Trinity Health - Quick Reference

## 🎨 Brand Colors
```css
/* Primary Palette */
#A31D1D  /* Modern Maroon (Primary) */
#880005  /* Original Maroon (Legacy) */
#E5D0AC  /* Warm Accent (Light) */
#6D2323  /* Deep Maroon (Dark) */
#FEF9E1  /* Cream Background */
```

## 🚀 Quick Commands

### Development
```bash
ddev start                    # Start environment
ddev npm run build           # Build assets
ddev npm run start           # Watch mode
ddev export-db               # Backup database
```

### Deployment
```bash
./scripts/database-deploy.sh export-staging    # Export for staging
./scripts/deploy-staging.sh                    # Deploy files
php scripts/wp-diagnostics.php                 # Run diagnostics
```

### WordPress CLI
```bash
ddev exec wp cache flush            # Clear cache
ddev exec wp plugin list            # List plugins
ddev exec wp theme activate         # Activate theme
ddev exec wp db optimize            # Optimize database
```

## 📁 Key Directories
```
/web/wp-content/themes/trinity-health-theme/
├── src/          # Source files (edit these)
├── build/        # Compiled assets (don't edit)
├── inc/          # PHP includes
└── template-parts/  # Reusable templates
```

## 🔗 URLs
- **Local**: https://trinity-health-website.ddev.site
- **Staging**: https://staging.object91.co.za
- **Production**: https://trinityhealth.co.zm

## 🏷️ Tailwind Classes

### Brand Colors
```html
<!-- Text Colors -->
<p class="text-trinity-primary">Maroon text</p>
<p class="text-trinity-primary-light">Light accent</p>
<p class="text-trinity-primary-dark">Dark maroon</p>

<!-- Background Colors -->
<div class="bg-trinity-background">Cream background</div>
<div class="bg-trinity-primary">Maroon background</div>

<!-- Hover States -->
<button class="bg-trinity-primary hover:bg-trinity-primary-dark">
  Button
</button>
```

### Common Patterns
```html
<!-- Primary Button -->
<button class="bg-trinity-primary text-white px-6 py-3 rounded-lg hover:bg-trinity-primary-dark transition-colors">
  Book Appointment
</button>

<!-- Secondary Button -->
<button class="border-2 border-trinity-primary text-trinity-primary px-6 py-3 rounded-lg hover:bg-trinity-primary hover:text-white transition-colors">
  Learn More
</button>

<!-- Card -->
<div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
  <h3 class="text-2xl font-bold text-trinity-primary mb-4">Title</h3>
  <p class="text-gray-600">Content</p>
</div>

<!-- Section -->
<section class="py-16 bg-trinity-background">
  <div class="container mx-auto px-4">
    <!-- Content -->
  </div>
</section>
```

## 📝 PHP Snippets

### Get ACF Field
```php
<?php 
$value = get_field('field_name');
if( $value ): ?>
    <p><?php echo esc_html($value); ?></p>
<?php endif; ?>
```

### Custom Query
```php
<?php
$args = array(
    'post_type' => 'service',
    'posts_per_page' => 6,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        // Loop content
    endwhile;
    wp_reset_postdata();
endif;
?>
```

### Template Part
```php
<?php get_template_part('template-parts/sections/testimonials'); ?>
```

## 🔧 Environment Variables
```bash
# Key variables from .env
STAGING_HOST=ftp.object91.co.za
STAGING_DB_NAME=objecxuk_wp303
LOCAL_URL=https://trinity-health-website.ddev.site
STAGING_URL=https://staging.object91.co.za
```

## 🐛 Debugging

### Enable Debug Mode
```php
// In wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

### View Logs
```bash
tail -f web/wp-content/debug.log  # WordPress debug
ddev logs -f                       # DDEV logs
```

### Common Fixes
```bash
# Clear all caches
ddev exec wp cache flush
ddev exec wp transient delete --all

# Fix permissions
find web -type f -exec chmod 644 {} \;
find web -type d -exec chmod 755 {} \;

# Rebuild assets
ddev npm run build

# Reset plugins
ddev exec wp plugin deactivate --all
ddev exec wp plugin activate --all
```

## 📞 Support Contacts
- Repository: [GitHub](https://github.com/ThandoSomacele/trinity-health-website)
- Staging: https://staging.object91.co.za
- Documentation: See `/docs` folder

---
*Quick Reference v1.0 - Trinity Health Website*