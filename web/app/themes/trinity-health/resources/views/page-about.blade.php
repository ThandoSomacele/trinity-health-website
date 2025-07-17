{{--
  Template Name: About Trinity Health
  Description: Clean about page with proper layout
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- About Page Header --}}
<section class="relative h-screen overflow-hidden bg-[#880005]">
  {{-- Background Image --}}
  <div 
    class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
    style="background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=90&auto=webp');"
  ></div>
  
  {{-- Overlay --}}
  <div class="absolute inset-0 bg-gradient-to-br from-[#880005]/80 via-[#660004]/85 to-[#4a0003]/90"></div>
  
  {{-- Content --}}
  <div class="relative z-10 h-full flex items-center justify-center py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full">
      
      {{-- Trust Badge --}}
      <div class="inline-flex items-center px-6 py-3 bg-white/15 backdrop-blur-md rounded-full mb-8">
        <svg class="w-5 h-5 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
        </svg>
        <span class="text-white font-medium text-sm tracking-wide">Trusted Healthcare Excellence</span>
      </div>
      
      {{-- Main Heading --}}
      <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-tight tracking-tight mb-8">
        About Trinity Health
      </h1>
      
      {{-- Subheading --}}
      <p class="text-xl sm:text-2xl lg:text-3xl text-white/90 font-light leading-relaxed max-w-4xl mx-auto mb-12">
        Exceptional healthcare services for the Zambian community through innovation, compassion, and excellence.
      </p>
      
      {{-- Trust Metrics --}}
      <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-12">
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">5+</div>
          <div class="text-white/80 text-sm font-medium">Years Excellence</div>
        </div>
        
        <div class="hidden sm:block w-px h-12 bg-white/30"></div>
        
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">98%</div>
          <div class="text-white/80 text-sm font-medium">Patient Satisfaction</div>
        </div>
        
        <div class="hidden sm:block w-px h-12 bg-white/30"></div>
        
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">Expert</div>
          <div class="text-white/80 text-sm font-medium">Healthcare Team</div>
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

{{-- Mission & Vision Section: Text-Focused to Avoid Image Stacking --}}
<section class="py-24 lg:py-32 bg-white">
  <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-12">
    
    {{-- Section Header --}}
    <div class="text-center mb-20">
      <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Our Mission & Vision</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Founded with a passion for healthcare excellence and community service.
      </p>
    </div>
    
    {{-- Mission Content Grid --}}
    <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 mb-20">
      
      {{-- Mission Statement --}}
      <div class="space-y-8">
        <div>
          <h3 class="text-3xl font-bold text-gray-900 mb-6">
            Solving healthcare challenges
            <span class="block text-[#880005]">one patient at a time</span>
          </h3>
          <p class="text-lg text-gray-600 leading-relaxed">
            At Trinity Health Zambia, we combine the precision of modern medicine with the warmth of personalised care to serve our community's diverse healthcare needs.
          </p>
        </div>
      </div>
      
      {{-- Vision Statement --}}
      <div class="space-y-8">
        <div>
          <h3 class="text-3xl font-bold text-gray-900 mb-6">Transforming healthcare</h3>
          <p class="text-lg text-gray-600 leading-relaxed">
            Trinity Health Zambia was founded with the vision of making exceptional healthcare accessible to all. We believe every person deserves compassionate, professional medical care regardless of their background.
          </p>
        </div>
      </div>
      
    </div>
    
    {{-- Core Values --}}
    <div class="bg-gray-50 rounded-3xl p-8 lg:p-12">
      <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-12 text-center">Our Core Values</h3>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="text-center">
          <div class="bg-[#880005]/10 p-4 rounded-2xl w-fit mx-auto mb-6">
            <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">Excellence in Care</h4>
          <p class="text-gray-600">Providing the highest standard of medical care with attention to detail and patient safety</p>
        </div>
        
        <div class="text-center">
          <div class="bg-[#880005]/10 p-4 rounded-2xl w-fit mx-auto mb-6">
            <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">Patient-Centered Approach</h4>
          <p class="text-gray-600">Putting patient needs and comfort at the centre of everything we do</p>
        </div>
        
        <div class="text-center">
          <div class="bg-[#880005]/10 p-4 rounded-2xl w-fit mx-auto mb-6">
            <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">Community Commitment</h4>
          <p class="text-gray-600">Contributing to the health and wellness of the Zambian community</p>
        </div>
      </div>
    </div>
    
  </div>
