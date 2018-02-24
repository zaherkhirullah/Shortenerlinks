@extends('layouts.holayout')

@section('homeContent')
    <div class="bg-slider-wrapper">
        <div class="flexslider bg-slider">
            <ul class="slides">
                <li class="slide slide-1 flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                </li>
            </ul>
        </div>
    </div>
    <section class="promo section section-on-bg">
        <div class="container text-center">
            <h2 class="title"> @lang('lang.shorten_urls')</h2>
            <p class="intro">Sharing links on the internet<br>Get paid for every person who visits your URLs</p>
            <p>  
                @guest
                    <a class="btn btn-cta btn-cta-primary" href="{{ url('user/dashboard') }}">
                        @lang('lang.get_started')
                    </a>
                @else
                     <a class="btn btn-cta btn-cta-primary" href="{{ url('user/dashboard') }}">
                     @lang('lang.my_account')
                    </a>
                @endguest
            </p>
        </div>
    </section>
    <div class="sections-wrapper">

        <section id="why" class="section why">
            <div class="container">
                <h2 class="title text-center">Earn with Shortener links</h2>
                <p class="intro text-center">The fastest and easiest way to monetize the traffic</p>
                <div class="row item">
                    <div class="content col-md-4 col-sm-12 col-xs-12 col-md-push-8 col-sm-push-0 col-xs-push-0">
                        <h3 class="title">Shrink and Share</h3>
                        <div class="desc">
                            <p>Signup for an account in just 2 minutes. Once you've completed your registration just start creating short URLs and sharing the links with your family and friends.</p>
                            <p>You'll be paid for any views outside of your account.</p>
                        </div>
                        <div class="quote">
                            <div class="quote-profile">
                                <img class="img-responsive img-circle" src="{{ asset('styles/home/images/profile-s-1.png')}}" alt="">
                            </div>
                            <div class="quote-content">
                                <blockquote>
                                    <p>Shortener links helps me to earn a bit of money while doing the things I enjoy.</p>
                                </blockquote>
                                <p class="source">MounterT, San Francisco</p>
                            </div>
                        </div>
                    </div>
                    <figure class="figure col-md-7 col-sm-12 col-xs-12 col-md-pull-4 col-sm-pull-0 col-xs-pull-0">
                        <img class="img-responsive" src="{{ asset('styles/home/images/figure-1.png')}}" alt="">
                    </figure>
                </div>
                <section id="cta-section" class="section cta-section text-center home-cta-section">
                    <div class="container">
                        <h2 class="title">What is URL shorten?</h2>
                        <div id="msg-shorten">
                            <p class="intro">Trying to shorten a link</p>
                        </div>
                        <form method="POST" action="http://Shortenerlinks/shorten" accept-charset="UTF-8" id="form-shorten" class="form-shorten">
                            <input name="_token" type="hidden" value="wQCI9wlP647yR7VM7N42cyt1pH8dAPTXNRrQKUt2">
                            <input id="input-shorten" name="url" type="text" placeholder="Your URL Here" value="">
                            <button id="btn-shorten" type="submit">
                                <i class="fa fa-paper-plane">
                                </i>
                            </button>
                            <button id="btn-copy" class="hidden text-success" type="button">
                                <i class="fa fa-copy">
                                </i>
                            </button>
                        </form>
                    </div>
                </section>
                <div class="row item last-item">
                    <div class="content col-md-4 col-sm-12 col-xs-12">
                        <h3 class="title">Save you time and effort</h3>
                        <div class="desc">
                            <p>Shortener links have a simple and convenient user interface, and a variety of utilities.</p>
                            <p>We also provides full mobile supports, you can even shorten the URL and view the stats on a mobile device.</p>
                        </div>
                        <div class="quote">
                            <div class="quote-profile">
                                <img class="img-responsive img-circle" src="{{ asset('styles/home/images/profile-s-2.png')}}" alt="">
                            </div>
                            <div class="quote-content">
                                <blockquote>
                                    <p>The link shortening is easy to use. When comparing with other similar sites, the interface is much user-friendly.</p>
                                </blockquote>
                                <p class="source">superain, Bristol</p>
                            </div>
                        </div>
                    </div>
                    <figure class="figure col-md-7 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-xs-offset-0">
                        <img class="img-responsive" src="{{ asset('styles/home/images/figure-2.png')}}" alt="">
                    </figure>
                </div>
                <div class="feature-lead text-center">
                    <h4 class="title">Start earning money now!</h4>
                    <p>
                        <a class="btn btn-cta btn-cta-secondary" href="{{ route('register') }}">Sign Up Free</a>
                    </p>
                </div>
            </div>
        </section>

        <section class="section testimonials">
            <div class="container">
                <h2 class="title text-center">What are people saying about Shortener links?</h2>
                <div id="testimonials-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#testimonials-carousel" data-slide-to="0" class="">
                        </li>
                        <li data-target="#testimonials-carousel" data-slide-to="1" class="active">
                        </li>
                        <li data-target="#testimonials-carousel" data-slide-to="2">
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <figure class="profile">
                                <img src="{{ asset('styles/home/images/profile-m-1.png')}}" alt="">
                            </figure>
                            <div class="content">
                                <blockquote>
                                    <i class="fa fa-quote-left">
                                    </i>
                                    <p>I just started Shortener links but i already love the easy way to make money. I am referring my friends to Shortener links so they can earn money and I can earn my 20% commission!</p>
                                </blockquote>
                                <p class="source">Cynthia Wildman<br>
                                    <span class="title">Truro, United Kingdom</span>
                                </p>
                            </div>
                        </div>
                        <div class="item active">
                            <figure class="profile">
                                <img src="{{ asset('styles/home/images/profile-m-2.png')}}" alt="">
                            </figure>
                            <div class="content">
                                <blockquote>
                                    <i class="fa fa-quote-left">
                                    </i>
                                    <p>High payout rates, good monthly income, fast &amp; customized url shortener, and non-intrusive ads to my blogs. Also I've got a lot of visitors with Shortener links as a publisher. Keep your awesome service going on!</p>
                                </blockquote>
                                <p class="source">Roy Cheng<br>
                                    <span class="title">Florence, Italy</span>
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <figure class="profile">
                                <img src="{{ asset('styles/home/images/profile-m-3.png')}}" alt="">
                            </figure>
                            <div class="content">
                                <blockquote>
                                    <i class="fa fa-quote-left">
                                    </i>
                                    <p>The good thing with Shortener links is that you can upload files that you want others to download while getting money for it.</p>
                                </blockquote>
                                <p class="source">Dwayne Storey<br>
                                    <span class="title">Dallas, United States</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection