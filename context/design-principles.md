# Trinity Health Design Principles & Checklist

## MediPro-Inspired Design Patterns

### Key Design Elements from MediPro
- **Animated Typography:** Large headings with letter-spacing animations
- **Geometric Patterns:** Dot grids and decorative circles for visual interest
- **Card-Based Layouts:** Clean white cards with subtle shadows
- **Full-Width Sections:** Alternating background colors for section separation
- **Icon Integration:** Medical icons prominently featured in service cards
- **Progressive Disclosure:** Accordion patterns for FAQs and content
- **Visual Hierarchy:** Clear distinction between primary, secondary, and tertiary content

## I. Core Design Philosophy & Strategy

- [ ] **Patient-Centered:** Prioritize patients' needs, comfort, and accessibility in every design decision
- [ ] **Professional Healthcare:** Convey medical professionalism and expertise while remaining warm and approachable
- [ ] **Trust & Compassion:** Design must inspire trust and communicate genuine care for patient wellbeing
- [ ] **Accessibility First:** Ensure all users, regardless of ability or age, can access healthcare information
- [ ] **Zambian Context:** Consider local internet infrastructure and device capabilities in design choices
- [ ] **Clarity & Simplicity:** Medical information must be clear, avoiding unnecessary jargon
- [ ] **Consistency:** Maintain uniform design language across all pages and components
- [ ] **Mobile-First:** Prioritize mobile experience for users on smartphones
- [ ] **Performance:** Optimize for fast load times on limited bandwidth connections
- [ ] **Cultural Sensitivity:** Respect local culture and healthcare practices in visual and content choices

## II. Design System Foundation (Based on Homepage)

### Color Palette

