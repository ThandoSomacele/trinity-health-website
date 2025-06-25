import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

/**
 * Trinity Health Zambia - Frontend JavaScript
 * Mayo Clinic inspired clean, accessible interactions
 */

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  
  if (mobileMenuToggle && mobileMenu) {
    mobileMenuToggle.addEventListener('click', function() {
      const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
      
      // Toggle menu visibility
      mobileMenu.classList.toggle('hidden');
      
      // Update aria-expanded attribute
      mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
      
      // Toggle hamburger icon (optional enhancement)
      const icon = mobileMenuToggle.querySelector('svg');
      if (icon) {
        if (isExpanded) {
          // Show hamburger icon
          icon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          `;
        } else {
          // Show close icon
          icon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          `;
        }
      }
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
      if (!mobileMenuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
        mobileMenu.classList.add('hidden');
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        
        // Reset to hamburger icon
        const icon = mobileMenuToggle.querySelector('svg');
        if (icon) {
          icon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          `;
        }
      }
    });
    
    // Close mobile menu on escape key
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mobileMenuToggle.focus();
      }
    });
  }
});

// Smooth Scrolling for Anchor Links
document.addEventListener('DOMContentLoaded', function() {
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
  
  anchorLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        e.preventDefault();
        
        // Account for sticky header
        const headerHeight = document.querySelector('header')?.offsetHeight || 0;
        const targetPosition = targetElement.offsetTop - headerHeight - 20;
        
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
});

// Form Enhancement for Healthcare Forms
document.addEventListener('DOMContentLoaded', function() {
  const forms = document.querySelectorAll('form');
  
  forms.forEach(function(form) {
    // Add loading state to submit buttons
    form.addEventListener('submit', function() {
      const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
      if (submitBtn) {
        const originalText = submitBtn.textContent || submitBtn.value;
        submitBtn.disabled = true;
        
        if (submitBtn.tagName === 'BUTTON') {
          submitBtn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Sending...
          `;
        } else {
          submitBtn.value = 'Sending...';
        }
        
        // Reset after 5 seconds if something goes wrong
        setTimeout(function() {
          submitBtn.disabled = false;
          if (submitBtn.tagName === 'BUTTON') {
            submitBtn.textContent = originalText;
          } else {
            submitBtn.value = originalText;
          }
        }, 5000);
      }
    });
    
    // Enhanced form validation feedback
    const inputs = form.querySelectorAll('input, textarea, select');
    inputs.forEach(function(input) {
      input.addEventListener('blur', function() {
        validateField(this);
      });
      
      input.addEventListener('input', function() {
        // Clear error state on input
        this.classList.remove('border-red-500', 'border-red-300');
        const errorMsg = this.parentNode.querySelector('.error-message');
        if (errorMsg) {
          errorMsg.remove();
        }
      });
    });
  });
});

// Field validation function
function validateField(field) {
  const value = field.value.trim();
  const type = field.type;
  const required = field.hasAttribute('required');
  let isValid = true;
  let errorMessage = '';
  
  // Required field validation
  if (required && !value) {
    isValid = false;
    errorMessage = 'This field is required.';
  }
  
  // Email validation
  if (type === 'email' && value) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(value)) {
      isValid = false;
      errorMessage = 'Please enter a valid email address.';
    }
  }
  
  // Phone validation (basic)
  if (type === 'tel' && value) {
    const phoneRegex = /^[\+]?[0-9\s\-\(\)]+$/;
    if (!phoneRegex.test(value)) {
      isValid = false;
      errorMessage = 'Please enter a valid phone number.';
    }
  }
  
  // Update field appearance
  field.classList.remove('border-green-500', 'border-red-500', 'border-red-300');
  
  // Remove existing error message
  const existingError = field.parentNode.querySelector('.error-message');
  if (existingError) {
    existingError.remove();
  }
  
  if (!isValid) {
    field.classList.add('border-red-500');
    
    // Add error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message text-red-600 text-sm mt-1';
    errorDiv.textContent = errorMessage;
    field.parentNode.appendChild(errorDiv);
  } else if (value) {
    field.classList.add('border-green-500');
  }
  
  return isValid;
}

// Accessible Carousel/Slider (if needed for testimonials)
class AccessibleCarousel {
  constructor(container) {
    this.container = container;
    this.slides = container.querySelectorAll('.carousel-slide');
    this.currentSlide = 0;
    this.isPlaying = true;
    this.interval = null;
    
    this.init();
  }
  
  init() {
    if (this.slides.length <= 1) return;
    
    this.createControls();
    this.setupKeyboardNavigation();
    this.startAutoplay();
    this.updateSlide();
  }
  
  createControls() {
    const controlsContainer = document.createElement('div');
    controlsContainer.className = 'carousel-controls flex items-center justify-center space-x-4 mt-6';
    
    // Previous button
    const prevBtn = document.createElement('button');
    prevBtn.className = 'carousel-btn-prev px-4 py-2 bg-trinity-primary text-white rounded-lg hover:bg-trinity-primary-dark transition-colors';
    prevBtn.innerHTML = `
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
      </svg>
    `;
    prevBtn.setAttribute('aria-label', 'Previous slide');
    prevBtn.addEventListener('click', () => this.previousSlide());
    
    // Play/Pause button
    const playBtn = document.createElement('button');
    playBtn.className = 'carousel-btn-play px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors';
    playBtn.setAttribute('aria-label', 'Pause slideshow');
    playBtn.innerHTML = `
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6"></path>
      </svg>
    `;
    playBtn.addEventListener('click', () => this.toggleAutoplay(playBtn));
    
    // Next button
    const nextBtn = document.createElement('button');
    nextBtn.className = 'carousel-btn-next px-4 py-2 bg-trinity-primary text-white rounded-lg hover:bg-trinity-primary-dark transition-colors';
    nextBtn.innerHTML = `
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </svg>
    `;
    nextBtn.setAttribute('aria-label', 'Next slide');
    nextBtn.addEventListener('click', () => this.nextSlide());
    
    controlsContainer.appendChild(prevBtn);
    controlsContainer.appendChild(playBtn);
    controlsContainer.appendChild(nextBtn);
    
    this.container.appendChild(controlsContainer);
  }
  
