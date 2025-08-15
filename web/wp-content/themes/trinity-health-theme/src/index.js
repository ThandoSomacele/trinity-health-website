/**
 * Trinity Health Theme Main JavaScript
 * 
 * Entry point for all frontend JavaScript functionality
 */

// Import main styles
import '../assets/css/src/index.scss';

// Import accordion-js library
import Accordion from 'accordion-js';
import 'accordion-js/dist/accordion.min.css';

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('Trinity Health Theme loaded successfully');
    
    // Initialize theme functionality
    initMobileMenu();
    initSmoothScrolling();
    initContactForms();
    initFAQAccordion();
});

/**
 * Mobile menu functionality
 */
function initMobileMenu() {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            // Toggle the hidden class instead of active
            mobileMenu.classList.toggle('hidden');
            
            // Update aria-expanded based on visibility
            const isExpanded = !mobileMenu.classList.contains('hidden');
            menuToggle.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!menuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Close mobile menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.focus();
            }
        });
    }
}

/**
 * Smooth scrolling for anchor links
 */
function initSmoothScrolling() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Contact form enhancements
 */
function initContactForms() {
    const contactForms = document.querySelectorAll('.trinity-contact-form');
    
    contactForms.forEach(form => {
        form.addEventListener('submit', function() {
            // Add loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }
        });
    });
}

/**
 * Initialize FAQ Accordion using accordion-js library
 */
function initFAQAccordion() {
    const accordionContainer = document.querySelector('#faq-accordion');
    
    if (accordionContainer) {
        console.log('Initializing accordion...', accordionContainer);
        
        try {
            new Accordion('#faq-accordion', {
                duration: 300,
                ariaEnabled: true,
                collapse: true,
                showMultiple: false,
                onOpen: function(currentElement) {
                    console.log('Accordion opened:', currentElement);
                    // Change icon to minus when opened
                    const icon = currentElement.querySelector('[data-lucide]');
                    if (icon) {
                        icon.setAttribute('data-lucide', 'minus');
                        if (window.lucide) {
                            window.lucide.createIcons();
                        }
                    }
                },
                onClose: function(currentElement) {
                    console.log('Accordion closed:', currentElement);
                    // Change icon to plus when closed
                    const icon = currentElement.querySelector('[data-lucide]');
                    if (icon) {
                        icon.setAttribute('data-lucide', 'plus');
                        if (window.lucide) {
                            window.lucide.createIcons();
                        }
                    }
                }
            });
            console.log('Accordion initialized successfully');
        } catch (error) {
            console.error('Error initializing accordion:', error);
        }
    } else {
        console.log('Accordion container not found');
    }
}