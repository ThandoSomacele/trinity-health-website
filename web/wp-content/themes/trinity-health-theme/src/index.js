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

// Import Lottie for animations
import lottie from 'lottie-web';

// Import and initialize navigation functionality (mobile menu)
import initNavigation from '../assets/js/src/navigation.js';

// Mobile device detection
function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth <= 768;
}

// Simplified mobile touch support to avoid conflicts
function addMobileTouchSupport() {
    if (isMobile()) {
        console.log('Adding simplified mobile touch support...');
        
        // Basic mobile optimizations without interfering with Swiper
        document.documentElement.style.touchAction = 'manipulation';
        
        // Improve accordion touch handling only
        const accordionTriggers = document.querySelectorAll('.ac-trigger');
        accordionTriggers.forEach(trigger => {
            trigger.style.cursor = 'pointer';
            trigger.style.touchAction = 'manipulation';
            trigger.style.webkitTapHighlightColor = 'rgba(0,0,0,0.1)';
            
            // Add visual feedback for touch
            trigger.addEventListener('touchstart', function() {
                this.style.opacity = '0.7';
                console.log('Accordion trigger touched');
            }, { passive: true });
            
            trigger.addEventListener('touchend', function() {
                this.style.opacity = '1';
            }, { passive: true });
            
            trigger.addEventListener('click', function() {
                console.log('Accordion trigger clicked on mobile');
            });
        });
        
        console.log('Mobile touch support added for accordion only');
    }
}

// Initialize loading spinner
function initLoadingSpinner() {
    const loaderElement = document.getElementById('lottie-spinner');
    const loader = document.getElementById('trinity-loader');
    
    if (loaderElement && loader) {
        // Load Lottie animation
        const animation = lottie.loadAnimation({
            container: loaderElement,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/wp-content/themes/trinity-health-theme/assets/animations/loading-spinner.json'
        });
        
        // Hide loader after page loads
        const hideLoader = () => {
            loader.classList.add('fade-out');
            document.body.classList.add('loaded');
            
            // Remove loader from DOM after transition
            setTimeout(() => {
                if (loader && loader.parentNode) {
                    loader.parentNode.removeChild(loader);
                }
            }, 500);
        };
        
        // Hide loader when everything is ready
        if (document.readyState === 'complete') {
            setTimeout(hideLoader, 500); // Small delay to show the animation
        } else {
            window.addEventListener('load', () => {
                setTimeout(hideLoader, 500);
            });
        }
    }
}

// Main initialization function
function initializeTheme() {
    // Prevent multiple initializations
    if (window.themeInitialized) {
        console.log('Theme already initialized, skipping...');
        return;
    }
    window.themeInitialized = true;
    
    console.log('Trinity Health Theme initializing...');
    console.log('Is mobile device:', isMobile());
    
    // Add mobile-specific enhancements
    addMobileTouchSupport();
    
    // Initialize navigation (mobile menu) with a small delay to ensure DOM is ready
    setTimeout(() => {
        if (typeof initNavigation === 'function') {
            initNavigation();
        } else {
            console.error('Navigation initialization function not found');
        }
    }, 50);
    
    // Initialize theme functionality
    initSmoothScrolling();
    initContactForms();
    initFAQAccordion();
    
    // Initialize Swiper with proper loading check to fix testimonials display issue
    function tryInitSwipers() {
        if (typeof Swiper !== 'undefined') {
            console.log('Swiper loaded, initializing carousels...');
            initTestimonialsSwiper();
            initArticlesSwiper();
            
            // Force update after a short delay to ensure proper display
            setTimeout(() => {
                const testimonialsSwiper = document.querySelector('.testimonials-swiper');
                if (testimonialsSwiper && testimonialsSwiper.swiper) {
                    testimonialsSwiper.swiper.update();
                    testimonialsSwiper.swiper.slideTo(0, 0);
                }
            }, 300);
        } else {
            console.log('Swiper not yet loaded, waiting...');
            setTimeout(tryInitSwipers, 200);
        }
    }
    
    // Start initialization with a delay to ensure all assets are loaded
    setTimeout(tryInitSwipers, 200);
    
    // Re-apply mobile touch support after dynamic content loads
    setTimeout(() => {
        addMobileTouchSupport();
    }, 1500);
}

