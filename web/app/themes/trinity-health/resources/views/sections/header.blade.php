{{-- Trinity Health Header - Mayo Clinic Inspired Clean Design --}}
<header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-20">
      
      {{-- Logo and Brand --}}
      <div class="flex items-center">
        <a href="{{ home_url('/') }}" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
          <img 
            src="{{ home_url('/app/uploads/2025/06/cropped-trinity-logo.jpg') }}" 
            alt="Trinity Health Zambia" 
            class="h-10 lg:h-12 w-auto"
          >
          <div class="hidden sm:block">
            <h1 class="text-xl lg:text-2xl font-bold text-[#880005]">Trinity Health</h1>
            <p class="text-sm text-gray-600 -mt-1">Zambia</p>
          </div>
        </a>
      </div>

      {{-- Desktop Navigation with Mega Menu --}}
      @if (has_nav_menu('primary_navigation'))
        <nav class="hidden lg:flex items-center space-x-8" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          <div class="flex items-center space-x-8">
            <a href="{{ home_url('/') }}" class="text-gray-700 font-medium hover:text-[#880005] transition-colors duration-200">Home</a>
            <a href="{{ home_url('/about') }}" class="text-gray-700 font-medium hover:text-[#880005] transition-colors duration-200">About Us</a>
            
            {{-- Services Mega Menu --}}
            <div class="relative group">
              <button class="flex items-center text-gray-700 font-medium hover:text-[#880005] transition-colors duration-200 mega-menu-trigger" data-target="services-mega">
                Our Services
                <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              
              {{-- Mega Menu Dropdown --}}
              <div id="services-mega" class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 w-screen max-w-4xl bg-white rounded-lg shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                <div class="p-8">
                  <div class="grid md:grid-cols-3 gap-8">
                    
                    {{-- General Health Services --}}
                    <div>
                      <h3 class="text-lg font-semibold text-[#880005] mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        General Health
                      </h3>
                      <ul class="space-y-3">
                        <li><a href="{{ home_url('/general-health/primary-care') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Primary Care</a></li>
                        <li><a href="{{ home_url('/general-health/preventive-care') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Preventive Care</a></li>
                        <li><a href="{{ home_url('/general-health/chronic-disease') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Chronic Disease Management</a></li>
                        <li><a href="{{ home_url('/general-health/health-screenings') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Health Screenings</a></li>
                      </ul>
                    </div>
                    
                    {{-- Audiology Services --}}
                    <div>
                      <h3 class="text-lg font-semibold text-[#880005] mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
                        </svg>
                        Audiology Services
                      </h3>
                      <ul class="space-y-3">
                        <li><a href="{{ home_url('/audiology/hearing-tests') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Hearing Tests</a></li>
                        <li><a href="{{ home_url('/audiology/hearing-aids') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Hearing Aids</a></li>
                        <li><a href="{{ home_url('/audiology/tinnitus-treatment') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Tinnitus Treatment</a></li>
                        <li><a href="{{ home_url('/audiology/hearing-rehabilitation') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Hearing Rehabilitation</a></li>
                      </ul>
                    </div>
                    
                    {{-- Emergency & Specialized Care --}}
                    <div>
                      <h3 class="text-lg font-semibold text-[#880005] mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Emergency Care
                      </h3>
                      <ul class="space-y-3">
                        <li><a href="{{ home_url('/emergency-care') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Emergency Services</a></li>
                        <li><a href="{{ home_url('/patient-care/appointments') }}" class="text-gray-600 hover:text-[#880005] transition-colors block">Urgent Appointments</a></li>
                      </ul>
                      
                      {{-- Call to Action in Mega Menu --}}
                      <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600 mb-3">Need immediate care?</p>
                        <a href="{{ home_url('/contact') }}" class="btn btn-primary btn-sm">
                          Contact Us Now
                          <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                          </svg>
                        </a>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <a href="{{ home_url('/patient-care') }}" class="text-gray-700 font-medium hover:text-[#880005] transition-colors duration-200">Patient Care</a>
            <a href="{{ home_url('/team') }}" class="text-gray-700 font-medium hover:text-[#880005] transition-colors duration-200">Our Team</a>
            <a href="{{ home_url('/contact') }}" class="text-gray-700 font-medium hover:text-[#880005] transition-colors duration-200">Contact</a>
          </div>
        </nav>
      @endif

      {{-- CTA Button --}}
      <div class="hidden lg:flex items-center space-x-4">
        <a 
          href="{{ home_url('/contact') }}" 
          class="btn btn-primary btn-sm"
        >
          Book Appointment
        </a>
      </div>

      {{-- Mobile Menu Button --}}
      <div class="lg:hidden">
        <button 
          type="button" 
          class="mobile-menu-toggle p-2 rounded-md text-gray-600 hover:text-[#880005] hover:bg-gray-50 transition-colors"
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
            'link_before' => '<span class="block px-3 py-2 text-gray-700 hover:text-[#880005] hover:bg-gray-50 rounded-md transition-colors">',
            'link_after' => '</span>'
          ]) !!}
        </nav>
      @endif
      
      {{-- Mobile CTA --}}
      <div class="mt-4 px-3">
        <a 
          href="{{ home_url('/contact') }}" 
          class="btn btn-primary btn-md btn-block"
        >
          Book Appointment
        </a>
      </div>
    </div>
  </div>
</header>
