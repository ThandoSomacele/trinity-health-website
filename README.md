# Trinity Health Zambia - Website Development

Modern WordPress development environment using Bedrock + Sage, with automated build and deployment tools for production hosting.

## 🏥 Project Overview

Trinity Health Zambia is a comprehensive healthcare website built with:
- **Bedrock** - WordPress boilerplate with Composer dependency management
- **Sage v11** - Modern WordPress theme framework with Laravel Blade templating
- **Vite** - Fast build tool with Hot Module Replacement (HMR)
- **Tailwind CSS v4** - Utility-first CSS framework
- **DDEV** - Containerized development environment

## 🚀 Quick Start

### Development Environment
```bash
# Start development environment
ddev start

# Install theme dependencies and build assets
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm install
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run build

# Start development server with HMR
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run dev
```

### Production Deployment
```bash
# Configure FTP credentials (one-time setup)
cp ftp-config.example.sh ftp-config.sh
# Edit ftp-config.sh with your hosting details

# Build and deploy automatically
source ftp-config.sh && ./build-production.sh --deploy
```

## 📚 Documentation

| Document | Description |
|----------|-------------|
| [**DEPLOYMENT-GUIDE.md**](docs/DEPLOYMENT-GUIDE.md) | Complete deployment documentation |
| [**QUICK-REFERENCE.md**](docs/QUICK-REFERENCE.md) | Command cheatsheet and quick deploy |
| [**HOSTING-PROVIDERS.md**](docs/HOSTING-PROVIDERS.md) | Provider-specific configurations |
| [**Development Tracker**](docs/trinity-health-website-Development-phases-checklists-plan.md) | Project progress and phase tracking |

## 🛠️ Build & Deployment Tools

### Build Script (`build-production.sh`)

Converts modern development stack to traditional WordPress:

```bash
# Manual build (for FTP/manual upload)
./build-production.sh

# Automatic build and FTP deployment
./build-production.sh --deploy

# View all options
./build-production.sh --help
```

**What it does:**
- Converts Sage Blade templates → Traditional PHP templates
- Compiles Vite assets → Production CSS/JS
- Exports database → SQL file with import instructions  
- Creates wp-content folder → Ready for upload
- Optional FTP deployment → Automatic upload to hosting

### FTP Configuration

**Secure method (recommended):**
```bash
# Copy and configure FTP credentials
cp ftp-config.example.sh ftp-config.sh
# Edit with your hosting details
```

**Supported hosting providers:**
- Afrihost, Hetzner, SiteGround, Bluehost, GoDaddy, and more
- See [HOSTING-PROVIDERS.md](docs/HOSTING-PROVIDERS.md) for specific configurations

## 🏗️ Project Structure

```
trinity-health-website/
├── web/                          # Document root
│   ├── app/                      # WordPress content
│   │   ├── themes/trinity-health/   # Sage theme
│   │   ├── plugins/              # Managed plugins
│   │   └── uploads/              # Media files
│   └── wp/                       # WordPress core (Composer)
├── build-production.sh           # Build & deployment script
├── ftp-config.example.sh         # FTP configuration template
├── docs/                         # Documentation
└── dist-production/              # Build output (created by script)
    ├── wp-content/               # Upload to hosting
    ├── database-export.sql       # Import via phpMyAdmin
    └── import-database.txt       # Database import instructions
```

## 🎯 Development Workflow

### Daily Development
```bash
# Start environment
ddev start

# Start development server with HMR
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run dev

# Make changes to:
# - resources/views/ (Blade templates)
# - resources/styles/ (CSS/Tailwind)
# - resources/scripts/ (JavaScript)
```

### Content Management
```bash
# Add new plugins
ddev composer require wpackagist-plugin/plugin-name

# WordPress CLI commands
ddev wp theme list
ddev wp plugin activate plugin-name
ddev wp db export backup.sql
```

### Deployment
```bash
# Build and deploy changes
source ftp-config.sh && ./build-production.sh --deploy
```

## 🔧 Technology Stack

### Development
- **PHP 8.2+** - Required for Sage v11
- **Node.js 18+** - For Vite build system
- **DDEV** - Containerized development environment
- **Composer** - PHP dependency management

### Frontend
- **Sage v11** - WordPress theme framework
- **Laravel Blade** - Template engine
- **Vite** - Build tool with HMR
- **Tailwind CSS v4** - Utility-first CSS
- **JavaScript ES6+** - Modern JavaScript

### Backend
- **WordPress 6.7.1** - Content management system
- **Bedrock** - WordPress boilerplate
- **Advanced Custom Fields** - Custom content fields
- **Contact Form 7** - Contact forms
- **Rank Math SEO** - Search engine optimization

## 🏥 Healthcare Features

### Custom Post Types
- **Health Services** - General medical services
- **Audiology Services** - Hearing healthcare specialization
- **Team Members** - Staff profiles and credentials
- **Locations** - Clinic information (Lusaka & Kitwe)
- **Testimonials** - Patient reviews and feedback

### Trinity Health Branding
- **Primary Color:** #880005 (Trinity maroon)
- **Typography:** Inter font family
- **Design:** Mayo Clinic inspired healthcare design
- **Content:** Dr. Alfred Mwamba and Trinity Health messaging

## 🔒 Security Features

- **Bedrock security** - wp-config.php outside document root
- **Composer-managed plugins** - No admin plugin installations
- **Environment-based configuration** - Separate dev/production configs
- **Database security** - Custom table prefix `th_`
- **SSL enforcement** - HTTPS redirect and secure headers
- **File permissions** - Proper WordPress file permissions

## 📊 Performance Optimizations

- **Vite build system** - Fast asset compilation and HMR
- **Tailwind CSS purging** - Removes unused CSS in production
- **Image optimization** - WebP conversion and lazy loading
- **Caching headers** - Browser and server-side caching
- **CDN ready** - Assets optimized for content delivery networks

## 🆘 Support & Troubleshooting

### Common Issues
- **Requirements check failed** → `ddev start && ddev wp core is-installed`
- **Theme assets not built** → `npm run build` in theme directory
- **FTP connection failed** → Check credentials in `ftp-config.sh`
- **Database import error** → Use phpMyAdmin in hosting control panel

### Getting Help
1. Check [DEPLOYMENT-GUIDE.md](docs/DEPLOYMENT-GUIDE.md) troubleshooting section
2. Review error logs in hosting control panel
3. Test changes locally with DDEV before deploying
4. Contact hosting provider for server-specific issues

## 📈 Project Status

**Current Phase:** Phase 2B - Build Script for Shared Hosting ✅  
**Next Phase:** Phase 3 - Theme Development (Mayo Clinic Inspired)

See [Development Tracker](docs/trinity-health-website-Development-phases-checklists-plan.md) for detailed progress.

## 🤝 Contributing

This is a client project for Trinity Health Zambia. Development follows the established Bedrock + Sage workflow with modern WordPress best practices.

---

**Built with ❤️ for Trinity Health Zambia**  
*Professional healthcare website development using modern WordPress stack*