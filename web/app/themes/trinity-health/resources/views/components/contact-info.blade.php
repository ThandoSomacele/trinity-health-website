{{--
  Contact Information Component
  
  Displays global contact information from Trinity Health settings
  Can be used in footer, contact page, or anywhere contact info is needed
--}}

@php
  // Get global contact information
  $contact = trinity_get_contact_info();
  $emergency = trinity_get_emergency_info();
  $is_open = trinity_is_open();
  $status_message = trinity_get_status_message();
  
  // Style options
  $style = $style ?? 'default'; // 'default', 'compact', 'emergency-only'
  $show_status = $show_status ?? true;
  $show_emergency = $show_emergency ?? true;
@endphp

<div class="contact-info {{ $style === 'compact' ? 'space-y-2' : 'space-y-4' }}">
  
  @if($style !== 'emergency-only')
    {{-- Main Contact Information --}}
    <div class="space-y-3">
      
      {{-- Phone --}}
      @if($contact['phone'])
        <div class="flex items-center space-x-3">
          <div class="bg-[#880005]/10 p-2 rounded-full">
            <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
          </div>
          <div>
            <p class="font-semibold text-gray-900">{{ trinity_format_phone($contact['phone']) }}</p>
            <p class="text-sm text-gray-600">Main Line</p>
          </div>
        </div>
      @endif
      
      {{-- Appointment Phone (if different) --}}
      @if($contact['appointment_phone'] && $contact['appointment_phone'] !== $contact['phone'])
        <div class="flex items-center space-x-3">
          <div class="bg-[#880005]/10 p-2 rounded-full">
            <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
          </div>
          <div>
            <p class="font-semibold text-gray-900">{{ trinity_format_phone($contact['appointment_phone']) }}</p>
            <p class="text-sm text-gray-600">Appointments</p>
          </div>
        </div>
      @endif
      
      {{-- Email --}}
      @if($contact['email'])
        <div class="flex items-center space-x-3">
          <div class="bg-[#880005]/10 p-2 rounded-full">
            <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
          </div>
          <div>
            <p class="font-semibold text-gray-900">{{ $contact['email'] }}</p>
            <p class="text-sm text-gray-600">Email Us</p>
          </div>
        </div>
      @endif
      
      {{-- Address --}}
      @if($contact['address'])
        <div class="flex items-start space-x-3">
          <div class="bg-[#880005]/10 p-2 rounded-full mt-1">
            <svg class="w-4 h-4 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
          </div>
          <div>
            <p class="font-semibold text-gray-900">Visit Our Clinic</p>
            <p class="text-sm text-gray-600 whitespace-pre-line">{{ $contact['address'] }}</p>
          </div>
        </div>
      @endif
      
    </div>
  @endif
  
  {{-- Emergency Information --}}
  @if($show_emergency && $emergency['phone'])
    <div class="border-t border-red-100 pt-4 mt-4">
      <div class="bg-red-50 p-4 rounded-lg">
        <div class="flex items-center space-x-3 mb-2">
          <div class="bg-red-100 p-2 rounded-full">
            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>
          </div>
          <div>
            <p class="font-bold text-red-900">Emergency: {{ trinity_format_phone($emergency['phone']) }}</p>
            <p class="text-sm text-red-700">{{ $emergency['message'] }}</p>
          </div>
        </div>
      </div>
    </div>
  @endif
  
  {{-- Status Message --}}
  @if($show_status)
    <div class="bg-gray-50 p-3 rounded-lg">
      <div class="flex items-center space-x-2">
        <div class="w-3 h-3 rounded-full {{ $is_open ? 'bg-green-500' : 'bg-red-500' }}"></div>
        <p class="text-sm {{ $is_open ? 'text-green-700' : 'text-red-700' }}">
          {{ $status_message }}
        </p>
      </div>
    </div>
  @endif
  
</div>