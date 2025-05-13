@extends('customer.header')

@section('customerContent')
  <div id="content" style="height:503px; z-index: 1; background-color: black; overflow: hidden;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="" style="width: 100%; height: 100%;background-color: rgb(250, 250, 250);"></div>
          @forelse($bannerintro as
          $items)
          <img class="imageForBanner" style="height: 560px !important;background-position: center;
          background-repeat: no-repeat;background-size: cover;" src="{{ $items->images ?? 'No Title' }}" class="d-block w-100 h-75" alt="images/company.webp">
          <div class="carousel-caption d-none d-md-block" 
          style="width: 100%;height: 100%;background-color: black;position: absolute;
          z-index: 1;opacity: 0.1;top: 0;left: 0;">
          </div>
          <main role="main" class="inner cover text-white text-center" style="width: 100%;position: absolute; top: 69%;">
            <h1 class="cover-heading" style="font-size:32px;"><strong>COMPANY</strong></h1>

            <p class="lead" style="font-size:18px;">{{ $items->slogan ?? 'No Title' }}</p>
          </main>
          @empty
            <p>No history found.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
  <!-- <div id="contact">
    <h1 style="font-size: 24px; color: #14326e; text-align: center; margin-top: 59px;">
      <strong>ABOUT US</strong>
    </h1>
    <br>
    <p class="font_7 wixui-rich-text__text"
      style="font-size:15px; line-height:1.3em; text-align:center; color: #414141;">
      <span style="font-size:15px;">
        <span>Partner가 Win 해야 우리가 Win 한다 라는 것이 유비콤의 모토(Motto)입니다.
        </span>
        <br>
        <span style="letter-spacing:-0.02em;">서로가 Win-Win 하는 Business가 되도록 최선을
          다하겠습니다.</span>
      </span>
      </span>
    </p>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="mb-4" style="position: relative; height: 380px;">
            <canvas class="layer1" width="300" height="300" style="z-index: 1;"></canvas>
            <canvas class="layer2" width="300" height="300" style="z-index: 2;"></canvas>
            <canvas class="layer3" width="300" height="300" style="z-index: 3;"></canvas>
            <canvas class="layer4" width="300" height="300" style="z-index: 4;"></canvas>
            <div class="card-body">
              <div id="years">
                <p style="color: #414141; font-size: 33px; margin: 0;">20</p>
                <p style="color: #414141; font-size: 23px; margin: 0; padding: 0;">YEARS+</p>
              </div>
              <div class="exprience" style="text-align: center;position: absolute; bottom:0; left: 15%;">
                <p class="mt-1" style="color: #7d7d7d;">Accumulated exprience</p>
                <a href="http://" class="btn mb-1"
                  style="border: 1px solid #14326e; border-radius: 0px; color: #14326e;">High Reliability System</a>
                <br>
                <a href="http://" style="border: 1px solid #14326e; border-radius: 0px; color: #14326e;"
                  class="btn">High Speed ​​Circuit Design</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-4" style="position: relative; height: 380px;">
            <canvas class="layer5" width="300" height="300" style="z-index: 1;"></canvas>
            <canvas class="layer6" width="300" height="300" style="z-index: 2;"></canvas>
            <canvas class="layer7" width="300" height="300" style="z-index: 3;"></canvas>
            <canvas class="layer8" width="300" height="300" style="z-index: 4;"></canvas>
            <div class="card-body">
              <div id="years">
                <p style="color: #414141; font-size: 33px; margin: 0;">20</p>
                <p style="color: #414141; font-size: 23px; margin: 0; padding: 0;">YEARS+</p>
              </div>
              <div class="exprience" style="text-align: center;position: absolute; bottom:0; left: 15%;">
                <p class="mt-1" style="color: #7d7d7d;">Accumulated exprience</p>
                <a href="http://" class="btn mb-1"
                  style="border: 1px solid #14326e; border-radius: 0px; color: #14326e;">High Reliability System</a>
                <br>
                <a href="http://" style="border: 1px solid #14326e; border-radius: 0px; color: #14326e;"
                  class="btn">High Speed ​​Circuit Design</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-4" style="position: relative; height: 380px;">
            <canvas class="layer9" width="300" height="300" style="z-index: 1;"></canvas>
            <canvas class="layer10" width="300" height="300" style="z-index: 2;"></canvas>
            <canvas class="layer11" width="300" height="300" style="z-index: 3;"></canvas>
            <canvas class="layer12" width="300" height="300" style="z-index: 4;"></canvas>
            <div class="card-body">
              <div id="years">
                <p style="color: #414141; font-size: 33px; margin: 0;">20</p>
                <p style="color: #414141; font-size: 23px; margin: 0; padding: 0;">YEARS+</p>
              </div>
              <div class="exprience" style="text-align: center;position: absolute; bottom:0; left: 15%;">
                <p class="mt-1" style="color: #7d7d7d;">Accumulated exprience</p>
                <a href="http://" class="btn mb-1"
                  style="border: 1px solid #14326e; border-radius: 0px; color: #14326e;">High Reliability System</a>
                <br>
                <a href="http://" style="border: 1px solid #14326e; border-radius: 0px; color: #14326e;"
                  class="btn">High Speed ​​Circuit Design</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div class="album py-5 bg-light py-5">
    <div class="container">
      <h5 style="color: #14326e; text-align: center;"><strong>HISTORY</strong></h5>
      @forelse($history as $items)
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 pb-3" id="solution">
          <div class="col-md-2 col-xs-12">
              <div class="infoYear" style="background-color: #14326e; width: 100px; height: 100px; border-radius: 50%;">
                  <h4 style="color: white; line-height: 100px;text-align: center;">
                  {{ $items->year ?? 'No Title' }}
                  </h4>
              </div>
          </div>
          <div class="col-md-8 col-xs-12">  
            {!! $items->description !!}
          </div>
          <div class="col-md-2 col-xs-12"></div>
        </div>
      @empty
        <p>No history found.</p>
      @endforelse
    </div>
  </div>

  <div class="album py-5 py-5 border-bottom">
    <div class="container">
      <h5 class="pb-5" style="color: #14326e; text-align: center;"><strong>Awards/Certification Experience</strong></h5>
      
      @forelse($awards_and_certifications as
      $items)
      <div class="row g-0 mb-4 pt-4 px-4" id="solution" style="background-color: rgb(120 155 210);">
        <div class="col-md-4 my-0 mb-4">
            <div class="box-images px-5 d-flex justify-content-center" id="image-fix">
                <img class="bd-placeholder-img" width="237" height="297" src="{{ Storage::URL($items->images) }}">
            </div>
        </div>
        <div class="col-md-8 pt-4 text-center my-0 mb-4 px-3">
            <h3 class="mb-3"><strong class="text-white">  {{ $items->title ?? 'No Title' }} </strong></h3>
            {!! $items->description ?? 'No Title' !!}
              <a href="{{ $items->link ?? 'No Title' }}" class="mb-auto text-white" style="font-size:18px; line-height:1.6em; text-align:center;">Got to article</a>
        </div>
      </div>
      @empty
        <p>No history found.</p>
      @endforelse

    </div>
  </div>
  <div class="album py-5 py-5 border-bottom">
    <div class="container">
      <h5 style="color: #14326e; text-align: center;"><strong>Current status of technology</strong></h5>
      <div class="row g-0 mb-4 pt-4" id="solution">
      @forelse($technology_statuses as
      $items)
        <div class="col-md-4 mr-3">
          <div class="technologies">
            <div class="box-title border-bottom" style="width: 85%; margin: 0 auto;">
              <h5 class="text-white mb-0" style="line-height: 88px; text-align: center;vertical-align: inherit;font-size:18px;">{{ $items->title ?? 'No Title' }}</h5>
            </div>
            <div class="box-title text-white py-3" style="width: 85%; margin: 0 auto;">
              {!! $items->description ?? 'No Title' !!}
            </div>
          </div>
        </div>
        @empty
        <p>No history found.</p>
      @endforelse
        <!-- <div class="col-md-4 mr-3">
          <div class="technologies" style="background-color: #4664a0; width: 95%; margin: 0 auto;">
            <div class="box-title border-bottom" style="width: 85%; margin: 0 auto;">
              <h5 class="text-white mb-0" style="line-height: 88px; text-align: center;vertical-align: inherit;font-size:18px;">Core technology</h5>
            </div>
            <div class="box-title text-white py-3" style="width: 85%; margin: 0 auto;">
              <p>1) Digital Noise 관련 기술 (High speed 회로 및 시스템 신뢰성 관련 기술)</p>
              <p>2) Analog Noise 관련 기술 (Analog 회로 성능 관련 기술)</p>
              <p>3) EMI/EMC 관련 기술</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="technologies" style="background-color: #789bd2;width: 95%;margin-left: auto;">
            <div class="box-title border-bottom" style="width: 85%; margin: 0 auto;">
              <h5 class="text-white mb-0" style="line-height: 88px; text-align: center;vertical-align: inherit;font-size:18px;">Core technology</h5>
            </div>
            <div class="box-title text-white py-3" style="width: 85%; margin: 0 auto;">
              <p>1) Digital Noise 관련 기술 (High speed 회로 및 시스템 신뢰성 관련 기술)</p>
              <p>2) Analog Noise 관련 기술 (Analog 회로 성능 관련 기술)</p>
              <p>3) EMI/EMC 관련 기술</p>
            </div>
          </div>
        </div> -->

      </div>
    </div>
  </div>
@endsection