{{--
  Template Name: Our Team
  Description: Team members page
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- Team Page Header --}}
<section class="py-20 bg-gradient-to-r from-[#880005] to-[#660004] relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center">
      <h1 class="text-5xl font-bold text-white mb-6">Meet Our Healthcare Team</h1>
      <p class="text-xl text-white/90 max-w-3xl mx-auto">
        Our dedicated healthcare professionals are committed to providing exceptional medical care with expertise, compassion, and integrity.
      </p>
    </div>
  </div>
</section>

{{-- Team Content --}}
<section class="py-20 bg-white">
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
            Comprehensive healthcare services with a focus on patient-centered care and medical excellence.
          </p>
          <div class="flex items-center justify-between text-sm text-gray-500">
            <span>10+ years experience</span>
            <span>English, Bemba</span>
          </div>
        </div>
      </div>
      
      {{-- Placeholder Team Members --}}
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[3/4] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
      
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[3/4] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Audiology Specialist</h3>
          <p class="text-[#880005] font-semibold mb-2">Hearing Healthcare Professional</p>
          <p class="text-sm text-gray-600 mb-3">Licensed Audiologist</p>
          <p class="text-gray-700 text-sm mb-4">
            Specialized in hearing assessments, hearing aid fittings, and comprehensive ear health care.
          </p>
          <div class="flex items-center justify-between text-sm text-gray-500">
            <span>8+ years experience</span>
            <span>English, Bemba</span>
          </div>
        </div>
      </div>
      
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[3/4] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
      
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="bg-gray-400 aspect-[3/4] flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            href="{{ home_url('/contact') }}" 
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

{{-- Team Values Section --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Team Values</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        The principles that guide our healthcare professionals in delivering exceptional patient care.
      </p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <div class="text-center">
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
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
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Excellence</h3>
        <p class="text-gray-600">
          Our team maintains the highest standards of medical practice through continuous learning and professional development.
        </p>
      </div>
      
      <div class="text-center">
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
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