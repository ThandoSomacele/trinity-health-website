# Trinity Health Website - CLAUDE.md

## Project Overview
Modern healthcare website for Trinity Health Zambia built with WordPress Bedrock + Sage theme framework, featuring general health services and audiology specialization.

## Technology Stack
- **Framework**: WordPress Bedrock (dependency management)
- **Theme**: Sage v11 (modern WordPress theme development)
- **Build System**: Vite (asset compilation)
- **Styling**: Tailwind CSS v4 with custom Trinity Health design tokens
- **PHP**: 8.2+ (required for Sage v11)
- **Node.js**: 18+ (for Vite builds)
- **Development**: DDEV containerization

## Project Structure
```
trinity-health-website/
├── web/app/themes/trinity-health/     # Sage theme (main development)
├── web/app/plugins/                   # WordPress plugins
├── web/app/uploads/                   # Media files
├── docs/                              # Project documentation
├── dist-production/                   # Build output for deployment
├── build-production.sh                # Deployment script
└── composer.json                      # PHP dependencies
```

## Development Commands

### DDEV Environment
```bash
# Start development environment
ddev start

# Stop development environment
ddev stop

# Access WordPress admin
ddev launch /wp-admin

# WordPress CLI commands
ddev wp theme list
ddev wp plugin list
ddev wp core update

# Export database
ddev wp db export backup.sql
```

### Theme Development
```bash
# Navigate to theme directory
cd web/app/themes/trinity-health

# Install dependencies
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm install

# Development mode (with hot reloading)
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run dev

# Build for production
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run build

# Lint and typecheck
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run lint
```

### Build & Deployment
```bash
# Build for production (manual upload)
./build-production.sh

# Build and deploy via FTP (requires ftp-config.sh)
source ftp-config.sh && ./build-production.sh --deploy

# View build script help
./build-production.sh --help
```

## Key Features

