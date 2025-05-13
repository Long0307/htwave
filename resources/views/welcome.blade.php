@extends('customer.header')

@section('customerContent')
  <div id="content" style="height:677px; z-index: 1; background-color: black;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
    <div class="carousel-indicators">
      @foreach($Banner as $key => $item)
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}"
          class="{{ $key == 0 ? 'active' : '' }}" 
          @if($key == 0) aria-current="true" @endif 
          aria-label="Slide {{ $key + 1 }}"></button>
      @endforeach
    </div>

      <div class="carousel-inner">
          @forelse($Banner as $key => $item)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
              <div class="overlay"></div>
              <img class="imageForBanner" src="{{ Storage::URL($item['images']) }}" class="d-block w-100 h-75"
               alt="{{ Storage::URL($item['images']) }}">
              <div class="carousel-caption d-md-block" id="formobile">
                <h2 style="margin-top:20px;"><strong>{{ $item['title'] ?? '-' }}</strong></h2>
                <h2><strong>{{ $item['titleinkorea'] ?? '-' }}</strong></h2>
                <br>
                <a href="/contact" class="btn btn-outline-light">
                  <span style="padding-left: 20px; padding-right: 20px; font-size: 19px; ">
                    Contact
                  </span>
                </a>
              </div>
            </div>
          @empty
            <p>No categories found.</p>
          @endforelse
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }
        .box-container {
            background-size: cover;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .box-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .box-content {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
  <div class="album py-5 bg-light py-5">
    <div class="container">
      <h5 style="color: #14326e; text-align: center;"><strong>SOLUTION</strong></h5>
      <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3" id="solution">
      @forelse($Solution as $item)
        <div class="col">
          <a href="/solution_{{ $item['id'] ?? '-' }}" style="text-decoration: none;">
            <div class="card shadow-sm" style="height: 100%;">
              <!-- <img src="{{ Storage::URL($item['background3']) }}" alt="" srcset=""> -->
              <div class="box-container" style="height: 100%;background-image: url('{{ Storage::URL($item['background3']) }}');">
                <div class="box-header" style="font-size: 21px;border-bottom: 1px solid white;padding-top: 8px;padding-bottom: 14px;">{{ $item['Title'] ?? '-' }}</div>
                <div class="box-content" style="font-size: 14px;min-height: 300px;">
                  {{ $item['Description'] ?? '-' }}
                </div>
              </div>
            </div>
          </a>
        </div>
      @empty
          <p>No solution now.</p>
      @endforelse
      </div>
    </div>
  </div>
@endsection