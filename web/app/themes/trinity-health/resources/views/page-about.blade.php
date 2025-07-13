{{--
  Template Name: About Trinity Health
  Description: Simple, working about page
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- About Page Header --}}
<section class="py-20 bg-gradient-to-r from-[#880005] to-[#660004] relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center">
      <h1 class="text-5xl font-bold text-white mb-6">{{ get_the_title() }}</h1>
      <p class="text-xl text-white/90 max-w-3xl mx-auto">
        Learn about Trinity Health's commitment to providing exceptional healthcare services to the Zambian community.
      </p>
    </div>
  </div>
</section>

{{-- About Content --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      
      {{-- About Text --}}
      <div>
        <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Mission & Vision</h2>
        
        <div class="prose prose-lg max-w-none mb-8">
          @if(get_the_content())
            @php(the_content())
          @else
            <p class="text-xl text-gray-600 mb-6">
              Trinity Health Zambia is committed to providing comprehensive, compassionate healthcare services 
              to our community. We combine modern medical expertise with a patient-first approach.
            </p>
          @endif
        </div>
        
        {{-- Core Values --}}
        <div class="space-y-4">
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Excellence in Care</h4>
              <p class="text-gray-600">Providing the highest standard of medical care</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Patient-Centered Approach</h4>
              <p class="text-gray-600">Putting patient needs at the center of everything we do</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Community Commitment</h4>
              <p class="text-gray-600">Contributing to the health and wellness of our community</p>
            </div>
          </div>
        </div>
      </div>
      
      {{-- About Image --}}
      <div class="relative">
        <div class="bg-gray-400 aspect-[4/3] rounded-2xl flex items-center justify-center">
          <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2-4h6m-6 0V9a2 2 0 012-2h2a2 2 0 012 2v8m-6 0V5a2 2 0 012-2h2a2 2 0 012 2v16"></path>
          </svg>
        </div>
      </div>
      
    </div>
  </div>
</section>

{{-- Team Section --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
      <p class="text-xl text-gray-600">
        Our dedicated healthcare professionals provide exceptional medical care.
      </p>
    </div>
  </div>
</section>

{{-- CTA Section --}}
@include('components.cta-section')

@endwhile
@endsection