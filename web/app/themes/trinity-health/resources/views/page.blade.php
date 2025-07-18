{{--
  Default Page Template - Trinity Health
  
  Uses flexible component system with Block Editor integration
  Content editable via Custom Fields + WordPress Block Editor
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    
    {{-- Hero Section (Optional) --}}
    @if(get_field('hero_title'))
      @include('components.hero-section')
    @endif
    
    {{-- Services Grid Section (Optional) --}}
    @if(get_field('services_section_title') || get_field('featured_services'))
      @include('components.services-grid')
    @endif
    
    {{-- Main Content Section --}}
    @include('components.content-section')
    
    {{-- Call-to-Action Section (Optional) --}}
    @if(get_field('cta_title'))
      @include('components.cta-section')
    @endif

  @endwhile
@endsection
