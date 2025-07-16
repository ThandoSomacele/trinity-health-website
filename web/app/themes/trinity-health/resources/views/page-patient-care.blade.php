{{--
  Template Name: Patient Care
  Description: Patient care page with comprehensive service information
--}}

@extends('layouts.app')

@section('content')
@while(have_posts())
@php(the_post())

{{-- Patient Care Header --}}
<section class="py-20 bg-gradient-to-r from-[#880005] to-[#660004] relative overflow-hidden" style="background: linear-gradient(90deg, #880005 0%, #660004 100%);">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center">
      <h1 class="text-5xl font-bold mb-6" style="color: white !important;">Patient Care</h1>
      <p class="text-xl max-w-3xl mx-auto" style="color: rgba(255, 255, 255, 0.9) !important;">
        Exceptional healthcare experiences centred around your individual needs and comfort.
      </p>
    </div>
  </div>
</section>

{{-- Patient-Centered Approach Section --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-16 items-start">
      
      {{-- Content --}}
      <div>
        <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Patient-Centered Approach</h2>
        
        <div class="space-y-6 mb-8">
          <div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">
              Your health journey
              <span class="block text-[#880005]">matters to us</span>
            </h3>
            <p class="text-lg text-gray-600">
              At Trinity Health Zambia, patient care is at the heart of everything we do. We believe that exceptional healthcare goes beyond medical treatment – it encompasses your entire experience from first contact to ongoing wellness.
            </p>
          </div>
          
          <div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Personalised Care Plans</h3>
            <p class="text-lg text-gray-600">
              We understand that each patient is unique, with individual needs, concerns, and goals. Our healthcare team takes the time to listen, understand, and develop personalised treatment plans that align with your specific requirements.
            </p>
          </div>
        </div>
        
        {{-- Core Patient Care Values --}}
        <div class="space-y-4">
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Compassionate Care</h4>
              <p class="text-gray-600">Treating every patient with dignity, respect, and understanding throughout their healthcare journey</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Clear Communication</h4>
              <p class="text-gray-600">Providing transparent explanations of your condition, treatment options, and expected outcomes</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
              <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Collaborative Partnership</h4>
              <p class="text-gray-600">Working together with you to make informed decisions about your healthcare</p>
            </div>
          </div>
        </div>
      </div>
      
      {{-- Patient Care Image --}}
      <div class="relative h-full">
        <div class="rounded-2xl h-full overflow-hidden bg-gray-400">
          <div class="flex items-center justify-center h-full min-h-[400px]">
            <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
          </div>
        </div>
        
        {{-- Patient Satisfaction Card --}}
        <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-xl shadow-lg">
          <div class="text-center">
            <p class="text-3xl font-bold text-[#880005] leading-none mb-1">98%</p>
            <p class="text-sm text-gray-600 leading-tight">Patient</p>
            <p class="text-sm text-gray-600 leading-tight">Satisfaction</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

{{-- Visit Process Section --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">What to Expect During Your Visit</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        We've designed our patient experience to be seamless, comfortable, and focused on your needs at every step.
      </p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      {{-- Before Your Appointment --}}
      <div class="bg-white p-8 rounded-xl shadow-sm">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6M3 21h18v-2a2 2 0 00-2-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 00-2 2v2z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Before Your Appointment</h3>
        <ul class="space-y-3 text-gray-600">
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Convenient scheduling options
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Appointment reminders via SMS
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Pre-visit preparation guidance
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Insurance verification assistance
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            New patient forms and information
          </li>
        </ul>
      </div>
      
      {{-- During Your Visit --}}
      <div class="bg-white p-8 rounded-xl shadow-sm">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">During Your Visit</h3>
        <ul class="space-y-3 text-gray-600">
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Comfortable, modern waiting areas
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Prompt, professional service
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Thorough consultations and examinations
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Clear explanations of diagnoses
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Time to ask questions and discuss concerns
          </li>
        </ul>
      </div>
      
      {{-- After Your Visit --}}
      <div class="bg-white p-8 rounded-xl shadow-sm">
        <div class="bg-[#880005]/10 p-6 rounded-full w-fit mx-auto mb-6">
          <svg class="w-12 h-12 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">After Your Visit</h3>
        <ul class="space-y-3 text-gray-600">
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Follow-up care coordination
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Test results communication
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Prescription management
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Referral assistance when needed
          </li>
          <li class="flex items-start">
            <span class="text-[#880005] mr-2">•</span>
            Ongoing support and guidance
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- Patient Rights and Responsibilities Section --}}
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Patient Rights and Responsibilities</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Understanding your rights and responsibilities helps us work together for the best possible healthcare outcomes.
      </p>
    </div>
    
    <div class="grid md:grid-cols-2 gap-12">
      {{-- Your Rights --}}
      <div>
        <div class="bg-[#880005]/10 p-4 rounded-full w-fit mb-6">
          <svg class="w-8 h-8 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Your Rights</h3>
        <div class="space-y-4">
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Quality Healthcare</h4>
              <p class="text-gray-600">Receive quality healthcare regardless of your background or circumstances</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Dignity and Privacy</h4>
              <p class="text-gray-600">Respect for your dignity and privacy throughout your care</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Clear Information</h4>
              <p class="text-gray-600">Clear information about your condition and treatment options</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Informed Decisions</h4>
              <p class="text-gray-600">Participation in healthcare decisions that affect you</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#880005]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Medical Records Access</h4>
              <p class="text-gray-600">Access to your medical records and test results</p>
            </div>
          </div>
        </div>
      </div>
      
      {{-- Your Responsibilities --}}
      <div>
        <div class="bg-[#1e3a8a]/10 p-4 rounded-full w-fit mb-6">
          <svg class="w-8 h-8 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Your Responsibilities</h3>
        <div class="space-y-4">
          <div class="flex items-start space-x-3">
            <div class="bg-[#1e3a8a]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Accurate Information</h4>
              <p class="text-gray-600">Provide accurate and complete health information</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#1e3a8a]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Follow Treatment Plans</h4>
              <p class="text-gray-600">Follow agreed-upon treatment plans and instructions</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#1e3a8a]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Keep Appointments</h4>
              <p class="text-gray-600">Keep scheduled appointments or provide advance notice</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#1e3a8a]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Open Communication</h4>
              <p class="text-gray-600">Communicate concerns and questions openly with your care team</p>
            </div>
          </div>
          
          <div class="flex items-start space-x-3">
            <div class="bg-[#1e3a8a]/10 p-1.5 rounded-full mt-1">
              <svg class="w-3 h-3 text-[#1e3a8a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Respectful Behaviour</h4>
              <p class="text-gray-600">Respect staff, other patients, and clinic policies</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Contact Patient Services Section --}}
