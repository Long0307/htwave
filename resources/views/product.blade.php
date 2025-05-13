@extends('customer.header')

@section('customerContent')
  <div id="content" style="height:787px; z-index: 1; background-color: black;">
      <div class="carousel-inner">
        <input type="hidden" name="linkVideoTest" id="linkVideoTest" value="https://www.youtube.com/watch?v=fPojDPaq_uU&feature=youtu.be">
        <div class="carousel-item active" id="backgroundForProduct" style="background-image: url('{{asset('template/images/background-pro.png')}}'); " onclick="return linkVideoTest()" class="d-block w-100 h-100">
            <div id="fortext" class="text-white py-5 text-white py-5 d-flex flex-column justify-content-center align-items-center">
                <h1 class="my-5">There is no product in this time</h1>
                <img id="logo" style="margin: 0 auto;" src="{{ Storage::URL($contact['logo1']) }}" alt="">
            </div>
            <!-- <h4 style="position: absolute; bottom: 13%; left: 38%; color:white;font-size:16px;">​Click on the image above to view the product test video.</h4   > -->
        </div>
      </div>
    </div>
  </div>
</html>
@endsection