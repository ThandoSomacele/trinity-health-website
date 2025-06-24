# Trinity Health Zambia - Development Progress Tracker (2025)

## Development Strategy Overview

### Modern Development + Flexible Deployment Approach

**Philosophy**: Professional developer experience with flexible, cost-effective deployment options  
**Local Development**: Full DDEV + Bedrock + Sage stack (all modern benefits)  
**Production Deployment**: Choose between modern VPS hosting or traditional shared hosting  
**Cost**: Enterprise-grade development workflow with deployment options from R780-R1,788/year

---

## Pre-Development Setup

### Core Development Environment (2025 Standards)

**Requirements**:

- [x] **PHP 8.2+** (required for Sage v11 and Acorn v5)
- [x] **Node.js 18+** (for Vite build system)
- [x] **Docker** (for DDEV containerization)
- [x] **Composer 2.5+** (PHP dependency management)

#### 1. Essential Tools Installation

- [x] **Install Docker Provider** (choose one):

  ```bash
  # Docker Desktop (most common)
  brew install --cask docker
  # OR OrbStack (faster, requires license for commercial use)
  # brew install orbstack
  # OR Colima (free alternative)
  # brew install colima
  ```

- [x] **Install Core Development Tools**:

  ```bash
  # DDEV (current formula - March 2025)
  brew install ddev/ddev/ddev

  # PHP dependency manager
  brew install composer

  # Node.js 18+ (for Vite builds)
  brew install node

  # Version control
  brew install git
  ```

- [x] **Setup SSL certificates for DDEV**:

  ```bash
  mkcert -install
  ```

- [x] **Verify installations**:
  ```bash
  docker --version     # Should be 20.10+
  ddev version        # Should be 1.24.6+
  composer --version  # Should be 2.5+
  node --version      # Should be 18+
  php --version       # Should be 8.2+ (required for Sage v11)
  ```

#### 2. Development Tools & Extensions

- [x] **Install VS Code Extensions**:
  ```json
  {
    "recommendations": [
      "bmewburn.vscode-intelephense-client", // PHP IntelliSense
      "esbenp.prettier-vscode", // Prettier with Blade support
      "mrmlnc.vscode-scss", // SCSS support
      "bradlc.vscode-tailwindcss", // Tailwind CSS v4 IntelliSense
      "ms-vscode.vscode-json", // JSON support
      "formulahendry.auto-rename-tag", // HTML tag helper
      "ms-vscode.vscode-eslint" // JavaScript linting
    ]
  }
  ```

#### 3. Project Foundation Setup

- [x] **Create project directory**:

  ```bash
  mkdir trinity-health-zambia
  cd trinity-health-zambia
  ```

- [x] **Initialize Git repository**:

  ```bash
  git init
  git remote add origin [your-repo-url]
  ```

- [x] **Setup DDEV for WordPress/Bedrock**:
  ```bash
  ddev config --project-type=wordpress --docroot=web --create-docroot
  ```

---

## Phase 1: Modern Local Development Environment (Days 1-7)

### Day 1-2: Bedrock Foundation

#### Install Bedrock via DDEV

- [x] **Create Bedrock project through DDEV**:

  ```bash
  ddev composer create-project roots/bedrock
  ```

- [x] **Configure environment variables**:

  ```bash
  cp .env.example .env
  ```

- [x] **Edit .env with DDEV settings**:

  - [x] Set `DB_NAME='db'`
  - [x] Set `DB_USER='db'`
  - [x] Set `DB_PASSWORD='db'`
  - [x] Set `DB_HOST='db'`
  - [x] Set `WP_HOME="${DDEV_PRIMARY_URL}"`
  - [x] Set `WP_SITEURL="${DDEV_PRIMARY_URL}/wp"`

- [x] **Start development environment**:

  ```bash
  ddev start
  ```

- [x] **Verify Bedrock structure is created correctly**

#### Bedrock Structure Verification