<section class="py-20 bg-[#880005]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold mb-4" style="color: white !important;">Contact Patient Services</h2>
      <p class="text-xl max-w-3xl mx-auto" style="color: rgba(255, 255, 255, 0.9) !important;">
        For questions about patient care, appointments, or any other concerns, please contact our patient services team.
      </p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <div class="text-center">
        <div class="bg-white/10 p-6 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold mb-2" style="color: white !important;">Phone</h3>
        <p style="color: rgba(255, 255, 255, 0.9) !important;">+260 123 456 789</p>
      </div>
      
      <div class="text-center">
        <div class="bg-white/10 p-6 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold mb-2" style="color: white !important;">Email</h3>
        <p style="color: rgba(255, 255, 255, 0.9) !important;">care@trinityhealth.zm</p>
      </div>
      
      <div class="text-center">
        <div class="bg-white/10 p-6 rounded-full w-fit mx-auto mb-4">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl font-bold mb-2" style="color: white !important;">Office Hours</h3>
        <p style="color: rgba(255, 255, 255, 0.9) !important;">Mon-Fri: 8:00 AM - 5:00 PM</p>
        <p style="color: rgba(255, 255, 255, 0.9) !important;">Sat: 9:00 AM - 1:00 PM</p>
      </div>
    </div>
    
    <div class="text-center mt-12">
      <a href="{{ home_url('/contact') }}" class="bg-white text-[#880005] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
        Schedule an Appointment
      </a>
    </div>
  </div>
</section>

@endwhile
@endsection