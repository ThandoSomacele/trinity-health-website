{{-- Trinity Health Footer - Clean and Professional --}}
<footer class="bg-gray-900 text-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- Main Footer Content --}}
    <div class="py-16">
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        
        {{-- Brand and Contact --}}
        <div class="lg:col-span-2">
          <div class="flex items-center space-x-3 mb-6">
            <img 
              src="{{ home_url('/app/uploads/2025/06/cropped-trinity-logo.jpg') }}" 
              alt="Trinity Health Zambia" 
              class="h-10 w-auto"
            >
            <div>
              <h3 class="text-xl font-bold">Trinity Health</h3>
              <p class="text-gray-400 text-sm">Zambia</p>
            </div>
          </div>
          
          <p class="text-gray-200 mb-6 leading-relaxed max-w-md">
            Providing compassionate, professional healthcare services to the Zambian community. 
            Your health and wellbeing are our top priorities.
          </p>
          
          <div class="space-y-3">
            <div class="flex items-center space-x-3">
              <svg class="w-5 h-5 text-[#a61a1a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
              <span class="text-gray-200">Lusaka, Zambia</span>
            </div>
            
            <div class="flex items-center space-x-3">
              <svg class="w-5 h-5 text-[#a61a1a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
              <a href="tel:+260123456789" class="text-gray-200 hover:text-[#a61a1a] transition-colors">
                +260 123 456 789
              </a>
            </div>
            
            <div class="flex items-center space-x-3">
              <svg class="w-5 h-5 text-[#a61a1a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
              </svg>
              <a href="mailto:info@trinityhealthzambia.com" class="text-gray-200 hover:text-[#a61a1a] transition-colors">
                info@trinityhealthzambia.com
              </a>
            </div>
          </div>
        </div>
        
        {{-- Quick Links --}}
        <div>
          <h4 class="text-lg font-semibold mb-6">Quick Links</h4>
          <ul class="space-y-3">
            <li>
              <a href="{{ home_url('/about') }}" class="text-gray-200 hover:text-[#a61a1a] transition-colors">
                About Us
              </a>
            </li>
            <li>
              <a href="{{ home_url('/services') }}" class="text-gray-200 hover:text-[#a61a1a] transition-colors">
                Our Services
              </a>
            </li>
            <li>
              <a href="{{ home_url('/audiology-services') }}" class="text-gray-200 hover:text-[#a61a1a] transition-colors">
                Audiology Services
              </a>
            </li>
            <li>
              <a href="{{ home_url('/contact') }}" class="text-gray-200 hover:text-[#a61a1a] transition-colors">
                Contact Us
              </a>
            </li>
            <li>
              <a href="{{ home_url('/appointments') }}" class="text-gray-200 hover:text-[#a61a1a] transition-colors">
                Book Appointment
              </a>
            </li>
          </ul>
        </div>
        
        {{-- Practice Hours --}}
        <div>
          <h4 class="text-lg font-semibold mb-6">Practice Hours</h4>
          <div class="space-y-3 text-gray-200">
            <div class="flex justify-between">
              <span>Monday - Friday</span>
              <span>8:00 AM - 5:00 PM</span>
            </div>
            <div class="flex justify-between">
              <span>Saturday</span>
              <span>9:00 AM - 2:00 PM</span>
            </div>
            <div class="flex justify-between">
              <span>Sunday</span>
              <span>Emergency Only</span>
            </div>
          </div>
          
          <div class="mt-6 p-4 bg-[#880005]/10 rounded-lg border border-[#880005]/20">
            <h5 class="font-semibold text-[#a61a1a] mb-2">Emergency Care</h5>
            <p class="text-sm text-gray-200">
              24/7 emergency support available. Call our emergency line for urgent medical needs.
            </p>
          </div>
        </div>
      </div>
    </div>
    
    {{-- Footer Bottom --}}
    <div class="border-t border-gray-800 py-8">
      <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <div class="text-gray-400 text-sm">
          © {{ date('Y') }} Trinity Health Zambia. All rights reserved.
        </div>
        
        <div class="flex items-center space-x-6">
          <a href="{{ home_url('/privacy-policy') }}" class="text-gray-400 hover:text-[#a61a1a] text-sm transition-colors">
            Privacy Policy
          </a>
          <a href="{{ home_url('/terms-of-service') }}" class="text-gray-400 hover:text-[#a61a1a] text-sm transition-colors">
            Terms of Service
          </a>
          <a href="{{ home_url('/accessibility') }}" class="text-gray-400 hover:text-[#a61a1a] text-sm transition-colors">
            Accessibility
          </a>
        </div>
      </div>
    </div>
  </div>
  
  {{-- Dynamic Sidebar --}}
  @if (is_active_sidebar('sidebar-footer'))
    <div class="bg-gray-800 py-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php(dynamic_sidebar('sidebar-footer'))
      </div>
    </div>
  @endif
</footer>
