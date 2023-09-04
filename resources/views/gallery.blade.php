@extends('layouts.master')
@section('content')
<section class="hero">
   <div class="section__container hero__container">
      <p>Bohol.</p>
   </div>
</section>
<section class="gallery" id="gallery">
   <div class="gallery__container">
      <h2 class="section__header">Gallery photos</h2>
      <p class="section__subheader">
         Explore the most beautiful places in the world.
      </p>
      <div class="gallery__grid">
        @foreach ($content as $contents)
         <div class="gallery__card">
            <img src="{{ asset('storage/gallery/'.$contents->image) }}" alt="gallery" style="width: 100%; height:100%;">
            <div class="gallery__content">
               <h4>{{ $contents->text }}</h4>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endsection
