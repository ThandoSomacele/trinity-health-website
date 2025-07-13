{{--
  About Doctor Section Component - Flexible Content
  
  Specifically for Dr. Mwamba section with editable content
  Used on homepage with fallback content
--}}

@php
  // Get custom fields if they exist, otherwise use defaults
  $about_title = get_field('about_doctor_title') ?: 'Meet Dr. Alfred Mwamba';
  $about_description = get_field('about_doctor_description') ?: 'With years of experience in healthcare and a specialization in audiology, Dr. Mwamba brings compassionate, expert medical care to the Zambian community.';
  $doctor_image = get_field('doctor_image') ?: '/app/uploads/2025/06/dr-alfred-mwamba.jpg';
  $doctor_image_alt = get_field('doctor_image_alt') ?: 'Dr. Alfred Mwamba - Trinity Health Zambia';
  
  // CTA Button
  $about_cta_text = get_field('about_cta_text') ?: 'Learn More About Our Practice';
  $about_cta_url = get_field('about_cta_url') ?: home_url('/about');
  $show_about_cta = get_field('show_about_cta') !== false; // defaults to true
  
  // Features List - editable via custom fields
  $doctor_features = get_field('doctor_features');
  
  // Default features if none set
  if (empty($doctor_features)) {
    $doctor_features = [
      [
        'title' => 'Specialized Audiology Training',
        'description' => 'Advanced certification in hearing healthcare and auditory rehabilitation'
      ],
      [
        'title' => 'Comprehensive Healthcare',
        'description' => 'General medicine practice with focus on preventive care and patient education'
      ],
      [
        'title' => 'Community-Focused Care',
        'description' => 'Dedicated to improving healthcare accessibility in Zambian communities'
      ]
    ];
  }
  
  // Background style
  $section_background = get_field('about_section_background') ?: 'gray';
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
  
  $current_bg = $background_classes[$section_background] ?? $background_classes['gray'];
  $current_text = $text_classes[$section_background] ?? $text_classes['gray'];
@endphp

<section class="py-20 {{ $current_bg }}">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      
      {{-- Doctor Image --}}
      <div class="relative">
        <div class="rounded-2xl aspect-[3/4] overflow-hidden">
          @if($doctor_image)
            <img 
              src="{{ $doctor_image }}" 
              alt="{{ $doctor_image_alt }}" 
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
      </div>
      
      {{-- About Content --}}
      <div>
        <h2 class="text-4xl font-bold {{ $current_text }} mb-6">{{ $about_title }}</h2>
        <p class="text-xl {{ $current_text === 'text-white' ? 'text-white' : 'text-gray-600' }} mb-6 leading-relaxed">
          {{ $about_description }}
        </p>
        
        {{-- WordPress Block Editor Content (Optional additional content) --}}
        @if(get_the_content())
          <div class="content-area {{ $current_text }} prose prose-lg mb-8">
            @php(the_content())
          </div>
        @endif
        
        {{-- Features List --}}
        @if(!empty($doctor_features))
          <div class="space-y-4 mb-8">
            @foreach($doctor_features as $feature)
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
        
        {{-- CTA Button --}}
        @if($show_about_cta)
          <a 
            href="{{ $about_cta_url }}" 
            class="btn {{ $section_background === 'white' || $section_background === 'gray' ? 'btn-primary' : 'btn-light' }} btn-md"
          >
            {{ $about_cta_text }}
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        @endif
      </div>
    </div>
  </div>
</section>