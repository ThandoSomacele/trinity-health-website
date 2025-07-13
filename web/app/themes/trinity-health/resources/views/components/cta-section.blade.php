{{--
  Call-to-Action Section Component - Flexible Content
  
  Supports multiple CTA styles with editable content
  Maintains Trinity Health brand standards
--}}

@php
  // Get CTA content from Custom Fields with fallbacks
  $cta_title = get_field('cta_title') ?: 'Ready to Take Care of Your Health?';
  $cta_description = get_field('cta_description') ?: 'Schedule your appointment today and experience compassionate, professional healthcare tailored to your needs.';
  $cta_style = get_field('cta_style') ?: 'trinity'; // 'trinity', 'navy', 'light', 'gradient'
  
  // Primary CTA Button
  $primary_cta_text = get_field('cta_primary_text') ?: 'Contact Us Today';
  $primary_cta_url = get_field('cta_primary_url') ?: home_url('/contact');
  $primary_cta_icon = get_field('cta_primary_icon') ?: 'phone';
  
  // Secondary CTA Button (optional) - use global phone if available
  $show_secondary_cta = get_field('show_secondary_cta_button') !== false; // defaults to true
  $global_phone = get_field('global_phone', 'option') ?: '+260 123 456 789';
  $secondary_cta_text = get_field('cta_secondary_text') ?: 'Call: ' . $global_phone;
  $secondary_cta_url = get_field('cta_secondary_url') ?: 'tel:' . str_replace([' ', '+'], '', $global_phone);
  $secondary_cta_icon = get_field('cta_secondary_icon') ?: 'mobile';
  
  // Background styles
  $background_styles = [
    'trinity' => 'bg-[#880005]',
    'navy' => 'bg-[#1e3a8a]', 
    'light' => 'bg-gray-50',
    'gradient' => 'bg-gradient-to-r from-[#880005] to-[#1e3a8a]'
  ];
  
  // Text color based on background
  $text_colors = [
    'trinity' => 'text-white',
    'navy' => 'text-white',
    'light' => 'text-gray-900',
    'gradient' => 'text-white'
  ];
  
  // Button styles based on background
  $button_styles = [
    'trinity' => ['primary' => 'btn btn-light', 'secondary' => 'btn btn-light-outline'],
    'navy' => ['primary' => 'btn btn-light', 'secondary' => 'btn btn-light-outline'],
    'light' => ['primary' => 'btn btn-primary', 'secondary' => 'btn btn-secondary'],
    'gradient' => ['primary' => 'btn btn-light', 'secondary' => 'btn btn-light-outline']
  ];
  
  $current_bg = $background_styles[$cta_style] ?? $background_styles['trinity'];
  $current_text = $text_colors[$cta_style] ?? $text_colors['trinity'];
  $current_buttons = $button_styles[$cta_style] ?? $button_styles['trinity'];
  
  // Icon paths
  $icon_paths = [
    'phone' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
    'mobile' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
    'calendar' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
    'email' => 'M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
    'arrow' => 'M9 5l7 7-7 7'
  ];
@endphp

<section class="py-20 {{ $current_bg }}">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    
    {{-- CTA Title --}}
    <h2 class="text-4xl font-bold {{ $current_text }} mb-6">
      {{ $cta_title }}
    </h2>
    
    {{-- CTA Description --}}
    @if($cta_description)
      <p class="text-xl {{ $current_text }} mb-8 leading-relaxed">
        {{ $cta_description }}
      </p>
    @endif
    
    {{-- CTA Buttons --}}
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      
      {{-- Primary CTA --}}
      <a 
        href="{{ $primary_cta_url }}" 
        class="inline-flex items-center justify-center px-8 py-4 {{ $current_buttons['primary'] }}"
      >
        @if(isset($icon_paths[$primary_cta_icon]))
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon_paths[$primary_cta_icon] }}"></path>
          </svg>
        @endif
        {{ $primary_cta_text }}
      </a>
      
      {{-- Secondary CTA --}}
      @if($show_secondary_cta)
        <a 
          href="{{ $secondary_cta_url }}" 
          class="inline-flex items-center justify-center px-8 py-4 border-2 {{ $current_buttons['secondary'] }}"
        >
          @if(isset($icon_paths[$secondary_cta_icon]))
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon_paths[$secondary_cta_icon] }}"></path>
            </svg>
          @endif
          {{ $secondary_cta_text }}
        </a>
      @endif
      
    </div>
  </div>
</section>