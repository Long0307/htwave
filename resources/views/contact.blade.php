@extends('customer.header')

@section('customerContent')
  <div id="content" style="height:503px; z-index: 1; background-color: black; overflow: hidden;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="" style="width: 100%; height: 100%;background-color: rgb(250, 250, 250);"></div>
          <img class="imageForBanner" style="height: 560px !important;background-position: center;
          background-repeat: no-repeat;background-size: cover;" src="{{ Storage::URL($contact['logo2']) }}" class="d-block w-100 h-75" alt="images/backgrounnd.webp">
          <div class="carousel-caption d-none d-md-block" 
          style="width: 100%;height: 100%;background-color: black;position: absolute;
          z-index: 1;opacity: 0.1;top: 0;left: 0;">
          </div>
          <main role="main" class="inner cover text-white text-center" style="width: 100%;position: absolute; top: 69%;">
            <h1 class="cover-heading" style="font-size:32px;"><strong>CONTACT</strong></h1>
            <p class="lead" style="font-size:18px;">Become Our Partner And Grow With Us</p>
          </main>
        </div>
      </div>
    </div>
  </div>
  <div class="album py-5 py-5">
    <div class="container">
        <h5 style="color: #14326e; text-align: center;"><strong>INQUIRY</strong></h5>
      <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 pb-3" id="solution">
        <div class="col-md-6" id="contact-fix">
          @if(!empty($contact))
            <img src="{{ Storage::URL($contact['logo1']) }}" style="width: 45%;margin-bottom: 20px;" alt="">
            <br>
            <span style="font-size: 16px; line-height: 2rem; color: #59514d;; display: flex;">
                <strong style="padding: 0 0 2px 10px;">Address: {{ $contact['address'] }}
                </strong>
            </span>
            <br>
            <span style="font-size: 16px; line-height: 2rem; color: #59514d; display: flex;">
                <strong style="padding: 0 0 2px 10px;">TEL: {{ $contact['phone'] }}    (FAX) {{ $contact['fax'] }}</strong>
            </span>
            <br>
            <span style="font-size: 16px; line-height: 2rem; color: #59514d; display: flex;">
                <strong style="padding: 0 0 2px 10px;">Email: {{ $contact['email'] }}</strong>
            </span>
            @else
              <p>Không tìm thấy người dùng với ID 1.</p>
            @endif
        </div>
        <div class="col-md-6" id="contact-fix"> 
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
            <form class="needs-validation" action="{{ url('/submit-inquiry') }}" method="POST" novalidate="">
                @csrf
                <div class="row g-3">
                  <div class="col-sm-6">
                    <!-- <label for="firstName" class="form-label">First name</label> -->
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name *" maxlength="255" value="" required="">
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>
      
                  <div class="col-sm-6">
                    <!-- <label for="lastName" class="form-label">Last name</label> -->
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address *" maxlength="255" value="" required="">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>

                  <div class="col-12">
                    <!-- <label for="lastName" class="form-label">Last name</label> -->
                    <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" maxlength="255" placeholder="Phone number *" value="" required="">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
                  <style>
                    textarea {
                        padding-left: 15px;
                        padding-right: 15px;
                    }
            
                    /* Customize the placeholder text style */
                    textarea::placeholder {
                        padding-left: 15px;
                        padding-top: 15px;
                        /* Additional styling for the placeholder text */
                        color: #888;
                    }
                </style>
                  <div class="form-floating">
                    <textarea name="enquiries" id="enquiries" placeholder="Inquiry *" style="height: 200px; width: 100%;"></textarea>
                    <!-- <label for="floatingTextarea2">Comments</label> -->
                  </div>
      
                <button style="width: 97%; margin: 0 auto; margin-top: 15px; background-color: #14326e; color: white; border: none; padding: 10px 0 10px 0;" type="submit">
                    Send</button>
              </form>
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="album">
    <div class="container" style="margin-bottom: 20px;">
        <h5 style="color: #14326e; text-align: center;"><strong>LOCATION</strong></h5>
    </div>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d35804.344277991564!2d127.11116388313329!3d37.51530380091889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca57341c34601%3A0x9b3b9bccfa3c2487!2sJamsil%20I-Space!5e0!3m2!1svi!2skr!4v1718352477479!5m2!1svi!2skr" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
      {!! $contact['map'] !!}
    </div>
@endsection