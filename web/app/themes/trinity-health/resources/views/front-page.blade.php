{{--
  Template Name: Trinity Health Homepage
  Description: Mayo Clinic inspired clean homepage design
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section - Clean and Professional --}}
  <section class="relative bg-gradient-to-br from-gray-50 to-white py-20 lg:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        
        {{-- Hero Content --}}
        <div class="lg:pr-8">
          <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
            Your Health, 
            <span class="text-trinity-primary">Our Priority</span>
          </h1>
          
          <p class="text-xl text-gray-600 mb-8 leading-relaxed">
            Comprehensive healthcare services in Zambia. From general medicine to specialized audiology care, 
            Dr. Alfred Mwamba and the Trinity Health team provide compassionate, professional medical care.
          </p>
          
          <div class="flex flex-col sm:flex-row gap-4">
            <a 
              href="{{ home_url('/contact') }}" 
              class="btn btn-primary btn-lg"
            >
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              Book Appointment
            </a>
            
            <a 
              href="{{ home_url('/services') }}" 
              class="btn btn-secondary btn-lg"
            >
              View Our Services
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
        
        {{-- Hero Video --}}
        <div class="relative">
          <div class="rounded-2xl aspect-[4/3] overflow-hidden">
            <video 
              autoplay 
              muted 
              loop 
              playsinline
              class="w-full h-full object-cover"
              aria-label="Trinity Health Zambia medical facility overview"
            >
              <source src="/app/uploads/2025/06/hero-montage-video.mp4" type="video/mp4">
              {{-- Fallback for browsers that don't support video --}}
              <div class="bg-gray-200 w-full h-full flex items-center justify-center">
                <p class="text-gray-500">Your browser does not support video playback.</p>
              </div>
            </video>
          </div>
          
          {{-- Floating Stats Cards --}}
          <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-xl shadow-lg">
            <div class="flex items-center space-x-3">
              <div class="bg-trinity-primary/10 p-3 rounded-full">
                <svg class="w-6 h-6 text-trinity-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
              </div>
              <div>
                <p class="text-2xl font-bold text-gray-900">1000+</p>
                <p class="text-sm text-gray-600">Patients Served</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Services Overview - Clean Grid Layout --}}
  <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      {{-- Section Header --}}
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Healthcare Services</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Comprehensive medical care tailored to your needs. From routine check-ups to specialized treatments, 
          we're here to support your health journey.
        </p>
      </div>
      
      {{-- Services Grid --}}
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        {{-- General Health Services --}}
        <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
          <div class="bg-[#880005]/10 p-4 rounded-xl w-fit mb-6 group-hover:bg-[#880005]/20 transition-colors">
            <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
          </div>
          
          <h3 class="text-2xl font-bold text-gray-900 mb-4">General Health</h3>
          <p class="text-gray-600 mb-6 leading-relaxed">
            Comprehensive medical examinations, preventive care, and treatment for common health conditions. 
            Your primary healthcare partner in Zambia.
          </p>
          
          <a href="{{ home_url('/health-services') }}" class="btn btn-ghost btn-sm">
            Learn More
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        
        {{-- Audiology Services --}}
        <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
          <div class="bg-[#880005]/10 p-4 rounded-xl w-fit mb-6 group-hover:bg-[#880005]/20 transition-colors">
            <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
            </svg>
          </div>
          
          <h3 class="text-2xl font-bold text-gray-900 mb-4">Audiology Services</h3>
          <p class="text-gray-600 mb-6 leading-relaxed">
            Specialized hearing healthcare services including hearing tests, hearing aid fittings, 
            and comprehensive auditory rehabilitation programs.
          </p>
          
          <a href="{{ home_url('/audiology-services') }}" class="btn btn-ghost btn-sm">
            Learn More
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        
        {{-- Emergency Care --}}
        <div class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
          <div class="bg-[#880005]/10 p-4 rounded-xl w-fit mb-6 group-hover:bg-[#880005]/20 transition-colors">
            <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
          </div>
          
          <h3 class="text-2xl font-bold text-gray-900 mb-4">Emergency Care</h3>
          <p class="text-gray-600 mb-6 leading-relaxed">
            Urgent medical care when you need it most. Professional emergency response and 
            immediate medical attention for critical health situations.
          </p>
          
          <a href="{{ home_url('/emergency-care') }}" class="btn btn-ghost btn-sm">
            Learn More
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        
      </div>
      
      {{-- View All Services CTA --}}
      <div class="text-center mt-12">
        <a 
          href="{{ home_url('/services') }}" 
          class="btn btn-secondary btn-lg"
        >
          View All Services
          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </section>

  {{-- About Dr. Mwamba Section --}}
  <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        
        {{-- Doctor Image --}}
        <div class="relative">
          <div class="rounded-2xl aspect-[3/4] overflow-hidden">
            <img 
              src="/app/uploads/2025/06/dr-alfred-mwamba.jpg" 
              alt="Dr. Alfred Mwamba - Trinity Health Zambia" 
              class="w-full h-full object-cover"
            >
          </div>
        </div>
        
        {{-- About Content --}}
        <div>
          <h2 class="text-4xl font-bold text-gray-900 mb-6">Meet Dr. Alfred Mwamba</h2>
          <p class="text-xl text-gray-600 mb-6 leading-relaxed">
            With years of experience in healthcare and a specialization in audiology, 
            Dr. Mwamba brings compassionate, expert medical care to the Zambian community.
          </p>
          
          <div class="space-y-4 mb-8">
            <div class="flex items-start space-x-3">
              <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
                <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-900">Specialized Audiology Training</h4>
                <p class="text-gray-600">Advanced certification in hearing healthcare and auditory rehabilitation</p>
              </div>
            </div>
            
            <div class="flex items-start space-x-3">
              <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
                <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-900">Comprehensive Healthcare</h4>
                <p class="text-gray-600">General medicine practice with focus on preventive care and patient education</p>
              </div>
            </div>
            
            <div class="flex items-start space-x-3">
              <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
                <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-900">Community-Focused Care</h4>
                <p class="text-gray-600">Dedicated to improving healthcare accessibility in Zambian communities</p>
              </div>
            </div>
          </div>
          
          <a 
            href="{{ home_url('/about') }}" 
            class="btn btn-primary btn-md"
          >
            Learn More About Our Practice
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- Contact CTA Section --}}
  <section class="py-20 bg-[#880005]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-4xl font-bold text-white mb-6">Ready to Take Care of Your Health?</h2>
      <p class="text-xl text-white mb-8 leading-relaxed">
        Schedule your appointment today and experience compassionate, professional healthcare 
        tailored to your needs.
      </p>
      
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a 
          href="{{ home_url('/contact') }}" 
          class="inline-flex items-center justify-center px-8 py-4 btn btn-light"
        >
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
          Contact Us Today
        </a>
        
        <a 
          href="tel:+260123456789" 
          class="inline-flex items-center justify-center px-8 py-4 border-2 btn btn-light-outline"
        >
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
          </svg>
          Call: +260 123 456 789
        </a>
      </div>
    </div>
  </section>
@endsection