- [ ] **Primary Colors:**
  - [ ] Trinity Maroon (#A31D1D) - Primary brand color
  - [ ] Trinity Maroon Light (#E5D0AC) - Hover states and accents
  - [ ] Trinity Maroon Dark (#6D2323) - Emphasis and contrast
  
- [ ] **Secondary Colors:**
  - [ ] Trinity Gold (#E5D0AC) - Warm accent color
  - [ ] Trinity Gold Light (#FEF9E1) - Light backgrounds
  - [ ] Trinity Gold Dark (#D4B896) - Medium warm tone
  
- [ ] **Neutral Colors:**
  - [ ] White (#FFFFFF) - Primary text on dark
  - [ ] Gray scale (50-900) - Text and backgrounds
  - [ ] Ensure all combinations meet WCAG AA contrast ratios

### Typography

- [ ] **Font Family:** System UI stack for optimal performance
- [ ] **Type Scale:**
  - [ ] H1: text-3xl md:text-4xl lg:text-6xl (Hero headings)
  - [ ] H2: text-4xl lg:text-5xl (Section headings)
  - [ ] H3: text-xl to text-2xl (Sub-headings)
  - [ ] Body: text-base to text-lg
  - [ ] Small: text-sm
  - [ ] Labels: uppercase, tracking-widest
- [ ] **Font Weights:** Regular (400), Medium (500), Semibold (600), Bold (700)
- [ ] **Line Height:** 1.5-1.7 for optimal readability

### Spacing System

- [ ] **Container:** max-w-7xl with px-6 lg:px-8
- [ ] **Section Padding:** py-16 to py-20
- [ ] **Card Padding:** p-8
- [ ] **Grid Gaps:** gap-6 to gap-16
- [ ] **Component Spacing:** Consistent 4px base unit

### Visual Elements

- [ ] **Border Radius:**
  - [ ] Buttons: rounded-full (pill shape)
  - [ ] Cards: Sharp corners (no radius)
  - [ ] Images: rounded-full for portraits
- [ ] **Shadows:** Subtle elevation on hover (shadow-sm to shadow-lg)
- [ ] **Transitions:** 300ms duration for all interactions

## III. Component Patterns

### Navigation

- [ ] **Header:**
  - [ ] Maroon background with white/gold text
  - [ ] Logo with text on left
  - [ ] Desktop menu with hover states
  - [ ] Mobile hamburger menu
  - [ ] Book Appointment CTA button
  
### Buttons

- [ ] **Primary CTA:**
  - [ ] Gold background with dark text
  - [ ] Rounded-full (pill shape)
  - [ ] Hover: darker gold
  - [ ] Padding: px-8 py-4
  
- [ ] **Secondary CTA:**
  - [ ] Transparent with border
  - [ ] White or gold border/text
  - [ ] Hover: filled background
  
- [ ] **Icon Integration:**
  - [ ] Icons in circular backgrounds
  - [ ] Consistent icon sizing (w-4 to w-6)

### Cards

- [ ] **Service Cards:**
  - [ ] White background
  - [ ] Subtle border (border-gray-100)
  - [ ] Icon at top (w-16 h-16)
  - [ ] Hover: shadow elevation
  - [ ] Full-width CTA button
  
- [ ] **Stats Cards:**
  - [ ] Colored backgrounds (maroon/gold)
  - [ ] Large numbers with labels
  - [ ] Decorative background elements

### Hero Sections

- [ ] **Page Heroes (Inner Pages):**
  - [ ] Full-width background with overlay
  - [ ] Centered title with animated letter spacing
  - [ ] Breadcrumb navigation below title
  - [ ] Minimum height: 300-400px
  - [ ] Background patterns or gradients
  
- [ ] **Homepage Hero:**
  - [ ] Grid layout with text and images
  - [ ] Multi-level typography hierarchy
  - [ ] Circular/oval image masks
  - [ ] Decorative dot patterns
  - [ ] Multiple CTA buttons

### Forms

- [ ] **Input Fields:**
  - [ ] Clear labels
  - [ ] Proper placeholders
  - [ ] Focus states with gold ring
  - [ ] Error messaging
  
- [ ] **Contact Forms:**
  - [ ] Progressive disclosure
  - [ ] Clear privacy messaging
  - [ ] Accessible field grouping

## IV. Page-Specific Requirements

### Homepage

- [ ] Hero section with dual CTAs
- [ ] Stats section with appointment booking
- [ ] Services grid (2-3 columns)
- [ ] About section with image gallery
- [ ] Appointment CTA banner
- [ ] Directory section

### Service Pages

- [ ] Service hero with breadcrumbs
- [ ] Detailed service information
- [ ] Benefits list with icons
- [ ] Team member cards
- [ ] Related services
- [ ] Contact CTA

### About Pages

- [ ] Mission/vision statements
- [ ] Team grid with photos
- [ ] Facility images
- [ ] History timeline
- [ ] Certifications/awards

### Contact Page

- [ ] Contact form
- [ ] Location map
- [ ] Contact information cards
- [ ] Business hours
- [ ] Emergency contacts

## V. Accessibility Requirements

### WCAG Compliance

- [ ] **Color Contrast:**
  - [ ] 4.5:1 for normal text
  - [ ] 3:1 for large text
  - [ ] Test all color combinations
  
- [ ] **Keyboard Navigation:**
  - [ ] All interactive elements accessible
  - [ ] Logical tab order
  - [ ] Skip links for main content
  
- [ ] **Screen Readers:**
  - [ ] Semantic HTML structure
  - [ ] ARIA labels where needed
  - [ ] Alt text for all images
  
- [ ] **Focus Management:**
  - [ ] Visible focus indicators
  - [ ] Focus trapping in modals
  - [ ] Return focus after interactions

### Medical Accessibility

- [ ] Large, readable fonts
- [ ] High contrast mode support
- [ ] Simple, clear language
- [ ] Visual aids for complex information
- [ ] Multiple contact methods

## VI. Performance Optimization

### Load Time Targets

- [ ] First Contentful Paint < 2s
- [ ] Time to Interactive < 4s
- [ ] Total page weight < 2MB
- [ ] Optimized for 3G connections

### Image Optimization

- [ ] WebP format where supported
- [ ] Responsive images with srcset
- [ ] Lazy loading below fold
- [ ] Proper aspect ratios

### Code Optimization

- [ ] Minified CSS/JS
- [ ] Tree-shaken Tailwind CSS
- [ ] Code splitting for routes
- [ ] CDN for static assets

## VII. Responsive Design

### Breakpoints

- [ ] Mobile: < 640px (sm)
- [ ] Tablet: 640px - 1024px (md-lg)
- [ ] Desktop: > 1024px (lg-xl)
- [ ] Wide: > 1280px (xl+)

### Mobile Considerations

- [ ] Touch-friendly tap targets (44x44px minimum)
- [ ] Simplified navigation
- [ ] Stacked layouts
- [ ] Optimized images
- [ ] Reduced animations

### Tablet Adaptations

- [ ] 2-column grids
- [ ] Adjusted typography
- [ ] Hybrid navigation
- [ ] Responsive tables

## VIII. Content Guidelines

### Voice & Tone

- [ ] Professional yet warm
- [ ] Clear and concise
- [ ] Empathetic and caring
- [ ] British English spelling
- [ ] Medical accuracy

### Information Architecture

- [ ] Logical page hierarchy
- [ ] Clear navigation paths
- [ ] Breadcrumb trails
- [ ] Related content links
- [ ] Search functionality

### Medical Content

- [ ] Verified medical information
- [ ] Disclaimers where appropriate
- [ ] Emergency contact prominence
- [ ] Service descriptions
- [ ] Treatment explanations

## IX. Testing Requirements

### Browser Testing

- [ ] Chrome (latest 2 versions)
- [ ] Safari (latest 2 versions)
- [ ] Firefox (latest 2 versions)
- [ ] Edge (latest 2 versions)
- [ ] Mobile Safari/Chrome

### Device Testing

- [ ] iPhone (various sizes)
- [ ] Android phones
- [ ] iPad/tablets
- [ ] Desktop (various resolutions)
- [ ] Test on actual devices when possible

### Accessibility Testing

- [ ] Keyboard-only navigation
- [ ] Screen reader testing (NVDA/JAWS)
- [ ] Color blindness simulation
- [ ] Zoom to 200% functionality

### Performance Testing

- [ ] Lighthouse audits
- [ ] Network throttling tests
- [ ] Real device testing
- [ ] Load time monitoring

## X. Quality Assurance Checklist

### Before Launch

- [ ] All pages responsive
- [ ] Forms tested and working
- [ ] Contact information accurate
- [ ] Maps and directions correct
- [ ] Social media links active
- [ ] SSL certificate installed
- [ ] Analytics configured
- [ ] SEO meta tags complete
- [ ] Sitemap generated
- [ ] 404 page designed

### Post-Launch

- [ ] Monitor performance metrics
- [ ] Collect user feedback
- [ ] Track conversion rates
- [ ] Regular content updates
- [ ] Security updates
- [ ] Backup procedures
- [ ] Uptime monitoring

---

This checklist should be reviewed throughout the development process to ensure the Trinity Health website meets the highest standards of healthcare web design while serving the Zambian community effectively.