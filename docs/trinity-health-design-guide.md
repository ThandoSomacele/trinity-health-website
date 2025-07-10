# Trinity Health Design & UI Layout Guide

## Design Philosophy
**Inspiration**: Mayo Clinic's clean, trustworthy healthcare aesthetic adapted for Trinity Health's Zambian practice
**Key Principle**: Clinical precision meets warm, accessible patient care

---

## Visual Identity System

### Brand Colours
- **Primary**: `#880005` (Trinity Maroon) - Trust, professionalism, medical authority
- **Secondary**: `#f8f9fa` (Clinical White) - Cleanliness, clarity, medical precision  
- **Accent**: `#6c757d` (Professional Grey) - Supporting information, subtle elements
- **Healthcare Navy**: `#1e3a8a` - Medical expertise, reliability
- **Healthcare Green**: `#059669` - Health, wellness, positive outcomes

### Text Color Standards
- **All text on Trinity brand colors MUST be white** (`text-white`)
- **Primary brand background** (`bg-[#880005]`) → Always use `text-white`
- **Healthcare Navy background** (`bg-[#1e3a8a]`) → Always use `text-white`
- **Healthcare Green background** (`bg-[#059669]`) → Always use `text-white`
- **Dark backgrounds** (gray-900, etc.) → Always use `text-white`
- **Light backgrounds** (white, gray-50) → Use `text-gray-900` or `text-gray-600`

### Layout Spacing Standards (MANDATORY)
- **2-Column Layouts**: `gap-12` (48px) for main content columns and side-by-side sections
- **3-Column Layouts**: `gap-8` (32px) for service grids and card layouts
- **4-Column Layouts**: `gap-8` (32px) for statistics and feature grids
- **RULE**: ALL layouts MUST match home page spacing patterns exactly
- **Consistent Spacing**: Follow home page gap values - never deviate from established patterns
- **Section Padding**: `py-20` (80px) standard for main content sections
- **Hero Sections**: `py-16` (64px) for balanced top/bottom padding
- **Internal Elements**: `gap-6` for small stat grids, `gap-4` for button groups

### Icon Color Standards (MANDATORY)
- **ALL ICONS MUST USE TRINITY BRAND COLOR ONLY**: `bg-[#880005]/10` + `text-[#880005]`
- **Service Card Icons**: ALWAYS use Trinity primary red for stroke and background
- **No Multi-Color Icons**: All service card icons must be uniform Trinity red
- **Standard Pattern**: `bg-[#880005]/10` background + `text-[#880005]` stroke color
- **Hover States**: Background opacity increases to `/20` on hover (`bg-[#880005]/20`)
- **Icon Size**: `w-8 h-8` standard for service card icons
- **RULE**: First icon color scheme applies to ALL subsequent icons in the same section

### Typography Hierarchy
**Font Family**: Inter (Google Fonts) - Modern, readable, professional
```css
h1: 3rem (48px) - Page heroes, main headlines
h2: 2.25rem (36px) - Section headers, service categories  
h3: 1.875rem (30px) - Subsection headers, card titles
h4: 1.5rem (24px) - Component headers, form labels
h5: 1.25rem (20px) - Supporting headers, list items
h6: 1.125rem (18px) - Small headers, metadata
Body: 1rem (16px) - Optimal medical content readability
```

---

## Layout Patterns (Based on Inspiration Analysis)

### 1. Hero Sections
**Mayo Clinic Style** (Image 6 Reference):
- **Full-width background image/video** with professional overlay
- **Prominent headline** (h1) with medical focus
- **Subtitle** describing expertise/specialisation  
- **Primary CTA button** ("Book Appointment", "Learn More")
- **Breadcrumb navigation** for deeper pages
- **Clean white text** on dark overlay for accessibility

### 2. Service Grid Layouts
**Starkey Foundation Style** (Images 1-2 Reference):
- **3-column grid** on desktop (2-col tablet, 1-col mobile)
- **Card-based design** with consistent spacing
- **Icon + Title + Description + CTA** structure
- **Hover effects** with subtle elevation and Trinity brand colours
- **Equal height cards** with flex layouts

### 3. Impact/Statistics Sections  
**Mayo Clinic Metrics Style** (Image 5 Reference):
- **Large number displays** (R1779.36M style typography)
- **Supporting descriptive text** below metrics
- **Icon accompaniment** for visual hierarchy
- **2-3 column layout** with generous white space
- **Professional background colours** (Trinity primary or clinical white)

### 4. Data Visualisation
**Starkey Charts Style** (Image 3 Reference):
- **Clean, medical-grade charts** for patient outcomes
- **Trinity brand colour palette** in data representation
- **Accompanying explanatory text** below visualisations
- **Mobile-responsive chart scaling**
- **Professional grid backgrounds** and axis styling

### 5. Content Cards System
**Mayo Clinic Resources Style** (Image 4 Reference):
- **6-card grid layout** (3x2 on desktop)
- **Icon + Title + Description** format
- **Consistent card heights** and spacing
- **Subtle shadows** and hover animations
- **Professional colour coding** by service category

---

## Component Specifications

### Navigation System
**Mayo Clinic Inspired**:
- **80px fixed height** header with centered elements
- **Mega menu** for Services dropdown (3-column categorisation)
- **Trinity logo** positioned left
- **Primary navigation** center-aligned
- **"Book Appointment" CTA** prominently right-aligned
- **Sticky behaviour** with subtle shadow on scroll