```
trinity-health-zambia/
├── .ddev/                    # DDEV configuration
├── .env                     # Environment variables
├── composer.json            # PHP dependencies
├── config/                  # Environment configs
│   ├── application.php      # Main application config
│   └── environments/        # Environment-specific configs
├── web/                     # Document root (public)
│   ├── app/                 # WordPress content
│   │   ├── themes/          # Custom themes
│   │   ├── plugins/         # Managed plugins
│   │   ├── mu-plugins/      # Must-use plugins
│   │   └── uploads/         # Media files
│   ├── wp/                  # WordPress core (Composer managed)
│   ├── wp-content/uploads   # TBC
│   └── wp-config.php        # Generated config
└── vendor/                  # Composer dependencies
```

### Day 3-4: Sage Theme Framework v11

#### Install Sage v11 Theme (Latest - Current: v11.0.1)

**Note**: DDEV restricts `composer create-project` in subdirectories for security reasons. We must use `ddev ssh` to install Sage.

- [x] **Install Sage v11 theme via DDEV container**:

  ```bash
  # SSH into DDEV container
  ddev ssh

  # Navigate to themes directory inside container
  cd web/app/themes/

  # Install Sage theme (this will create trinity-health directory)
  # ⚠️ TROUBLESHOOTING: If directory exists and not empty, remove it first:
  # rm -rf trinity-health
  composer create-project roots/sage trinity-health

  # Exit container
  exit
  ```

- [x] **Configure Database Connection (Critical Setup)**:

  ```bash
  # Ensure .env file has correct ddev database settings
  # ⚠️ CRITICAL: WordPress defaults to localhost but ddev uses 'db' hostname
  ```

  **Required .env configuration**:

  ```bash
  DB_NAME='db'
  DB_USER='db'
  DB_PASSWORD='db'
  DB_HOST='db'    # ⚠️ MUST be 'db', not 'localhost'
  ```

- [x] **Install WordPress Core (Required Before Theme Activation)**:

  ```bash
  # ⚠️ IMPORTANT: Must install WordPress before activating themes
  ddev wp core install --url="https://trinity-health-website.ddev.site" --title="Trinity Health Website" --admin_user="dev_admin" --admin_password="DevAdmin123!" --admin_email="support@object91.co.za"
  ```

- [x] **Install Node dependencies and Prettier plugins**:

  ```bash
  # ⚠️ CORRECT FLAG: Use --dir (not --workdir) for ddev exec
  ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm install

  # Install Prettier plugins for modern Blade formatting
  ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm install --save-dev prettier prettier-plugin-blade prettier-plugin-tailwindcss
  ```

- [x] **Build initial assets** (required before accessing site):

  ```bash
  # Build assets (prevents "Vite manifest not found" error)
  ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run build
  ```

- [x] **Activate theme in WordPress**:

  ```bash
  ddev wp theme activate trinity-health
  ```

- [x] **Configure Vite Development Environment**:

  ```bash
  # ⚠️ CRITICAL: Create theme-specific .env file for Vite
  ddev exec nano /var/www/html/web/app/themes/trinity-health/.env
  ```

  **Required theme .env content**:

  ```bash
  APP_URL='https://trinity-health-website.ddev.site'
  ```

- [x] **Start development server (Vite with HMR)**:

  ```bash
  ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run dev
  ```

  **Expected Vite output**:

  ```
  VITE v6.3.5 ready in 318 ms
  ➜ Local: http://localhost:5173/app/themes/sage/public/build/
  ➜ Network: use --host to expose
  LARAVEL plugin v1.3.0
  ➜ APP_URL: https://trinity-health-website.ddev.site  # ✅ Should show your URL, not undefined
  ```

- [x] **FIXED: Styling not displaying on frontend**:
  - [x] Added Vite port 5173 to DDEV config.yaml (web_extra_exposed_ports)
  - [x] Updated vite.config.js with DDEV-compatible server settings
  - [x] Configured host: '0.0.0.0', port: 5173, strictPort: true
  - [x] Set dynamic origin URL using DDEV_PRIMARY_URL
  - [x] Fixed npm dependency conflicts in both host and container
  - [x] Verified assets compile to public/build/assets/ with manifest.json
  - [x] Confirmed @vite directive loads CSS properly in Blade templates
  - [x] **STATUS**: Trinity Health styling now renders correctly on frontend ✅

