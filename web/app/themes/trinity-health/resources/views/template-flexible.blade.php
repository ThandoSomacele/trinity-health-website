{{--
  Template Name: Flexible Content Layout
  Description: Uses component system with Custom Fields for flexible content management
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    
    {{-- Hero Section (Optional) --}}
    @if(get_field('hero_title') || is_front_page())
      @include('components.hero-section')
    @endif
    
    {{-- Services Grid Section (Optional) --}}
    @if(get_field('services_section_title') || get_field('featured_services') || is_front_page())
      @include('components.services-grid')
    @endif
    
    {{-- Main Content Section --}}
    @if(get_the_content() || get_field('section_title'))
      @include('components.content-section')
    @endif
    
    {{-- Call-to-Action Section (Optional) --}}
    @if(get_field('cta_title') || is_front_page())
      @include('components.cta-section')
    @endif

  @endwhile
@endsection