### Design System (See docs/trinity-health-design-guide.md)
- **Brand Colors**: Primary Trinity maroon (#880005), Healthcare Navy (#1e3a8a), Clinical White (#f8f9fa)
- **Text Color Rule**: ALL text on Trinity brand colors MUST be white (`text-white`)
- **Icon Color Rule**: ALL service card icons MUST use Trinity brand color (`bg-[#880005]/10` + `text-[#880005]`)
- **Layout Spacing**: Equal gap spacing between columns/flex items (`gap-16` standard)
- **Typography**: Inter font with healthcare-focused hierarchy (h1: 3rem, h2: 2.25rem, body: 1rem)
- **Components**: Professional button system, card layouts, forms, mega menu navigation
- **Inspiration**: Mayo Clinic's clean, trustworthy aesthetic adapted for Zambian healthcare context
- **Layout Patterns**: Hero sections, 3-column service grids, impact statistics, content cards
- **Accessibility**: WCAG 2.1 AA compliance with healthcare-specific considerations

### Content Structure
- **Post Types**: Health Services, Audiology Services
- **Custom Fields**: Service details, pricing, team member info
- **Navigation**: Professional hospital-style menu system
- **Pages**: 22+ pages covering all Trinity Health services

### Development Features
- **Modern Build System**: Vite with hot module replacement
- **Tailwind CSS v4**: Latest version with @theme directive
- **WordPress Integration**: Seamless theme.json generation
- **Responsive Design**: Mobile-first approach
- **Accessibility**: WCAG 2.1 AA compliance focus

## Important Files

### Theme Files
- `web/app/themes/trinity-health/resources/views/front-page.blade.php` - Homepage template
- `web/app/themes/trinity-health/resources/views/partials/header.blade.php` - Header component
- `web/app/themes/trinity-health/resources/css/app.css` - Main stylesheet (1,144 lines)
- `web/app/themes/trinity-health/vite.config.js` - Build configuration
- `web/app/themes/trinity-health/tailwind.config.js` - Tailwind configuration

### Configuration Files
- `.env` - Environment variables
- `composer.json` - PHP dependencies
- `ftp-config.sh` - FTP deployment settings (create from example)

## Documentation
- `docs/QUICK-REFERENCE.md` - Deployment cheatsheet
- `docs/DEPLOYMENT-GUIDE.md` - Complete deployment guide
- `docs/trinity-health-website-Development-phases-checklists-plan.md` - Development roadmap
- `docs/trinity-health-design-guide.md` - **Design system and UI guidelines** (MUST READ for new pages/layouts)

## Testing & Quality
- Always test locally with `ddev start` before deployment
- Run `npm run build` to ensure production assets compile
- Test all menu navigation links work
- Verify responsive design on mobile/tablet
- Check form functionality and email delivery

## Security Notes
- Never commit FTP credentials to Git
- Use strong passwords for all accounts
- Keep WordPress core and plugins updated
- SSL certificates required for production
- Regular database backups recommended

## Deployment Strategy
The project supports flexible deployment:
1. **VPS Deployment**: Direct Bedrock deployment (recommended)
2. **Shared Hosting**: Build script converts to traditional WordPress

## Common Issues
- **"Theme assets not built"**: Run `npm run build` in theme directory
- **"lftp not found"**: Install with `brew install lftp`
- **"Database export failed"**: Check DDEV database with `ddev wp db check`
- **"Requirements check failed"**: Ensure `ddev start` is running

## Getting Started
1. Ensure DDEV is running: `ddev start`
2. Install theme dependencies: `cd web/app/themes/trinity-health && npm install`
3. Build assets: `npm run build`
4. Access development site: `ddev launch`

## Design Guidelines for New Content

### When Creating New Pages/Posts/Layouts:
1. **ALWAYS reference `docs/trinity-health-design-guide.md` first**
2. **Follow Mayo Clinic-inspired design patterns**:
   - Hero sections with professional overlay and CTAs
   - 3-column service grids with hover effects
   - Impact/statistics sections with large number displays
   - Card-based layouts with consistent spacing (24px padding)
   - 80px fixed height navigation with mega menu

3. **Use established component structure**:
   ```php
   @include('partials.hero', ['type' => 'service', 'background' => $featured_image])
   @include('partials.service-grid', ['columns' => 3, 'services' => $services])
   @include('partials.cta-section', ['style' => 'primary', 'background' => 'trinity'])
   ```

4. **Content hierarchy for medical pages**:
   - Patient-first language (clear, non-technical)
   - Professional credentials for trust building
   - Service benefits focused on patient outcomes
   - Transparent pricing in ZMK where appropriate
   - Emergency information always accessible

5. **Responsive breakpoints**:
   - Mobile (320px-767px): Single column, hamburger menu, 44px+ touch targets
   - Tablet (768px-1023px): 2-column grids, horizontal navigation
   - Desktop (1024px+): 3-column layouts, full mega menu, hover effects

6. **Accessibility requirements**:
   - 4.5:1 contrast ratio minimum
   - Keyboard navigation support
   - Screen reader compatibility with ARIA labels
   - Medical terminology tooltips for patient education

7. **Image Placeholder Standards** (Industry Standard UI Pattern):
   - **Solid grey background**: `bg-gray-400` for professional appearance
   - **Simple white icon**: `text-white/80` centered in the grey block
   - **Standard image icon**: Mountain/photo symbol, 64px (w-16 h-16) size
   - **No decorative elements**: Just grey block + white icon (industry standard)
   - **Container styling**: `rounded-2xl` corners matching Trinity design
   - **Proper aspect ratios**: 16:9 landscapes, 3:4 portraits, 1:1 squares

## Performance Notes
- Images optimized for web delivery (WebP with fallbacks)
- CSS/JS minification via Vite
- Lazy loading for below-fold content
- Critical CSS inlined for above-fold content
- Professional caching strategy for production