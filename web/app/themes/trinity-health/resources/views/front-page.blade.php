{{--
  Template Name: Trinity Health Homepage
  Description: Flexible homepage using component system with Custom Fields and global data
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section - Uses Custom Fields or defaults with global data --}}
  @php
    // Set hero defaults with global data if no custom fields
    if (!get_field('hero_title')) {
      global $temp_hero_data;
      $temp_hero_data = [
        'hero_title' => 'Your Health, <span class="text-[#880005]">Our Priority</span>',
        'hero_subtitle' => 'Comprehensive Healthcare Excellence in Zambia',
        'hero_description' => 'From general medicine to specialized audiology care, Trinity Health provides compassionate, professional medical care tailored to your needs.',
        'hero_type' => 'video',
        'hero_video' => '/app/uploads/2025/06/hero-montage-video.mp4',
        'primary_cta_text' => 'Book Appointment',
        'primary_cta_url' => home_url('/contact'),
        'secondary_cta_text' => 'View Our Services',
        'secondary_cta_url' => home_url('/services'),
        'show_secondary_cta' => true,
        'stats_number' => trinity_get_global('patients_served', 'option') ?: '1000+',
        'stats_label' => 'Patients Served',
        'show_stats_card' => true
      ];
    }
  @endphp
  @include('components.hero-section')

  {{-- Services Grid Section - Uses Custom Fields or CPT data --}}
  @php
    // Set services defaults if no custom fields
    if (!get_field('services_section_title')) {
      global $temp_services_data;
      $temp_services_data = [
        'services_section_title' => 'Our Healthcare Services',
        'services_section_description' => 'Comprehensive medical care tailored to your needs. From routine check-ups to specialized treatments, we\'re here to support your health journey.',
        'services_layout' => '3-column',
        'show_view_all_services_cta' => true
      ];
    }
  @endphp
  @include('components.services-grid')

  {{-- About Dr. Mwamba / Team Section - Enhanced with global data --}}
  @php
    // Get team members for enhanced about section
    $team_query = trinity_get_team_members(['posts_per_page' => 1, 'meta_query' => [
      ['key' => 'member_position', 'value' => 'Medical Doctor', 'compare' => 'LIKE']
    ]]);
    
    $doctor_info = null;
    if ($team_query->have_posts()) {
      $team_query->the_post();
      $doctor_info = [
        'name' => get_the_title(),
        'position' => get_field('member_position'),
        'qualifications' => get_field('member_qualifications'),
        'specialties' => get_field('member_specialties'),
        'years_experience' => get_field('member_years_experience'),
        'image' => get_the_post_thumbnail_url(get_the_ID(), 'large')
      ];
      wp_reset_postdata();
    } else {
      // Fallback doctor info if no team member posts exist yet
      $doctor_info = [
        'name' => 'Dr. Alfred Mwamba',
        'position' => 'Medical Doctor',
        'qualifications' => 'MBChB, General Practice',
        'specialties' => 'Comprehensive healthcare services with a focus on patient-centered care and medical excellence.',
        'years_experience' => '10',
        'image' => home_url('/app/uploads/2025/06/dr-alfred-mwamba.jpg')
      ];
    }
  @endphp
  
  <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        
        {{-- Doctor/Team Image --}}
        <div class="relative">
          <div class="rounded-2xl aspect-[3/4] overflow-hidden">
            @if($doctor_info && $doctor_info['image'])
              <img 
                src="{{ $doctor_info['image'] }}" 
                alt="{{ $doctor_info['name'] }} - Trinity Health" 
                class="w-full h-full object-cover"
              >
            @elseif(get_field('doctor_image'))
              <img 
                src="{{ get_field('doctor_image') }}" 
                alt="{{ get_field('doctor_image_alt') ?: 'Trinity Health Team' }}" 
                class="w-full h-full object-cover"
              >
            @else
              {{-- Image Placeholder --}}
              <div class="bg-gray-400 w-full h-full flex items-center justify-center rounded-2xl">
                <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
            @endif
          </div>
          
          {{-- Floating Stats Card with Global Data --}}
          @php
            $global_stats = trinity_get_statistics();
            $display_stat = $global_stats['patients_served'];
            $years_exp = $global_stats['years_experience'];
          @endphp
          
          @if($display_stat || $years_exp)
            <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-xl shadow-lg">
              <div class="flex items-center space-x-4">
                @if($display_stat)
                  <div class="text-center">
                    <p class="text-2xl font-bold text-[#880005]">{{ $display_stat }}</p>
                    <p class="text-sm text-gray-600">Patients Served</p>
                  </div>
                @endif
                
                @if($years_exp)
                  <div class="text-center border-l border-gray-200 pl-4">
                    <p class="text-2xl font-bold text-[#880005]">{{ $years_exp }}+</p>
                    <p class="text-sm text-gray-600">Years Experience</p>
                  </div>
                @endif
              </div>
            </div>
          @endif
        </div>
        
        {{-- About Content --}}
        <div>
          @if($doctor_info)
            <h2 class="text-4xl font-bold text-gray-900 mb-6">Meet {{ $doctor_info['name'] }}</h2>
            
            @if($doctor_info['position'] && $doctor_info['qualifications'])
              <p class="text-xl text-[#880005] font-semibold mb-4">
                {{ $doctor_info['position'] }} • {{ $doctor_info['qualifications'] }}
              </p>
            @endif
            
            @if($doctor_info['specialties'])
              <p class="text-xl text-gray-600 mb-6 leading-relaxed">
                {{ $doctor_info['specialties'] }}
              </p>
            @else
              <p class="text-xl text-gray-600 mb-6 leading-relaxed">
                With years of experience in healthcare, our medical team brings compassionate, expert medical care to the Zambian community.
              </p>
            @endif
          @else
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
              {{ get_field('about_doctor_title') ?: 'Professional Healthcare Excellence' }}
            </h2>
            <p class="text-xl text-gray-600 mb-6 leading-relaxed">
              {{ get_field('about_doctor_description') ?: 'At Trinity Health, we combine medical expertise with compassionate care to serve the Zambian community with excellence and integrity.' }}
            </p>
          @endif
          
          {{-- Features/Qualifications --}}
          @php
            $features = get_field('doctor_features') ?: [
              ['title' => 'Professional Excellence', 'description' => 'Committed to the highest standards of medical care and patient safety'],
              ['title' => 'Comprehensive Services', 'description' => 'Full range of healthcare services from prevention to specialized treatment'],
              ['title' => 'Community Focus', 'description' => 'Dedicated to improving healthcare accessibility in Zambian communities']
            ];
          @endphp
          
          <div class="space-y-4 mb-8">
            @foreach($features as $feature)
              <div class="flex items-start space-x-3">
                <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
                  <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900">{{ $feature['title'] }}</h4>
                  <p class="text-gray-600">{{ $feature['description'] }}</p>
                </div>
              </div>
            @endforeach
          </div>
          
          <a 
            href="{{ get_field('about_cta_url') ?: home_url('/about') }}" 
            class="btn btn-primary btn-md"
          >
            {{ get_field('about_cta_text') ?: 'Learn More About Our Practice' }}
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- Testimonials Section - Using Global Data --}}
  @include('components.testimonials-grid', [
    'featured_only' => true,
    'limit' => 3,
    'columns' => 3,
    'style' => 'cards'
  ])

  {{-- Contact Information Section with Hours --}}
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-3 gap-8">
        
        {{-- Contact Information --}}
        <div>
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h3>
          @include('components.contact-info', ['style' => 'compact', 'show_emergency' => true])
        </div>
        
        {{-- Business Hours --}}
        <div>
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Operating Hours</h3>
          @include('components.business-hours', ['style' => 'inline'])
        </div>
        
        {{-- Quick Actions --}}
        <div>
          <h3 class="text-2xl font-bold text-gray-900 mb-6">Quick Actions</h3>
          <div class="space-y-4">
            @php $contact = trinity_get_contact_info(); @endphp
            
            <a 
              href="tel:{{ trinity_clean_phone($contact['phone']) }}" 
              class="flex items-center p-4 bg-[#880005]/5 rounded-lg hover:bg-[#880005]/10 transition-colors"
            >
              <div class="bg-[#880005]/10 p-3 rounded-full mr-4">
                <svg class="w-5 h-5 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
              </div>
              <div>
                <p class="font-semibold text-gray-900">Call Now</p>
                <p class="text-sm text-gray-600">{{ trinity_format_phone($contact['phone']) }}</p>
              </div>
            </a>
            
            <a 
              href="mailto:{{ $contact['email'] }}" 
              class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors"
            >
              <div class="bg-gray-200 p-3 rounded-full mr-4">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
              </div>
              <div>
                <p class="font-semibold text-gray-900">Email Us</p>
                <p class="text-sm text-gray-600">{{ $contact['email'] }}</p>
              </div>
            </a>
            
            <a 
              href="{{ home_url('/contact') }}" 
              class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors"
            >
              <div class="bg-blue-100 p-3 rounded-full mr-4">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <div>
                <p class="font-semibold text-gray-900">Visit Us</p>
                <p class="text-sm text-gray-600">Get Directions</p>
              </div>
            </a>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  {{-- Contact CTA Section - Uses Custom Fields or global defaults --}}
  @include('components.cta-section')
@endsection
