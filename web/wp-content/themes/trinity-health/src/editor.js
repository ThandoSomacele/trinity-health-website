/**
 * Trinity Health Theme Block Editor JavaScript
 * 
 * Block editor enhancements and customizations
 */

// Import block editor styles
import '../assets/css/src/editor.scss';

// DOM Ready for block editor
wp.domReady(function() {
    console.log('Trinity Health Block Editor loaded');
    
    // Add custom block styles
    wp.blocks.registerBlockStyle('core/quote', {
        name: 'trinity-highlight',
        label: 'Trinity Highlight',
        className: 'is-style-trinity-highlight'
    });
    
    wp.blocks.registerBlockStyle('core/button', {
        name: 'trinity-primary',
        label: 'Trinity Primary',
        className: 'is-style-trinity-primary'
    });
    
    wp.blocks.registerBlockStyle('core/button', {
        name: 'trinity-outline',
        label: 'Trinity Outline',
        className: 'is-style-trinity-outline'
    });
});