### Button System (Already Implemented)
```css
Primary: Trinity maroon (#880005) - Main actions
Secondary: Outlined Trinity maroon - Alternative actions  
Ghost: Text-only Trinity maroon - Subtle interactions
Healthcare: Navy (#1e3a8a) - Medical-specific actions
Light: White on dark backgrounds - Hero CTAs
```

### Card Components
**Service Cards**:
- **Consistent 16:9 aspect ratio** for featured images
- **24px padding** internal spacing

### Image Placeholder Standards
**Standard UI Image Placeholders** (Industry Best Practice):
- **Charcoal grey background**: `bg-slate-700` - Dark charcoal for professional appearance
- **Small white icon**: `w-10 h-10 text-white` - Clean, minimal size
- **Icon type**: Standard image placeholder icon (mountain/photo symbol)
- **Container styling**: `rounded-2xl overflow-hidden` to match Trinity Health design language
- **Center alignment**: `flex items-center justify-center` for perfect centering
- **Standard aspect ratios**: `aspect-[4/3]` for landscapes, `aspect-[3/4]` for portraits, `aspect-square` for squares
- **No additional decorative elements** - Just charcoal grey block with centered white icon
- **No text labels or borders** - Minimal, industry-standard approach
- **Trinity card shadow** for elevation
- **Hover transform: translateY(-2px)** for interactivity
- **Icon + Title + Description + Price + CTA** structure

**Team Member Cards**:
- **Square profile images** (1:1 aspect ratio)
- **Professional credentials** prominently displayed
- **Qualifications list** with bullet points
- **Contact information** clearly accessible

### Form Layouts
**Healthcare-Focused Design**:
- **Generous field spacing** (16px margins)
- **Clear field labels** with required indicators
- **Trinity primary colour** for focus states
- **Accessible error messaging** with clear instructions
- **Multi-step forms** for complex medical questionnaires

---

## Page-Specific Layouts

### Homepage
1. **Hero Section**: Video background + headline + CTA
2. **Services Overview**: 3-column grid with hover effects  
3. **About Dr. Mwamba**: Image + text layout with credentials
4. **Patient Testimonials**: Carousel with professional styling
5. **Contact CTA**: Full-width Trinity maroon background

### Service Pages  
1. **Service Hero**: Background image + service details
2. **Service Description**: Two-column text + benefits list
3. **Pricing Information**: Clean table or card layout
4. **Related Services**: 3-card horizontal layout
5. **Appointment CTA**: Sticky bottom or section

### About Pages
1. **Team Hero**: Group photo or individual portraits
2. **Individual Profiles**: Card grid layout (2-3 columns)
3. **Qualifications**: Icon-based list layouts
4. **Practice History**: Timeline or milestone format

---

## Responsive Breakpoints

### Mobile (320px - 767px)
- **Single column layouts** for all content
- **Stacked navigation** (hamburger menu)
- **Touch-friendly buttons** (min 44px tap targets)
- **Compressed hero text** sizing

### Tablet (768px - 1023px)  
- **2-column grids** for service cards
- **Horizontal navigation** with condensed spacing
- **Medium button sizes** and typography scaling

### Desktop (1024px+)
- **3-column layouts** for optimal content density
- **Full mega menu** functionality  
- **Large typography scaling** for impact
- **Hover effects** and micro-interactions

---

## Accessibility Standards

### WCAG 2.1 AA Compliance
- **4.5:1 contrast ratio** minimum for all text
- **Keyboard navigation** for all interactive elements  
- **Screen reader compatibility** with proper ARIA labels
- **Focus indicators** clearly visible with Trinity colours
- **Alternative text** for all medical imagery

### Healthcare-Specific Considerations
- **Medical terminology** tooltips for patient education
- **Multiple language support** for Zambian demographics  
- **Clear emergency contact** information always accessible
- **Print-friendly** layouts for patient forms and information

---

## Implementation Guidelines

### Sage v11 + Tailwind CSS v4 Integration
```php
// Component structure for consistency
@include('partials.hero', ['type' => 'service', 'background' => $featured_image])
@include('partials.service-grid', ['columns' => 3, 'services' => $services])
@include('partials.cta-section', ['style' => 'primary', 'background' => 'trinity'])
```

### Performance Considerations
- **Optimised images**: WebP format with fallbacks
- **Lazy loading**: For below-fold content and images
- **Critical CSS**: Inline for above-fold content
- **Modular components**: Reusable Blade partials for consistency

---

## Content Strategy

### Medical Content Hierarchy
1. **Patient-first language** - Clear, non-technical explanations
2. **Professional credentials** - Building trust and authority  
3. **Service benefits** - Focus on patient outcomes
4. **Pricing transparency** - Clear ZMK pricing where appropriate
5. **Emergency information** - Always accessible and prominent

### Visual Content Guidelines
- **Professional medical photography** - Clean, clinical environments
- **Diverse patient representation** - Reflecting Zambian demographics
- **Equipment and facility images** - Showcasing modern medical technology
- **Team photography** - Professional, approachable healthcare providers
- **Infographics** - Complex medical information made accessible

This design system ensures Trinity Health maintains Mayo Clinic's professional healthcare aesthetic while adapting to local Zambian context and Dr. Mwamba's personalised medical practice approach.