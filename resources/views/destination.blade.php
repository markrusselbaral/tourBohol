@extends('layouts.master')
@section('content')
<section class="discover" id="discover" style="margin-top: 8rem;">
   <div class="section__container discover__container">
      <h2 class="section__header">Discover the most engaging places</h2>
      <p class="section__subheader">
         Let's see the world with us with you and your family.
      </p>
      <br><br>
      <div class="video-container">
         <iframe src="https://player.vimeo.com/video/802933502?h=9696862270&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;autoplay=1&amp;loop=1&amp;title=0&amp;byline=0&amp;portrait=0&amp;controls=0&amp;muted=1" frameborder="0" allow="autoplay" title="Bohol AVP Short" name="fitvid0"></iframe>
      </div>
      <div class="discover__grid">
         @foreach ($content as $contents )
         <div class="discover__card">
            <div class="discover__image">
               <img src="{{ asset('storage/destination/'.$contents->image) }}" alt="discover" />
            </div>
            <div class="discover__card__content">
               <h4>{{ $contents->title }}</h4>
               <p>
                  {{ $contents->description }}
               </p>
               <a href="{{ route('showDestination', ['id' => $contents->id]) }}">
               <button class="discover__btn">
               View <i class="ri-arrow-right-line"></i>
               </button>
               </a>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endsection
