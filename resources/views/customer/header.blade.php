<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>HTWAVE, L.T.D.</title>
  <link rel="shortcut icon" href="{{ Storage::URL($contact['favicon']) }}" type="image/x-icon">
  <link rel="icon" href="{{ Storage::URL($contact['favicon']) }}" type="image/x-icon">
  <link rel="stylesheet" href="{{asset('template/style.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="images/style1.css"> -->
</head>
<style>
  .dropbtn {
    /* background-color: #04AA6D; */
    color: white;
    /* padding: 16px; */
    font-size: 16px;
    border: none;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 250px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 0px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
    width: 100%;
    display: block;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>

<body>
  <div id="header" style="position: fixed; z-index: 2; opacity: 0.9;">
    <div id="menu">
      <a href="/"><img id="logo" src="{{ Storage::URL($contact['logo1']) }}" alt=""></a>
      <div id="list">
        <ul>
          <li>
            <a class="dropbtn {{ Route::currentRouteName() == 'homepage' ? 'active' : '' }}" href="/">HOME</a>
          </li>
          <li>
            <a class="dropbtn {{ Route::currentRouteName() == 'company' ? 'active' : '' }}" href="/company">COMPANY</a>
          </li>
          <li>
            <a class="dropbtn {{ Route::currentRouteName() == 'product' ? 'active' : '' }}" href="/product">PRODUCT</a>
          </li>
          <li class="dropdown">
            <a class="dropbtn {{ Route::currentRouteName() == 'technology' ? 'active' : '' }}"
              href="/technology">TECHNOLOGY</a>
            <div class="dropdown-content">
              @isset($Technology)
          @forelse($Technology as $item)
        <a href="/technology_{{ $item['id'] ?? '-' }}">{{ $item['SubTitle'] ?? '-' }}</a>
      @empty
      <p>No categories found.</p>
    @endforelse
        @endisset
            </div>
          </li>
          <li class="dropdown">
            <a class="dropbtn {{ Route::currentRouteName() == 'solution' ? 'active' : '' }}"
              href="/solution">SOLUTION</a>
            <div class="dropdown-content">
              <div class="dropdown-content">
                @isset($Solution)
          @forelse($Solution as $item)
        <a href="/solution_{{ $item['id'] ?? '-' }}">{{ $item['Title'] ?? '-' }}</a>
      @empty
      <p>No categories found.</p>
    @endforelse
        @endisset
              </div>
            </div>
          </li>
          <li>
            <a class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="/contact">CONTACT</a>
          </li>
        </ul>
      </div>
    </div>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><img id="logo" src="{{ Storage::URL($contact['logo1']) }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="/">HOME</a>
            <a class="nav-link" href="/company">COMPANY</a>
            <a class="nav-link" href="/product">PRODUCT</a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/technology" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                TECHNOLOGY
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @isset($Technology)
                @forelse($Technology as $item)
                  <li><a class="dropdown-item" href="/technology_{{ $item['id'] ?? '-' }}">{{ $item['SubTitle'] ?? '-' }}</a></li>
                @empty
                  <p>No categories found.</p>
                @endforelse
              @endisset
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/solution" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                SOLUTION
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @isset($Solution)
                @forelse($Solution as $item)
                  <li><a class="dropdown-item" href="/solution_{{ $item['id'] ?? '-' }}">{{ $item['Title'] ?? '-' }}</a></li>
                @empty
                  <p>No categories found.</p>
                @endforelse
              @endisset
              </ul>
            </li>
            <a class="nav-link" href="/contact">CONTACT</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  @yield('customerContent')
  @include('customer.footer')