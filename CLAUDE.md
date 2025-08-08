# Trinity Health Website - CLAUDE.md

## Trinity Health Zambia Web Application Development Guide

You are an experienced software engineer helping build Trinity Health - a comprehensive healthcare website for Dr. Mwamba's medical practice in Zambia, specialising in both general health services and audiology care. This project uses a modern traditional WordPress approach with contemporary development tools and workflows.

**Official Site Tagline:** "Expert Care For Your Health Needs"

Check our tracker in docs folder when we continue with our development.

**Technical Stack & Standards:**
- WordPress Core (latest stable version)
- Custom WordPress theme with modern development practices
- wp-scripts for build system and asset compilation
- Tailwind CSS for utility-first styling
- SCSS for custom components and complex styling
- Modern Block Editor (Gutenberg) integration with theme.json
- Trinity Health brand colors: Primary #880005 (maroon), with professional healthcare palette
- Light/dark theme support via Tailwind
- Fully responsive components with mobile-first approach
- WCAG accessibility compliance
- Zambian Kwacha (ZMK) currency and local context

**Development Approach:**
- **WordPress Core Focus**: Leverage WordPress APIs, hooks, filters, and best practices
- **Incremental Development**: One step per response - implement, test, then move to next feature
- **No Duplication**: Always check existing functionality before creating new files/components
- **Clear Documentation**: Comments explaining WordPress patterns and integrations
- **Shell Commands**: Provide copy-paste DDEV/terminal commands for file operations
- **Block Editor Integration**: Modern content creation with custom blocks and patterns

**Application Architecture:**
- DDEV local development environment
- Traditional WordPress file structure with wp-content/themes/trinity-health
- wp-scripts build system with Webpack configuration
- Advanced Custom Fields (ACF) for structured content (services, team, locations)
- Custom Post Types for health services and audiology services
- Contact forms with separate routing for health vs audiology inquiries
- Optimised for Zambian internet infrastructure
- Role-based content display (Phase 2: different products for healthcare professionals vs consumers)

**Build System & Assets:**
- **wp-scripts**: WordPress's official build tool handling Webpack, Babel, and ESLint
- **Tailwind CSS**: Utility-first CSS framework for rapid development
- **SCSS**: For custom components that need complex styling beyond utilities
- **JavaScript**: Modern ES6+ with WordPress block editor integration
- **theme.json**: Global styles and settings for block editor consistency

**Development Context:**
- **Phase 1**: Marketing website with service showcase and contact functionality
- **Phase 2**: E-commerce integration with pro forma invoicing (WooCommerce-based)
- **Local Development**: DDEV + WordPress + custom theme
- **Production**: Optimised build process for shared hosting deployment

Always use British English in your copy content.

## Project Overview
Modern healthcare website for Trinity Health Zambia built with traditional WordPress using contemporary development tools, featuring general health services and audiology specialization.

## Development Memories
- Remember we are using DDEV to run the site so we can use `ddev exec wp` for WP-CLI commands in the container
- Use `ddev npm` for Node.js/npm commands in the development environment
- Theme located at `wp-content/themes/trinity-health`
- Remember whatever design you are provided with for this project keep to our matching or corresponding brand colors do not use the design colors.

## Technology Stack
- **CMS**: WordPress Core (latest stable)
- **Theme**: Custom WordPress theme with modern development practices
- **Build System**: @wordpress/scripts (Webpack-based)
- **Styling**: Tailwind CSS + SCSS for custom components
- **JavaScript**: Modern ES6+ with WordPress block editor APIs
- **PHP**: 8.1+ (WordPress requirements)
- **Node.js**: 18+ (for build tools)
- **Development**: DDEV containerization

## File Structure
```
wp-content/themes/trinity-health/
├── assets/
│   ├── css/
│   │   ├── src/
│   │   │   ├── main.scss
│   │   │   └── components/
│   │   └── dist/ (generated)
│   ├── js/
│   │   ├── src/
│   │   │   ├── main.js
│   │   │   └── blocks/
│   │   └── dist/ (generated)
│   └── images/
├── inc/
│   ├── setup.php
│   ├── custom-post-types.php
│   ├── acf-fields.php
│   └── enqueue.php
├── template-parts/
├── templates/
├── woocommerce/ (for e-commerce templates)
├── functions.php
├── style.css
├── theme.json
├── package.json
├── webpack.config.js
└── tailwind.config.js
```

## Development Commands
- `ddev start` - Start development environment
- `ddev npm install` - Install Node.js dependencies
- `ddev npm run build` - Build production assets
- `ddev npm run start` - Start development build with watch
- `ddev exec wp plugin list` - List WordPress plugins
- `ddev exec wp theme activate trinity-health` - Activate our theme

## Content Structure
- **Custom Post Types**: Health Services, Audiology Services, Team Members
- **ACF Field Groups**: Service details, team profiles, contact information
- **Page Templates**: Service pages, team directory, contact forms
- **Block Patterns**: Call-to-action sections, service showcases, team grids

## Styling Approach
- **Tailwind CSS**: Primary styling system for rapid development
- **SCSS**: Custom components, complex layouts, WordPress-specific styling
- **theme.json**: Block editor global styles and settings
- **CSS Custom Properties**: Trinity Health brand colors and spacing

## WordPress Integration
- **Custom Post Types**: Registered via functions.php
- **ACF Integration**: Custom fields for structured content
- **Block Editor**: Custom blocks and patterns for content creation
- **Template Hierarchy**: WordPress template system with modern PHP
- **Hooks & Filters**: WordPress APIs for customization
- **Enqueue System**: Proper asset loading with wp_enqueue_scripts

## Icon Library Usage

**Recommended Approach**: Use an icon library instead of creating custom SVGs for consistency and maintainability.

**Suggested Icon Libraries:**
- **Heroicons** (preferred): https://heroicons.com/ - Clean, modern icons from Tailwind CSS creators
- **Lucide**: https://lucide.dev/ - Open-source Feather icons successor
- **Phosphor Icons**: https://phosphoricons.com/ - Flexible icon family

**Hero Button Icons Used:**
- Read More button: Arrow right icon (→)
- Watch Video button: Play circle icon (▶)

**Implementation:**
- Install via CDN or npm package
- Use consistent icon sizing (w-5 h-5 for buttons, w-6 h-6 for larger elements)
- Maintain brand color consistency (Trinity maroon/gold theme)

## important-instruction-reminders
Do what has been asked; nothing more, nothing less.
NEVER create files unless they're absolutely necessary for achieving your goal.
ALWAYS prefer editing an existing file to creating a new one.
NEVER proactively create documentation files (*.md) or README files. Only create documentation files if explicitly requested by the User.