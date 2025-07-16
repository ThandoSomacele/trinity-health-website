{{--
  Template Name: Contact Us
  Description: Contact page with forms and information
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- Contact Page Header --}}
<section class="relative py-24 bg-gradient-to-br from-[#880005] via-[#660004] to-[#4a0003] overflow-hidden">
  {{-- Background Pattern --}}
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full transform translate-x-32 -translate-y-32"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-white rounded-full transform -translate-x-20 translate-y-20"></div>
  </div>
  
  {{-- Content --}}
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center">
      {{-- Badge --}}
      <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full mb-8">
        <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
        </svg>
        <span class="text-white font-medium">Get In Touch</span>
      </div>
      
      {{-- Title --}}
      <h1 class="text-6xl lg:text-7xl font-bold mb-8 text-white leading-tight">
        Contact Trinity 
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-white/70">Health</span>
      </h1>
      
      {{-- Description --}}
      <p class="text-xl lg:text-2xl max-w-4xl mx-auto text-white/90 leading-relaxed">
        Get in touch with our healthcare team. We're here to help with appointments, questions, and medical consultations.
      </p>
      
      {{-- CTA Buttons --}}
      <div class="flex flex-col sm:flex-row gap-4 justify-center mt-10">
        <a href="tel:+260123456789" class="px-8 py-4 bg-white text-[#880005] rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg">
          Call Now
        </a>
        <a href="mailto:info@trinityhealth.zm" class="px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-[#880005] transition-all duration-300">
          Send Email
        </a>
      </div>
    </div>
  </div>
</section>

{{-- Contact Information --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-3 gap-8 mb-16">
      
      {{-- Phone Contact --}}
      <div class="text-center p-8 bg-gray-50 rounded-xl">
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Call Us</h3>
        <p class="text-gray-600 mb-4">Ready to help with appointments and medical questions</p>
        <a href="tel:+260123456789" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">
          +260 123 456 789
        </a>
      </div>
      
      {{-- Email Contact --}}
      <div class="text-center p-8 bg-gray-50 rounded-xl">
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Email Us</h3>
        <p class="text-gray-600 mb-4">Send us your questions or appointment requests</p>
        <a href="mailto:info@trinityhealth.zm" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors">
          info@trinityhealth.zm
        </a>
      </div>
      
      {{-- Visit Us --}}
      <div class="text-center p-8 bg-gray-50 rounded-xl">
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Visit Our Clinic</h3>
        <p class="text-gray-600 mb-4">Professional healthcare facility in Lusaka</p>
        <p class="text-[#880005] font-semibold">
          Trinity Health Clinic<br>
          Lusaka, Zambia
        </p>
      </div>
      
    </div>
    
    {{-- Contact Form and Hours --}}
    <div class="grid lg:grid-cols-2 gap-12">
      
      {{-- Contact Form --}}
      <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Send us a Message</h2>
        <p class="text-gray-600 mb-8">
          Fill out the form below and we'll get back to you as soon as possible. For urgent medical matters, please call our clinic directly.
        </p>
        
        {{-- Basic Contact Form --}}
        <form class="space-y-6" action="#" method="POST">
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
              <input 
                type="text" 
                id="first_name" 
                name="first_name" 
                required 
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#880005] focus:border-transparent"
              >
            </div>
            <div>
              <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
              <input 
                type="text" 
                id="last_name" 
                name="last_name" 
                required 
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#880005] focus:border-transparent"
              >
            </div>
          </div>
          
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
            <input 
              type="email" 
              id="email" 
              name="email" 
              required 
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#880005] focus:border-transparent"
            >
          </div>
          
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
            <input 
              type="tel" 
              id="phone" 
              name="phone" 
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#880005] focus:border-transparent"
            >
          </div>
          
          <div>
            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
            <select 
              id="subject" 
              name="subject" 
              required 
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#880005] focus:border-transparent"
            >
              <option value="">Select a subject</option>
              <option value="appointment">Appointment Request</option>
              <option value="general">General Inquiry</option>
              <option value="audiology">Audiology Services</option>
              <option value="emergency">Emergency/Urgent</option>
              <option value="feedback">Feedback</option>
            </select>
          </div>
          
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
            <textarea 
              id="message" 
              name="message" 
              rows="5" 
              required 
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#880005] focus:border-transparent"
              placeholder="Please describe your inquiry or appointment request..."
            ></textarea>
          </div>
          
          <button 
            type="submit" 
            class="w-full bg-[#880005] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#660004] transition-colors flex items-center justify-center"
          >
            Send Message
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
            </svg>
          </button>
        </form>
      </div>
      
      {{-- Business Hours and Emergency Info --}}
      <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Operating Hours</h2>
        
        {{-- Business Hours --}}
        <div class="bg-gray-50 rounded-xl p-6 mb-8">
          <h3 class="text-lg font-semibold text-gray-900 mb-4">Regular Hours</h3>
          <div class="space-y-3">
            <div class="flex justify-between">
              <span class="text-gray-600">Monday - Friday</span>
              <span class="font-medium text-gray-900">8:00 AM - 5:00 PM</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Saturday</span>
              <span class="font-medium text-gray-900">8:00 AM - 12:00 PM</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Sunday</span>
              <span class="font-medium text-gray-900">Closed</span>
            </div>
          </div>
        </div>
        
        {{-- Emergency Information --}}
        <div class="bg-red-50 border border-red-200 rounded-xl p-6 mb-8">
          <h3 class="text-lg font-semibold text-red-900 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
            Emergency Care
          </h3>
          <p class="text-red-800 mb-4">
            For medical emergencies, call our emergency line immediately or visit our clinic.
          </p>
          <a 
            href="tel:+260123456789" 
            class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-700 transition-colors"
          >
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            Emergency Contact
          </a>
        </div>
        
        {{-- Location Info --}}
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
          <h3 class="text-lg font-semibold text-blue-900 mb-4">Location & Directions</h3>
          <p class="text-blue-800 mb-4">
            Trinity Health Clinic is conveniently located in Lusaka with easy access to public transportation and parking.
          </p>
          <div class="space-y-2 text-sm text-blue-700">
            <p><strong>Address:</strong> Trinity Health Clinic, Lusaka, Zambia</p>
            <p><strong>Parking:</strong> Free parking available on-site</p>
            <p><strong>Public Transport:</strong> Accessible by bus and taxi</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

@endwhile
@endsection