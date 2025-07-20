{{--
  Template Name: Single Service
  Description: Individual service page template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- Service Page Header --}}
<section class="py-20 bg-gradient-to-r from-[#880005] to-[#660004] relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center">
      <h1 class="text-5xl font-bold text-white mb-6">{{ get_the_title() }}</h1>
      @if(get_field('service_subtitle'))
        <p class="text-xl text-white/90 max-w-3xl mx-auto">
          {{ get_field('service_subtitle') }}
        </p>
      @else
        <p class="text-xl text-white/90 max-w-3xl mx-auto">
          Professional healthcare service provided by Trinity Health's experienced medical team.
        </p>
      @endif
    </div>
  </div>
</section>

{{-- Service Content --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-start">
      
      {{-- Service Description --}}
      <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Service Overview</h2>
        
        {{-- WordPress Content --}}
        @if(get_the_content())
          <div class="prose prose-lg prose-gray max-w-none mb-8">
            @php(the_content())
          </div>
        @else
          <p class="text-lg text-gray-600 mb-8">
            Our experienced healthcare professionals provide comprehensive {{ strtolower(get_the_title()) }} services 
            with a focus on patient care, safety, and positive outcomes. We use modern medical practices and 
            equipment to ensure you receive the best possible care.
          </p>
        @endif
        
        {{-- Service Features --}}
        @php
          $service_features = get_field('service_features') ?: [
            ['title' => 'Professional Care', 'description' => 'Delivered by qualified healthcare professionals'],
            ['title' => 'Modern Equipment', 'description' => 'Using up-to-date medical technology and techniques'],
            ['title' => 'Patient Safety', 'description' => 'Prioritizing patient safety and comfort throughout treatment'],
            ['title' => 'Follow-up Care', 'description' => 'Comprehensive aftercare and ongoing support']
          ];
        @endphp
        
        <div class="space-y-4">
          @foreach($service_features as $feature)
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
      </div>
      
      {{-- Service Image and Info --}}
      <div class="relative">
        @php
          $service_image = get_field('service_image');
        @endphp
        
        @if($service_image)
          <div class="rounded-2xl aspect-[4/3] overflow-hidden mb-8">
            <img 
              src="{{ $service_image }}" 
              alt="{{ get_the_title() }} - Trinity Health" 
              class="w-full h-full object-cover"
            >
          </div>
        @else
          {{-- Service Image Placeholder --}}
          <div class="bg-gray-400 aspect-[4/3] rounded-2xl flex items-center justify-center mb-8">
            <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
          </div>
        @endif
        
        {{-- Service Info Card --}}
        <div class="bg-gray-50 rounded-xl p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-4">Service Information</h3>
          
          <div class="space-y-4">
            @if(get_field('service_duration'))
              <div class="flex items-center">
                <svg class="w-5 h-5 text-[#880005] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                  <p class="font-medium text-gray-900">Duration</p>
                  <p class="text-sm text-gray-600">{{ get_field('service_duration') }}</p>
                </div>
              </div>
            @endif
            
            @if(get_field('service_price'))
              <div class="flex items-center">
                <svg class="w-5 h-5 text-[#880005] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <div>
                  <p class="font-medium text-gray-900">Price</p>
                  <p class="text-sm text-gray-600">{{ get_field('service_price') }}</p>
                </div>
              </div>
            @endif
            
            <div class="flex items-center">
              <svg class="w-5 h-5 text-[#880005] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6l-2 2m0 0l-2-2m2 2v6m-6-4h12"></path>
              </svg>
              <div>
                <p class="font-medium text-gray-900">Availability</p>
                <p class="text-sm text-gray-600">By appointment</p>
              </div>
            </div>
          </div>
          
          {{-- Book Appointment Button --}}
          <div class="mt-6 pt-6 border-t border-gray-200">
            <a 
              href="{{ home_url('/contact-2') }}" 
              class="w-full bg-[#880005] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#660004] transition-colors flex items-center justify-center"
            >
              Book Appointment
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

{{-- What to Expect Section --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">What to Expect</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Your healthcare journey with Trinity Health is designed to be comfortable, professional, and effective.
      </p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-xl shadow-lg text-center">
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6l-2 2m0 0l-2-2m2 2v6m-6-4h12"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">1. Consultation</h3>
        <p class="text-gray-600">
          Initial consultation to understand your needs, medical history, and treatment goals.
        </p>
      </div>
      
      <div class="bg-white p-8 rounded-xl shadow-lg text-center">
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v1a2 2 0 002 2h2m0 0v9a2 2 0 002 2h2a2 2 0 002-2V9m-6 0h6m-6 0V7a2 2 0 012-2h2a2 2 0 012 2v2M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2m-6 4h2m-2 4h2m-2 4h2"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">2. Assessment</h3>
        <p class="text-gray-600">
          Comprehensive assessment and examination to determine the best treatment approach.
        </p>
      </div>
      
      <div class="bg-white p-8 rounded-xl shadow-lg text-center">
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">3. Treatment</h3>
        <p class="text-gray-600">
          Professional treatment delivery with ongoing support and follow-up care as needed.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- Related Services --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Related Services</h2>
      <p class="text-xl text-gray-600">
        Explore our other healthcare services that may complement your care.
      </p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow">
        <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
          <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-3">General Medicine</h3>
        <p class="text-gray-600 mb-4">Comprehensive primary healthcare services.</p>
        <a href="{{ home_url('/services') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
      </div>
      
      <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow">
        <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
          <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728m-5.657-2.829a3 3 0 010-4.242M12 18v2m0-18v2"></path>
          </svg>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-3">Audiology Services</h3>
        <p class="text-gray-600 mb-4">Professional hearing healthcare services.</p>
        <a href="{{ home_url('/audiology') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
      </div>
      
      <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow">
        <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
          <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-3">Preventive Care</h3>
        <p class="text-gray-600 mb-4">Health screenings and wellness programs.</p>
        <a href="{{ home_url('/services') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
      </div>
    </div>
  </div>
</section>

{{-- Contact CTA --}}
@include('components.cta-section')

@endwhile
@endsection