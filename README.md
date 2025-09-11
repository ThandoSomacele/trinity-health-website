# Trinity Health Zambia - Website

Modern healthcare website for Trinity Health Zambia built with WordPress, featuring general health services and audiology specialization.

## 🏥 Project Overview

**Tech Stack:**
- **WordPress** - Custom theme with modern development practices
- **DDEV** - Local containerized development environment
- **Build System** - @wordpress/scripts (Webpack-based)
- **Styling** - Tailwind CSS + SCSS
- **JavaScript** - ES6+ with WordPress block editor APIs
- **Deployment** - FTP-based deployment to staging/production

## 🚀 Quick Start

### Local Development
```bash
# Start DDEV environment
ddev start

# Install dependencies
ddev npm install

# Build assets
ddev npm run build

# Watch for changes during development
ddev npm run start
```

### Access Points
- **Local Site**: https://trinity-health-website.ddev.site
- **Admin Panel**: https://trinity-health-website.ddev.site/wp-admin/
- **Staging Site**: https://staging.object91.co.za

## 📦 Deployment

### Deploy to Staging
```bash
# 1. Export database with staging URLs
./scripts/database-deploy.sh export-staging

# 2. Deploy files to staging
./scripts/deploy-staging.sh

# 3. Import database on server (requires SSH access)
ssh user@staging.object91.co.za
php staging-db-import.php trinity-health-[timestamp]-staging.sql.gz
```

### Deploy to Production
```bash
# 1. Export database with production URLs
./scripts/database-deploy.sh export-production

# 2. Deploy files (configure production script first)
./scripts/deploy-production.sh
```

## 📁 Project Structure

```
trinity-health-website/
├── web/                              # WordPress root
│   ├── wp-admin/                    # WordPress admin
│   ├── wp-content/                  
│   │   ├── themes/                  
│   │   │   └── trinity-health-theme/  # Custom theme
│   │   │       ├── assets/          # Compiled assets
│   │   │       ├── src/             # Source files
│   │   │       ├── inc/             # PHP includes
│   │   │       ├── template-parts/  # Template partials
│   │   │       └── build/           # Built assets
│   │   ├── plugins/                 # WordPress plugins
│   │   └── uploads/                 # Media files
│   └── wp-config.php               # WordPress configuration
├── scripts/                         # Deployment & utility scripts
│   ├── database-deploy.sh          # Database export/import
│   ├── deploy-staging.sh           # File deployment to staging
│   ├── staging-db-import.php       # Server-side DB import
│   └── wp-diagnostics.php          # WordPress health checks
├── backups/                         # Database backups
├── docs/                            # Additional documentation
└── .env                            # Environment configuration
```

## 🔧 Configuration

### Environment Variables (.env)
```bash
# Copy template and configure
cp .env.example .env

# Required variables:
STAGING_HOST=ftp.object91.co.za
STAGING_USER=your-username
STAGING_PASS=your-password
STAGING_DB_NAME=database-name
STAGING_DB_USER=db-username
STAGING_DB_PASS=db-password
STAGING_URL=https://staging.object91.co.za
```

## 📚 Documentation

- [**Development Guide**](docs/DEVELOPMENT.md) - Local setup, coding standards, theme development
- [**Deployment Guide**](docs/DEPLOYMENT.md) - Complete deployment procedures and troubleshooting
- [**Maintenance Guide**](docs/MAINTENANCE.md) - Caching, performance, backups, updates

## 🛠️ Available Scripts

| Script | Purpose |
|--------|---------|
| `ddev start` | Start local development environment |
| `ddev npm run build` | Build production assets |
| `ddev npm run start` | Watch mode for development |
| `./scripts/database-deploy.sh` | Database management |
| `./scripts/deploy-staging.sh` | Deploy to staging |
| `php scripts/wp-diagnostics.php` | Run health checks |

## 🚨 Troubleshooting

### Common Issues
- **Scripts not loading**: Run `ddev npm run build` and clear cache
- **Database import fails**: Check credentials in `.env`
- **FTP timeout**: Reduce parallel connections in deploy script
- **Redirect loops**: Clear browser cache and WordPress transients

### Get Help
- Check [Deployment Guide](docs/DEPLOYMENT.md) for detailed instructions
- Run `php scripts/wp-diagnostics.php` for system health check
- Review server logs for specific errors

## 📝 License

© 2025 Trinity Health Zambia. All rights reserved.