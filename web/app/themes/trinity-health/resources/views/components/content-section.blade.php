{{--
  Content Section Component - Block Editor Integration
  
  Combines WordPress Block Editor content with flexible layouts
  Perfect for About sections, service details, etc.
--}}

@php
  // Get layout options from Custom Fields
  $content_layout = get_field('content_layout') ?: 'two-column'; // 'full-width', 'two-column', 'image-left', 'image-right'
  $section_title = get_field('section_title');
  $section_description = get_field('section_description');
  $featured_image = get_field('section_featured_image') ?: get_the_post_thumbnail_url(get_the_ID(), 'large');
  $image_alt = get_field('section_image_alt') ?: get_the_title();
  
  // Background options
  $background_style = get_field('section_background') ?: 'white'; // 'white', 'gray', 'trinity', 'navy'
  $background_classes = [
    'white' => 'bg-white',
    'gray' => 'bg-gray-50', 
    'trinity' => 'bg-[#880005]',
    'navy' => 'bg-[#1e3a8a]'
  ];
  
  $text_classes = [
    'white' => 'text-gray-900',
    'gray' => 'text-gray-900',
    'trinity' => 'text-white',
    'navy' => 'text-white'
  ];
  
  $current_bg = $background_classes[$background_style] ?? $background_classes['white'];
  $current_text = $text_classes[$background_style] ?? $text_classes['white'];
  
  // Custom features list (editable via custom fields)
  $features_list = get_field('features_list');
  $show_features = get_field('show_features_list') && !empty($features_list);
@endphp

<section class="py-20 {{ $current_bg }}">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    @if($content_layout === 'full-width')
      {{-- Full Width Layout --}}
      <div class="max-w-4xl mx-auto text-center">
        @if($section_title)
          <h2 class="text-4xl font-bold {{ $current_text }} mb-6">{{ $section_title }}</h2>
        @endif
        
        @if($section_description)
          <p class="text-xl {{ $current_text === 'text-white' ? 'text-white' : 'text-gray-600' }} mb-8">{{ $section_description }}</p>
        @endif
        
        <div class="content-area {{ $current_text }} prose prose-lg max-w-none">
          @php(the_content())
        </div>
      </div>
      
    @elseif($content_layout === 'two-column' || $content_layout === 'image-left' || $content_layout === 'image-right')
      {{-- Two Column Layouts --}}
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        
        @if($content_layout === 'image-left')
          {{-- Image Column (Left) --}}
          <div class="relative">
            @if($featured_image)
              <div class="rounded-2xl aspect-[3/4] overflow-hidden">
                <img 
                  src="{{ $featured_image }}" 
                  alt="{{ $image_alt }}" 
                  class="w-full h-full object-cover"
                >
              </div>
            @else
              {{-- Image Placeholder --}}
              <div class="bg-gray-400 aspect-[3/4] rounded-2xl flex items-center justify-center">
                <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
              </div>
            @endif
          </div>
        @endif
        
        {{-- Content Column --}}
        <div class="{{ $content_layout === 'image-right' ? 'order-1' : '' }}">
          @if($section_title)
            <h2 class="text-4xl font-bold {{ $current_text }} mb-6">{{ $section_title }}</h2>
          @endif
          
          @if($section_description)
            <p class="text-xl {{ $current_text === 'text-white' ? 'text-white' : 'text-gray-600' }} mb-6 leading-relaxed">{{ $section_description }}</p>
          @endif
          
          {{-- WordPress Block Editor Content --}}
          <div class="content-area {{ $current_text }} prose prose-lg max-w-none mb-8">
            @php(the_content())
          </div>
          
          {{-- Features List --}}
          @if($show_features)
            <div class="space-y-4 mb-8">
              @foreach($features_list as $feature)
                <div class="flex items-start space-x-3">
                  <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
                    <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold {{ $current_text }}">{{ $feature['title'] }}</h4>
                    @if(isset($feature['description']))
                      <p class="{{ $current_text === 'text-white' ? 'text-white' : 'text-gray-600' }}">{{ $feature['description'] }}</p>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          @endif
          
          {{-- Optional CTA Button --}}
          @if(get_field('section_cta_text'))
            <a 
              href="{{ get_field('section_cta_url') ?: '#' }}" 
              class="btn {{ $background_style === 'white' || $background_style === 'gray' ? 'btn-primary' : 'btn-light' }} btn-md"
            >
              {{ get_field('section_cta_text') }}
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          @endif
        </div>
        
        @if($content_layout === 'image-right')
          {{-- Image Column (Right) --}}
          <div class="relative order-2">
            @if($featured_image)
              <div class="rounded-2xl aspect-[3/4] overflow-hidden">
                <img 
                  src="{{ $featured_image }}" 
                  alt="{{ $image_alt }}" 
                  class="w-full h-full object-cover"
                >
              </div>
            @else
              {{-- Image Placeholder --}}
              <div class="bg-gray-400 aspect-[3/4] rounded-2xl flex items-center justify-center">
                <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
              </div>
            @endif
          </div>
        @endif
        
        @if($content_layout === 'two-column')
          {{-- Second Column for Two-Column Layout --}}
          <div class="content-area {{ $current_text }} prose prose-lg">
            {{-- Additional content can go here via custom fields --}}
            @if(get_field('second_column_content'))
              {!! get_field('second_column_content') !!}
            @endif
          </div>
        @endif
        
      </div>
    @endif
    
  </div>
</section>