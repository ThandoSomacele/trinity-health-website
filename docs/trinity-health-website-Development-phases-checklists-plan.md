# Trinity Health Zambia - Development Progress Tracker (2025)

## Development Strategy Overview

### Modern Development + Budget Hosting Approach

**Philosophy**: Professional developer experience with practical, cost-effective deployment  
**Local Development**: Full DDEV + Bedrock + Sage stack (all modern benefits)  
**Production Deployment**: Build process converts to traditional WordPress for shared hosting  
**Cost**: Maintain original R1,788/year hosting budget while getting enterprise-grade development workflow

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

- [ ] **Create Bedrock project through DDEV**:

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

#### Install Sage v11 Theme (Latest - March 2025)

- [x] **Enter the DDEV Container - SSH into the DDEV container**:

  ```bash
  ddev ssh
  ```

- [xx] **Once inside the container, navigate to themes directory**:

  ```bash
  cd web/app/themes/
  ```

- [xx] **Install Sage v11 theme via Composer**:

  ```bash
  composer create-project roots/sage trinity-health
  ```

- [xx] **Navigate to the theme directory (back on your host machine)**:

  ```bash
  cd web/app/themes/trinity-health
  ```

- [xx] **Install Node dependencies (includes Vite build system)**:

  ```bash

  ```

# From your current location (trinity-health-website/web/app/themes/trinity-health)

ddev exec -d /var/www/html/web/app/themes/trinity-health npm install

````