</section>

{{-- Our Story Section --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Story</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Founded with a passion for healthcare excellence and community service.
      </p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <div class="text-center">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2-4h6m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v8m-6 0V5a2 2 0 012-2h2a2 2 0 012 2v16"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Established Practice</h3>
        <p class="text-gray-600">
          Founded to address the growing need for quality healthcare services in Zambia with modern facilities and expert care.
        </p>
      </div>
      
      <div class="text-center">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Team</h3>
        <p class="text-gray-600">
          Our healthcare professionals bring years of experience and dedication to providing exceptional medical care to our patients.
        </p>
      </div>
      
      <div class="text-center">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Community Focus</h3>
        <p class="text-gray-600">
          We're committed to improving healthcare accessibility and contributing positively to the health and wellbeing of Zambian communities.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- Services Overview --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Healthcare Services</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Comprehensive medical care designed to meet your individual health needs.
      </p>
    </div>
    
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-gray-50 p-8 rounded-xl">
        <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
          <svg class="w-6 h-6 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">General Medicine</h3>
        <p class="text-gray-600 mb-4">
          Comprehensive primary healthcare services including routine check-ups, preventive care, and treatment of common medical conditions.
        </p>
        <a href="{{ home_url('/services') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">
          Learn More →
        </a>
      </div>
      
      <div class="bg-gray-50 p-8 rounded-xl">
        <div class="bg-[#880005]/10 p-3 rounded-full w-fit mb-4">
          <svg class="w-6 h-6 text-[#880005]" fill="currentColor" viewBox="-5.0 -10.0 110.0 135.0">
            <path d="m95.312 23.121c0-10.164-8.2695-18.438-18.438-18.438-2.6016 0-5.0781 0.55078-7.3281 1.5273-2.7891-0.89844-5.8281-1.4297-9.0117-1.5469-0.48047-0.039062-11.688-0.85937-20.613 6.793-6.1289 5.2539-9.6094 13.152-10.352 23.586v11.062l-4.832-11.121c-0.28125-0.64844-0.96875-1.0273-1.6641-0.92188-0.69922 0.10547-1.2422 0.66406-1.3203 1.3672l-2.6289 22.996-3.9336-9.0469c-0.25-0.57031-0.8125-0.94141-1.4336-0.94141h-7.5078c-0.86328 0-1.5625 0.69922-1.5625 1.5625s0.69922 1.5625 1.5625 1.5625h6.4883l5.8477 13.453c0.25 0.57812 0.81641 0.94141 1.4336 0.94141 0.078125 0 0.15625-0.003906 0.23047-0.015625 0.69922-0.10547 1.2422-0.66406 1.3203-1.3672l2.6289-22.996 3.9297 9.0469c0.25 0.57031 0.8125 0.94141 1.4336 0.94141h0.011719v26.891c0 5.4219 3.0508 15.918 14.551 16.855 0.03125 0.003906 0.53125 0.054688 1.3672 0.054688 4.4414 0 18.328-1.4141 21.09-18.754 0.011719-0.070312 0.019531-0.16016 0.019531-0.23047 0.003907-0.15234 0.12109-3.7852 4.4727-6.1914 0.75781-0.51562 18.352-12.707 18.078-33.336 3.7734-3.3789 6.168-8.2695 6.168-13.723zm-3.125 0c0 8.4414-6.8672 15.309-15.312 15.309-8.4414 0-15.309-6.8672-15.309-15.309s6.8672-15.312 15.309-15.312 15.312 6.8672 15.312 15.312zm-45.062 36.98c-0.90625 1.5586-2.3633 2.6797-3.4141 2.7656v-4.0781c0-0.67969 0.32422-1.1641 0.63281-1.4648 1.3125-0.14062 2.5234-0.60547 3.543-1.3438 0.24219 1.0938 0.042969 2.7422-0.75781 4.125zm-3.5703-5.8281c-2.3594 0-4.2734-1.918-4.2734-4.2734s1.918-4.2734 4.2734-4.2734c2.3555 0 4.2734 1.918 4.2734 4.2734s-1.918 4.2734-4.2734 4.2734zm0.15625 11.73c2.332-0.078125 4.7305-1.9453 6.1172-4.3359 1.4375-2.4766 1.7617-5.9219 0.39844-8.0938 1.8359-2.0117 2.875-4.6406 2.875-7.3633 0-4.8242-3.0938-9.0312-7.6953-10.461-1.0469-0.32422-1.7344-1.168-1.75-2.1406l-0.007812-0.042969c0.82422-11.512 10.738-13.277 15.07-13.5-0.16797 0.99609-0.27344 2.0117-0.27344 3.0547 0 9.2891 6.9141 16.977 15.859 18.234-1.2422 4.3242-4.3633 9.6445-11.938 13.328-0.875 0.34375-5.8828 2.6953-6.8047 11.391-0.32031 3.0078-1.4883 5.7773-3.3789 8.0156-1.4375 1.7031-2.9688 2.9141-4.5469 3.5977-0.86328 0.375-1.8164 0.28516-2.6172-0.24219-0.82422-0.53906-1.3125-1.4453-1.3125-2.4219v-9.0156zm-1.7773-52.148c7.9141-6.8086 18.254-6.0859 18.422-6.0703 1.8906 0.070313 3.6953 0.30078 5.4141 0.66016-2.8203 2.1406-5.0039 5.0703-6.2227 8.4609-7.1445 0.035156-18.086 3.4727-19.016 16.57l0.003906 0.18359c0.039063 2.3125 1.625 4.3516 3.9453 5.0703 3.2891 1.0234 5.5 4.0312 5.5 7.4805 0 0.050781-0.011719 0.10156-0.011719 0.15234-1.2734-2.2383-3.6523-3.7656-6.4062-3.7656-3.543 0-6.5078 2.5078-7.2266 5.8359h-3.6328v-13.281c0.67578-9.4414 3.7812-16.609 9.2383-21.297zm27.504 53.664c-5.4219 2.9883-5.918 7.7578-5.9609 8.6875-2.8438 17.523-18.355 16.059-19.055 15.988-11.539-0.9375-11.723-13.227-11.727-13.742l-0.003906-26.891h3.6328c0.53516 2.4766 2.3164 4.4766 4.6484 5.3477-0.23438 0.59375-0.39062 1.2188-0.39062 1.875v16.234c0 2.0312 1.0195 3.9141 2.7266 5.0352 0.98438 0.64844 2.1172 0.97656 3.25 0.97656 0.78906 0 1.5781-0.16016 2.3242-0.48438 2.0234-0.875 3.9375-2.3711 5.6875-4.4453 2.2969-2.7148 3.7109-6.0703 4.0977-9.6992 0.76562-7.2266 4.6719-8.75 4.8203-8.8047 0.0625-0.019531 0.12109-0.046875 0.17969-0.074218 9.043-4.3711 12.531-10.887 13.82-16 3.0781-0.10156 5.9609-0.95313 8.4805-2.3867-1.0352 17.598-16.488 28.344-16.531 28.383zm-4.1328-47.496v6.1953c0 0.86328 0.69922 1.5625 1.5625 1.5625h5.3516v5.3516c0 0.86328 0.69922 1.5625 1.5625 1.5625h6.1953c0.86328 0 1.5625-0.69922 1.5625-1.5625v-5.3516h5.3516c0.86328 0 1.5625-0.69922 1.5625-1.5625v-6.1953c0-0.86328-0.69922-1.5625-1.5625-1.5625h-5.3516v-5.3516c0-0.86328-0.69922-1.5625-1.5625-1.5625h-6.1953c-0.86328 0-1.5625 0.69922-1.5625 1.5625v5.3516h-5.3516c-0.86328 0-1.5625 0.69922-1.5625 1.5625zm3.125 1.5625h5.3516c0.86328 0 1.5625-0.69922 1.5625-1.5625v-5.3516h3.0703v5.3516c0 0.86328 0.69922 1.5625 1.5625 1.5625h5.3516v3.0703h-5.3516c-0.86328 0-1.5625 0.69922-1.5625 1.5625v5.3516h-3.0703v-5.3516c0-0.86328-0.69922-1.5625-1.5625-1.5625h-5.3516z"/>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Audiology Services</h3>
        <p class="text-gray-600 mb-4">
          Professional hearing assessments, hearing aid fittings, and comprehensive ear health care services for all ages.
        </p>
        <a href="{{ home_url('/audiology') }}" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">
          Learn More →
        </a>
      </div>
    </div>
  </div>
</section>

{{-- Call to Action --}}
@include('components.cta-section')

@endwhile
@endsection