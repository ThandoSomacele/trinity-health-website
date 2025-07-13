{{--
  Template Name: About Trinity Health (Test)
  Description: Simplified test version
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) 
    @php(the_post())
    
    <div class="py-20">
      <div class="max-w-7xl mx-auto px-4">
        <h1>{{ get_the_title() }}</h1>
        <div class="content">
          @php(the_content())
        </div>
      </div>
    </div>
    
  @endwhile
@endsection