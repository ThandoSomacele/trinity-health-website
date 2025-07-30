/**
 * Trinity Health Theme Main JavaScript
 * 
 * Entry point for all frontend JavaScript functionality
 */

// Import main styles
import '../assets/css/src/index.scss';

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('Trinity Health Theme loaded successfully');
    
    // Initialize theme functionality
    initMobileMenu();
    initSmoothScrolling();
    initContactForms();
});

/**
 * Mobile menu functionality
 */
function initMobileMenu() {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            menuToggle.setAttribute('aria-expanded', 
                mobileMenu.classList.contains('active') ? 'true' : 'false'
            );
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
        form.addEventListener('submit', function(e) {
            // Add loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }
        });
    });
}