#### Troubleshooting Guide

**🔧 Common Issues & Solutions:**

1. **"Project directory is not empty" Error**:

   ```bash
   rm -rf trinity-health
   composer create-project roots/sage trinity-health
   ```

2. **Database Connection Errors**:

   - Check `.env` has `DB_HOST='db'` (not `localhost`)
   - Verify ddev is running: `ddev status`

3. **"The site you have requested is not installed"**:

   ```bash
   ddev wp core install --url="[your-ddev-url]" --title="Site Title" --admin_user="admin" --admin_password="password" --admin_email="admin@example.com"
   ```

4. **Vite shows "APP_URL: undefined"**:

   - Create `/var/www/html/web/app/themes/trinity-health/.env`
   - Add: `APP_URL='https://trinity-health-website.ddev.site'`
   - Restart Vite with `Ctrl+C` then `npm run dev`

5. **Wrong ddev exec flag**:
   - Use `--dir` not `--workdir`
   - Correct: `ddev exec --dir=/path/to/directory command`

- [x] **Verify Sage v11 installation and features**:
  - [x] **Version**: Sage v11.0.1 (June 2025)
  - [x] **Laravel Integration**: Acorn v5.0.4 with Laravel v12.19.3 packages
  - [x] **Build System**: Vite (replaced Bud.js completely)
  - [x] **CSS Framework**: Tailwind CSS v4 (automatic theme.json generation)
  - [x] **Templating**: Laravel Blade exclusively (.blade.php files)
  - [x] **PHP Requirements**: 8.2+ required (88 Composer packages installed)
  - [x] **Hot Module Replacement**: Built-in with Vite development server
  - [x] **Block Editor**: Enhanced integration with WordPress blocks
  - [x] **Asset Building**: Must run `npm run build` before accessing site

#### Command Reference

**Development Workflow**:

```bash
# Start development with HMR
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run dev

# Build for production
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run build

# Install new npm packages
ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm install package-name

# WordPress CLI commands
ddev wp theme list
ddev wp theme activate trinity-health
ddev wp plugin list
```

**File Structure Check**:

```
web/app/themes/trinity-health/
├── .env                    # ⚠️ Required: APP_URL setting
├── package.json           # Node dependencies
├── vite.config.js         # Vite configuration
├── composer.json          # PHP dependencies
├── app/                   # Theme logic
├── resources/             # Source files (Blade, CSS, JS)
└── public/                # Built assets
```

### Day 5-7: Content Architecture & Dependencies

#### Essential WordPress Plugins (via Composer)

- [x] **Install core functionality plugins**:

  ```bash
  ddev composer require wpackagist-plugin/advanced-custom-fields
  ddev composer require wpackagist-plugin/seo-by-rank-math
  ddev composer require wpackagist-plugin/contact-form-7
  ddev composer require wpackagist-plugin/wp-security-audit-log
  ```

- [x] **Install development plugins**:
  ```bash
  ddev composer require wpackagist-plugin/query-monitor --dev
  ddev composer require wpackagist-plugin/debug-bar --dev
  ```

#### Custom Post Types & ACF Fields

- [x] **Create Custom Post Types**:

  - [x] Health Services (general medicine)
  - [x] Audiology Services (hearing healthcare)
  - [x] Team Members (staff profiles)
  - [x] Locations (clinic information)
  - [x] Testimonials (patient reviews)

- [x] **Create ACF Field Groups**:
  - [x] Service Details (description, features, pricing, icon)
  - [x] Team Member Info (bio, credentials, photo, specialties)
  - [x] Location Details (address, contact, hours, map)
  - [x] Testimonial Data (content, patient name, service type)

---

## Phase 2: Production Deployment Strategy (Days 8-14)

**Choose Your Deployment Path**: Trinity Health can select between modern self-hosting or traditional shared hosting approaches.

---

