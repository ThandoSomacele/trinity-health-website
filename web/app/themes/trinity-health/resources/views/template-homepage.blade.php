{{--
  Template Name: Homepage
  
  Trinity Health Zambia - Homepage Template
  Mayo Clinic inspired healthcare website design
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section --}}
  <section class="relative bg-trinity-gradient text-white overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-20"></div>
    
    <div class="relative container mx-auto px-4 py-20 lg:py-32">
      <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-white animate-fade-in">
          Excellence in Healthcare
          <span class="block text-primary-200">for Every Patient</span>
        </h1>
        
        <p class="text-xl md:text-2xl text-primary-100 mb-8 max-w-3xl mx-auto leading-relaxed">
          Dr. Mwamba's Trinity Health provides comprehensive medical care and specialised audiology services in Zambia, combining expertise with compassionate patient-centered care.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
          <a href="#services" class="btn-primary text-lg px-8 py-4">
            Explore Our Services
          </a>
          <a href="/contact" class="btn-secondary text-lg px-8 py-4 bg-white/10 border-white text-white hover:bg-white hover:text-primary-900">
            Book Appointment
          </a>
        </div>
      </div>
    </div>
    
    {{-- Background Medical Pattern --}}
    <div class="absolute bottom-0 right-0 opacity-10">
      <svg width="200" height="200" viewBox="0 0 200 200" class="text-white">
        <path d="M100 20 L180 100 L100 180 L20 100 Z" fill="currentColor" opacity="0.1"/>
        <circle cx="100" cy="100" r="60" fill="none" stroke="currentColor" stroke-width="2" opacity="0.2"/>
      </svg>
    </div>
  </section>

  {{-- Services Overview Section --}}
  <section id="services" class="content-section bg-white">
    <div class="container mx-auto px-4">
      <div class="section-header">
        <h2>Our Medical Services</h2>
        <p>Comprehensive healthcare solutions delivered with professional excellence and personal attention to every patient.</p>
      </div>
      
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
          // Get Health Services (Custom Post Type)
          $health_services = get_posts([
            'post_type' => 'health_service',
            'posts_per_page' => 6,
            'post_status' => 'publish'
          ]);
        @endphp
        
        @foreach($health_services as $service)
          @php
            $icon = get_field('service_icon', $service->ID) ?: 'medical-cross';
            $description = get_field('service_description', $service->ID) ?: wp_trim_words(get_the_excerpt($service->ID), 20);
          @endphp
          
          <div class="service-card">
            <div class="card-body text-center">
              {{-- Service Icon --}}
              <div class="service-card-icon mx-auto">
                <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3V8zM4 8h2V6H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-2h-2v2H4V8z"/>
                </svg>
              </div>
              
              <h3 class="service-card-title">{{ $service->post_title }}</h3>
              <p class="service-card-description">{{ $description }}</p>
              
              <div class="mt-4">
                <a href="{{ get_permalink($service->ID) }}" class="text-primary-900 font-medium hover:text-primary-700 transition-colors">
                  Learn More →
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      
      <div class="text-center mt-12">
        <a href="/services" class="btn-primary">View All Services</a>
      </div>
    </div>
  </section>

  {{-- Audiology Speciality Section --}}
  <section class="content-section bg-neutral-50">
    <div class="container mx-auto px-4">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div>
          <div class="text-primary-900 font-semibold text-sm uppercase tracking-wide mb-2">
            Specialised Care
          </div>
          <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-6">
            Advanced Audiology Services
          </h2>
          <p class="text-lg text-neutral-700 mb-6 leading-relaxed">
            Dr. Mwamba brings specialized expertise in audiology and hearing healthcare, providing comprehensive hearing assessments, advanced diagnostic testing, and personalized treatment solutions for patients across Zambia.
          </p>
          
          <div class="space-y-4 mb-8">
            @php
              $audiology_features = [
                'Comprehensive hearing assessments and diagnostics',
                'Advanced audiometric testing and evaluation',
                'Hearing aid consultations and fittings',
                'Tinnitus evaluation and management',
                'Occupational hearing health services'
              ];
            @endphp
            
            @foreach($audiology_features as $feature)
              <div class="flex items-start">
                <div class="flex-shrink-0 w-6 h-6 text-healthcare-green mt-0.5">
                  <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <p class="ml-3 text-neutral-700">{{ $feature }}</p>
              </div>
            @endforeach
          </div>
          
          <a href="/audiology-services" class="btn-healthcare">Explore Audiology Services</a>
        </div>
        
        <div class="relative">
          <div class="aspect-[4/3] bg-neutral-200 rounded-lg overflow-hidden">
            {{-- Placeholder for audiology equipment image --}}
            <div class="w-full h-full bg-gradient-to-br from-healthcare-navy to-healthcare-green opacity-20 flex items-center justify-center">
              <svg class="w-24 h-24 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17 20c.29 0 .57-.12.76-.32C19.53 17.77 21 15.54 21 13c0-2.54-1.47-4.77-3.24-6.68-.19-.2-.47-.32-.76-.32s-.57.12-.76.32c-.19.2-.31.47-.31.76 0 .29.12.57.31.76C17.46 9.04 18.5 10.94 18.5 13c0 2.06-1.04 3.96-2.26 5.16-.19.19-.31.47-.31.76 0 .29.12.57.31.76.19.2.47.32.76.32zm-10 0c-.29 0-.57-.12-.76-.32C4.47 17.77 3 15.54 3 13c0-2.54 1.47-4.77 3.24-6.68.19-.2.47-.32.76-.32s.57.12.76.32c.19.2.31.47.31.76 0 .29-.12.57-.31.76C6.54 9.04 5.5 10.94 5.5 13c0 2.06 1.04 3.96 2.26 5.16.19.19.31.47.31.76 0 .29-.12.57-.31.76-.19.2-.47.32-.76.32z"/>
              </svg>
            </div>
          </div>
          
          {{-- Decorative elements --}}
          <div class="absolute -top-4 -right-4 w-8 h-8 bg-primary-900 rounded-full opacity-20"></div>
          <div class="absolute -bottom-4 -left-4 w-6 h-6 bg-healthcare-green rounded-full opacity-30"></div>
        </div>
      </div>
    </div>
  </section>

  {{-- About Dr. Mwamba Section --}}
  <section class="content-section bg-white">
    <div class="container mx-auto px-4">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div class="order-2 lg:order-1">
          <div class="aspect-[3/4] bg-neutral-200 rounded-lg overflow-hidden">
            {{-- Placeholder for Dr. Mwamba's professional photo --}}
            <div class="w-full h-full bg-gradient-to-b from-primary-100 to-primary-200 flex items-center justify-center">
              <div class="text-6xl text-primary-900 opacity-30">
                👨‍⚕️
              </div>
            </div>
          </div>
        </div>
        
        <div class="order-1 lg:order-2">
          <div class="text-primary-900 font-semibold text-sm uppercase tracking-wide mb-2">
            Your Healthcare Provider
          </div>
          <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-6">
            Dr. Mwamba
          </h2>
          <p class="text-lg text-neutral-700 mb-6 leading-relaxed">
            With extensive experience in general medicine and specialized training in audiology, Dr. Mwamba is committed to providing exceptional healthcare services to the Zambian community. His practice combines clinical excellence with a patient-centered approach.
          </p>
          
          <div class="grid sm:grid-cols-2 gap-6 mb-8">
            <div>
              <h4 class="font-semibold text-neutral-900 mb-2">Medical Expertise</h4>
              <ul class="text-sm text-neutral-700 space-y-1">
                <li>• General Medicine</li>
                <li>• Preventive Care</li>
                <li>• Health Screenings</li>
              </ul>
            </div>
            <div>
              <h4 class="font-semibold text-neutral-900 mb-2">Audiology Specialisation</h4>
              <ul class="text-sm text-neutral-700 space-y-1">
                <li>• Hearing Assessment</li>
                <li>• Diagnostic Testing</li>
                <li>• Treatment Planning</li>
              </ul>
            </div>
          </div>
          
          <a href="/about" class="btn-secondary">Learn More About Dr. Mwamba</a>
        </div>
      </div>
    </div>
  </section>

  {{-- Patient Testimonials Section --}}
  <section class="content-section bg-neutral-50">
    <div class="container mx-auto px-4">
      <div class="section-header">
        <h2>What Our Patients Say</h2>
        <p>Real experiences from patients who trust Trinity Health for their healthcare needs.</p>
      </div>
      
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
          // Get Testimonials (Custom Post Type)
          $testimonials = get_posts([
            'post_type' => 'testimonial',
            'posts_per_page' => 3,
            'post_status' => 'publish'
          ]);
        @endphp
        
        @foreach($testimonials as $testimonial)
          @php
            $patient_name = get_field('patient_name', $testimonial->ID) ?: 'Anonymous Patient';
            $service_type = get_field('service_type', $testimonial->ID) ?: 'General Healthcare';
            $rating = get_field('rating', $testimonial->ID) ?: 5;
          @endphp
          
          <div class="testimonial-card">
            <div class="card-body">
              {{-- Star Rating --}}
              <div class="flex justify-center mb-4">
                @for($i = 1; $i <= 5; $i++)
                  <svg class="w-5 h-5 {{ $i <= $rating ? 'text-yellow-400' : 'text-neutral-300' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                  </svg>
                @endfor
              </div>
              
              <blockquote class="testimonial-quote">
                "{{ wp_trim_words(get_the_content(null, false, $testimonial), 25) }}"
              </blockquote>
              
              <div class="text-center">
                <div class="testimonial-author">{{ $patient_name }}</div>
                <div class="testimonial-service">{{ $service_type }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Contact CTA Section --}}
  <section class="content-section bg-primary-900 text-white">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
        Ready to Experience Excellence in Healthcare?
      </h2>
      <p class="text-xl text-primary-100 mb-8 max-w-3xl mx-auto">
        Schedule your appointment today and discover why patients throughout Zambia trust Trinity Health for their medical and audiology care needs.
      </p>
      
      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
        <a href="/contact" class="btn bg-white text-primary-900 hover:bg-primary-50 text-lg px-8 py-4">
          Book Your Appointment
        </a>
        <a href="tel:+260-XXX-XXXX" class="btn bg-white/10 border-2 border-white text-white hover:bg-white hover:text-primary-900 text-lg px-8 py-4">
          Call Us Today
        </a>
      </div>
      
      <div class="mt-8 text-primary-200">
        <p>📍 Lusaka, Zambia | 📞 +260-XXX-XXXX | ✉️ info@trinityhealth.co.zm</p>
      </div>
    </div>
  </section>
@endsection
