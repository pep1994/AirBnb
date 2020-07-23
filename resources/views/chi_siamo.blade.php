@extends('layouts.main_layout')

@section('content')
<div class="main_content" id="content-bnb">
    <div class="container">

        <div class="row justify-content-center flex-wrap">
            <div class="col-md-6 col-lg-4 d-flex justify-content-center align-items-center flex-column col-scale">
                <div class="profile-container mb-2 profile-marco">

                </div>
                <div class="caption text-center">
                  <a href="https://www.linkedin.com/in/marco-petrini-1994-profile/">
                    <h3>Marco Petrini</h3>
                  </a>
                    <h5>Full-stack Developer</h5>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex justify-content-center align-items-center flex-column col-scale">
                <div class="profile-container mb-2 profile-riccardo">

                </div>
                <div class="caption text-center">
                  <a href="https://www.linkedin.com/in/riccardo-belli-522276199/">
                    <h3>Riccardo Belli</h3>
                  </a>
                    <h5>Full-stack Developer</h5>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex justify-content-center align-items-center flex-column col-scale">
                <div class="profile-container mb-2 profile-gianmarco">

                </div>
                <div class="caption text-center">
                  <a href="https://www.linkedin.com/in/gianmarco-montanari-46997183/">
                    <h3>Gianmarco Montanari</h3>
                  </a>
                    <h5>Full-stack Developer</h5>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center flex-column col-scale">
                <div class="profile-container mb-2 profile-alessandro">

                </div>
                <div class="caption text-center">
                  <a href="https://www.linkedin.com/in/alessandro-fraternali-36625b1b1/">
                    <h3>Alessandro Fraternali</h3>
                  </a>
                    <h5>Full-stack Developer</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center flex-column col-scale">
                <div class="profile-container mb-2 profile-umberto">

                </div>
                <div class="caption text-center">
                  <a href="#">
                    <h3>Umberto Del Piano</h3>
                  </a>
                    <h5>Full-stack Developer</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script src="{{ asset('js/chiSiamo.js') }}"></script>

@endsection
