{{--
  Template Name: Our Team (Team-2)
  Description: Team members page with About/Patient Care design patterns
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- Team Page Header --}}
<section class="relative h-screen overflow-hidden bg-[#880005]">
  {{-- Background Image --}}
  <div 
    class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
    style="background-image: url('https://images.unsplash.com/photo-1609188076864-c87804d61225?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=90&auto=webp');"
  ></div>
  
  {{-- Overlay --}}
  <div class="absolute inset-0 bg-gradient-to-br from-[#880005]/80 via-[#660004]/85 to-[#4a0003]/90"></div>
  
  {{-- Content --}}
  <div class="relative z-10 h-full flex items-center justify-center py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full">
      
      {{-- Trust Badge --}}
      <div class="inline-flex items-center px-6 py-3 bg-white/15 backdrop-blur-md rounded-full mb-8">
        <svg class="w-5 h-5 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
        <span class="text-white font-medium text-sm tracking-wide">Expert Healthcare Team</span>
      </div>
      
      {{-- Main Heading --}}
      <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-tight tracking-tight mb-8">
        Our Healthcare Team
      </h1>
      
      {{-- Subheading --}}
      <p class="text-xl sm:text-2xl lg:text-3xl text-white/90 font-light leading-relaxed max-w-4xl mx-auto mb-12">
        Meet our dedicated professionals committed to providing exceptional medical care with expertise and compassion.
      </p>
      
      {{-- Trust Metrics --}}
      <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-12">
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">Expert</div>
          <div class="text-white/80 text-sm font-medium">Medical Team</div>
        </div>
        
        <div class="hidden sm:block w-px h-12 bg-white/30"></div>
        
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">15+</div>
          <div class="text-white/80 text-sm font-medium">Years Combined Experience</div>
        </div>
        
        <div class="hidden sm:block w-px h-12 bg-white/30"></div>
        
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">Certified</div>
          <div class="text-white/80 text-sm font-medium">Professionals</div>
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

{{-- Meet Our Team Section: Following About page pattern --}}
<section class="py-24 lg:py-32 bg-white">
  <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-12">
    
    {{-- Section Header --}}
    <div class="text-center mb-20">
      <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Meet Our Healthcare Professionals</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Our dedicated team of healthcare professionals is committed to providing you with the highest quality medical care and personalised attention.
      </p>
    </div>
    
    {{-- Team Introduction Grid --}}
    <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 mb-20">
      
      {{-- Team Philosophy --}}
      <div class="space-y-8">
        <div>
          <h3 class="text-3xl font-bold text-gray-900 mb-6">
            Collaborative healthcare
            <span class="block text-[#880005]">for better outcomes</span>
          </h3>
          <p class="text-lg text-gray-600 leading-relaxed">
            At Trinity Health Zambia, our multidisciplinary team works together to provide comprehensive healthcare solutions. Each team member brings unique expertise and years of experience to ensure you receive the best possible care.
          </p>
        </div>
      </div>
      
      {{-- Team Commitment --}}
      <div class="space-y-8">
        <div>
          <h3 class="text-3xl font-bold text-gray-900 mb-6">Professional excellence</h3>
          <p class="text-lg text-gray-600 leading-relaxed">
            Our healthcare professionals are committed to continuous learning and maintaining the highest standards of medical practice. We believe in treating each patient with dignity, compassion, and individualised care.
          </p>
        </div>
      </div>
      
    </div>
    
  </div>
</section>

