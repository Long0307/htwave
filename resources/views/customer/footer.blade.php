<div class="album py-5 border-top" id="footer-fix">
    <div class="container">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 pb-3" id="solution">
          <div class="col-md-3" id="col-12-logo">
            <img src="{{ Storage::URL($contact['logo1']) }}" width="80%" alt="">
          </div>
          <div class="col-md-6" id="col-12" style="color: #7d7d7d;">
            <span>{{ $contact['address'] }}</span><br>
            <span>전화 : {{ $contact['phone'] }}  |  팩스 : {{ $contact['fax'] }}  </span><br>
            <span>메일 : {{ $contact['email'] }}</span>
          </div>
          <div class="col-md-3 p-0 m-0">
            <!-- <img src="{{asset('template/images/Tomorow.jpg')}}" class="float-end" alt=""> -->
          </div>
        </div>
    </div>
  </div>
  <div class="album py-5 bg-light py-5 border-top">
    <div class="container">
      <p style="color: #7d7d7d; text-align: center;"> © 2024 by HTWAVE, L.T.D.</p>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>