// Initialize loading spinner immediately
initLoadingSpinner();

// Wait for complete page load (including CSS and external resources)
if (document.readyState === 'complete') {
    // Page is already fully loaded
    initializeTheme();
} else if (document.readyState === 'interactive') {
    // DOM is ready but resources still loading
    window.addEventListener('load', initializeTheme);
} else {
    // Document still loading
    document.addEventListener('DOMContentLoaded', function() {
        initLoadingSpinner(); // Initialize again if missed
        // Wait for window load to ensure CSS is ready
        window.addEventListener('load', initializeTheme);
    });
}

// Fallback initialization after a delay if nothing else works
setTimeout(() => {
    if (!window.themeInitialized) {
        console.log('Fallback initialization triggered');
        initializeTheme();
    }
}, 3000);

// Make Swiper functions globally available for fallback scenarios
window.initTestimonialsSwiper = initTestimonialsSwiper;
window.initArticlesSwiper = initArticlesSwiper;

// Mobile menu functionality removed - handled by dedicated navigation.js file

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
            const accordionInstance = new Accordion('#faq-accordion', {
                // Basic configuration - all panels start collapsed by default
                duration: 300,
                ariaEnabled: true,
                collapse: true,
                showMultiple: false,
                
                // Ensure all panels start collapsed (empty array = all closed)
                openOnInit: [],
                
                // Mobile-friendly settings
                triggerClass: 'ac-trigger',
                panelClass: 'ac-panel',
                activeClass: 'is-active',
                
                // Enhanced mobile support
                beforeOpen: function() {
                    console.log('About to open accordion panel');
                    if (isMobile()) {
                        console.log('Mobile accordion interaction detected');
                    }
                },
                
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
                    
                    // Mobile-specific: Enhanced scroll behavior
                    if (isMobile()) {
                        setTimeout(() => {
                            const rect = currentElement.getBoundingClientRect();
                            const viewportHeight = window.innerHeight;
                            
                            // Only scroll if the element is not fully visible
                            if (rect.bottom > viewportHeight || rect.top < 0) {
                                currentElement.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'nearest',
                                    inline: 'nearest'
                                });
                            }
                        }, 150); // Slightly longer delay for mobile
                    }
                },
                
                beforeClose: function() {
                    console.log('About to close accordion panel');
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
            
            // Explicitly ensure all panels are closed after initialization
            setTimeout(() => {
                const allPanels = document.querySelectorAll('#faq-accordion .ac-panel');
                const allTriggers = document.querySelectorAll('#faq-accordion .ac-trigger');
                
                console.log(`Found ${allPanels.length} accordion panels`);
                
                // Force close any panels that might be open
                allPanels.forEach((panel, index) => {
                    if (panel.style.height !== '0px' && panel.style.height !== '') {
                        console.log(`Closing panel ${index} that was unexpectedly open`);
                        panel.style.height = '0px';
                        panel.parentElement.classList.remove('is-active');
                    }
                });
                
                // Ensure all triggers show plus icons
                allTriggers.forEach((trigger, index) => {
                    const icon = trigger.querySelector('[data-lucide]');
                    if (icon && icon.getAttribute('data-lucide') !== 'plus') {
                        console.log(`Setting trigger ${index} icon to plus`);
                        icon.setAttribute('data-lucide', 'plus');
                        if (window.lucide) {
                            window.lucide.createIcons();
                        }
                    }
                });
                
                console.log('All accordion panels confirmed closed');
            }, 100);
            
            console.log('Accordion initialized successfully - all panels collapsed by default');
        } catch (error) {
            console.error('Error initializing accordion:', error);
        }
    } else {
        console.log('Accordion container not found');
    }
}

/**
 * Initialize Testimonials Swiper Carousel
 */
