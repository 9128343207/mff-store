@extends('layouts.app')
@section('title')
    Contact Us
@endsection
@section('header')
    @include('inc.navbar')
@endsection
@section('content')

<!-- MAIN -->

    <main class="site-main checkout">
        <div class="container">
            <ol class="breadcrumb-page">
                <li><a href="{{ route('home') }}">Home </a></li>
                <li class="active"><a href="{{ route('contactus.index') }}">Contact Us</a></li>
            </ol>
        </div>

        <div class="container">
                <div class="row">
                    <!-- <div class="contact-map full-width">
                        <a href=""><img src="images/map.jpg" alt="map"></a>
                    </div> -->
                     @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                     @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="form-contact" action="{{ route('contactus.submit')}}" method="post">
                        @csrf
                        <div class="col-md-5">
                            <div class="contact-info">
                                <h5 class="title-contact">Leave a Message</h5>
                                <p class="form-row form-row-wide">
                                    <label>Name<span class="required">*</span></label>
                                    <input type="text" value="" name="name" placeholder="Full name" required="*required" class="input-text">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="email" value="" name="email" placeholder="Email" required="required" class="input-text">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Phone Number<span class="required"></span></label>
                                    <input type="text" value="" name="mobile" placeholder="Phone Number" class="input-text">
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="form-row form-row-wide form-text">
                                <label>Comments<span class="required"></span></label>
                                <textarea aria-invalid="false" name="comments" class="textarea-control" rows="5" cols="40" name="message"></textarea>
           -+                </p>
                            <p class="form-row">
                                <input type="submit" value="Submit" name="Submit" class="button-submit">
                            </p>
                        </div>
                    </form>
                    <div class="col-md-3 contact-detail">
                        <h5 class="title-contact">Contact Detail</h5>
                        <div class="contacts-info ">
                            <div class="contact-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <h4 class="title-info">Email</h4>
                            <div class="info-detail"> support@energi-adidaya.com</div>
                        </div>
                        <div class="contacts-info ">
                            <div class="contact-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <h4 class="title-info">Phone</h4>
                            <div class="info-detail">(62) 21 799 5734</div>
                        </div>
                        <div class="contacts-info ">
                            <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <h4 class="title-info">Mail Office</h4>
                            <div class="info-detail">Wisma KDS, Unit 202, Jl. Warung Jati Barat No.6B, Jakarta 12740, Indonesia Tel (62) 21 799 5734 Fax (62) 21 791 98044</div>
                        </div>
                    </div>
                </div>
            </div>

      
    </main><!-- end MAIN -->

@endsection
