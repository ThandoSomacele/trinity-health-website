# Trinity Health - Development Guide

Guide for local development setup, coding standards, and theme development.

## Local Development Setup

### Prerequisites
- **Docker Desktop** - For running DDEV
- **DDEV** - Local development environment
- **Node.js 18+** - For build tools
- **PHP 8.1+** - WordPress requirement
- **Composer** - PHP dependency management

### Initial Setup

#### 1. Clone Repository
```bash
git clone [repository-url]
cd trinity-health-website
```

#### 2. Start DDEV
```bash
# Start containers
ddev start

# Import database (if you have a backup)
ddev import-db --file=backups/database/[latest-backup].sql.gz
```

#### 3. Install Dependencies
```bash
# Install Node packages
ddev npm install

# Build assets
ddev npm run build
```

#### 4. Access Site
- **Local URL**: https://trinity-health-website.ddev.site
- **Admin**: https://trinity-health-website.ddev.site/wp-admin/
- **Default Admin**: admin / admin (change in production)

## Theme Development

### File Structure
```
wp-content/themes/trinity-health-theme/
├── assets/              # Compiled assets (don't edit)
│   ├── css/            
│   ├── js/             
│   └── images/         
├── src/                 # Source files (edit these)
│   ├── index.js        # Main JavaScript entry
│   └── index.scss      # Main SCSS entry
├── inc/                 # PHP includes
│   ├── setup.php       # Theme setup
│   ├── enqueue.php     # Asset enqueuing
│   ├── custom-post-types.php
│   └── acf-fields.php  
├── template-parts/      # Reusable template parts
├── build/              # Webpack output
└── functions.php       # Theme functions
```

### Development Workflow

#### Watch Mode
```bash
# Start development server with hot reload
ddev npm run start
```

#### Build for Production
```bash
# Minified production build
ddev npm run build
```

## Coding Standards

### PHP Standards
- **WordPress Coding Standards** - Follow WP conventions
- **PHP 8.1+** compatibility
- **Namespace** - Use for custom classes
- **Hooks** - Proper action/filter usage

#### Example PHP Template
```php
<?php
/**
 * Template Name: Service Page
 * 
 * @package TrinityHealth
 */

get_header();

// Main content
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold mb-8">
                <?php the_title(); ?>
            </h1>
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;
endif;

get_footer();
```

### JavaScript Standards
- **ES6+** - Modern JavaScript syntax
- **WordPress APIs** - Use wp global objects
- **Modules** - Import/export for organization

#### Example JavaScript
```javascript
// src/modules/navigation.js
export class Navigation {
    constructor() {
        this.mobileMenu = document.querySelector('.mobile-menu');
        this.hamburger = document.querySelector('.hamburger');
        this.init();
    }

    init() {
        if (this.hamburger) {
            this.hamburger.addEventListener('click', () => this.toggle());
        }
    }

    toggle() {
        this.mobileMenu.classList.toggle('active');
        this.hamburger.classList.toggle('is-active');
    }
}

// src/index.js
import { Navigation } from './modules/navigation';

document.addEventListener('DOMContentLoaded', () => {
    new Navigation();
});
```

### CSS/SCSS Standards
- **Tailwind First** - Use utility classes
- **SCSS** - For complex components only
- **BEM Naming** - For custom classes
- **Mobile First** - Responsive design
- **Brand Colors** - Trinity Health palette:
  - Primary: `#A31D1D` (modern flat maroon)
  - Light: `#E5D0AC` (warm accent)
  - Dark: `#6D2323` (deep maroon)
  - Background: `#FEF9E1` (warm cream)
  - Original brand: `#880005` (preserved in CSS variable)

#### Example SCSS
```scss
// assets/css/src/components/_card.scss
.service-card {
    @apply bg-white rounded-lg shadow-md p-6 transition-transform;
    
    &:hover {
        @apply transform -translate-y-1 shadow-lg;
    }
    
    &__title {
        @apply text-2xl font-bold text-primary mb-4;
    }
    
    &__content {
        @apply text-gray-600 leading-relaxed;
    }
}
```

