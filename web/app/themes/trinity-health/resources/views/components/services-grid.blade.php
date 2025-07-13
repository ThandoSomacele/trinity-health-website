{{--
  Services Grid Component - Flexible Content
  
  Pulls services from Custom Post Types or Custom Fields
  Maintains Trinity Health design standards
--}}

@php
  // Get services data - try Custom Fields first, then CPT, then defaults
  $services_title = get_field('services_section_title') ?: 'Our Healthcare Services';
  $services_description = get_field('services_section_description') ?: 'Comprehensive medical care tailored to your needs. From routine check-ups to specialized treatments, we\'re here to support your health journey.';
  $services_layout = get_field('services_layout') ?: '3-column'; // '2-column', '3-column', '4-column'
  $show_view_all_cta = get_field('show_view_all_services_cta') !== false; // defaults to true
  
  // Get services - check for custom fields array first
  $custom_services = get_field('featured_services');
  
  if ($custom_services && is_array($custom_services)) {
    // Use custom fields
    $services = $custom_services;
  } else {
    // Fall back to CPT query
    $health_services = get_posts([
      'post_type' => 'health_service',
      'posts_per_page' => 6,
      'post_status' => 'publish'
    ]);
    
    $audiology_services = get_posts([
      'post_type' => 'audiology_service', 
      'posts_per_page' => 3,
      'post_status' => 'publish'
    ]);
    
    // Convert to standardized format
    $services = [];
    foreach(array_merge($health_services, $audiology_services) as $service) {
      $services[] = [
        'title' => $service->post_title,
        'description' => $service->post_excerpt ?: wp_trim_words($service->post_content, 25),
        'icon' => get_field('service_icon', $service->ID) ?: 'heart',
        'url' => get_permalink($service->ID),
        'cta_text' => 'Learn More'
      ];
    }
  }
  
  // Default services if nothing else found
  if (empty($services)) {
    $services = [
      [
        'title' => 'General Health',
        'description' => 'Comprehensive medical examinations, preventive care, and treatment for common health conditions.',
        'icon' => 'heart',
        'url' => home_url('/health-services'),
        'cta_text' => 'Learn More'
      ],
      [
        'title' => 'Audiology Services', 
        'description' => 'Specialized hearing healthcare services including hearing tests, hearing aid fittings, and auditory rehabilitation.',
        'icon' => 'volume',
        'url' => home_url('/audiology-services'),
        'cta_text' => 'Learn More'
      ],
      [
        'title' => 'Emergency Care',
        'description' => 'Urgent medical care when you need it most. Professional emergency response and immediate medical attention.',
        'icon' => 'medical',
        'url' => home_url('/emergency-care'),
        'cta_text' => 'Learn More'
      ]
    ];
  }
  
  // Grid classes based on layout
  $grid_classes = [
    '2-column' => 'md:grid-cols-2 gap-12',
    '3-column' => 'md:grid-cols-2 lg:grid-cols-3 gap-8', 
    '4-column' => 'md:grid-cols-2 lg:grid-cols-4 gap-8'
  ];
  
  $current_grid_class = $grid_classes[$services_layout] ?? $grid_classes['3-column'];
  
  // Icon mapping
  $icon_paths = [
    'heart' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
    'volume' => 'M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z',
    'medical' => 'M12 6v6m0 0v6m0-6h6m-6 0H6',
    'stethoscope' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
    'shield' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'
  ];
@endphp

<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- Section Header --}}
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ $services_title }}</h2>
      @if($services_description)
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          {{ $services_description }}
        </p>
      @endif
    </div>
    
    {{-- Services Grid --}}
    <div class="grid {{ $current_grid_class }}">
      @foreach($services as $service)
        <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
          {{-- Service Icon --}}
          <div class="bg-[#880005]/10 p-4 rounded-xl w-fit mb-6 group-hover:bg-[#880005]/20 transition-colors">
            <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              @if(isset($icon_paths[$service['icon']]))
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon_paths[$service['icon']] }}"></path>
              @else
                {{-- Default heart icon --}}
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon_paths['heart'] }}"></path>
              @endif
            </svg>
          </div>
          
          {{-- Service Content --}}
          <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $service['title'] }}</h3>
          <p class="text-gray-600 mb-6 leading-relaxed">
            {{ $service['description'] }}
          </p>
          
          {{-- Service CTA --}}
          <a href="{{ $service['url'] }}" class="btn btn-ghost btn-sm">
            {{ $service['cta_text'] ?? 'Learn More' }}
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      @endforeach
    </div>
    
    {{-- View All Services CTA --}}
    @if($show_view_all_cta)
      <div class="text-center mt-12">
        <a 
          href="{{ get_field('view_all_services_url') ?: home_url('/services') }}" 
          class="btn btn-secondary btn-lg"
        >
          {{ get_field('view_all_services_text') ?: 'View All Services' }}
          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    @endif
  </div>
</section>