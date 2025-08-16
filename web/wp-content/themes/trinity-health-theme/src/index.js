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

// Mobile device detection
function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth <= 768;
}

// Mobile-specific touch event polyfill
function addMobileTouchSupport() {
    if (isMobile()) {
        // Add touch-action CSS to prevent scroll blocking
        document.documentElement.style.touchAction = 'manipulation';
        
        // Add passive event listeners for better performance
        const swiperContainers = document.querySelectorAll('.testimonials-swiper, .articles-swiper');
        swiperContainers.forEach(container => {
            container.style.touchAction = 'pan-y';
            container.addEventListener('touchstart', function() {
                console.log('Mobile touch start on swiper container');
            }, { passive: true });
        });
        
        // Improve accordion touch handling
        const accordionTriggers = document.querySelectorAll('.ac-trigger');
        accordionTriggers.forEach(trigger => {
            // Add mobile-friendly tap handling
            trigger.style.cursor = 'pointer';
            trigger.style.touchAction = 'manipulation';
            
            // Add visual feedback for touch
            trigger.addEventListener('touchstart', function() {
                this.style.opacity = '0.7';
            }, { passive: true });
            
            trigger.addEventListener('touchend', function() {
                this.style.opacity = '1';
            }, { passive: true });
        });
        
        console.log('Mobile touch support added');
    }
}

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('Trinity Health Theme loaded successfully');
    console.log('Is mobile device:', isMobile());
    
    // Add mobile-specific enhancements
    addMobileTouchSupport();
    
    // Initialize theme functionality
    initMobileMenu();
    initSmoothScrolling();
    initContactForms();
    initFAQAccordion();
    
    // Delay Swiper initialization slightly on mobile for better performance
    if (isMobile()) {
        setTimeout(() => {
            initTestimonialsSwiper();
            initArticlesSwiper();
        }, 100);
    } else {
        initTestimonialsSwiper();
        initArticlesSwiper();
    }
    
    // Re-apply mobile touch support after dynamic content loads
    setTimeout(() => {
        addMobileTouchSupport();
    }, 1000);
});

// Make Swiper functions globally available for fallback scenarios
window.initTestimonialsSwiper = initTestimonialsSwiper;
window.initArticlesSwiper = initArticlesSwiper;

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
                // Mobile-friendly settings
                triggerClass: 'ac-trigger',
                panelClass: 'ac-panel',
                activeClass: 'is-active',
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
                    
                    // Mobile-specific: Scroll to accordion item
                    if (window.innerWidth <= 768) {
                        setTimeout(() => {
                            currentElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        }, 100);
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

/**
 * Initialize Testimonials Swiper Carousel
 */
function initTestimonialsSwiper() {
    const swiperContainer = document.querySelector('.testimonials-swiper');
    
    // Check if Swiper is available with retry mechanism
    if (swiperContainer) {
        if (typeof Swiper !== 'undefined') {
        console.log('Initializing testimonials swiper...');
        
        try {
            new Swiper('.testimonials-swiper', {
                // Basic configuration
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                
                // Mobile-specific settings
                touchRatio: 1,
                touchAngle: 45,
                grabCursor: true,
                centeredSlides: false,
                
                // Touch/swipe settings for mobile
                touchEventsTarget: 'container',
                simulateTouch: true,
                allowTouchMove: true,
                touchMoveStopPropagation: false,
                
                // Mobile browser compatibility
                observer: true,
                observeParents: true,
                observeSlideChildren: true,
                
                // Responsive breakpoints
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 15,
                        touchRatio: 1.5,
                    },
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                        touchRatio: 1.2,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 24,
                        touchRatio: 1,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 32,
                        touchRatio: 1,
                    },
                },
                
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                    disabledClass: 'swiper-button-disabled',
                },
                
                // Pagination dots
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                    bulletClass: 'swiper-pagination-bullet',
                    bulletActiveClass: 'swiper-pagination-bullet-active',
                },
                
                // Effects
                effect: 'slide',
                
                // Accessibility
                a11y: {
                    enabled: true,
                    prevSlideMessage: 'Previous testimonial',
                    nextSlideMessage: 'Next testimonial',
                    paginationBulletMessage: 'Go to testimonial {{index}}',
                },
                
                // Mobile-specific events
                on: {
                    init: function() {
                        console.log('Testimonials Swiper initialized on mobile');
                    },
                    touchStart: function() {
                        console.log('Touch start detected');
                    },
                    touchEnd: function() {
                        console.log('Touch end detected');
                    },
                    slideChange: function() {
                        // Pause autoplay briefly on manual swipe
                        if (this.autoplay && this.autoplay.running) {
                            this.autoplay.stop();
                            setTimeout(() => {
                                this.autoplay.start();
                            }, 3000);
                        }
                    }
                }
            });
            
            console.log('Testimonials swiper initialized successfully');
        } catch (error) {
            console.error('Error initializing testimonials swiper:', error);
        }
        } else {
            console.warn('Swiper library not available for testimonials. Will retry when loaded.');
            // Set a flag that this needs initialization
            window.needsTestimonialsSwiper = true;
        }
    } else {
        console.log('Testimonials swiper container not found');
    }
}

/**
 * Initialize Articles Swiper Carousel (Mobile Only)
 */
function initArticlesSwiper() {
    const swiperContainer = document.querySelector('.articles-swiper');
    
    // Check if Swiper is available with retry mechanism
    if (swiperContainer) {
        if (typeof Swiper !== 'undefined') {
        console.log('Initializing articles swiper...');
        
        try {
            new Swiper('.articles-swiper', {
                // Basic configuration
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                
                // Center the slides
                centeredSlides: true,
                
                // Mobile-specific settings
                touchRatio: 1.2,
                touchAngle: 45,
                grabCursor: true,
                
                // Touch/swipe settings for mobile
                touchEventsTarget: 'container',
                simulateTouch: true,
                allowTouchMove: true,
                touchMoveStopPropagation: false,
                
                // Mobile browser compatibility
                observer: true,
                observeParents: true,
                observeSlideChildren: true,
                
                // Mobile responsive
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 15,
                        touchRatio: 1.5,
                        centeredSlides: true,
                    },
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                        touchRatio: 1.2,
                        centeredSlides: true,
                    },
                },
                
                // Navigation arrows with custom classes
                navigation: {
                    nextEl: '.articles-next',
                    prevEl: '.articles-prev',
                    disabledClass: 'swiper-button-disabled',
                },
                
                // Effects
                effect: 'slide',
                
                // Accessibility
                a11y: {
                    enabled: true,
                    prevSlideMessage: 'Previous article',
                    nextSlideMessage: 'Next article',
                },
                
                // Mobile-specific events
                on: {
                    init: function() {
                        console.log('Articles Swiper initialized on mobile');
                    },
                    touchStart: function() {
                        console.log('Articles touch start detected');
                    },
                    touchEnd: function() {
                        console.log('Articles touch end detected');
                    },
                    slideChange: function() {
                        // Pause autoplay briefly on manual swipe
                        if (this.autoplay && this.autoplay.running) {
                            this.autoplay.stop();
                            setTimeout(() => {
                                this.autoplay.start();
                            }, 3000);
                        }
                    }
                }
            });
            
            console.log('Articles swiper initialized successfully');
        } catch (error) {
            console.error('Error initializing articles swiper:', error);
        }
        } else {
            console.warn('Swiper library not available for articles. Will retry when loaded.');
            // Set a flag that this needs initialization
            window.needsArticlesSwiper = true;
        }
    } else {
        console.log('Articles swiper container not found');
    }
}