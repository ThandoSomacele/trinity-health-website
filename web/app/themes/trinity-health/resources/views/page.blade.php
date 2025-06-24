{{--
  Default Page Template - Trinity Health
  
  Used for all standard WordPress pages (About, Services, Contact, etc.)
  Mayo Clinic inspired healthcare design
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    
    {{-- Page Header Section --}}
    <section class="page-header">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
          {{-- Breadcrumb Navigation --}}
          @if(function_exists('yoast_breadcrumb'))
            <nav class="text-sm text-primary-200 mb-4" aria-label="Breadcrumb">
              {!! yoast_breadcrumb('<p id="breadcrumbs">','</p>', false) !!}
            </nav>
          @endif
          
          <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
            {!! get_the_title() !!}
          </h1>
          
          @if(get_field('page_subtitle'))
            <p class="text-xl text-primary-100 leading-relaxed">
              {{ get_field('page_subtitle') }}
            </p>
          @endif
        </div>
      </div>
    </section>

    {{-- Main Content Section --}}
    <section class="content-section bg-white">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
          
          {{-- Page Featured Image --}}
          @if(has_post_thumbnail())
            <div class="mb-8">
              <div class="aspect-[16/9] rounded-lg overflow-hidden shadow-card">
                {!! get_the_post_thumbnail(get_the_ID(), 'full', [
                  'class' => 'w-full h-full object-cover',
                  'alt' => get_the_title()
                ]) !!}
              </div>
            </div>
          @endif

          {{-- Page Content --}}
          <div class="prose prose-lg max-w-none">
            <div class="content-area text-neutral-700 leading-relaxed">
              @php(the_content())
            </div>
          </div>

          {{-- Page Links (for multi-page content) --}}
          @if(wp_link_pages(['echo' => false]))
            <nav class="page-navigation mt-8 pt-8 border-t border-neutral-200" aria-label="Page navigation">
              <h3 class="text-lg font-semibold text-neutral-900 mb-4">Page Navigation</h3>
              {!! wp_link_pages([
                'before' => '<div class="page-links flex flex-wrap gap-2">',
                'after' => '</div>',
                'link_before' => '<span class="page-link btn btn-secondary text-sm px-4 py-2">',
                'link_after' => '</span>',
                'echo' => false
              ]) !!}
            </nav>
          @endif

          {{-- Custom Fields Content Sections --}}
          @if(have_rows('content_sections'))
            <div class="custom-content-sections mt-12 space-y-12">
              @while(have_rows('content_sections')) @php(the_row())
                @php
                  $section_type = get_sub_field('section_type');
                  $section_title = get_sub_field('section_title');
                  $section_content = get_sub_field('section_content');
                  $section_background = get_sub_field('background_style') ?: 'white';
                @endphp

                <div class="content-section-block 
                  {{ $section_background === 'gray' ? 'bg-neutral-50 p-8 rounded-lg' : '' }}
                  {{ $section_background === 'primary' ? 'bg-primary-50 p-8 rounded-lg border border-primary-200' : '' }}">
                  
                  @if($section_title)
                    <h2 class="text-2xl md:text-3xl font-bold text-neutral-900 mb-6">
                      {{ $section_title }}
                    </h2>
                  @endif

                  @if($section_type === 'text')
                    <div class="prose prose-lg max-w-none">
                      {!! $section_content !!}
                    </div>

                  @elseif($section_type === 'two_column')
                    @php
                      $left_content = get_sub_field('left_column_content');
                      $right_content = get_sub_field('right_column_content');
                    @endphp
                    <div class="grid md:grid-cols-2 gap-8">
                      <div class="prose max-w-none">
                        {!! $left_content !!}
                      </div>
                      <div class="prose max-w-none">
                        {!! $right_content !!}
                      </div>
                    </div>

                  @elseif($section_type === 'feature_grid')
                    @if(have_rows('features'))
                      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @while(have_rows('features')) @php(the_row())
                          @php
                            $feature_icon = get_sub_field('feature_icon');
                            $feature_title = get_sub_field('feature_title');
                            $feature_description = get_sub_field('feature_description');
                          @endphp
                          
                          <div class="card text-center">
                            <div class="card-body">
                              @if($feature_icon)
                                <div class="w-12 h-12 mx-auto mb-4 text-primary-900">
                                  <img src="{{ $feature_icon['url'] }}" alt="{{ $feature_icon['alt'] }}" class="w-full h-full object-contain">
                                </div>
                              @endif
                              
                              @if($feature_title)
                                <h3 class="text-lg font-semibold text-neutral-900 mb-2">
                                  {{ $feature_title }}
                                </h3>
                              @endif
                              
                              @if($feature_description)
                                <p class="text-sm text-neutral-700">
                                  {{ $feature_description }}
                                </p>
                              @endif
                            </div>
                          </div>
                        @endwhile
                      </div>
                    @endif

                  @elseif($section_type === 'call_to_action')
                    @php
                      $cta_text = get_sub_field('cta_text');
                      $cta_button_text = get_sub_field('cta_button_text');
                      $cta_button_link = get_sub_field('cta_button_link');
                      $cta_style = get_sub_field('cta_style') ?: 'primary';
                    @endphp
                    
                    <div class="text-center py-8 
                      {{ $cta_style === 'primary' ? 'bg-primary-900 text-white rounded-lg' : '' }}
                      {{ $cta_style === 'secondary' ? 'bg-neutral-100 rounded-lg' : '' }}">
                      
                      @if($cta_text)
                        <p class="text-lg mb-6 {{ $cta_style === 'primary' ? 'text-primary-100' : 'text-neutral-700' }}">
                          {{ $cta_text }}
                        </p>
                      @endif
                      
                      @if($cta_button_text && $cta_button_link)
                        <a href="{{ $cta_button_link }}" 
                           class="{{ $cta_style === 'primary' ? 'btn bg-white text-primary-900 hover:bg-primary-50' : 'btn-primary' }}">
                          {{ $cta_button_text }}
                        </a>
                      @endif
                    </div>
                  @endif
                </div>
              @endwhile
            </div>
          @endif

          {{-- Contact Information (for service pages) --}}
          @if(get_field('show_contact_section'))
            <div class="contact-section mt-12 pt-12 border-t border-neutral-200">
              <div class="bg-neutral-50 rounded-lg p-8 text-center">
                <h3 class="text-2xl font-bold text-neutral-900 mb-4">
                  Ready to Get Started?
                </h3>
                <p class="text-lg text-neutral-700 mb-6">
                  Contact Trinity Health today to schedule your appointment or learn more about our services.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                  <a href="/contact" class="btn-primary">
                    Book Appointment
                  </a>
                  <a href="tel:+260-XXX-XXXX" class="btn-secondary">
                    Call Us: +260-XXX-XXXX
                  </a>
                </div>
              </div>
            </div>
          @endif

          {{-- Related Pages/Services --}}
          @if(get_field('show_related_content'))
            @php
              $related_posts = get_field('related_pages') ?: [];
              if (empty($related_posts)) {
                // Auto-suggest related content based on current page
                $current_page_id = get_the_ID();
                $related_posts = get_posts([
                  'post_type' => ['page', 'health_service', 'audiology_service'],
                  'posts_per_page' => 3,
                  'exclude' => [$current_page_id],
                  'meta_query' => [
                    [
                      'key' => 'featured_on_pages',
                      'value' => '"' . $current_page_id . '"',
                      'compare' => 'LIKE'
                    ]
                  ]
                ]);
              }
            @endphp

            @if(!empty($related_posts))
              <section class="related-content mt-12 pt-12 border-t border-neutral-200">
                <h3 class="text-2xl font-bold text-neutral-900 mb-8 text-center">
                  You Might Also Be Interested In
                </h3>
                <div class="grid md:grid-cols-3 gap-6">
                  @foreach($related_posts as $related_post)
                    <div class="card hover:shadow-card-hover transition-shadow">
                      <div class="card-body">
                        @if(has_post_thumbnail($related_post->ID))
                          <div class="aspect-[16/9] rounded mb-4 overflow-hidden">
                            {!! get_the_post_thumbnail($related_post->ID, 'medium', [
                              'class' => 'w-full h-full object-cover',
                              'alt' => get_the_title($related_post->ID)
                            ]) !!}
                          </div>
                        @endif
                        
                        <h4 class="text-lg font-semibold text-neutral-900 mb-2">
                          <a href="{{ get_permalink($related_post->ID) }}" class="hover:text-primary-900 transition-colors">
                            {{ get_the_title($related_post->ID) }}
                          </a>
                        </h4>
                        
                        <p class="text-sm text-neutral-700 mb-4">
                          {{ wp_trim_words(get_the_excerpt($related_post->ID), 15) }}
                        </p>
                        
                        <a href="{{ get_permalink($related_post->ID) }}" 
                           class="text-primary-900 font-medium hover:text-primary-700 transition-colors text-sm">
                          Learn More →
                        </a>
                      </div>
                    </div>
                  @endforeach
                </div>
              </section>
            @endif
          @endif
          
        </div>
      </div>
    </section>

    {{-- Comments Section (if enabled) --}}
    @if(comments_open() || get_comments_number())
      <section class="comments-section content-section bg-neutral-50">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto">
            @php(comments_template())
          </div>
        </div>
      </section>
    @endif

  @endwhile
@endsection

{{-- Schema.org structured data for healthcare pages --}}
@section('structured_data')
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "{{ get_the_title() }}",
    "description": "{{ get_field('page_subtitle') ?: wp_trim_words(get_the_excerpt(), 20) }}",
    "url": "{{ get_permalink() }}",
    "isPartOf": {
      "@type": "WebSite",
      "name": "Trinity Health Zambia",
      "url": "{{ home_url() }}"
    },
    "provider": {
      "@type": "MedicalOrganization",
      "name": "Trinity Health Zambia",
      "url": "{{ home_url() }}",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Lusaka",
        "addressCountry": "ZM"
      }
    }
  }
  </script>
@endsection
