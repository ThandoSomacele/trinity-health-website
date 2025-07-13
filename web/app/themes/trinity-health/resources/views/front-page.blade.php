{{--
  Template Name: Trinity Health Homepage
  Description: Flexible homepage using component system with Custom Fields
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section - Uses Custom Fields or defaults --}}
  @include('components.hero-section')

  {{-- Services Grid Section - Uses Custom Fields or CPT data --}}
  @include('components.services-grid')

  {{-- About Dr. Mwamba Section - Dedicated component with fallbacks --}}
  @include('components.about-doctor-section')

  {{-- Contact CTA Section - Uses Custom Fields or defaults --}}
  @include('components.cta-section')
@endsection
