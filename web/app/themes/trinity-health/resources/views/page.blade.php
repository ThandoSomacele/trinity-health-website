{{--
  Default Page Template - Trinity Health
  
  Used for all standard WordPress pages (About, Services, Contact, etc.)
  Mayo Clinic inspired healthcare design
--}}


@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    
    {{-- Main Content Section - Modern Layout --}}
    <div class="w-full">
      {{-- Page Content --}}
      <div class="content-area">
        @php(the_content())
      </div>
    </div>

  @endwhile
@endsection
