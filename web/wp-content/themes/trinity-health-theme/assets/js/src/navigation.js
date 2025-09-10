/**
 * Trinity Health Mobile Navigation
 * Handles mobile menu toggle and submenu functionality
 */

// Initialize everything when both DOM and Lucide are ready
function initNavigation() {
    'use strict';
    console.log('Trinity Health Navigation: Initializing...');
    
    // Initialize Lucide icons if available
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
        console.log('Trinity Health Navigation: Lucide icons created');
    }
    
    // Set up mobile navigation
    setupMobileNavigation();
    
    // Set up submenus
    setupSubMenus();
    
    /**
     * Handle window resize
     */
    function handleResize() {
        const mobileMenu = document.querySelector('.mobile-menu');
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        
        // Close mobile menu on resize to desktop
        if (window.innerWidth >= 1024 && mobileMenu && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            if (menuToggle) {
                menuToggle.setAttribute('aria-expanded', 'false');
                const icon = menuToggle.querySelector('i[data-lucide]');
                if (icon) {
                    icon.setAttribute('data-lucide', 'menu');
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                }
            }
        }
    }

    // Debounced resize handler
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(handleResize, 250);
    });
    
    // Also initialize when window loads (ensures all resources are ready)
    window.addEventListener('load', function() {
        console.log('Trinity Health Navigation: Window loaded, ensuring initialization');
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });

    /**
     * Set up mobile navigation toggle
     */
    function setupMobileNavigation() {
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        console.log('Trinity Health Navigation: Setting up mobile nav');
        console.log('Menu toggle element:', menuToggle);
        console.log('Mobile menu element:', mobileMenu);
        
        if (!menuToggle || !mobileMenu) {
            console.error('Trinity Health Navigation: Required elements not found');
            return;
        }

        // Handle menu toggle click
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Trinity Health Navigation: Toggle clicked');
            
            // Toggle the hidden class
            const isHidden = mobileMenu.classList.contains('hidden');
            
            if (isHidden) {
                // Show menu
                mobileMenu.classList.remove('hidden');
                menuToggle.setAttribute('aria-expanded', 'true');
                console.log('Trinity Health Navigation: Menu shown');
                
                // Update icon to X
                const icon = menuToggle.querySelector('i[data-lucide]');
                if (icon) {
                    icon.setAttribute('data-lucide', 'x');
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                }
            } else {
                // Hide menu
                mobileMenu.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
                console.log('Trinity Health Navigation: Menu hidden');
                
                // Update icon to menu
                const icon = menuToggle.querySelector('i[data-lucide]');
                if (icon) {
                    icon.setAttribute('data-lucide', 'menu');
                    if (typeof lucide !== 'undefined') {
                        lucide.createIcons();
                    }
                }
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!menuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    
                    const icon = menuToggle.querySelector('i[data-lucide]');
                    if (icon) {
                        icon.setAttribute('data-lucide', 'menu');
                        if (typeof lucide !== 'undefined') {
                            lucide.createIcons();
                        }
                    }
                }
            }
        });

        // Close menu on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    
                    const icon = menuToggle.querySelector('i[data-lucide]');
                    if (icon) {
                        icon.setAttribute('data-lucide', 'menu');
                        if (typeof lucide !== 'undefined') {
                            lucide.createIcons();
                        }
                    }
                    
                    menuToggle.focus();
                }
            }
        });
        
        console.log('Trinity Health Navigation: Mobile nav setup complete');
    }

    /**
     * Set up submenu functionality
     */
    function setupSubMenus() {
        // Mobile submenus
        const mobileMenuItems = document.querySelectorAll('.mobile-nav-menu .menu-item-has-children');
        
        mobileMenuItems.forEach(function(menuItem) {
            const link = menuItem.querySelector('a');
            const subMenu = menuItem.querySelector('.sub-menu');
            
            if (!link || !subMenu) return;
            
            // Create dropdown toggle button
            const dropdownToggle = document.createElement('button');
            dropdownToggle.className = 'submenu-toggle absolute right-0 top-0 px-4 py-3 text-white hover:text-trinity-gold-light transition-colors';
            dropdownToggle.setAttribute('aria-expanded', 'false');
            dropdownToggle.setAttribute('aria-label', 'Toggle submenu');
            dropdownToggle.innerHTML = '<i data-lucide="chevron-down" class="w-5 h-5"></i>';
            
            // Position menu item
            menuItem.style.position = 'relative';
            
            // Insert toggle button
            link.parentNode.insertBefore(dropdownToggle, subMenu);
            
            // Initially hide submenu
            subMenu.style.maxHeight = '0';
            subMenu.style.overflow = 'hidden';
            subMenu.style.transition = 'max-height 0.3s ease-out';
            
            // Toggle submenu on button click
            dropdownToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const isExpanded = dropdownToggle.getAttribute('aria-expanded') === 'true';
                const icon = dropdownToggle.querySelector('i[data-lucide]');
                
                if (isExpanded) {
                    // Close submenu
                    subMenu.style.maxHeight = '0';
                    dropdownToggle.setAttribute('aria-expanded', 'false');
                    if (icon) {
                        icon.setAttribute('data-lucide', 'chevron-down');
                    }
                } else {
                    // Open submenu
                    subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
                    dropdownToggle.setAttribute('aria-expanded', 'true');
                    if (icon) {
                        icon.setAttribute('data-lucide', 'chevron-up');
                    }
                }
                
                // Re-create icons
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            });
        });

        // Desktop dropdown menus
        const desktopMenuItems = document.querySelectorAll('.nav-menu .menu-item-has-children');
        
        desktopMenuItems.forEach(function(menuItem) {
            const link = menuItem.querySelector('a');
            const subMenu = menuItem.querySelector('.sub-menu');
            
            if (!link || !subMenu) return;
            
            // Add chevron indicator
            const indicator = document.createElement('i');
            indicator.setAttribute('data-lucide', 'chevron-down');
            indicator.className = 'w-4 h-4 ml-1 inline-block';
            link.appendChild(indicator);
            
            // Show/hide submenu on hover
            menuItem.addEventListener('mouseenter', function() {
                subMenu.style.display = 'block';
            });
            
            menuItem.addEventListener('mouseleave', function() {
                subMenu.style.display = 'none';
            });
            
            // Keyboard accessibility
            link.addEventListener('focus', function() {
                subMenu.style.display = 'block';
            });
            
            // Hide when focus leaves submenu
            const subMenuLinks = subMenu.querySelectorAll('a');
            if (subMenuLinks.length > 0) {
                const lastLink = subMenuLinks[subMenuLinks.length - 1];
                lastLink.addEventListener('blur', function(e) {
                    setTimeout(function() {
                        if (!menuItem.contains(document.activeElement)) {
                            subMenu.style.display = 'none';
                        }
                    }, 100);
                });
            }
        });
        
        // Re-create icons for any added elements
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

}

// Export the navigation initialization function
export default initNavigation;