### **Phase 2A: Self-Hosted VPS Deployment (RECOMMENDED)**

**Benefits**: 56% cost savings (R780 vs R1,788/year), full control, enterprise performance, direct Bedrock deployment  
**Time Investment**: ~3 hours setup  
**Technical Requirements**: Basic server management skills

#### VPS Server Setup (30 minutes)

- [ ] **Create Hetzner Cloud account**:
  - [ ] Visit: https://www.hetzner.com/cloud
  - [ ] Sign up and verify email
  - [ ] Create project: "Trinity Health Production"

- [ ] **Deploy CX21 server**:
  - [ ] Location: Falkenstein, Germany
  - [ ] Image: Ubuntu 22.04  
  - [ ] Type: CX21 (2 vCPU, 4GB RAM, 40GB SSD) - €4.51/month
  - [ ] Name: trinity-health-prod

- [ ] **Initial server configuration**:
  ```bash
  ssh root@YOUR_SERVER_IP
  apt update && apt upgrade -y
  apt install -y curl wget unzip software-properties-common
  ```

#### CyberPanel Installation (20 minutes)

- [ ] **Install CyberPanel control panel**:
  ```bash
  sh <(curl https://cyberpanel.net/install.sh)
  ```

- [ ] **Installation options**:
  - [ ] Select: OpenLiteSpeed (free version)
  - [ ] Install Memcached: Yes
  - [ ] Install Redis: Yes  
  - [ ] Install PowerDNS: No
  - [ ] Install Rainloop: Yes

- [ ] **Configure firewall**:
  ```bash
  ufw allow 8090 && ufw enable
  ```

- [ ] **Save admin credentials** (shown after installation)

#### Domain & SSL Configuration (30 minutes)

- [ ] **Update DNS records**:
  ```dns
  A     @              YOUR_SERVER_IP    300
  A     www            YOUR_SERVER_IP    300
  ```

- [ ] **Create website in CyberPanel**:
  - [ ] Domain: trinity-health.co.za
  - [ ] PHP: 8.2
  - [ ] Enable SSL via Let's Encrypt

#### Bedrock WordPress Setup (45 minutes)

- [ ] **Install Composer**:
  ```bash
  curl -sS https://getcomposer.org/installer | php
  mv composer.phar /usr/local/bin/composer
  chmod +x /usr/local/bin/composer
  ```

- [ ] **Deploy Bedrock**:
  ```bash
  cd /home/trinity-health.co.za/public_html
  rm -rf *
  composer create-project roots/bedrock .
  ```

- [ ] **Configure environment**:
  - [ ] Copy .env.example to .env
  - [ ] Set database credentials from CyberPanel
  - [ ] Set WP_HOME and WP_SITEURL
  - [ ] Generate security keys: https://roots.io/salts/

- [ ] **Update document root** in CyberPanel to `public_html/web`

#### Sage Theme Installation (30 minutes)

- [ ] **Install Sage theme**:
  ```bash
  cd /home/trinity-health.co.za/public_html/web/app/themes
  composer create-project roots/sage trinity-health
  cd trinity-health && npm install && npm run build
  ```

- [ ] **Configure Trinity Health branding**:
  ```css
  /* In resources/styles/app.css */
  :root {
    --trinity-primary: #880005;
    --trinity-primary-light: #a61a1a;
    --trinity-primary-dark: #660004;
  }
  ```

- [ ] **Activate theme via WP-CLI**:
  ```bash
  wp core install --url="https://trinity-health.co.za" --title="Trinity Health Zambia"
  wp theme activate trinity-health --allow-root
  ```

#### Security & Optimization (20 minutes)

- [ ] **Configure automated backups**:
  - [ ] Daily backups in CyberPanel
  - [ ] 7-day retention policy

- [ ] **Enable performance optimizations**:
  - [ ] LSCache in CyberPanel
  - [ ] Gzip compression
  - [ ] Browser caching

- [ ] **Setup monitoring**:
  - [ ] Server resource monitoring
  - [ ] SSL certificate auto-renewal verification

