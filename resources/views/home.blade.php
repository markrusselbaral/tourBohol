@extends('layouts.master')
@section('home')
<div class="section__container header__container">
   <h1>{{ $background->text ?? '' }}</h1>
   <h4>Explore the colorful world of Bohol.</h4>
   <a href="{{ route('destination') }}">
   <button class="btn">
     Explore More <i class="ri-arrow-right-line"></i>
   </button>
   </a>
</div>
@endsection

@section('home-content')
<section class="about" id="about">
      <div class="section__container about__container" style="gap: 3rem;">
        <div class="about__content">
          <h2 class="section__header">Discover Bohol</h2>
          <p class="section__subheader" style="text-align: justify">
            Bohol, a captivating Philippine province, is known for its remarkable natural beauty and rich cultural heritage.
            This enchanting island offers diverse attractions, from the mesmerizing Chocolate Hills, cone-shaped limestone formations,
            to the adorable tarsiers, one of the world's smallest primates. Explore pristine white-sand beaches, vibrant coral reefs
            perfect for diving and snorkeling, and centuries-old churches that reflect its Spanish colonial past. With its blend of
            natural wonders and cultural treasures, Bohol offers an unforgettable escape for travelers seeking both adventure and relaxation.
          </p>
          <div class="about__flex">
            <div class="about__card">
              <h4>47</h4>
              <p>Total Municipalites</p>
            </div>
            <div class="about__card">
              <h4>42,029 </h4>
              <p>Total Barangays</p>
            </div>
            <div class="about__card">
              <h4>1,390,524</h4>
              <p>Total Populations</p>
            </div>
          </div>
          <a href="{{ route('about') }}">
          <button class="btn">
            Read More <i class="ri-arrow-right-line"></i>
          </button>
          </a>
        </div>
        <div class="about__image">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d503087.774114428!2d123.83312426236!3d9.902839617963028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa17de1ba154df%3A0x6bc8bf042118d020!2sBohol!5e0!3m2!1sen!2sph!4v1693459443967!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
@endsection
