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

          {{-- Contact Information --}}
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
          
        </div>
      </div>
    </section>

    {{-- Comments Section --}}
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