#### Development Workflow Setup (15 minutes)

- [ ] **Initialize Git repository**:
  ```bash
  cd /home/trinity-health.co.za/public_html
  git init && git add . && git commit -m "Initial Bedrock setup"
  ```

- [ ] **Create deployment script**:
  ```bash
  # Create /home/trinity-health.co.za/deploy.sh
  #!/bin/bash
  git pull origin main
  composer install --no-dev --optimize-autoloader
  cd web/app/themes/trinity-health && npm ci && npm run build
  wp cache flush --allow-root
  ```

**✅ VPS Deployment Complete**: Enterprise hosting at R780/year with full control

---

### **Phase 2B: Build Script for Shared Hosting (ALTERNATIVE)**

**Benefits**: Compatible with existing Afrihost hosting, no server management required  
**Time Investment**: 2-3 days development  
**Use Case**: Clients preferring managed hosting or lacking technical expertise

#### Build Script Architecture

- [x] **Create build-production.sh script**:

  ```bash
  touch build-production.sh
  chmod +x build-production.sh
  ```

- [x] **Build script converts modern stack to traditional WordPress**:
  - [x] Bedrock → Standard WordPress structure
  - [x] Sage Blade templates → Traditional PHP files  
  - [x] Composer dependencies → Bundled plugins
  - [x] Vite assets → Compiled CSS/JS

- [x] **Add build script content** (comprehensive conversion logic)

- [x] **Test build script locally**:

  ```bash
  ./build-production.sh
  ```

- [x] **Verify build output**:
  - [x] `dist-production/` directory created
  - [x] **Modified approach**: wp-content folder only (no WordPress core)
  - [x] Traditional wp-content structure with themes, plugins, uploads
  - [x] Compiled theme assets
  - [x] Database export with import instructions

#### Production Configuration Files

- [x] **Production configuration handled by existing WordPress installation**:
  - [x] Build script creates wp-content folder only
  - [x] Host's existing WordPress handles core files and configuration
  - [x] Database export includes all Trinity Health content and settings

#### Deployment Script Setup

- [x] **FTP deployment integrated into build script**:
  - [x] Added `--deploy` flag to build-production.sh
  - [x] LFTP integration for secure file transfer
  - [x] Automatic wp-content and database upload
  - [x] FTP configuration via external config file

- [x] **FTP deployment configuration**:
  - [x] Created `ftp-config.example.sh` template
  - [x] Added to .gitignore for security
  - [x] Support for common hosting providers (Afrihost, cPanel, etc.)

- [x] **Usage**:
  ```bash
  # Configure FTP credentials
  cp ftp-config.example.sh ftp-config.sh
  # Edit ftp-config.sh with your details
  
  # Build and deploy automatically
  source ftp-config.sh && ./build-production.sh --deploy
  ```

#### Build Process Implementation

- [ ] **Template Conversion Engine**:
  - [ ] Parse Blade templates to PHP
  - [ ] Convert Tailwind classes to inline CSS
  - [ ] Bundle JavaScript dependencies

- [ ] **Asset Pipeline**:
  - [ ] Compile Vite assets for production
  - [ ] Optimize images and media
  - [ ] Generate traditional WordPress theme structure

- [ ] **Configuration Management**:
  - [ ] Environment-specific config generation
  - [ ] Database credential management
  - [ ] Security key generation

**✅ Build Script Complete**: Shared hosting compatibility maintained

---

### **Phase 2C: Deployment Decision Matrix**

**Choose Phase 2A (VPS) if**:
- ✅ Want 56% cost savings (R780 vs R1,788/year)
- ✅ Comfortable with basic server management
- ✅ Need full control and customization
- ✅ Want enterprise-grade performance
- ✅ Plan to scale or add advanced features

**Choose Phase 2B (Build Script) if**:
- ✅ Prefer managed hosting simplicity  
- ✅ Want to keep existing Afrihost relationship
- ✅ Avoid server management responsibilities
- ✅ Need immediate deployment without server setup
- ✅ Client specifically requests shared hosting

