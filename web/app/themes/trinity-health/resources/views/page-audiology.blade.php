{{--
  Template Name: Audiology Services
  Description: Specialized audiology services page
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- Audiology Page Header --}}
<section class="py-20 bg-gradient-to-r from-[#880005] to-[#660004] relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center">
      <h1 class="text-5xl font-bold text-white mb-6">Audiology Services</h1>
      <p class="text-xl text-white/90 max-w-3xl mx-auto">
        Professional hearing healthcare services including assessments, hearing aid fittings, and comprehensive ear health care for all ages.
      </p>
    </div>
  </div>
</section>

{{-- Audiology Services Overview --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center mb-20">
      
      {{-- Content --}}
      <div>
        <h2 class="text-4xl font-bold text-gray-900 mb-6">Expert Hearing Healthcare</h2>
        
        {{-- WordPress Content --}}
        @if(get_the_content())
          <div class="prose prose-lg prose-gray max-w-none mb-8">
            @php(the_content())
          </div>
        @else
          <p class="text-lg text-gray-600 mb-6">
            Trinity Health's audiology services provide comprehensive hearing healthcare solutions for patients of all ages. 
            Our experienced audiologists use state-of-the-art equipment and evidence-based practices to diagnose, treat, 
            and manage hearing-related conditions.
          </p>
          
          <p class="text-lg text-gray-600 mb-8">
            From routine hearing screenings to advanced hearing aid fittings, we're committed to helping you achieve 
            optimal hearing health and improved quality of life.
          </p>
        @endif
        
        {{-- Key Features --}}
        <div class="space-y-4">
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Comprehensive Hearing Assessments</h4>
              <p class="text-gray-600">Thorough evaluations to determine hearing health status</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Modern Hearing Aid Technology</h4>
              <p class="text-gray-600">Latest hearing aid solutions and professional fittings</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Ongoing Support & Maintenance</h4>
              <p class="text-gray-600">Continued care and device maintenance services</p>
            </div>
          </div>
        </div>
      </div>
      
      {{-- Image --}}
      <div class="relative">
        @php
          $audiology_image = get_field('audiology_image');
        @endphp
        
        @if($audiology_image)
          <div class="rounded-2xl aspect-[4/3] overflow-hidden">
            <img 
              src="{{ $audiology_image }}" 
              alt="Audiology Services - Trinity Health" 
              class="w-full h-full object-cover"
            >
          </div>
        @else
          {{-- Audiology Image Placeholder --}}
          <div class="bg-gray-400 aspect-[4/3] rounded-2xl flex items-center justify-center">
            <svg class="w-20 h-20 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728m-5.657-2.829a3 3 0 010-4.242M12 18v2m0-18v2"></path>
            </svg>
          </div>
        @endif
        
        {{-- Achievement Card --}}
        <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-xl shadow-lg">
          <div class="text-center">
            <p class="text-3xl font-bold text-[#880005]">100%</p>
            <p class="text-sm text-gray-600">Patient</p>
            <p class="text-sm text-gray-600">Satisfaction</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

{{-- Audiology Services Grid --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Audiology Services</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Comprehensive hearing healthcare services designed to meet your individual needs and improve your quality of life.
      </p>
    </div>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      {{-- Hearing Assessments --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[4/3] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v1a2 2 0 002 2h2m0 0v9a2 2 0 002 2h2a2 2 0 002-2V9m-6 0h6m-6 0V7a2 2 0 012-2h2a2 2 0 012 2v2M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2m-6 4h2m-2 4h2m-2 4h2"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
            <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v1a2 2 0 002 2h2m0 0v9a2 2 0 002 2h2a2 2 0 002-2V9m-6 0h6m-6 0V7a2 2 0 012-2h2a2 2 0 012 2v2M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2m-6 4h2m-2 4h2m-2 4h2"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Hearing Assessments</h3>
          <p class="text-gray-600 mb-4">Comprehensive hearing evaluations using advanced audiometric testing to determine your hearing health status.</p>
          <ul class="text-sm text-gray-600 space-y-1 mb-4">
            <li>• Pure tone audiometry</li>
            <li>• Speech audiometry</li>
            <li>• Tympanometry</li>
            <li>• Otoacoustic emissions</li>
          </ul>
          <a href="{{ home_url('/contact') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Book Assessment →</a>
        </div>
      </div>
      
      {{-- Hearing Aid Services --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[4/3] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728m-5.657-2.829a3 3 0 010-4.242M12 18v2m0-18v2"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
            <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728m-5.657-2.829a3 3 0 010-4.242M12 18v2m0-18v2"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Hearing Aid Services</h3>
          <p class="text-gray-600 mb-4">Professional hearing aid consultation, fitting, and ongoing support with the latest hearing technology.</p>
          <ul class="text-sm text-gray-600 space-y-1 mb-4">
            <li>• Hearing aid evaluation</li>
            <li>• Custom fitting & programming</li>
            <li>• Follow-up adjustments</li>
            <li>• Maintenance & repairs</li>
          </ul>
          <a href="{{ home_url('/contact') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
        </div>
      </div>
      
      {{-- Ear Health Care --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[4/3] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
            <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Ear Health Care</h3>
          <p class="text-gray-600 mb-4">Comprehensive ear health services to maintain optimal ear function and prevent hearing-related problems.</p>
          <ul class="text-sm text-gray-600 space-y-1 mb-4">
            <li>• Ear examinations</li>
            <li>• Wax removal</li>
            <li>• Infection treatment</li>
            <li>• Hearing protection</li>
          </ul>
          <a href="{{ home_url('/contact') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Book Consultation →</a>
        </div>
      </div>
      
      {{-- Pediatric Audiology --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[4/3] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
            <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Pediatric Audiology</h3>
          <p class="text-gray-600 mb-4">Specialized hearing healthcare services for children, including early detection and intervention programs.</p>
          <ul class="text-sm text-gray-600 space-y-1 mb-4">
            <li>• Newborn hearing screening</li>
            <li>• Developmental assessments</li>
            <li>• Pediatric hearing aids</li>
            <li>• School hearing programs</li>
          </ul>
          <a href="{{ home_url('/contact') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
        </div>
      </div>
      
      {{-- Workplace Hearing --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[4/3] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2-4h6m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v8m-6 0V5a2 2 0 012-2h2a2 2 0 012 2v16"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
            <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2-4h6m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v8m-6 0V5a2 2 0 012-2h2a2 2 0 012 2v16"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Workplace Hearing</h3>
          <p class="text-gray-600 mb-4">Occupational hearing services including noise assessments and hearing conservation programs for employers.</p>
          <ul class="text-sm text-gray-600 space-y-1 mb-4">
            <li>• Baseline hearing tests</li>
            <li>• Annual monitoring</li>
            <li>• Hearing protection fitting</li>
            <li>• Workplace consultations</li>
          </ul>
          <a href="{{ home_url('/contact') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Corporate Services →</a>
        </div>
      </div>
      
      {{-- Tinnitus Management --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[4/3] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
            <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Tinnitus Management</h3>
          <p class="text-gray-600 mb-4">Comprehensive tinnitus assessment and management programs to help reduce the impact of tinnitus on daily life.</p>
          <ul class="text-sm text-gray-600 space-y-1 mb-4">
            <li>• Tinnitus evaluation</li>
            <li>• Sound therapy</li>
            <li>• Counseling support</li>
            <li>• Management strategies</li>
          </ul>
          <a href="{{ home_url('/contact') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Get Help →</a>
        </div>
      </div>
      
    </div>
  </div>
</section>

{{-- Process Section --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Your Hearing Healthcare Journey</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Our comprehensive approach ensures you receive the best possible hearing healthcare experience.
      </p>
    </div>
    
    <div class="grid md:grid-cols-4 gap-8">
      <div class="text-center">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6l-2 2m0 0l-2-2m2 2v6m-6-4h12"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">1. Initial Consultation</h3>
        <p class="text-gray-600">
          Comprehensive consultation to understand your hearing concerns and medical history.
        </p>
      </div>
      
      <div class="text-center">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v1a2 2 0 002 2h2m0 0v9a2 2 0 002 2h2a2 2 0 002-2V9m-6 0h6m-6 0V7a2 2 0 012-2h2a2 2 0 012 2v2M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2m-6 4h2m-2 4h2m-2 4h2"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">2. Hearing Assessment</h3>
        <p class="text-gray-600">
          Complete hearing evaluation using advanced audiometric testing equipment.
        </p>
      </div>
      
      <div class="text-center">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">3. Treatment Plan</h3>
        <p class="text-gray-600">
          Personalized treatment recommendations based on your specific hearing needs.
        </p>
      </div>
      
      <div class="text-center">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">4. Ongoing Care</h3>
        <p class="text-gray-600">
          Continued support, follow-up appointments, and device maintenance services.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- Call to Action --}}
@include('components.cta-section')

@endwhile
@endsection