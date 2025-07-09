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

### Design System
- **Brand Colors**: Primary Trinity maroon (#880005)
- **Typography**: Inter font with healthcare-focused hierarchy
- **Components**: Professional button system, card layouts, forms
- **Inspiration**: Mayo Clinic's clean, trustworthy aesthetic

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

## Performance Notes
- Images are optimized for web delivery
- CSS/JS minification via Vite
- Lazy loading implemented
- Professional caching strategy for production