@extends('customer.header')

@section('customerContent')
  <div id="content" style="height:503px; z-index: 1; background-color: black; overflow: hidden;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="" style="width: 100%; height: 100%;background-color: rgb(250, 250, 250);"></div>
          <img class="imageForBanner" style="height: 560px !important;background-position: center;
          background-repeat: no-repeat;background-size: cover;" src="{{ Storage::URL($solution['Background1']) }}" class="d-block w-100 h-75">
          <div class="carousel-caption d-none d-md-block" 
          style="width: 100%;height: 100%;background-color: black;position: absolute;
          z-index: 1;opacity: 0.1;top: 0;left: 0;">
          </div>
          <main role="main" class="inner cover text-white text-center" style="width: 100%;position: absolute; top: 69%;">
            <h1 class="cover-heading" style="font-size:32px;"><strong>SOLUTION</strong></h1>
            <p class="lead" style="font-size:18px;">{{ $solution['Slogan'] }}</p>
          </main>
        </div>
      </div>
    </div>
  </div>
  
  <div id="content" class="py-5" style="background-image: url({{ Storage::URL($solution['Background2']) }}); background-size: 100% 100%; background-repeat: no-repeat; height: 275px;">
        <div id="contact" class="py-5 px-5">
            <h1 style="font-size: 24px; color: white; text-align: center;">
                <strong>{{ $solution['Title'] }}</strong>
            </h1>
            <!-- <br> -->
            <p style="text-align: center; color: white;">{{ strip_tags($solution['Description']) }}</p>
        </div>
  </div>
  @php $i = 1; @endphp
  @foreach ($solutionSubset as $item)
    @if ($item !== null)
      @php 
        // Đặt màu sắc dựa trên giá trị của i
        $color = ($i % 2 != 0) ? 'bg-light' : ''; 
      @endphp
      <div class="album py-5 py-5 {{ $color }}">
        <div class="container">
          <div class="row px-5" id="solution">
            {!! $item !!}
          </div>
        </div>
      </div>

      @php $i++; @endphp
    @endif
  @endforeach
@endsection
