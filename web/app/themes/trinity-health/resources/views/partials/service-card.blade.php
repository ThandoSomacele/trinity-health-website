{{--
  Service Card Partial - Trinity Health
  
  Usage: @include('partials.service-card', ['service' => $service])
  
  Expected data:
  - $service: WordPress post object for health_service or audiology_service
--}}

@php
  // Extract service data
  $service_id = $service->ID ?? get_the_ID();
  $service_title = $service->post_title ?? get_the_title();
  $service_permalink = get_permalink($service_id);
  
  // Advanced Custom Fields data
  $service_icon = get_field('service_icon', $service_id) ?: 'medical-cross';
  $service_description = get_field('service_description', $service_id) ?: wp_trim_words(get_the_excerpt($service_id), 20);
  $service_features = get_field('service_features', $service_id) ?: [];
  $service_price_range = get_field('service_price_range', $service_id);
  $service_duration = get_field('service_duration', $service_id);
  $is_featured = get_field('is_featured_service', $service_id);
  $service_category = get_field('service_category', $service_id) ?: 'General Health';

  // Icon mapping for different service types
  $icon_map = [
    'medical-cross' => 'M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3V8zM4 8h2V6H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-2h-2v2H4V8z',
    'stethoscope' => 'M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z',
    'heart' => 'M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z',
    'ear' => 'M17 20c.29 0 .57-.12.76-.32C19.53 17.77 21 15.54 21 13c0-2.54-1.47-4.77-3.24-6.68-.19-.2-.47-.32-.76-.32s-.57.12-.76.32c-.19.2-.31.47-.31.76 0 .29.12.57.31.76C17.46 9.04 18.5 10.94 18.5 13c0 2.06-1.04 3.96-2.26 5.16-.19.19-.31.47-.31.76 0 .29.12.57.31.76.19.2.47.32.76.32z',
    'eye' => 'M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z',
    'brain' => 'M21.33 12.91c.09-.09.15-.2.19-.32.04-.12.04-.25 0-.37-.04-.12-.1-.23-.19-.32l-3.68-3.68c-.23-.23-.54-.36-.87-.36s-.64.13-.87.36c-.23.23-.36.54-.36.87s.13.64.36.87l2.95 2.95-2.95 2.95c-.23.23-.36.54-.36.87s.13.64.36.87c.23.23.54.36.87.36s.64-.13.87-.36l3.68-3.68z'
  ];
  
  $icon_path = $icon_map[$service_icon] ?? $icon_map['medical-cross'];
@endphp

<div class="service-card group {{ $is_featured ? 'border-2 border-primary-200' : '' }}">
  {{-- Featured Badge --}}
  @if($is_featured)
    <div class="absolute top-4 right-4 bg-primary-900 text-white text-xs font-semibold px-2 py-1 rounded-full">
      Featured
    </div>
  @endif

  <div class="card-body relative">
    {{-- Service Category --}}
    <div class="text-xs font-medium text-primary-900 uppercase tracking-wide mb-3">
      {{ $service_category }}
    </div>

    {{-- Service Icon --}}
    <div class="service-card-icon mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
      <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
        <path d="{{ $icon_path }}"/>
      </svg>
    </div>
    
    {{-- Service Title --}}
    <h3 class="service-card-title group-hover:text-primary-900 transition-colors">
      <a href="{{ $service_permalink }}" class="stretched-link">
        {{ $service_title }}
      </a>
    </h3>
    
    {{-- Service Description --}}
    <p class="service-card-description mb-4">
      {{ $service_description }}
    </p>

    {{-- Service Features (if available) --}}
    @if($service_features && is_array($service_features) && count($service_features) > 0)
      <ul class="text-xs text-neutral-600 mb-4 space-y-1">
        @foreach(array_slice($service_features, 0, 3) as $feature)
          <li class="flex items-start">
            <span class="inline-block w-1 h-1 bg-primary-900 rounded-full mt-2 mr-2 flex-shrink-0"></span>
            {{ $feature['feature'] ?? $feature }}
          </li>
        @endforeach
        @if(count($service_features) > 3)
          <li class="text-primary-900 font-medium">+ {{ count($service_features) - 3 }} more</li>
        @endif
      </ul>
    @endif

    {{-- Service Details --}}
    <div class="flex justify-between items-center text-xs text-neutral-600 mb-4">
      @if($service_duration)
        <span class="flex items-center">
          <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
          </svg>
          {{ $service_duration }}
        </span>
      @endif
      
      @if($service_price_range)
        <span class="flex items-center font-medium text-primary-900">
          <span class="mr-1">ZMK</span>{{ $service_price_range }}
        </span>
      @endif
    </div>

    {{-- Action Button --}}
    <div class="text-center">
      <a href="{{ $service_permalink }}" 
         class="inline-flex items-center text-primary-900 font-medium hover:text-primary-700 transition-colors group">
        Learn More 
        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>
      </a>
    </div>
  </div>

  {{-- Hover overlay effect --}}
  <div class="absolute inset-0 bg-gradient-to-t from-primary-900/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-card pointer-events-none"></div>
</div>

{{-- CSS for stretched-link (Bootstrap-style) --}}
<style>
.stretched-link::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1;
  content: "";
}
</style>