**Recommendation**: **Phase 2A (VPS)** provides superior value, performance, and future-proofing for Trinity Health

---

## Phase 3: Theme Development (Mayo Clinic Inspired) (Days 15-21)

### Design System Implementation

#### Brand & Color Palette

- [ ] **Define Trinity Health brand colors**:

  - [ ] Primary: #880005 (Trinity maroon)
  - [ ] Primary Light: #a61a1a
  - [ ] Primary Dark: #660004
  - [ ] Neutral grays and support colors

- [ ] **Implement color system in Tailwind config**

#### Typography System (Professional Healthcare)

- [ ] **Define font stack (Mayo Clinic style)**:

  - [ ] Primary: 'Inter' font family
  - [ ] Heading: 'Inter' system font
  - [ ] Type scale (12px to 36px range)

- [ ] **Implement typography in theme**

#### Template Architecture

- [ ] **Create Blade template structure**:

  - [ ] `layouts/app.blade.php` (Main layout wrapper)
  - [ ] `layouts/header.blade.php` (Site header)
  - [ ] `layouts/footer.blade.php` (Site footer)

- [ ] **Create partial templates**:

  - [ ] `partials/hero-slider.blade.php` (Homepage hero)
  - [ ] `partials/service-card.blade.php` (Service display cards)
  - [ ] `partials/team-member.blade.php` (Staff profile cards)
  - [ ] `partials/testimonial.blade.php` (Patient testimonials)

- [ ] **Create page templates**:
  - [ ] `index.blade.php` (Blog/posts index)
  - [ ] `page.blade.php` (Default page template)
  - [ ] `single.blade.php` (Single post template)
  - [ ] `template-homepage.blade.php` (Custom homepage)
  - [ ] `page-services.blade.php` (Services overview)
  - [ ] `single-service.blade.php` (Individual service)
  - [ ] `page-contact.blade.php` (Contact page)

#### Blade Templating Implementation

- [ ] **Implement template inheritance with `@extends('layouts.app')`**
- [ ] **Setup sections with `@section('content')` and `@yield('content')`**
- [ ] **Create reusable components with `@include('partials.service-card')`**
- [ ] **Implement data passing to components**
- [ ] **Add conditionals with `@if`, `@foreach`, `@empty`**

---

## Phase 4: Content Integration & Testing (Days 22-30)

### Content Architecture

#### Page Structure Implementation

- [ ] **Create Homepage**:

  - [ ] Hero slider implementation
  - [ ] Services overview section
  - [ ] About summary section
  - [ ] Testimonials section

- [ ] **Build Health Services pages**:

  - [ ] Archive page for all services
  - [ ] Individual service detail pages
  - [ ] Service categorization

- [ ] **Create Audiology Services section**:

  - [ ] Specialized landing page
  - [ ] Detailed service descriptions
  - [ ] Dr. Mwamba expertise showcase

- [ ] **Develop About Us section**:

  - [ ] Dr. Alfred Mwamba biography
  - [ ] Trinity Health story and mission
  - [ ] Team member profiles
  - [ ] Location information (Lusaka & Kitwe)

- [ ] **Build Contact section**:
  - [ ] Contact forms (Health vs Audiology)
  - [ ] Location details and maps
  - [ ] Business hours and contact methods

#### Advanced Custom Fields Integration

- [ ] **Configure ACF field groups**:

  - [ ] Service fields (description, features, pricing)
  - [ ] Team member fields (bio, credentials, photo)
  - [ ] Location fields (address, hours, contact)
  - [ ] Testimonial fields (content, name, service)

- [ ] **Implement field display in Blade templates**:
  - [ ] Dynamic service information rendering
  - [ ] Team member profile cards
  - [ ] Location details with maps
  - [ ] Testimonial carousel

#### Contact Forms & User Interaction

- [ ] **Setup Contact Form 7**:

  - [ ] Health services inquiry form
  - [ ] Audiology services inquiry form
  - [ ] General contact form

