{{--
  Template Name: About Trinity Health
  Description: About page using flexible component system with Custom Fields
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    
    {{-- Hero Section with About Content --}}
    @php
      // Override hero defaults for About page if no custom fields set
      if (!get_field('hero_title')) {
        // Set temporary values for hero component
        global $temp_hero_data;
        $temp_hero_data = [
          'hero_title' => 'About <span class="text-[#880005]">Trinity Health</span>',
          'hero_subtitle' => 'Compassionate Healthcare Excellence',
          'hero_description' => 'Dedicated to providing exceptional medical care to the Zambian community through professional expertise, modern facilities, and patient-centered approach.',
          'hero_type' => 'image',
          'hero_image' => '/app/uploads/2025/06/trinity-health-clinic.jpg',
          'primary_cta_text' => 'Contact Us',
          'primary_cta_url' => home_url('/contact'),
          'show_secondary_cta' => false,
          'show_stats_card' => true,
          'stats_number' => trinity_get_global('patients_served', 'option') ?: '1000+',
          'stats_label' => 'Patients Served'
        ];
      }
    @endphp
    @include('components.hero-section')
    
    {{-- About Trinity Health Section --}}
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
          
          {{-- About Content --}}
          <div>
            <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Mission & Vision</h2>
            
            {{-- WordPress Block Editor Content --}}
            <div class="prose prose-lg prose-gray max-w-none mb-8">
              @if(get_the_content())
                @php(the_content())
              @else
                <p class="text-xl text-gray-600 mb-6">
                  Trinity Health Zambia is committed to providing comprehensive, compassionate healthcare services 
                  to our community. We combine modern medical expertise with a patient-first approach to ensure 
                  the highest quality care for every individual we serve.
                </p>
                
                <p class="text-gray-700 mb-6">
                  Our facility offers a full range of medical services, from routine check-ups and preventive care 
                  to specialized audiology services. We believe that quality healthcare should be accessible, 
                  professional, and delivered with genuine care and respect for our patients.
                </p>
                
                <p class="text-gray-700">
                  At Trinity Health, we are dedicated to building lasting relationships with our patients and 
                  contributing positively to the health and wellbeing of the Zambian community.
                </p>
              @endif
            </div>
            
            {{-- Core Values --}}
            <div class="space-y-4">
              @php
                $core_values = get_field('core_values') ?: [
                  ['title' => 'Excellence in Care', 'description' => 'Providing the highest standard of medical care with attention to detail'],
                  ['title' => 'Patient-Centered Approach', 'description' => 'Putting patient needs and comfort at the center of everything we do'],
                  ['title' => 'Professional Integrity', 'description' => 'Maintaining ethical standards and transparency in all our practices'],
                  ['title' => 'Community Commitment', 'description' => 'Actively contributing to the health and wellness of our community']
                ];
              @endphp
              
              @foreach($core_values as $value)
                <div class="flex items-start space-x-3">
                  <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
                    <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-900">{{ $value['title'] }}</h4>
                    <p class="text-gray-600">{{ $value['description'] }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          
          {{-- About Image --}}
          <div class="relative">
            @php
              $about_image = get_field('about_image') ?: '/app/uploads/2025/06/trinity-health-team.jpg';
            @endphp
            
            @if($about_image)
              <div class="rounded-2xl aspect-[4/3] overflow-hidden">
                <img 
                  src="{{ $about_image }}" 
                  alt="Trinity Health Team" 
                  class="w-full h-full object-cover"
                >
              </div>
            @else
              {{-- Image Placeholder --}}
              <div class="bg-gray-400 aspect-[4/3] rounded-2xl flex items-center justify-center">
                <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2-4h6m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v8m-6 0V5a2 2 0 012-2h2a2 2 0 012 2v16"></path>
                </svg>
              </div>
            @endif
            
            {{-- Floating Achievement Card --}}
            @php
              $years_experience = trinity_get_global('years_experience', 'option');
              $success_rate = trinity_get_global('success_rate', 'option');
            @endphp
            
            @if($years_experience || $success_rate)
              <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-xl shadow-lg">
                <div class="flex items-center space-x-4">
                  @if($years_experience)
                    <div class="text-center">
                      <p class="text-2xl font-bold text-[#880005]">{{ $years_experience }}+</p>
                      <p class="text-sm text-gray-600">Years Experience</p>
                    </div>
                  @endif
                  
                  @if($success_rate)
                    <div class="text-center border-l border-gray-200 pl-4">
                      <p class="text-2xl font-bold text-[#880005]">{{ $success_rate }}</p>
                      <p class="text-sm text-gray-600">Success Rate</p>
                    </div>
                  @endif
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    
    {{-- Team Section --}}
    @php
      $team_query = trinity_get_team_members(['posts_per_page' => 6]);
    @endphp
    
    @if($team_query->have_posts())
      <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          {{-- Section Header --}}
          <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
              Our dedicated healthcare professionals are committed to providing exceptional medical care 
              with expertise, compassion, and integrity.
            </p>
          </div>
          
          {{-- Team Grid --}}
          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @while($team_query->have_posts())
              @php($team_query->the_post())
              @php
                $position = get_field('member_position');
                $qualifications = get_field('member_qualifications');
                $specialties = get_field('member_specialties');
                $years_exp = get_field('member_years_experience');
                $languages = get_field('member_languages');
              @endphp
              
              <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                {{-- Team Member Photo --}}
                <div class="aspect-[3/4] overflow-hidden">
                  @if(has_post_thumbnail())
                    {{ the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']) }}
                  @else
                    {{-- Placeholder --}}
                    <div class="bg-gray-400 w-full h-full flex items-center justify-center">
                      <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                    </div>
                  @endif
                </div>
                
                {{-- Team Member Info --}}
                <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-900 mb-2">{{ get_the_title() }}</h3>
                  
                  @if($position)
                    <p class="text-[#880005] font-semibold mb-2">{{ $position }}</p>
                  @endif
                  
                  @if($qualifications)
                    <p class="text-sm text-gray-600 mb-3">{{ $qualifications }}</p>
                  @endif
                  
                  @if($specialties)
                    <p class="text-gray-700 text-sm mb-4">{{ wp_trim_words($specialties, 15) }}</p>
                  @endif
                  
                  <div class="flex items-center justify-between text-sm text-gray-500">
                    @if($years_exp)
                      <span>{{ $years_exp }} years experience</span>
                    @endif
                    
                    @if($languages && is_array($languages))
                      <span>{{ count($languages) }} language{{ count($languages) > 1 ? 's' : '' }}</span>
                    @endif
                  </div>
                </div>
              </div>
            @endwhile
            @php(wp_reset_postdata())
          </div>
          
        </div>
      </section>
    @endif
    
    {{-- Certifications & Awards Section --}}
    @php
      $certifications = trinity_get_global('certifications', 'option');
    @endphp
    
    @if($certifications && !empty($certifications))
      <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Certifications & Recognition</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
              Our commitment to excellence is recognized through various certifications and awards.
            </p>
          </div>
          
          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($certifications as $cert)
              <div class="bg-gray-50 p-6 rounded-lg text-center">
                <div class="bg-[#880005]/10 p-3 rounded-full w-fit mx-auto mb-4">
                  <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                  </svg>
                </div>
                
                <h4 class="font-semibold text-gray-900 mb-2">{{ $cert['name'] }}</h4>
                
                @if(isset($cert['organization']))
                  <p class="text-sm text-gray-600 mb-1">{{ $cert['organization'] }}</p>
                @endif
                
                @if(isset($cert['year']))
                  <p class="text-sm text-[#880005] font-medium">{{ $cert['year'] }}</p>
                @endif
              </div>
            @endforeach
          </div>
          
        </div>
      </section>
    @endif
    
    {{-- Contact CTA Section with Global Data --}}
    @include('components.cta-section')

  @endwhile
@endsection