function initTestimonialsSwiper() {
    const swiperContainer = document.querySelector('.testimonials-swiper');
    
    if (swiperContainer && typeof Swiper !== 'undefined') {
        console.log('Initializing testimonials swiper...');
        
        try {
            new Swiper('.testimonials-swiper', {
                // Basic configuration
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                
                // Autoplay with mobile-friendly settings
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                    waitForTransition: true,
                },
                
                // Mobile-optimized touch settings (from official docs)
                simulateTouch: true,
                touchRatio: 1,
                touchAngle: 45,
                threshold: 5,
                touchStartPreventDefault: true,
                touchMoveStopPropagation: false,
                touchReleaseOnEdges: true,
                passiveListeners: true,
                resistance: true,
                resistanceRatio: 0.85,
                
                // Mobile performance optimizations
                grabCursor: true,
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                
                // Speed and easing for smooth mobile experience
                speed: 300,
                
                // Responsive breakpoints
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 15,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 32,
                    },
                },
                
                // Observer to handle DOM changes and fix loading issues
                observer: true,
                observeParents: true,
                observeSlideChildren: true,
                
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                
                // Pagination dots
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                
                // Mobile-specific events and debugging
                on: {
                    init: function() {
                        console.log('Testimonials Swiper initialized with mobile optimizations');
                        if (isMobile()) {
                            console.log('Mobile device detected - touch interactions enabled');
                        }
                    },
                    touchStart: function() {
                        if (isMobile()) {
                            console.log('Touch start on testimonials swiper');
                        }
                    },
                    touchEnd: function() {
                        if (isMobile()) {
                            console.log('Touch end on testimonials swiper');
                        }
                    },
                    slideChange: function() {
                        console.log('Testimonials slide changed to:', this.activeIndex);
                    },
                    autoplayStart: function() {
                        console.log('Testimonials autoplay started');
                    },
                    autoplayStop: function() {
                        console.log('Testimonials autoplay stopped');
                    }
                }
            });
            
            console.log('Testimonials swiper initialized successfully');
        } catch (error) {
            console.error('Error initializing testimonials swiper:', error);
        }
    } else if (!swiperContainer) {
        console.log('Testimonials swiper container not found');
    } else {
        console.error('Swiper library not loaded - will retry when available');
        window.needsTestimonialsSwiper = true;
    }
}

/**
 * Initialize Articles Swiper Carousel (Mobile Only)
 */
function initArticlesSwiper() {
    const swiperContainer = document.querySelector('.articles-swiper');
    
    if (swiperContainer && typeof Swiper !== 'undefined') {
        console.log('Initializing articles swiper...');
        
        try {
            new Swiper('.articles-swiper', {
                // Basic configuration
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                centeredSlides: true,
                
                // Autoplay with mobile-friendly settings
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                    waitForTransition: true,
                },
                
                // Mobile-optimized touch settings (from official docs)
                simulateTouch: true,
                touchRatio: 1,
                touchAngle: 45,
                threshold: 5,
                touchStartPreventDefault: true,
                touchMoveStopPropagation: false,
                touchReleaseOnEdges: true,
                passiveListeners: true,
                resistance: true,
                resistanceRatio: 0.85,
                
                // Mobile performance optimizations
                grabCursor: true,
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                
                // Speed and easing for smooth mobile experience
                speed: 300,
                
                // Navigation arrows with custom classes (matching HTML)
                navigation: {
                    nextEl: '.articles-next',
                    prevEl: '.articles-prev',
                },
                
                // Mobile-specific events and debugging
                on: {
                    init: function() {
                        console.log('Articles Swiper initialized with mobile optimizations');
                        if (isMobile()) {
                            console.log('Mobile device detected - touch interactions enabled');
                        }
                    },
                    touchStart: function() {
                        if (isMobile()) {
                            console.log('Touch start on articles swiper');
                        }
                    },
                    touchEnd: function() {
                        if (isMobile()) {
                            console.log('Touch end on articles swiper');
                        }
                    },
                    slideChange: function() {
                        console.log('Articles slide changed to:', this.activeIndex);
                    },
                    autoplayStart: function() {
                        console.log('Articles autoplay started');
                    },
                    autoplayStop: function() {
                        console.log('Articles autoplay stopped');
                    }
                }
            });
            
            console.log('Articles swiper initialized successfully');
        } catch (error) {
            console.error('Error initializing articles swiper:', error);
        }
    } else if (!swiperContainer) {
        console.log('Articles swiper container not found');
    } else {
        console.error('Swiper library not loaded - will retry when available');
        window.needsArticlesSwiper = true;
    }
}