- [ ] **Form routing and notifications**:
  - [ ] Email routing based on form type
  - [ ] Confirmation messages
  - [ ] Thank you pages

#### SEO & Content Optimization

- [ ] **Configure Rank Math SEO**:

  - [ ] Local SEO for Zambian healthcare
  - [ ] Service-specific meta descriptions
  - [ ] Schema markup for healthcare providers
  - [ ] Breadcrumb implementation

- [ ] **Content optimization**:
  - [ ] Zambian healthcare keyword research
  - [ ] Meta titles and descriptions
  - [ ] Image alt text and optimization
  - [ ] Internal linking strategy

### Quality Assurance & Testing

#### Cross-Browser & Device Testing

- [ ] **Browser compatibility testing**:

  - [ ] Chrome, Firefox, Safari, Edge
  - [ ] Mobile Safari (iOS)
  - [ ] Chrome Mobile (Android)

- [ ] **Device testing**:

  - [ ] Desktop (1920x1080, 1366x768)
  - [ ] Tablet (768x1024, 1024x768)
  - [ ] Mobile (375x667, 414x896)

- [ ] **Responsive design verification**:
  - [ ] Navigation functionality on mobile
  - [ ] Content readability across devices
  - [ ] Form usability on small screens
  - [ ] Image and media responsiveness

#### Performance Testing

- [ ] **Speed optimization**:

  - [ ] Image compression and WebP conversion
  - [ ] CSS and JavaScript minification
  - [ ] Lazy loading implementation
  - [ ] Caching configuration

- [ ] **Performance benchmarking**:

  - [ ] GTmetrix speed testing
  - [ ] Google PageSpeed Insights
  - [ ] Pingdom Website Speed Test
  - [ ] Core Web Vitals optimization

- [ ] **Load testing**:
  - [ ] Handle expected traffic volume
  - [ ] Database query optimization
  - [ ] Caching implementation

---

## Phase 5: Production Deployment & Launch (Days 31-35)

### Pre-Deployment Checklist

#### Security Hardening

- [ ] **Generate production security keys**:

  ```bash
  curl -s https://api.wordpress.org/secret-key/1.1/salt/
  ```

- [ ] **Update wp-config.php with generated keys**

- [ ] **Enable security headers in .htaccess**

- [ ] **Configure SSL certificate on hosting**

- [ ] **Review and implement security best practices**

#### Final Build & Deployment

- [ ] **Create final production build**:

  ```bash
  ./build-production.sh  # If using Phase 2B
  ```

- [ ] **Deploy to staging for client review** (if available):

  ```bash
  ./deploy.sh staging  # If using Phase 2B
  ```

- [ ] **Client approval checkpoint**:

  - [ ] Content review and approval
  - [ ] Design approval
  - [ ] Functionality testing by client
  - [ ] Final content adjustments

- [ ] **Deploy to production**:
  ```bash
  # Phase 2A: Direct deployment on VPS
  # Phase 2B: ./deploy.sh production
  ```

#### Post-Deployment Verification

- [ ] **Technical verification**:

  ```bash
  curl -I https://trinity-health.co.za  # Check headers
  ```

- [ ] **Functionality testing**:

  - [ ] Test all forms and functionality
  - [ ] Verify SSL certificate
  - [ ] Check responsive design
  - [ ] Test contact forms

- [ ] **SEO & Analytics setup**:
  - [ ] Google Search Console verification
  - [ ] Google Analytics installation
  - [ ] Monitor search indexing
  - [ ] Submit XML sitemap

---

## Ongoing Development Workflow

### Daily Development Process

- [ ] **Setup daily development routine**:

  ```bash
  # Start development environment
  ddev start

  # Pull latest changes
  git pull origin main

  # Install any new dependencies
  ddev composer install
  cd web/app/themes/trinity-health && ddev exec npm install

  # Start Vite development server (Sage v11)
  ddev exec npm run dev  # Hot Module Replacement enabled
  ```

### Plugin Management (Modern Approach)

