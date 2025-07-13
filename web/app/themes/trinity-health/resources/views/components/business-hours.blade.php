{{--
  Business Hours Component
  
  Displays Trinity Health operating hours from global settings
  Shows current open/closed status
--}}

@php
  // Get business hours from global settings
  $hours = trinity_get_business_hours();
  $is_open = trinity_is_open();
  $current_day = strtolower(date('l'));
  
  // Component options
  $style = $style ?? 'default'; // 'default', 'compact', 'inline'
  $show_status = $show_status ?? true;
  
  // Day names mapping
  $day_names = [
    'monday' => 'Monday',
    'tuesday' => 'Tuesday', 
    'wednesday' => 'Wednesday',
    'thursday' => 'Thursday',
    'friday' => 'Friday',
    'saturday' => 'Saturday',
    'sunday' => 'Sunday'
  ];
  
  // Format time for display
  function format_time($time) {
    if (empty($time)) return '';
    return date('g:i A', strtotime($time));
  }
@endphp

<div class="business-hours">
  
  {{-- Status Indicator --}}
  @if($show_status)
    <div class="mb-4 p-3 rounded-lg {{ $is_open ? 'bg-green-50 border border-green-200' : 'bg-red-50 border border-red-200' }}">
      <div class="flex items-center space-x-2">
        <div class="w-3 h-3 rounded-full {{ $is_open ? 'bg-green-500' : 'bg-red-500' }}"></div>
        <span class="font-semibold {{ $is_open ? 'text-green-800' : 'text-red-800' }}">
          {{ $is_open ? 'Currently Open' : 'Currently Closed' }}
        </span>
      </div>
    </div>
  @endif
  
  {{-- Hours Listing --}}
  @if($style === 'compact')
    {{-- Compact Style - Today's hours only --}}
    @foreach($hours as $day_info)
      @if($day_info['day'] === $current_day)
        <div class="text-center">
          <p class="font-semibold text-gray-900">Today's Hours</p>
          @if($day_info['closed'])
            <p class="text-red-600">Closed</p>
          @else
            <p class="text-gray-700">
              {{ format_time($day_info['open_time']) }} - {{ format_time($day_info['close_time']) }}
            </p>
          @endif
          @if(!empty($day_info['notes']))
            <p class="text-sm text-gray-500">{{ $day_info['notes'] }}</p>
          @endif
        </div>
        @break
      @endif
    @endforeach
    
  @elseif($style === 'inline')
    {{-- Inline Style - Condensed format --}}
    <div class="space-y-1">
      @foreach($hours as $day_info)
        <div class="flex justify-between items-center {{ $day_info['day'] === $current_day ? 'font-semibold bg-gray-50 px-2 py-1 rounded' : '' }}">
          <span class="text-gray-700">{{ $day_names[$day_info['day']] ?? ucfirst($day_info['day']) }}</span>
          @if($day_info['closed'])
            <span class="text-red-600">Closed</span>
          @else
            <span class="text-gray-900">
              {{ format_time($day_info['open_time']) }} - {{ format_time($day_info['close_time']) }}
            </span>
          @endif
        </div>
      @endforeach
    </div>
    
  @else
    {{-- Default Style - Full card layout --}}
    <div class="bg-white border border-gray-200 rounded-lg p-6">
      <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-[#880005]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        Operating Hours
      </h3>
      
      <div class="space-y-3">
        @foreach($hours as $day_info)
          <div class="flex justify-between items-center py-2 {{ $day_info['day'] === $current_day ? 'bg-[#880005]/5 px-3 rounded-lg font-semibold' : '' }}">
            <span class="text-gray-700 {{ $day_info['day'] === $current_day ? 'text-[#880005]' : '' }}">
              {{ $day_names[$day_info['day']] ?? ucfirst($day_info['day']) }}
              @if($day_info['day'] === $current_day)
                <span class="text-xs text-[#880005] ml-1">(Today)</span>
              @endif
            </span>
            
            <div class="text-right">
              @if($day_info['closed'])
                <span class="text-red-600 font-medium">Closed</span>
              @else
                <span class="text-gray-900">
                  {{ format_time($day_info['open_time']) }} - {{ format_time($day_info['close_time']) }}
                </span>
              @endif
              
              @if(!empty($day_info['notes']))
                <div class="text-xs text-gray-500 mt-1">{{ $day_info['notes'] }}</div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif
  
</div>