  setupKeyboardNavigation() {
    this.container.addEventListener('keydown', (e) => {
      switch(e.key) {
        case 'ArrowLeft':
          e.preventDefault();
          this.previousSlide();
          break;
        case 'ArrowRight':
          e.preventDefault();
          this.nextSlide();
          break;
        case ' ':
          e.preventDefault();
          const playBtn = this.container.querySelector('.carousel-btn-play');
          this.toggleAutoplay(playBtn);
          break;
      }
    });
  }
  
  updateSlide() {
    this.slides.forEach((slide, index) => {
      slide.classList.toggle('hidden', index !== this.currentSlide);
      slide.setAttribute('aria-hidden', index !== this.currentSlide);
    });
  }
  
  nextSlide() {
    this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    this.updateSlide();
  }
  
  previousSlide() {
    this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    this.updateSlide();
  }
  
  startAutoplay() {
    if (this.isPlaying) {
      this.interval = setInterval(() => {
        this.nextSlide();
      }, 5000);
    }
  }
  
  toggleAutoplay(button) {
    this.isPlaying = !this.isPlaying;
    
    if (this.isPlaying) {
      this.startAutoplay();
      button.setAttribute('aria-label', 'Pause slideshow');
      button.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6"></path>
        </svg>
      `;
    } else {
      clearInterval(this.interval);
      button.setAttribute('aria-label', 'Play slideshow');
      button.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1"></path>
        </svg>
      `;
    }
  }
}

// Initialize carousels
document.addEventListener('DOMContentLoaded', function() {
  const carousels = document.querySelectorAll('.carousel');
  carousels.forEach(carousel => {
    new AccessibleCarousel(carousel);
  });
});

// Back to Top Button (Healthcare sites benefit from this)
document.addEventListener('DOMContentLoaded', function() {
  const backToTopBtn = document.createElement('button');
  backToTopBtn.className = 'fixed bottom-6 right-6 bg-trinity-primary text-white p-3 rounded-full shadow-lg hover:bg-trinity-primary-dark transition-all duration-200 z-40 opacity-0 pointer-events-none';
  backToTopBtn.setAttribute('aria-label', 'Back to top');
  backToTopBtn.innerHTML = `
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
  `;
  
  document.body.appendChild(backToTopBtn);
  
  // Show/hide based on scroll position
  window.addEventListener('scroll', function() {
    if (window.pageYOffset > 300) {
      backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
      backToTopBtn.classList.add('opacity-100');
    } else {
      backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
      backToTopBtn.classList.remove('opacity-100');
    }
  });
  
  // Smooth scroll to top
  backToTopBtn.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
});

// Service card hover effects enhancement
document.addEventListener('DOMContentLoaded', function() {
  const serviceCards = document.querySelectorAll('.service-card');
  
  serviceCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-4px)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0)';
    });
  });
});

// Mega Menu Functionality
document.addEventListener('DOMContentLoaded', function() {
  const megaMenuTriggers = document.querySelectorAll('.mega-menu-trigger');
  
  megaMenuTriggers.forEach(trigger => {
    const targetId = trigger.getAttribute('data-target');
    const megaMenu = document.getElementById(targetId);
    const parentDiv = trigger.closest('.group');
    
    if (megaMenu && parentDiv) {
      let hoverTimeout;
      
      // Show mega menu on hover
      parentDiv.addEventListener('mouseenter', function() {
        clearTimeout(hoverTimeout);
        megaMenu.classList.remove('opacity-0', 'invisible');
        megaMenu.classList.add('opacity-100', 'visible');
      });
      
      // Hide mega menu on mouse leave with delay
      parentDiv.addEventListener('mouseleave', function() {
        hoverTimeout = setTimeout(() => {
          megaMenu.classList.add('opacity-0', 'invisible');
          megaMenu.classList.remove('opacity-100', 'visible');
        }, 150);
      });
      
      // Keep mega menu open when hovering over it
      megaMenu.addEventListener('mouseenter', function() {
        clearTimeout(hoverTimeout);
      });
      
      megaMenu.addEventListener('mouseleave', function() {
        hoverTimeout = setTimeout(() => {
          megaMenu.classList.add('opacity-0', 'invisible');
          megaMenu.classList.remove('opacity-100', 'visible');
        }, 150);
      });
      
      // Keyboard navigation
      trigger.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          const isVisible = megaMenu.classList.contains('opacity-100');
          
          if (isVisible) {
            megaMenu.classList.add('opacity-0', 'invisible');
            megaMenu.classList.remove('opacity-100', 'visible');
          } else {
            megaMenu.classList.remove('opacity-0', 'invisible');
            megaMenu.classList.add('opacity-100', 'visible');
          }
        }
        
        if (e.key === 'Escape') {
          megaMenu.classList.add('opacity-0', 'invisible');
          megaMenu.classList.remove('opacity-100', 'visible');
          trigger.focus();
        }
      });
      
      // Close mega menu when clicking outside
      document.addEventListener('click', function(event) {
        if (!parentDiv.contains(event.target) && !megaMenu.contains(event.target)) {
          megaMenu.classList.add('opacity-0', 'invisible');
          megaMenu.classList.remove('opacity-100', 'visible');
        }
      });
    }
  });
});
