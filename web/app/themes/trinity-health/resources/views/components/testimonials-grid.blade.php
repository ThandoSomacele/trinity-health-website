{{--
  Testimonials Grid Component
  
  Displays patient testimonials from the testimonials post type
  Pulls from global testimonials with approval and featured options
--}}

@php
  // Component options
  $featured_only = $featured_only ?? false;
  $limit = $limit ?? 6;
  $columns = $columns ?? 3; // 1, 2, 3, or 4
  $show_ratings = $show_ratings ?? true;
  $style = $style ?? 'cards'; // 'cards', 'quotes', 'minimal'
  
  // Get testimonials
  if ($featured_only) {
    $testimonials_query = trinity_get_featured_testimonials($limit);
  } else {
    $testimonials_query = trinity_get_testimonials(['posts_per_page' => $limit]);
  }
  
  // Grid classes
  $grid_classes = [
    1 => 'grid-cols-1',
    2 => 'grid-cols-1 md:grid-cols-2 gap-8',
    3 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6',
    4 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6'
  ];
  
  $current_grid = $grid_classes[$columns] ?? $grid_classes[3];
  
  // Star rating function
  function render_stars($rating, $size = 'w-4 h-4') {
    $rating = (int) $rating;
    $output = '';
    for ($i = 1; $i <= 5; $i++) {
      if ($i <= $rating) {
        $output .= '<svg class="' . $size . ' text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>';
      } else {
        $output .= '<svg class="' . $size . ' text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>';
      }
    }
    return $output;
  }
@endphp

@if($testimonials_query->have_posts())
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      {{-- Section Header --}}
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">
          {{ $featured_only ? 'Featured' : 'Patient' }} Testimonials
        </h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Real experiences from our valued patients at Trinity Health Zambia
        </p>
      </div>
      
      {{-- Testimonials Grid --}}
      <div class="grid {{ $current_grid }}">
        @while($testimonials_query->have_posts())
          @php($testimonials_query->the_post())
          @php
            $patient_name = get_field('patient_name');
            $patient_age = get_field('patient_age');
            $service_received = get_field('service_received');
            $rating = get_field('rating');
            $testimonial_date = get_field('testimonial_date');
            $is_featured = get_field('featured_testimonial');
          @endphp
          
          @if($style === 'quotes')
            {{-- Quote Style --}}
            <div class="relative bg-white p-8 rounded-xl shadow-lg {{ $is_featured ? 'ring-2 ring-[#880005] ring-opacity-20' : '' }}">
              {{-- Quote mark --}}
              <div class="absolute top-4 left-4 text-[#880005] opacity-20">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-10zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                </svg>
              </div>
              
              <div class="pt-8">
                <div class="prose prose-gray max-w-none mb-6">
                  <p class="text-gray-700 leading-relaxed">{{ get_the_content() }}</p>
                </div>
                
                @if($show_ratings && $rating)
                  <div class="flex items-center mb-4">
                    {!! render_stars($rating) !!}
                    <span class="ml-2 text-sm text-gray-600">{{ $rating }}/5</span>
                  </div>
                @endif
                
                <div class="border-t border-gray-100 pt-4">
                  <p class="font-semibold text-gray-900">{{ $patient_name }}</p>
                  @if($service_received)
                    <p class="text-sm text-gray-600">{{ ucwords(str_replace('_', ' ', $service_received)) }}</p>
                  @endif
                  @if($testimonial_date)
                    <p class="text-xs text-gray-500">{{ date('F Y', strtotime($testimonial_date)) }}</p>
                  @endif
                </div>
              </div>
            </div>
            
          @elseif($style === 'minimal')
            {{-- Minimal Style --}}
            <div class="text-center {{ $is_featured ? 'bg-[#880005]/5 p-6 rounded-lg' : '' }}">
              @if($show_ratings && $rating)
                <div class="flex justify-center items-center mb-3">
                  {!! render_stars($rating, 'w-5 h-5') !!}
                </div>
              @endif
              
              <blockquote class="text-gray-700 italic mb-4">
                "{{ wp_trim_words(get_the_content(), 20) }}"
              </blockquote>
              
              <cite class="text-sm">
                <span class="font-semibold text-gray-900">{{ $patient_name }}</span>
                @if($service_received)
                  <span class="text-gray-600"> • {{ ucwords(str_replace('_', ' ', $service_received)) }}</span>
                @endif
              </cite>
            </div>
            
          @else
            {{-- Card Style (Default) --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow {{ $is_featured ? 'ring-2 ring-[#880005] ring-opacity-20' : '' }}">
              <div class="p-6">
                
                {{-- Featured Badge --}}
                @if($is_featured)
                  <div class="mb-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#880005] text-white">
                      Featured
                    </span>
                  </div>
                @endif
                
                {{-- Rating --}}
                @if($show_ratings && $rating)
                  <div class="flex items-center mb-4">
                    {!! render_stars($rating) !!}
                    <span class="ml-2 text-sm text-gray-600">{{ $rating }}/5</span>
                  </div>
                @endif
                
                {{-- Testimonial Content --}}
                <div class="prose prose-gray prose-sm max-w-none mb-6">
                  <p class="text-gray-700">{{ get_the_content() }}</p>
                </div>
                
                {{-- Patient Info --}}
                <div class="border-t border-gray-100 pt-4 flex items-center justify-between">
                  <div>
                    <p class="font-semibold text-gray-900">{{ $patient_name }}</p>
                    @if($patient_age)
                      <p class="text-sm text-gray-600">Age {{ $patient_age }}</p>
                    @endif
                  </div>
                  
                  <div class="text-right">
                    @if($service_received)
                      <p class="text-sm font-medium text-[#880005]">{{ ucwords(str_replace('_', ' ', $service_received)) }}</p>
                    @endif
                    @if($testimonial_date)
                      <p class="text-xs text-gray-500">{{ date('M Y', strtotime($testimonial_date)) }}</p>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endif
          
        @endwhile
        @php(wp_reset_postdata())
      </div>
      
    </div>
  </section>
@endif