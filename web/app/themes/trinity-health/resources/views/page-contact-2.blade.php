{{--
  Template Name: Contact Us (Contact-2)
  Description: Contact page with About/Patient Care design patterns and comprehensive information
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- Contact Page Header --}}
<section class="relative h-screen overflow-hidden bg-[#880005]">
  {{-- Background Image --}}
  <div 
    class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
    style="background-image: url('https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=90&auto=webp');"
  ></div>
  
  {{-- Overlay --}}
  <div class="absolute inset-0 bg-gradient-to-br from-[#880005]/80 via-[#660004]/85 to-[#4a0003]/90"></div>
  
  {{-- Content --}}
  <div class="relative z-10 h-full flex items-center justify-center py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full">
      
      {{-- Trust Badge --}}
      <div class="inline-flex items-center px-6 py-3 bg-white/15 backdrop-blur-md rounded-full mb-8">
        <svg class="w-5 h-5 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
        </svg>
        <span class="text-white font-medium text-sm tracking-wide">Get In Touch</span>
      </div>
      
      {{-- Main Heading --}}
      <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold text-white leading-tight tracking-tight mb-8">
        Contact Trinity Health
      </h1>
      
      {{-- Subheading --}}
      <p class="text-xl sm:text-2xl lg:text-3xl text-white/90 font-light leading-relaxed max-w-4xl mx-auto mb-12">
        Get in touch with our healthcare team. We're here to help with appointments and medical consultations.
      </p>
      
      {{-- Contact Metrics --}}
      <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-12">
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">24/7</div>
          <div class="text-white/80 text-sm font-medium">Available Support</div>
        </div>
        
        <div class="hidden sm:block w-px h-12 bg-white/30"></div>
        
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">Fast</div>
          <div class="text-white/80 text-sm font-medium">Response Time</div>
        </div>
        
        <div class="hidden sm:block w-px h-12 bg-white/30"></div>
        
        <div class="text-center">
          <div class="text-3xl lg:text-4xl font-bold text-white mb-2">Expert</div>
          <div class="text-white/80 text-sm font-medium">Medical Advice</div>
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

{{-- Contact Approach Section: Following About page pattern --}}
<section class="py-24 lg:py-32 bg-white">
  <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-12">
    
    {{-- Section Header --}}
    <div class="text-center mb-20">
      <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Connect With Trinity Health</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Multiple ways to reach our healthcare team for appointments, consultations, and any questions about our services.
      </p>
    </div>
    
    {{-- Contact Introduction Grid --}}
    <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 mb-20">
      
      {{-- Contact Philosophy --}}
      <div class="space-y-8">
        <div>
          <h3 class="text-3xl font-bold text-gray-900 mb-6">
            Your health questions
            <span class="block text-[#880005]">matter to us</span>
          </h3>
          <p class="text-lg text-gray-600 leading-relaxed">
            At Trinity Health Zambia, we believe that open communication is essential to quality healthcare. Whether you're scheduling a routine appointment or have urgent medical concerns, our team is here to help.
          </p>
        </div>
      </div>
      
      {{-- Commitment to Service --}}
      <div class="space-y-8">
        <div>
          <h3 class="text-3xl font-bold text-gray-900 mb-6">Responsive patient care</h3>
          <p class="text-lg text-gray-600 leading-relaxed">
            We're committed to providing timely responses to all patient inquiries. Our experienced staff will guide you through scheduling, answer questions about our services, and ensure you have the information you need for your healthcare journey.
          </p>
        </div>
      </div>
      
    </div>
    
  </div>
</section>

{{-- Quick Contact Options --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-3 gap-8 mb-16">
      
      {{-- Phone Contact --}}
      <div class="text-center p-8 bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Call Us</h3>
        <p class="text-gray-600 mb-4">Ready to help with appointments and medical questions</p>
        <a href="tel:+260123456789" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors text-lg">
          +260 123 456 789
        </a>
      </div>
      
      {{-- Email Contact --}}
      <div class="text-center p-8 bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Email Us</h3>
        <p class="text-gray-600 mb-4">Send us your questions or appointment requests</p>
        <a href="mailto:info@trinityhealth.zm" class="text-[#880005] font-semibold hover:text-[#660004] transition-colors text-lg">
          info@trinityhealth.zm
        </a>
      </div>
      
      {{-- Visit Us --}}
      <div class="text-center p-8 bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">Visit Our Clinic</h3>
        <p class="text-gray-600 mb-4">Professional healthcare facility in Lusaka</p>
        <p class="text-[#880005] font-semibold">
          Trinity Health Clinic<br>
          Lusaka, Zambia
        </p>
      </div>
      
    </div>
  </div>
</section>

{{-- Contact Form and Information --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12">
      
      {{-- Contact Form --}}
      <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Send us a Message</h2>
        <p class="text-gray-600 mb-8">
          Fill out the form below and we'll get back to you as soon as possible. For urgent medical matters, please call our clinic directly.
        </p>
        
        {{-- WordPress Content --}}
        @if(get_the_content())
          <div class="prose prose-lg prose-gray max-w-none mb-8">
            @php(the_content())
          </div>
        @endif
        
        {{-- Contact Form --}}
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
      
      {{-- Business Hours and Additional Information --}}
      <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Visit Us</h2>
        
        {{-- Business Hours --}}
        <div class="bg-gray-50 rounded-xl p-6 mb-8">
          <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Operating Hours
          </h3>
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
        
        {{-- Location Information --}}
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
          <h3 class="text-lg font-semibold text-blue-900 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Location & Directions
          </h3>
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