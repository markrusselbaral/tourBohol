@extends('layouts.master')
@section('content')
<section class="about" id="about">
   <h2 class="section__header" style="margin-top: 10rem">About Bohol</h2>
   <div style="width: 40%; height: 40%; margin: auto;">
      <span style="text-align: justify;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Located at the heart of Central Visayas, the Island province of Bohol is the 10th largest island in the Philippines with a total land area of 4,117.3 square kilometres. It is composed of an oval-shaped mainland surrounded by 72 smaller islands.
      A popular tourist destination, the province is abundant of beaches and resorts. Its well-known beaches are found in Panglao Island, which is situated south-west of the province, and in Anda, located on the island’s east side. Bohol is composed of 1 city and 47 municipalities.
      Tagbilaran City, the capital of Bohol, is known as the “City of Friendship.” Situated in the south-western part of the province, it has a total land area of 32.70 km2 (12.63 sq mi) and a coastline of 13 km (8.1 mi). The city shares its boundaries with the municipalities of Cortes, Corella, and Baclayon. It is 630 km (390 mi) southeast of the national capital of Manila and 72 km (45 mi) south of the regional capital, Cebu City.
      Tagbilaran City’s name is derived from “Tagu Bilaan” which means TAGU (to hide) and BILAAN (a Muslim marauder tribe) – hence its name means to hide from Muslim marauders.
      </span><br><br><br>
      <img src="{{ asset('user/assets/images/Map-Bohol-2554x2000-2.webp') }}">
   </div>
   @php
   $alternateClass = '';
   @endphp
   @foreach ($content as $contents)
   <div class="section__container about__container {{ $alternateClass }}">
      <div class="about__image">
         <img src="{{ asset('storage/about/'.$contents->image) }}" alt="about" />
      </div>
      <div class="about__content">
         <p class="section__subheader">
            {{ $contents->text }}
         </p>
      </div>
   </div>
   @php
   $alternateClass = ($alternateClass === 'alternate') ? '' : 'alternate';
   @endphp
   @endforeach
</section>
@endsection
