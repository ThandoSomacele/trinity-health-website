# Trinity Health Flexible Content System

## Overview

The Trinity Health website now uses a flexible content management system that separates **styling/layout** (controlled by theme code) from **content** (editable via WordPress admin). This approach gives you:

- ✅ **Consistent Design**: All pages follow Trinity Health design standards automatically
- ✅ **Easy Content Updates**: Change text, images, and layout options via WordPress admin
- ✅ **Block Editor Integration**: Use WordPress's visual editor for rich content
- ✅ **Component Reusability**: Same components work across different page types

## How It Works

### 1. **Components** (`/resources/views/components/`)
Reusable layout blocks that pull content from Custom Fields or provide sensible defaults:

- `hero-section.blade.php` - Hero sections with title, description, CTA buttons, media
- `services-grid.blade.php` - Service listings in 2/3/4 column layouts  
- `content-section.blade.php` - Text content with flexible layouts
- `cta-section.blade.php` - Call-to-action sections with customizable styles
- `about-doctor-section.blade.php` - Doctor profile section with features

### 2. **Custom Fields** (Advanced Custom Fields - ACF)
WordPress admin interface for editing content without touching code:

- **Hero Section**: Title, description, media, button text/links, stats
- **Services Section**: Grid layout, custom services or auto-pull from CPTs
- **Content Section**: Layout options, images, features lists
- **About Doctor**: Profile info, qualifications, images
- **CTA Section**: Background styles, button configurations

### 3. **Templates** (`/resources/views/`)
Page templates that combine components:

- `front-page.blade.php` - Homepage using all components
- `page.blade.php` - Default pages with optional components
- `template-flexible.blade.php` - Custom template for maximum flexibility

## Content Editing Workflow

### For Homepage Content:
1. **WordPress Admin** → **Pages** → **Homepage**
2. **Custom Fields tabs appear below the editor**:
   - **Hero Section**: Edit hero title, description, buttons, video/image
   - **Services Section**: Customize service grid, add/edit services
   - **About Doctor**: Update doctor info, features, image
   - **Call-to-Action**: Change CTA text, buttons, background style

### For Other Pages:
1. **WordPress Admin** → **Pages** → **Your Page**
2. **Choose layout options in Custom Fields**:
   - Content layout (full-width, two-column, image-left/right)
   - Optional hero section
   - Optional services grid
   - Optional CTA section
3. **Use Block Editor for main content**
4. **Custom Fields control design/layout**

### For Service Pages:
1. **WordPress Admin** → **Health Services** or **Audiology Services**
2. **Standard WordPress editor for content**
3. **Service Details Custom Fields**:
   - Service icon selection
   - Pricing (ZMK)
   - Duration
   - Feature lists

## Available Layouts & Options

### Hero Section Options:
- **Media Type**: Video or Image
- **Button Configuration**: Primary + secondary CTA buttons
- **Stats Card**: Patient numbers, achievements
- **Background**: Gradient, solid colors

### Services Grid Options:
- **Layout**: 2, 3, or 4 columns
- **Data Source**: Custom fields OR auto-pull from Custom Post Types
- **Custom Services**: Manual service entry with icons, descriptions, links

### Content Section Options:
- **Layout**: Full-width, two-column, image-left, image-right
- **Background**: White, gray, Trinity maroon, navy
- **Features List**: Checkmark lists for highlights
- **Images**: Featured images with placeholders

### CTA Section Options:
- **Background Styles**: Trinity maroon, navy, light gray, gradient
- **Button Styles**: Automatically adjust based on background
- **Dual CTAs**: Primary and secondary actions

## Design Standards (Automatically Applied)

### Colors:
- **Trinity Primary**: `#880005` (maroon)
- **Healthcare Navy**: `#1e3a8a` 
- **Text Rule**: White text on brand colors, gray text on light backgrounds

### Spacing:
- **2-column grids**: `gap-12`
- **3-column grids**: `gap-8` 
- **4-column grids**: `gap-8`

### Icons:
- **Service cards**: Trinity brand color backgrounds (`bg-[#880005]/10`)
- **Icon colors**: Trinity maroon (`text-[#880005]`)

### Typography:
- **Headings**: Inter font, healthcare hierarchy
- **Body text**: Professional, accessible contrast ratios

## Block Editor Integration

The system works seamlessly with WordPress's Block Editor:

1. **Main content** goes in the Block Editor (paragraphs, lists, images, etc.)
2. **Layout and design** controlled by Custom Fields
3. **Component styling** handled automatically by theme

Example workflow:
1. Write your page content in Block Editor
2. Set layout to "image-left" in Custom Fields  
3. Upload featured image in Custom Fields
4. Choose background color in Custom Fields
5. **Result**: Professional layout with your content

## Advanced Usage

### Custom Service Grids:
Instead of using Custom Post Types, manually create services in Custom Fields:
- Add services via "Featured Services" repeater
- Choose icons from predefined options
- Set custom URLs and button text

### Flexible Page Templates:
- **Default Template**: Basic content with optional components
- **Flexible Template**: Maximum customization options
- **Homepage Template**: All components with homepage-specific defaults

### Component Combinations:
Mix and match components per page:
- Hero + Content + CTA (landing pages)
- Services + Content (service overview pages)  
- Content only (simple pages)
- Hero + Services + About + CTA (homepage)

## Benefits for Content Editors

### No Code Required:
- All content editing via familiar WordPress interface
- Visual Custom Fields with clear labels
- Dropdown options for design choices

### Consistent Results:
- Trinity Health branding applied automatically
- Responsive design built-in
- Professional layouts guaranteed

### Flexible Content:
- Mix WordPress Block Editor with Custom Fields
- Easy image uploads and management
- Button and link management

### Future-Proof:
- Add new components without breaking existing content
- Update design standards site-wide from theme code
- Content preserved during design updates

## Technical Notes

### Fallback System:
Components gracefully handle missing content:
- Default text when Custom Fields empty
- Placeholder images for missing media
- Hide sections when no content provided

### Performance:
- Conditional loading (sections only load if content exists)
- Optimized queries for Custom Post Types
- Minimal database overhead

### Extensibility:
- Easy to add new Custom Fields
- Component system allows new layouts
- Backward compatible with existing content

This system gives you the best of both worlds: professional, consistent design with easy content management.