- [x] **Install Prettier plugins for modern Blade formatting**:

  ```bash
  ddev exec npm install --save-dev prettier prettier-plugin-blade prettier-plugin-tailwindcss
````

- [ ] **Start development server (Vite with HMR)**:

  ```bash
  ddev exec npm run dev
  ```

- [ ] **Verify Sage v11 installation and features**:
  - [ ] Build System: Vite (replaced Bud.js)
  - [ ] CSS Framework: Tailwind CSS v4 (automatic theme.json generation)
  - [ ] Templating: Laravel Blade exclusively (via Acorn v5)
  - [ ] Hot Module Replacement: Built-in with Vite
  - [ ] Block Editor: Enhanced integration with WordPress blocks

### Day 5-7: Content Architecture & Dependencies

#### Essential WordPress Plugins (via Composer)

- [ ] **Install core functionality plugins**:

  ```bash
  ddev composer require wpackagist-plugin/advanced-custom-fields
  ddev composer require wpackagist-plugin/yoast-seo
  ddev composer require wpackagist-plugin/contact-form-7
  ddev composer require wpackagist-plugin/wp-security-audit-log
  ```

- [ ] **Install development plugins**:
  ```bash
  ddev composer require wpackagist-plugin/query-monitor --dev
  ddev composer require wpackagist-plugin/debug-bar --dev
  ```

#### Custom Post Types & ACF Fields

- [ ] **Create Custom Post Types**:

  - [ ] Health Services (general medicine)
  - [ ] Audiology Services (hearing healthcare)
  - [ ] Team Members (staff profiles)
  - [ ] Locations (clinic information)
  - [ ] Testimonials (patient reviews)

- [ ] **Create ACF Field Groups**:
  - [ ] Service Details (description, features, pricing, icon)
  - [ ] Team Member Info (bio, credentials, photo, specialties)
  - [ ] Location Details (address, contact, hours, map)
  - [ ] Testimonial Data (content, patient name, service type)

---

## Phase 2: Build & Deployment System (Days 8-14)

### Modern Build Process Architecture

#### Build Script Creation

- [ ] **Create build-production.sh script**:

  ```bash
  touch build-production.sh
  chmod +x build-production.sh
  ```

- [ ] **Add build script content** (see full script below)

- [ ] **Test build script locally**:

  ```bash
  ./build-production.sh
  ```

- [ ] **Verify build output**:
  - [ ] `dist-production/` directory created
  - [ ] WordPress core files in root
  - [ ] Traditional wp-content structure
  - [ ] Compiled theme assets
  - [ ] Production wp-config.php template

#### Production Configuration Files

- [ ] **Create production wp-config.php template**:

  ```bash
  touch config/production-wp-config.template.php
  ```

- [ ] **Create production .htaccess template**:

  ```bash
  touch config/production.htaccess
  ```

- [ ] **Add security configurations to templates**

#### Deployment Script Setup

- [ ] **Create deploy.sh script**:

  ```bash
  touch deploy.sh
  chmod +x deploy.sh
  ```

- [ ] **Install LFTP for FTP deployment**:

  ```bash
  brew install lftp
  ```

- [ ] **Configure deployment script with hosting details**

- [ ] **Test deployment script (to staging if available)**

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

  - [ ] Dr. Mwamba profile and credentials
  - [ ] Clinic history and mission
  - [ ] Vision and values

- [ ] **Build Team section**:

  - [ ] Staff profiles with credentials
  - [ ] Specializations and expertise
  - [ ] Professional photos

- [ ] **Create Contact pages**:

  - [ ] Multiple contact methods
  - [ ] Location information for both clinics
  - [ ] Appointment booking integration

- [ ] **Setup Blog/Resources**:
  - [ ] Healthcare tips structure
  - [ ] Clinic updates and news

#### SEO & Performance Optimization

- [ ] **Performance testing**:

  ```bash
  ddev exec npm run analyze        # Bundle size analysis
  ```

- [ ] **SEO setup**:

  ```bash
  ddev exec wp plugin activate yoast-seo  # SEO optimization
  ```

- [ ] **Image optimization**:
  ```bash
  ddev exec wp media regenerate --yes     # Regenerate thumbnails
  ```

#### Testing Checklist

- [ ] **Cross-browser compatibility**:

  - [ ] Chrome (latest 2 versions)
  - [ ] Firefox (latest 2 versions)
  - [ ] Safari (latest 2 versions)
  - [ ] Edge (latest 2 versions)

- [ ] **Mobile responsiveness**:

  - [ ] 320px - 768px (Mobile)
  - [ ] 768px - 1024px (Tablet)
  - [ ] 1024px+ (Desktop)

- [ ] **Performance benchmarks**:

  - [ ] PageSpeed Insights score 90+
  - [ ] Core Web Vitals optimization
  - [ ] Load time under 3 seconds

- [ ] **Accessibility compliance**:

  - [ ] WCAG 2.1 AA compliance
  - [ ] Screen reader compatibility
  - [ ] Keyboard navigation
  - [ ] Color contrast verification

- [ ] **SEO implementation**:

  - [ ] Meta tags on all pages
  - [ ] Structured data markup
  - [ ] XML sitemaps
  - [ ] OpenGraph tags

- [ ] **Forms functionality**:

  - [ ] Contact forms working
  - [ ] Appointment request forms
  - [ ] Form validation
  - [ ] Spam protection

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
  ./build-production.sh
  ```

- [ ] **Deploy to staging for client review** (if available):

  ```bash
  ./deploy.sh staging
  ```

- [ ] **Client approval checkpoint**:

  - [ ] Content review and approval
  - [ ] Design approval
  - [ ] Functionality testing by client
  - [ ] Final content adjustments

- [ ] **Deploy to production**:
  ```bash
  ./deploy.sh production
  ```

#### Post-Deployment Verification

- [ ] **Technical verification**:

  ```bash
  curl -I https://trinity-health.com  # Check headers
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
  ddev wp search-replace 'https://trinity-health.com' 'https://trinity-health-zambia.ddev.site'
  ```

---

## Emergency Response & Maintenance

### Backup Strategy

- [ ] **Implement backup procedures**:
  - [ ] Automated daily backups via hosting provider
  - [ ] Manual pre-deployment database exports
  - [ ] Code version controlled in Git repository
  - [ ] Media synced to cloud storage (optional)

### Troubleshooting Documentation

- [ ] **Document common issues and solutions**:
  - [ ] White screen debugging (check error logs in cPanel)
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
  ./build-production.sh
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
  - [ ] Current: Shared hosting with build process
  - [ ] Growth option: VPS with direct Bedrock deployment
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
**Next Milestone**: [Current phase focus]

This development strategy provides Trinity Health with a **professional development experience** while maintaining **budget-friendly hosting costs**, ensuring both **immediate success** and **long-term scalability**.x