{{-- Team Members Grid --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- Page Content from WordPress Editor --}}
    @if(get_the_content())
      <div class="prose prose-lg prose-gray max-w-none mb-16 text-center">
        @php(the_content())
      </div>
    @endif
    
    {{-- Team Members --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      {{-- Dr. Alfred Mwamba --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="aspect-[3/4] overflow-hidden">
          <img 
            src="{{ home_url('/app/uploads/2025/06/dr-alfred-mwamba.jpg') }}" 
            alt="Dr. Alfred Mwamba - Medical Doctor" 
            class="w-full h-full object-cover"
          >
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Dr. Alfred Mwamba</h3>
          <p class="text-[#880005] font-semibold mb-2">Medical Doctor</p>
          <p class="text-sm text-gray-600 mb-3">MBChB, General Practice</p>
          <p class="text-gray-700 text-sm mb-4">
            Comprehensive healthcare services with a focus on patient-centred care and medical excellence.
          </p>
          <div class="flex items-center justify-between text-sm text-gray-500">
            <span>10+ years experience</span>
            <span>English, Bemba</span>
          </div>
        </div>
      </div>
      
      {{-- Nursing Staff --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-slate-700 aspect-[3/4] flex items-center justify-center rounded-t-xl">
          <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Nursing Staff</h3>
          <p class="text-[#880005] font-semibold mb-2">Registered Nurses</p>
          <p class="text-sm text-gray-600 mb-3">Certified Healthcare Professionals</p>
          <p class="text-gray-700 text-sm mb-4">
            Professional nursing care, patient support, and medical assistance across all departments.
          </p>
          <div class="flex items-center justify-between text-sm text-gray-500">
            <span>5+ years experience</span>
            <span>Multiple languages</span>
          </div>
        </div>
      </div>
      
      {{-- Audiology Specialist --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-slate-700 aspect-[3/4] flex items-center justify-center rounded-t-xl">
          <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728m-5.657-2.829a3 3 0 010-4.242M12 18v2m0-18v2"></path>
          </svg>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Audiology Specialist</h3>
          <p class="text-[#880005] font-semibold mb-2">Hearing Healthcare Professional</p>
          <p class="text-sm text-gray-600 mb-3">Licensed Audiologist</p>
          <p class="text-gray-700 text-sm mb-4">
            Specialised in hearing assessments, hearing aid fittings, and comprehensive ear health care.
          </p>
          <div class="flex items-center justify-between text-sm text-gray-500">
            <span>8+ years experience</span>
            <span>English, Bemba</span>
          </div>
        </div>
      </div>
      
      {{-- Administrative Staff --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-slate-700 aspect-[3/4] flex items-center justify-center rounded-t-xl">
          <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Administrative Staff</h3>
          <p class="text-[#880005] font-semibold mb-2">Patient Care Coordinators</p>
          <p class="text-sm text-gray-600 mb-3">Healthcare Administration</p>
          <p class="text-gray-700 text-sm mb-4">
            Appointment scheduling, patient registration, and administrative support for seamless care.
          </p>
          <div class="flex items-center justify-between text-sm text-gray-500">
            <span>3+ years experience</span>
            <span>English, Local languages</span>
          </div>
        </div>
      </div>
      
      {{-- Support Staff --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-slate-700 aspect-[3/4] flex items-center justify-center rounded-t-xl">
          <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Support Staff</h3>
          <p class="text-[#880005] font-semibold mb-2">Healthcare Support Team</p>
          <p class="text-sm text-gray-600 mb-3">Medical Assistants</p>
          <p class="text-gray-700 text-sm mb-4">
            Laboratory assistance, equipment maintenance, and general healthcare support services.
          </p>
          <div class="flex items-center justify-between text-sm text-gray-500">
            <span>2+ years experience</span>
            <span>English, Bemba</span>
          </div>
        </div>
      </div>
      
      {{-- Join Our Team Card --}}
      <div class="bg-gradient-to-br from-[#880005] to-[#660004] rounded-xl overflow-hidden text-white">
        <div class="p-8 text-center">
          <div class="bg-white/10 p-4 rounded-full w-fit mx-auto mb-6">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
          </div>
          <h3 class="text-2xl font-bold mb-4">Join Our Team</h3>
          <p class="text-white/90 mb-6">
            Are you a healthcare professional looking to make a difference in the Zambian community?
          </p>
          <a 
            href="{{ home_url('/contact-2') }}" 
            class="inline-flex items-center bg-white text-[#880005] px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors"
          >
            Apply Now
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      
    </div>
  </div>
</section>

{{-- Team Values Section: Following About page pattern --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Team Values</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        The principles that guide our healthcare professionals in delivering exceptional patient care.
      </p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <div class="text-center">
        <div class="bg-[#880005]/10 p-4 rounded-2xl w-fit mx-auto mb-6">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Compassionate Care</h3>
        <p class="text-gray-600">
          We treat every patient with empathy, respect, and genuine care, ensuring comfort and dignity in all interactions.
        </p>
      </div>
      
      <div class="text-center">
        <div class="bg-[#880005]/10 p-4 rounded-2xl w-fit mx-auto mb-6">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Excellence</h3>
        <p class="text-gray-600">
          Our team maintains the highest standards of medical practice through continuous learning and professional development.
        </p>
      </div>
      
      <div class="text-center">
        <div class="bg-[#880005]/10 p-4 rounded-2xl w-fit mx-auto mb-6">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Collaborative Approach</h3>
        <p class="text-gray-600">
          We work together as a unified team, combining our expertise to provide comprehensive and coordinated healthcare.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- Call to Action --}}
@include('components.cta-section')

@endwhile
@endsection