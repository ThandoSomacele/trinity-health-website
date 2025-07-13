{{--
  Hero Section Component - Flexible Content
  
  Accepts content from Custom Fields or falls back to defaults
  Used for: Homepage, Services, About, etc.
--}}

@php
  // Get custom fields if they exist, otherwise use defaults
  $hero_title = get_field('hero_title') ?: 'Your Health, Our Priority';
  $hero_subtitle = get_field('hero_subtitle') ?: 'Comprehensive healthcare services in Zambia.';
  $hero_description = get_field('hero_description') ?: 'From general medicine to specialized audiology care, Dr. Alfred Mwamba and the Trinity Health team provide compassionate, professional medical care.';
  $hero_image = get_field('hero_image') ?: '/app/uploads/2025/06/hero-montage-video.mp4';
  $hero_video = get_field('hero_video') ?: '/app/uploads/2025/06/hero-montage-video.mp4';
  $hero_type = get_field('hero_type') ?: 'video'; // 'video' or 'image'
  $hero_style = get_field('hero_style') ?: 'default'; // 'default', 'centered', 'minimal'
  
  // CTA Buttons - editable via Custom Fields
  $primary_cta_text = get_field('primary_cta_text') ?: 'Book Appointment';
  $primary_cta_url = get_field('primary_cta_url') ?: home_url('/contact');
  $secondary_cta_text = get_field('secondary_cta_text') ?: 'View Our Services';
  $secondary_cta_url = get_field('secondary_cta_url') ?: home_url('/services');
  $show_secondary_cta = get_field('show_secondary_cta') !== false; // defaults to true
  
  // Stats Card - editable
  $stats_number = get_field('stats_number') ?: '1000+';
  $stats_label = get_field('stats_label') ?: 'Patients Served';
  $show_stats = get_field('show_stats_card') !== false; // defaults to true
@endphp

<section class="relative bg-gradient-to-br from-gray-50 to-white py-20 lg:py-32">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      
      {{-- Hero Content --}}
      <div class="lg:pr-8">
        <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
          {!! $hero_title !!}
        </h1>
        
        @if($hero_subtitle)
          <p class="text-xl text-gray-600 mb-8 leading-relaxed">
            {{ $hero_subtitle }}
          </p>
        @endif
        
        @if($hero_description)
          <p class="text-lg text-gray-600 mb-8 leading-relaxed">
            {{ $hero_description }}
          </p>
        @endif
        
        <div class="flex flex-col sm:flex-row gap-4">
          <a 
            href="{{ $primary_cta_url }}" 
            class="btn btn-primary btn-lg"
          >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            {{ $primary_cta_text }}
          </a>
          
          @if($show_secondary_cta)
            <a 
              href="{{ $secondary_cta_url }}" 
              class="btn btn-secondary btn-lg"
            >
              {{ $secondary_cta_text }}
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          @endif
        </div>
      </div>
      
      {{-- Hero Media --}}
      <div class="relative">
        <div class="rounded-2xl aspect-[4/3] overflow-hidden">
          @if($hero_type === 'video' && $hero_video)
            <video 
              autoplay 
              muted 
              loop 
              playsinline
              class="w-full h-full object-cover"
              aria-label="Trinity Health Zambia medical facility overview"
            >
              <source src="{{ $hero_video }}" type="video/mp4">
              {{-- Fallback image --}}
              @if($hero_image)
                <img src="{{ $hero_image }}" alt="Trinity Health Zambia" class="w-full h-full object-cover">
              @endif
            </video>
          @elseif($hero_image)
            <img 
              src="{{ $hero_image }}" 
              alt="Trinity Health Zambia" 
              class="w-full h-full object-cover"
            >
          @else
            {{-- Placeholder --}}
            <div class="bg-gray-400 w-full h-full flex items-center justify-center rounded-2xl">
              <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
            </div>
          @endif
        </div>
        
        {{-- Floating Stats Card --}}
        @if($show_stats)
          <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-xl shadow-lg">
            <div class="flex items-center space-x-3">
              <div class="bg-[#880005]/10 p-3 rounded-full">
                <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
              </div>
              <div>
                <p class="text-2xl font-bold text-gray-900">{{ $stats_number }}</p>
                <p class="text-sm text-gray-600">{{ $stats_label }}</p>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>