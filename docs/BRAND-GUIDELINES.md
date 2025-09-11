# Trinity Health - Brand Guidelines

## Brand Identity

**Company:** Trinity Health Zambia  
**Tagline:** "Expert Care For Your Health Needs"  
**Industry:** Healthcare & Medical Services  
**Specialization:** General Health Services & Audiology

## Color System

### Brand Evolution
The Trinity Health color palette has evolved from traditional healthcare colors to a modern, accessible web palette while preserving brand heritage.

### Primary Brand Colors

#### Current Web Palette
- **Primary Maroon** `#A31D1D` 
  - Modern flat UI maroon
  - Used for primary buttons, headers, brand elements
  - RGB: 163, 29, 29
  - Tailwind: `text-trinity-primary`

- **Original Maroon** `#880005`
  - Traditional deep maroon
  - Preserved in CSS variables as `--trinity-primary`
  - Used for legacy compatibility
  - RGB: 136, 0, 5

#### Supporting Colors
- **Maroon Light** `#E5D0AC`
  - Warm accent color
  - Hover states and highlights
  - RGB: 229, 208, 172
  - Tailwind: `text-trinity-primary-light`

- **Maroon Dark** `#6D2323`
  - Deep emphasis color
  - High contrast elements
  - RGB: 109, 35, 35
  - Tailwind: `text-trinity-primary-dark`

- **Background Cream** `#FEF9E1`
  - Warm cream background
  - Soft, welcoming feel
  - RGB: 254, 249, 225
  - Tailwind: `bg-trinity-background`

### Usage Guidelines

#### When to Use Original vs Modern Colors
- **Original (#880005)**: Print materials, official documents, legacy systems
- **Modern (#A31D1D)**: Web interfaces, digital marketing, mobile apps

#### Color Accessibility
All color combinations meet WCAG AA standards:
- Primary on white: 7.59:1 contrast ratio ✓
- White on primary: 7.59:1 contrast ratio ✓
- Dark on cream: 12.63:1 contrast ratio ✓

## Typography

### Primary Font Stack
```css
font-family: system-ui, -apple-system, BlinkMacSystemFont, 
             'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 
             'Open Sans', 'Helvetica Neue', sans-serif;
```

### Font Hierarchy
- **H1 (Hero)**: 3xl-6xl, Bold, Maroon
- **H2 (Section)**: 4xl-5xl, Bold, Dark Gray
- **H3 (Subsection)**: xl-2xl, Semibold, Dark Gray
- **Body**: base-lg, Regular, Gray-600
- **Small**: sm, Regular, Gray-500

## Logo Usage

### Logo Versions
- **Primary**: Full color on light backgrounds
- **White**: For dark backgrounds
- **Black**: For single-color applications

### Clear Space
Maintain minimum clear space equal to the height of the 'T' in Trinity around all sides of the logo.

### Minimum Size
- Digital: 120px width minimum
- Print: 1 inch width minimum

## Voice & Tone

### Brand Personality
- **Professional**: Medical expertise and reliability
- **Compassionate**: Patient-centered care
- **Accessible**: Clear, jargon-free communication
- **Trustworthy**: Transparent and honest

### Writing Style
- Use British English spelling
- Active voice preferred
- Short, clear sentences
- Avoid medical jargon when possible
- Always include Zambian context

### Common Phrases
- "Expert Care For Your Health Needs" (tagline)
- "Your health, our priority"
- "Comprehensive healthcare solutions"
- "State-of-the-art medical facilities"

## Implementation in Code

### Tailwind Configuration
```javascript
colors: {
  'trinity': {
    'primary': '#A31D1D',
    'primary-light': '#E5D0AC',
    'primary-dark': '#6D2323',
    'background': '#FEF9E1',
    'maroon': '#A31D1D',
    'gold': '#E5D0AC',
  }
}
```

### CSS Variables
```css
:root {
  --trinity-primary: #880005; /* Original brand color */
  --trinity-primary-modern: #A31D1D; /* Web optimized */
  --trinity-accent: #E5D0AC;
  --trinity-dark: #6D2323;
  --trinity-background: #FEF9E1;
}
```

### SCSS Usage
```scss
// Brand colors
$trinity-primary: #A31D1D;
$trinity-primary-original: #880005;
$trinity-accent: #E5D0AC;
$trinity-dark: #6D2323;
$trinity-background: #FEF9E1;

// Usage example
.brand-element {
  background-color: $trinity-primary;
  color: white;
  
  &:hover {
    background-color: $trinity-dark;
  }
}
```

## Visual Elements

### Border Radius
- Buttons: `rounded-lg` (8px)
- Cards: `rounded-xl` (12px)
- Images: `rounded-lg` or `rounded-xl`
- Small elements: `rounded` (4px)

### Shadows
- Small: `shadow-sm`
- Default: `shadow`
- Medium: `shadow-md`
- Large: `shadow-lg`
- Extra Large: `shadow-xl`

### Spacing
- Use consistent spacing multiples of 4px
- Section padding: `py-12` to `py-20`
- Container padding: `px-4` mobile, `px-6` desktop
- Element spacing: `space-y-4` to `space-y-8`

## Icons & Imagery

### Icon Style
- Line icons preferred (Heroicons, Lucide)
- Consistent 1.5-2px stroke width
- Brand colors for interactive icons
- Gray for informational icons

### Photography Guidelines
- Professional, high-quality medical imagery
- Diverse representation of Zambian population
- Warm, welcoming environments
- Natural lighting preferred
- Avoid stock photos that look generic

### Medical Icons Used
- Stethoscope: General medicine
- Hearing aid: Audiology services
- Microscope: Laboratory
- Heart: Cardiology
- Brain: Neurology
- Child: Pediatrics

## Digital Applications

### Buttons
- Primary: Maroon background, white text
- Secondary: White background, maroon text, maroon border
- Hover: Darker shade or opacity change
- Disabled: Gray background, reduced opacity

### Forms
- Input borders: Gray-300
- Focus state: Maroon border
- Error state: Red-500 border
- Success state: Green-500 border

### Navigation
- Desktop: White background, maroon accents
- Mobile: Slide-in menu with maroon header
- Active states: Maroon text or underline

## Do's and Don'ts

### Do's ✓
- Use brand colors consistently
- Maintain color contrast for accessibility
- Apply the tagline on marketing materials
- Use professional medical imagery
- Keep designs clean and uncluttered

### Don'ts ✗
- Don't alter brand colors
- Don't use low-quality images
- Don't overcrowd layouts
- Don't use conflicting color schemes
- Don't modify the logo proportions

## Contact

For brand-related questions or asset requests, contact the Trinity Health marketing team.

---

*Last Updated: September 2025*  
*Version: 2.0 (Web-optimized palette)*