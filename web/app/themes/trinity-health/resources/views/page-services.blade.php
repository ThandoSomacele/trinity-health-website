{{--
  Template Name: Our Services
  Description: Services overview page
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- Services Page Header --}}
<section class="relative h-screen overflow-hidden bg-[#880005]">
  {{-- Background Image --}}
  <div 
    class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
    style="background-image: url('https://images.unsplash.com/photo-1576669801820-d48ad3f4d0cf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=90&auto=webp');"
  ></div>
  
  {{-- Overlay --}}
  <div class="absolute inset-0 bg-gradient-to-br from-[#880005]/80 via-[#660004]/85 to-[#4a0003]/90"></div>
  
  {{-- Content --}}
  <div class="relative z-10 h-full flex items-center justify-center py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full">
      
      {{-- Trust Badge --}}
      <div class="inline-flex items-center px-6 py-3 bg-white/15 backdrop-blur-md rounded-full mb-8">
        <svg class="w-5 h-5 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2 0h-2m-2 0h-2M9 7h6m-6 4h6m-6 4h6"></path>
        </svg>
        <span class="text-white font-medium text-sm tracking-wide">Comprehensive Care</span>
      </div>
      
      {{-- Main Heading --}}
      <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-tight tracking-tight mb-8">
        Our Healthcare Services
      </h1>
      
      {{-- Subheading --}}
      <p class="text-xl sm:text-2xl lg:text-3xl text-white/90 font-light leading-relaxed max-w-4xl mx-auto mb-12">
        Comprehensive medical care tailored to your needs. From routine check-ups to specialised treatments.
      </p>
      
      {{-- Service Metrics --}}
      <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-12">
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">Full</div>
          <div class="text-white/80 text-sm font-medium">Service Care</div>
        </div>
        
        <div class="hidden sm:block w-px h-12 bg-white/30"></div>
        
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">Modern</div>
          <div class="text-white/80 text-sm font-medium">Equipment</div>
        </div>
        
        <div class="hidden sm:block w-px h-12 bg-white/30"></div>
        
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">Expert</div>
          <div class="text-white/80 text-sm font-medium">Medical Care</div>
        </div>
      </div>
      
    </div>
  </div>
  
  {{-- Scroll Indicator --}}
  <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
    <div class="animate-bounce">
      <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
      </svg>
    </div>
  </div>
</section>

{{-- Services Content --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- Page Content from WordPress Editor --}}
    @if(get_the_content())
      <div class="prose prose-lg prose-gray max-w-none mb-16">
        @php(the_content())
      </div>
    @endif
    
    {{-- Services Grid --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      {{-- General Medicine --}}
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
          <h3 class="text-xl font-bold text-gray-900 mb-3">General Medicine</h3>
          <p class="text-gray-600 mb-4">Comprehensive primary healthcare services including routine check-ups, preventive care, and treatment of common medical conditions.</p>
          <a href="#" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
        </div>
      </div>
      
      {{-- Audiology Services --}}
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
          <h3 class="text-xl font-bold text-gray-900 mb-3">Audiology Services</h3>
          <p class="text-gray-600 mb-4">Professional hearing assessments, hearing aid fittings, and comprehensive ear health care services for all ages.</p>
          <a href="{{ home_url('/audiology') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
        </div>
      </div>
      
      {{-- Preventive Care --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[4/3] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
            <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Preventive Care</h3>
          <p class="text-gray-600 mb-4">Comprehensive health screenings, vaccinations, and wellness programs to keep you healthy and prevent illness.</p>
          <a href="#" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
        </div>
      </div>
      
      {{-- Consultations --}}
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
          <h3 class="text-xl font-bold text-gray-900 mb-3">Medical Consultations</h3>
          <p class="text-gray-600 mb-4">Professional medical consultations with experienced doctors for diagnosis, treatment planning, and health guidance.</p>
          <a href="#" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
        </div>
      </div>
      
      {{-- Health Screenings --}}
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
          <h3 class="text-xl font-bold text-gray-900 mb-3">Health Screenings</h3>
          <p class="text-gray-600 mb-4">Comprehensive health assessments and diagnostic screenings to detect and prevent health issues early.</p>
          <a href="#" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">Learn More →</a>
        </div>
      </div>
      
      {{-- Emergency Care --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[4/3] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
        </div>
        <div class="p-6">
          <div class="bg-red-100 p-3 rounded-full w-fit mb-4">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-3">Emergency Care</h3>
          <p class="text-gray-600 mb-4">Immediate medical attention for urgent health conditions and emergencies with 24/7 emergency contact availability.</p>
          <a href="{{ home_url('/contact') }}" class="text-red-600 font-semibold hover:text-red-700 transition-colors">Emergency Contact →</a>
        </div>
      </div>
      
    </div>
  </div>
</section>

{{-- Call to Action --}}
@include('components.cta-section')

@endwhile
@endsection