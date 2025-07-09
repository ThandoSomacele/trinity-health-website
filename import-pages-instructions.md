# Trinity Health - Import Pages Instructions

## Overview
I've created comprehensive page content for all the menu links in your Trinity Health website. Since DDEV needs to be running to import pages directly, I've created SQL import files that you can run once your development environment is active.

## Pages Created

### Core Pages
1. **About Us** (`/about`) - Practice information, mission, values
2. **Our Services** (`/services`) - Overview of all services
3. **Patient Care** (`/patient-care`) - Patient experience and resources
4. **Our Team** (`/team`) - Staff directory and team information
5. **Contact Us** (`/contact`) - Contact information and forms

### Service-Specific Pages
1. **Primary Care** (`/primary-care`) - Routine healthcare services
2. **Preventive Care** (`/preventive-care`) - Screening and prevention
3. **Hearing Tests** (`/hearing-tests`) - Comprehensive hearing assessments
4. **Emergency Care** (`/emergency-care`) - Urgent care services

## How to Import

### Step 1: Start DDEV
```bash
# Make sure Docker is running first
ddev start
```

### Step 2: Import Core Pages
```bash
# Import main pages (About, Services, Patient Care, etc.)
ddev wp db query < temp-pages-import.sql
```

### Step 3: Import Service Pages
```bash
# Import service-specific pages
ddev wp db query < service-pages-import.sql
```

### Step 4: Create Remaining Service Pages
Once the core pages are imported, you can create the remaining service pages using WP-CLI:

```bash
# Chronic Disease Management
ddev wp post create --post_type=page --post_title="Chronic Disease Management" --post_name="chronic-disease-management" --post_status=publish --post_content="<h1>Chronic Disease Management</h1><p>Comprehensive care for long-term health conditions including diabetes, hypertension, heart disease, and more.</p>"

# Health Screenings
ddev wp post create --post_type=page --post_title="Health Screenings" --post_name="health-screenings" --post_status=publish --post_content="<h1>Health Screenings</h1><p>Early detection and prevention through comprehensive health screenings and assessments.</p>"

# Hearing Aids
ddev wp post create --post_type=page --post_title="Hearing Aids" --post_name="hearing-aids" --post_status=publish --post_content="<h1>Hearing Aids</h1><p>Professional hearing aid services including fittings, adjustments, and ongoing support.</p>"

# Tinnitus Treatment
ddev wp post create --post_type=page --post_title="Tinnitus Treatment" --post_name="tinnitus-treatment" --post_status=publish --post_content="<h1>Tinnitus Treatment</h1><p>Specialized treatment options for tinnitus and ringing in the ears.</p>"

# Hearing Rehabilitation
ddev wp post create --post_type=page --post_title="Hearing Rehabilitation" --post_name="hearing-rehabilitation" --post_status=publish --post_content="<h1>Hearing Rehabilitation</h1><p>Comprehensive hearing rehabilitation programs to improve communication and quality of life.</p>"

# Appointments
ddev wp post create --post_type=page --post_title="Appointments" --post_name="appointments" --post_status=publish --post_content="<h1>Book an Appointment</h1><p>Schedule your appointment with Trinity Health Zambia for comprehensive healthcare services.</p>"

# Legal Pages
ddev wp post create --post_type=page --post_title="Terms of Service" --post_name="terms-of-service" --post_status=publish --post_content="<h1>Terms of Service</h1><p>Terms and conditions for using Trinity Health Zambia services.</p>"

ddev wp post create --post_type=page --post_title="Accessibility" --post_name="accessibility" --post_status=publish --post_content="<h1>Accessibility</h1><p>Trinity Health Zambia is committed to making our services accessible to all patients.</p>"
```

## Create WordPress Menu

After importing the pages, you'll need to create the WordPress menu:

```bash
# Create the primary navigation menu
ddev wp menu create "Trinity Health Primary Navigation"

# Get the menu ID (it will be returned from the command above)
# Then add items to the menu (replace {menu-id} with the actual ID)

# Add Home
ddev wp menu item add-custom {menu-id} "Home" "/" --position=1

# Add main pages
ddev wp menu item add-post {menu-id} $(ddev wp post list --post_type=page --name=about --format=ids) --position=2
ddev wp menu item add-post {menu-id} $(ddev wp post list --post_type=page --name=services --format=ids) --position=3
ddev wp menu item add-post {menu-id} $(ddev wp post list --post_type=page --name=patient-care --format=ids) --position=4
ddev wp menu item add-post {menu-id} $(ddev wp post list --post_type=page --name=team --format=ids) --position=5
ddev wp menu item add-post {menu-id} $(ddev wp post list --post_type=page --name=contact --format=ids) --position=6

# Assign menu to primary navigation location
ddev wp menu location assign {menu-id} primary_navigation
```

## Features of Created Pages

### Professional Healthcare Content
- Mayo Clinic-inspired clean, trustworthy design
- Comprehensive service descriptions
- Patient-centered language
- Clear calls-to-action

### SEO-Friendly Structure
- Proper heading hierarchy (H1, H2, H3)
- Descriptive content for search engines
- Relevant keywords for healthcare services
- Clean URL structure

### Trinity Health Branding
- Consistent with Trinity Health mission
- Focus on general health + audiology services
- Professional tone appropriate for healthcare
- Zambian healthcare context

## Page Content Overview

Each page includes:
- **Clear headings** and structured content
- **Service descriptions** with benefits and features
- **Contact information** placeholders
- **Call-to-action** sections
- **Professional healthcare language**
- **Mobile-friendly content structure**

## Next Steps

1. **Start DDEV** environment
2. **Import pages** using the SQL files
3. **Create WordPress menu** with the commands above
4. **Customize content** as needed for Trinity Health
5. **Add contact details** and specific information
6. **Test navigation** to ensure all links work

## Customization Notes

- Replace placeholder text like `[Phone Number]` with actual contact details
- Add specific doctor information and qualifications
- Include practice hours and location details
- Add any specific services or treatments offered
- Update insurance and payment information

All pages are designed to work seamlessly with your existing Trinity Health theme and will automatically inherit the professional styling and responsive design.