## WordPress Integration

### Custom Post Types
Located in `inc/custom-post-types.php`:
- Services
- Team Members
- Testimonials

### Advanced Custom Fields (ACF)
Field groups in `inc/acf-fields.php`:
- Service Details
- Team Member Profiles
- Contact Information

### Hooks & Filters

#### Common Hooks
```php
// Theme setup
add_action('after_setup_theme', 'trinity_theme_setup');

// Enqueue scripts
add_action('wp_enqueue_scripts', 'trinity_enqueue_assets');

// Custom post types
add_action('init', 'trinity_register_post_types');
```

## Build System

### Webpack Configuration
Using `@wordpress/scripts` with custom config:

```javascript
// webpack.config.js
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    entry: {
        index: './src/index.js',
    },
    // Custom modifications
};
```

### Asset Management
- **Source**: `src/` directory
- **Output**: `build/` directory
- **Styles**: SCSS compiled to CSS
- **Scripts**: ES6+ transpiled
- **Images**: Optimized and copied

## Component Development

### Creating New Components

#### 1. Template Part
```php
// template-parts/components/testimonial-card.php
<div class="testimonial-card">
    <blockquote class="text-lg italic">
        "<?php echo esc_html($testimonial_text); ?>"
    </blockquote>
    <cite class="block mt-4 text-sm">
        - <?php echo esc_html($author_name); ?>
    </cite>
</div>
```

#### 2. Include in Template
```php
// In your page template
get_template_part('template-parts/components/testimonial', 'card', [
    'testimonial_text' => get_field('testimonial'),
    'author_name' => get_field('author')
]);
```

## Testing

### Local Testing
```bash
# Check PHP errors
ddev logs -f

# Test build process
ddev npm run build

# Validate WordPress
ddev exec wp core verify-checksums

# Run diagnostics
php scripts/wp-diagnostics.php
```

### Browser Testing
- Chrome DevTools for debugging
- Mobile responsive testing
- Cross-browser compatibility
- Performance profiling

## Version Control

### Git Workflow
```bash
# Feature branch
git checkout -b feature/new-feature

# Make changes and commit
git add .
git commit -m "Add new feature"

# Push to remote
git push origin feature/new-feature
```

### Commit Standards
- Use clear, descriptive messages
- Reference issue numbers
- Keep commits focused

## Debugging

### Enable Debug Mode
In `wp-config.php`:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

### Debug Locations
- **PHP Errors**: `/web/wp-content/debug.log`
- **DDEV Logs**: `ddev logs`
- **Browser Console**: JavaScript errors
- **Network Tab**: Asset loading issues

## Performance Optimization

### Asset Optimization
- Minify CSS/JS in production
- Lazy load images
- Use WebP format
- Enable browser caching

### Database Optimization
```bash
# Optimize tables
ddev exec wp db optimize

# Clean revisions
ddev exec wp post delete $(wp post list --post_type='revision' --format=ids)
```

## Security Best Practices

### Development Security
- Never commit `.env` files
- Use strong passwords
- Keep WordPress updated
- Sanitize all inputs
- Escape all outputs

### Code Security
```php
// Sanitize input
$input = sanitize_text_field($_POST['input']);

// Escape output
echo esc_html($variable);
echo esc_url($url);
echo esc_attr($attribute);
```

## Resources

### Documentation
- [WordPress Codex](https://codex.wordpress.org/)
- [WordPress Developer](https://developer.wordpress.org/)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [DDEV Documentation](https://ddev.readthedocs.io/)

### Tools
- [Query Monitor Plugin](https://wordpress.org/plugins/query-monitor/) - Debugging
- [WP CLI](https://wp-cli.org/) - Command line interface
- [ACF Documentation](https://www.advancedcustomfields.com/resources/)

## Support

For development issues:
1. Check error logs
2. Run diagnostics script
3. Clear caches
4. Check documentation