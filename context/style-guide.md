# Trinity Health Style Guide

## Brand Identity

**Tagline:** "Expert Care For Your Health Needs"  
**Mission:** Deliver the highest quality healthcare services with a focus on accessibility and excellence

## Color Palette

### Primary Colors

- **Trinity Maroon** (#A31D1D): Primary brand color - modern flat maroon for web
  - *Original Brand Color:* #880005 (deep traditional maroon, preserved in CSS variables)
- **Trinity Maroon Light** (#E5D0AC): Warm accent for hover states  
- **Trinity Maroon Dark** (#6D2323): Deep maroon for emphasis

### Secondary Colors

- **Trinity Gold** (#E5D0AC): Warm gold accent color
- **Trinity Gold Light** (#FEF9E1): Light cream background
- **Trinity Gold Dark** (#D4B896): Medium warm tone

### Neutral Colors

- **White** (#FFFFFF): Primary text on dark backgrounds
- **Gray 50** (#fafafa): Lightest gray for subtle backgrounds
- **Gray 100** (#f5f5f5): Light gray for borders
- **Gray 200** (#e5e5e5): Secondary text on light
- **Gray 600** (#525252): Body text on light backgrounds  
- **Gray 800** (#262626): Dark text on light backgrounds
- **Black** (#000000): High contrast text

## Typography

### Font Families

- **Primary Font:** System UI stack (system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif)
- **Serif Font:** UI Serif stack (ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif)

### Font Sizes & Hierarchy

- **Hero Heading (H1):** text-3xl md:text-4xl lg:text-6xl (bold)
- **Section Heading (H2):** text-4xl lg:text-5xl (bold)
- **Sub-heading (H3):** text-xl to text-2xl (bold/semibold)
- **Body Large:** text-lg (regular)
- **Body Regular:** text-base (regular)
- **Small Text:** text-sm (regular)
- **Uppercase Labels:** text-base md:text-lg (tracking-widest, uppercase, medium weight)

## Spacing System

### Container & Layout

- **Max Width:** max-w-7xl (1280px)
- **Page Padding:** px-6 lg:px-8
- **Section Padding:** py-16 to py-20 (mobile: py-12)

### Component Spacing

- **Card Padding:** p-8
- **Button Padding:** px-6-8 py-3-4
- **Grid Gaps:** gap-6 to gap-16
- **Inline Spacing:** space-x-4 to space-x-8
- **Vertical Spacing:** space-y-4 to space-y-8

## Component Patterns

### Buttons

#### Primary CTA Button

```html
class="bg-trinity-gold text-gray-800 px-8 py-4 rounded-full font-semibold hover:bg-trinity-gold-dark transition-all duration-300"
```

#### Secondary CTA Button

```html
class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-trinity-maroon transition-all duration-300"
```

#### Icon Button

```html
class="inline-flex items-center justify-center"
<!-- With icon circle -->
<div class="w-6 h-6 bg-[color] rounded-full flex items-center justify-center mr-2">
  <i data-lucide="[icon]" class="w-4 h-4"></i>
</div>
```

### Cards

#### Service Card

- **Container:** bg-white p-8 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow duration-300
- **Icon:** w-16 h-16 mb-6
- **Title:** text-xl font-bold text-trinity-maroon-dark mb-4
- **Description:** text-gray-600 mb-8 leading-relaxed
- **CTA:** Full-width button with icon

#### Stats Card

- **Background:** bg-trinity-maroon or bg-trinity-gold
- **Text Color:** text-white or text-gray-800
- **Padding:** p-8
- **Decoration:** Circular background elements with opacity

### Hero Section

- **Background:** bg-trinity-maroon
- **Layout:** Grid with text content and image gallery
- **Typography:** Multi-level hierarchy with gold accent
- **Images:** Circular/oval masks with overlapping arrangement
- **Decorative Elements:** Dot pattern grid

### Navigation Header

- **Background:** bg-trinity-maroon with border-b border-white/15
- **Logo:** White version with text
- **Menu Items:** text-white hover:text-trinity-gold-light
- **CTA Button:** Border style with gold accent

### Footer

- **Background:** bg-trinity-maroon
- **Text:** text-white with trinity-gold accents for headings
- **Links:** hover:text-trinity-gold-light transition
- **Newsletter:** Integrated form with gold button

## Icon Library

**Primary:** Lucide Icons (via CDN)

- Consistent sizing: w-4 h-4 (small), w-5 h-5 (medium), w-6 h-6 (large)
- Common icons: arrow-right, calendar, play, check, menu, map-pin, mail, phone, clock

**Custom SVGs:** Medical service icons with consistent 100x100 viewBox

## Animation & Transitions

### Standard Transitions

- **Duration:** transition-all duration-300
- **Hover Effects:** Color changes, shadow elevation
- **Focus States:** ring-2 ring-trinity-gold with ring-offset

### Custom Animations

- **Fade In:** opacity transition
- **Slide Up:** transform translateY animation
- **Scale:** transform scale on hover

## Accessibility Guidelines

### Color Contrast

- Maintain WCAG AA compliance (4.5:1 for normal text, 3:1 for large text)
- Trinity maroon on white: ✓ Passes
- White on trinity maroon: ✓ Passes
- Gray-600 on white: ✓ Passes

### Interactive Elements

- Minimum touch target: 44x44px
- Focus indicators on all interactive elements
- Keyboard navigation support
- Screen reader text for icons

### Responsive Design

- Mobile-first approach
- Breakpoints: sm (640px), md (768px), lg (1024px), xl (1280px)
- Fluid typography scaling
- Stackable grid layouts

## Layout Patterns

### Grid Systems

- **Service Grid:** 1 column mobile, 2-3 columns desktop
- **Stats Grid:** 1 column mobile, 3 columns desktop
- **Hero Grid:** Stacked mobile, 2 columns desktop

### Section Structure

1. Background color/pattern
2. Container with max-width and padding
3. Optional section label (uppercase, tracked)
4. Main heading
5. Supporting content
6. CTA elements

## Best Practices

### Content Guidelines

- Use British English spelling
- Professional, caring tone
- Clear, concise messaging
- Focus on patient benefits

### Image Guidelines

- High-quality medical/healthcare imagery
- Diverse representation
- Optimized for web (WebP format preferred)
- Circular/oval masks for portraits

### Performance

- Lazy load images below fold
- Optimize SVG icons
- Minimize CSS bundle size
- Use system fonts for fast loading

## Component States

### Hover States

- Buttons: Background/text color change
- Cards: Shadow elevation increase
- Links: Color transition to gold

### Active/Focus States

- Ring outline with trinity-gold
- Increased contrast
- Clear visual indicator

### Disabled States

- Reduced opacity (0.5)
- Cursor not-allowed
- No hover effects
