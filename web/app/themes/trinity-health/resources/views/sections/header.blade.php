{{-- Trinity Health Header - Mayo Clinic Inspired Clean Design --}}
<header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16 lg:h-20">
      
      {{-- Logo and Brand --}}
      <div class="flex items-center">
        <a href="{{ home_url('/') }}" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
          <img 
            src="{{ home_url('/app/uploads/2025/06/cropped-trinity-logo.jpg') }}" 
            alt="Trinity Health Zambia" 
            class="h-10 lg:h-12 w-auto"
          >
          <div class="hidden sm:block">
            <h1 class="text-xl lg:text-2xl font-bold text-trinity-primary">Trinity Health</h1>
            <p class="text-sm text-gray-600 -mt-1">Zambia</p>
          </div>
        </a>
      </div>

      {{-- Desktop Navigation --}}
      @if (has_nav_menu('primary_navigation'))
        <nav class="hidden lg:flex items-center space-x-8" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation', 
            'menu_class' => 'flex items-center space-x-8 text-gray-700 font-medium',
            'echo' => false,
            'container' => false,
            'link_before' => '<span class="hover:text-trinity-primary transition-colors duration-200">',
            'link_after' => '</span>'
          ]) !!}
        </nav>
      @endif

      {{-- CTA Button --}}
      <div class="hidden lg:flex items-center space-x-4">
        <a 
          href="{{ home_url('/contact') }}" 
          class="bg-trinity-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-trinity-primary-dark transition-colors duration-200 shadow-sm"
        >
          Book Appointment
        </a>
      </div>

      {{-- Mobile Menu Button --}}
      <div class="lg:hidden">
        <button 
          type="button" 
          class="mobile-menu-toggle p-2 rounded-md text-gray-600 hover:text-trinity-primary hover:bg-gray-50 transition-colors"
          aria-expanded="false"
          aria-label="Toggle navigation menu"
        >
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>

    {{-- Mobile Navigation Menu --}}
    <div class="lg:hidden mobile-menu hidden border-t border-gray-100 py-4">
      @if (has_nav_menu('primary_navigation'))
        <nav class="flex flex-col space-y-3" aria-label="Mobile navigation">
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'flex flex-col space-y-3',
            'echo' => false,
            'container' => false,
            'link_before' => '<span class="block px-3 py-2 text-gray-700 hover:text-trinity-primary hover:bg-gray-50 rounded-md transition-colors">',
            'link_after' => '</span>'
          ]) !!}
        </nav>
      @endif
      
      {{-- Mobile CTA --}}
      <div class="mt-4 px-3">
        <a 
          href="{{ home_url('/contact') }}" 
          class="block w-full text-center bg-trinity-primary text-white px-4 py-3 rounded-lg font-semibold hover:bg-trinity-primary-dark transition-colors"
        >
          Book Appointment
        </a>
      </div>
    </div>
  </div>
</header>
