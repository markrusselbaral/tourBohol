<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link
         href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
         rel="stylesheet"
         />
      <link rel="stylesheet" href="{{ asset('user/assets/styles.css') }}" />
      <script src="https://unpkg.com/scrollreveal"></script>
      <title>Travel | Bohol.</title>
   </head>
   <body>
      <section style="height:{{ request()->is('home') ? '100vh' : '0' }};">
         @if(isset($background) && !empty($background->background_image))
         <header id="home" style="background-image: linear-gradient(to top, var(--primary-color), transparent),url('{{ asset('storage/home/'.$background->background_image) }}');">
            @endif
            <nav>
               <div class="nav__bar">
                  <div class="nav__logo"><a href="#">Bohol.</a></div>
                  <ul class="nav__links">
                     <li class="link"><a href="{{ route('home') }}" style="color:{{ request()->is('home') ? '#f49e09;' : '' }}">Home</a></li>
                     <li class="link"><a href="{{ route('about') }}" style="color:{{ request()->is('about') ? '#f49e09;' : '' }}">About</a></li>
                     <li class="link"><a href="{{ route('destination') }}" style="color:{{ request()->is('*destination*') ? '#f49e09' : '' }}">Destination</a></li>
                     <li class="link"><a href="{{ route('gallery') }}" style="color:{{ request()->is('gallery') ? '#f49e09;' : '' }}">Gallery</a></li>
                     <li class="link"><a href="{{ route('contact') }}" style="color:{{ request()->is('contact') ? '#f49e09;' : '' }}">Contact</a></li>
                  </ul>
               </div>
            </nav>
            @yield('home')
         </header>
      </section>
      @yield('home-content')
      @yield('content')
      <section class="footer">
         <div class="section__container footer__container">
            <h4>Bohol.</h4>
            <div class="footer__socials">
               <span>
               <a href="#"><i class="ri-facebook-fill"></i></a>
               </span>
               <span>
               <a href="#"><i class="ri-instagram-fill"></i></a>
               </span>
               <span>
               <a href="#"><i class="ri-twitter-fill"></i></a>
               </span>
               <span>
               <a href="#"><i class="ri-linkedin-fill"></i></a>
               </span>
            </div>
            <p>
               Developer : Mark Russel Baral <br>
               Contact #: 09462304910
            </p>
            <ul class="footer__nav">
               <li class="footer__link"><a href="{{ route('home') }}">Home</a></li>
               <li class="footer__link"><a href="{{ route('about') }}">About</a></li>
               <li class="footer__link"><a href="{{ route('destination') }}">Destination</a></li>
               <li class="footer__link"><a href="{{ route('home') }}">Blog</a></li>
               <li class="footer__link"><a href="{{ route('gallery') }}">Gallery</a></li>
               <li class="footer__link"><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
         </div>
         <div class="footer__bar">
            Copyright © 2023 Bohol. All rights reserved.
         </div>
         <p>
         </p>
      </section>
      <script src="{{ asset('user/assets/main.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      @yield('like')
      @yield('comment')
   </body>
</html>