- [ ] **Document plugin management workflow**:

  ```bash
  # Add new plugin
  ddev composer require wpackagist-plugin/plugin-name

  # Update all plugins
  ddev composer update

  # Remove plugin
  ddev composer remove wpackagist-plugin/plugin-name
  ```

### Database Management

- [ ] **Setup database management procedures**:

  ```bash
  # Export database for deployment
  ddev export-db --file=production-db.sql

  # Import database (for development)
  ddev import-db --file=client-data.sql

  # Search and replace URLs
  ddev wp search-replace 'https://trinity-health.co.za' 'https://trinity-health-zambia.ddev.site'
  ```

---

## Emergency Response & Maintenance

### Backup Strategy

- [ ] **Implement backup procedures**:
  - [ ] Automated daily backups via hosting provider/VPS
  - [ ] Manual pre-deployment database exports
  - [ ] Code version controlled in Git repository
  - [ ] Media synced to cloud storage (optional)

### Troubleshooting Documentation

- [ ] **Document common issues and solutions**:
  - [ ] White screen debugging (check error logs)
  - [ ] Plugin conflict resolution (deactivate via FTP/database)
  - [ ] Database issue procedures (restore from backup)
  - [ ] Performance optimization (enable caching, optimize images)

### Update Workflow

- [ ] **Establish update procedures**:

  ```bash
  # Update WordPress core (via Composer)
  ddev composer update roots/wordpress

  # Update theme dependencies
  cd web/app/themes/trinity-health
  ddev exec npm update

  # Test updates locally, then deploy
  # Phase 2A: Git push + deployment script
  # Phase 2B: ./build-production.sh && ./deploy.sh production
  ```

---

## Future-Proofing Strategy

### Phase 2 Preparation (E-commerce)

- [ ] **Research and plan e-commerce integration**:
  - [ ] WooCommerce compatibility verification
  - [ ] API integration planning
  - [ ] Payment system research (SA payment gateways)
  - [ ] Inventory management database design

### Hosting Migration Path

- [ ] **Plan hosting upgrade strategy**:
  - [ ] Current: Flexible deployment (VPS or shared hosting)
  - [ ] Growth option: VPS scaling or dedicated servers
  - [ ] Scale option: Cloud hosting with CI/CD pipelines

### Technology Roadmap

- [ ] **Document technology evolution plan**:
  - [ ] 2025: Current Bedrock + Sage setup
  - [ ] 2026: Evaluate headless WordPress implementation
  - [ ] 2027: Consider JAMstack migration (if needed)

---

## Project Completion Checklist

### Final Deliverables

- [ ] **Client handover documentation**:

  - [ ] WordPress admin training materials
  - [ ] Content management guidelines
  - [ ] Contact information for ongoing support
  - [ ] Security and backup procedures

- [ ] **Technical documentation**:

  - [ ] Development environment setup guide
  - [ ] Build and deployment procedures
  - [ ] Emergency response procedures
  - [ ] Update and maintenance workflows

- [ ] **Project completion sign-off**:
  - [ ] Client approval of final website
  - [ ] Domain transfer (if applicable)
  - [ ] Hosting account handover
  - [ ] Final invoice and payment

**Project Status**: ⏳ In Progress  
**Estimated Completion**: [Add target date]  
**Next Milestone**: Choose deployment strategy (Phase 2A or 2B)

---

## Deployment Strategy Summary

### **Phase 2A: VPS Deployment (RECOMMENDED)**
- **Cost**: R780/year (56% savings)
- **Setup Time**: ~3 hours
- **Benefits**: Enterprise performance, full control, direct Bedrock deployment
- **Best For**: Technical clients, future scalability, cost optimization

### **Phase 2B: Build Script Deployment (ALTERNATIVE)**
- **Cost**: R1,788/year (existing Afrihost)
- **Development Time**: 2-3 days
- **Benefits**: No server management, familiar hosting
- **Best For**: Non-technical clients, existing hosting relationships

This flexible development strategy provides Trinity Health with **professional development experience** while offering **optimal deployment choices** based on their technical comfort level and business requirements, ensuring both **immediate success** and **long-term scalability**.
