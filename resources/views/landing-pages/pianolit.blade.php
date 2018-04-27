@extends('layouts.landing-page')

@section('header')
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Montserrat:100,200');

input, button {
outline: none;
box-shadow:none !important;
border: none !important;
}

body {
    color: #fff;
    background: linear-gradient(-45deg, #EE7752, #E73C7E);
}

.text-blue {
    color: #4969a6;
}

.bg-blue {
    background: #4969a6;
}

.font-thin {
    font-family: 'Montserrat', sans-serif;
}

.iphone-container {
    /*max-width: 300px;*/
}

.slideshow {
    position: relative;
}

.slideshow, .screen {
    width: 300px;
    height: 533px;
}

.screen {
    position: absolute;
    top: 0;
    left: 0;
}

.shadow {
    -webkit-box-shadow: 0 5px 30px rgba(0,0,0,0.3);
    -moz-box-shadow: 0 5px 30px rgba(0,0,0,0.3);
    box-shadow: 0 5px 30px rgba(0,0,0,0.3);
}

.border-bottom {
    border-bottom: 1px solid white;
}

.btn-blue {
    transition: 0.2s;
    background: #3d91d1;
    color: white!important;
}

.btn-blue:hover {
    background: #3785c2;
}

/*body {
    width: 100wh;
    height: 100vh;
    color: #fff;
    background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
    background-size: 400% 400%;
    -webkit-animation: Gradient 15s ease infinite;
    -moz-animation: Gradient 15s ease infinite;
    animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}

@-moz-keyframes Gradient {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}

@keyframes Gradient {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}*/

@media (max-width: 575.98px) {
    h1 {
        font-size: 4.2em!important;
        text-align: center;
    }
}
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="mx-auto col-lg-7 col-md-6 col-sm-12 col-12 d-flex justify-content-center flex-column mb-4">
            <div class="mb-4 d-flex align-items-center">
                <img src="{{asset('images/landing-pages/pianolit/icon-play.svg')}}" style="width: 80px; height: 80px" class="mr-2">
                <h1 class="font-thin mb-0" style="font-size: 5em;">PIANO<span class="" style="color: #a2d6ff">LIT</span></h1>
            </div>
            <h4 class="mb-3">Is it difficult to find a piano piece that suits you?</h4>
            <p class="lead">PianoLIT is the <strong><b>APP</b></strong> where pianists discover new pieces and find inspiration to play only what they love.</p>
            <p class="lead">Because when the piano piece you play fits you, the execution is superior.</p>

            <button type="submit" data-toggle="modal" data-target="#signup-modal" style="color: rgba(0,0,0,0.6)" class="btn btn-blue p-3 mt-4">
                <strong>It's only $0.99/month... Sign me up!</strong>
            </button>

        </div>
    </div>

    <div class="row py-3">
        <div class="col-lg-3 col-md-3 col-sm-6 col-10 mx-auto my-4">
            <p>Step 1, choose your <strong>level</strong></p>
            <img class="shadow" style="width: 100%;" src="{{asset('images/landing-pages/pianolit/screen04.png')}}">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-10 mx-auto my-4">
            <p>Step 2, refine your <strong>mood</strong></p>
            <img class="shadow" style="width: 100%;" src="{{asset('images/landing-pages/pianolit/screen05.png')}}">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-10 mx-auto my-4">
            <p>Step 3, pick the <strong>length</strong></p>
            <img class="shadow" style="width: 100%;" src="{{asset('images/landing-pages/pianolit/screen06.png')}}">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-10 mx-auto my-4">
            <p>or find with <strong>detailed search</strong></p>
            <img class="shadow" style="width: 100%;" src="{{asset('images/landing-pages/pianolit/screen07.png')}}">
        </div>


    </div>

</div>

<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-0 mb-0 pb-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-0 pt-0">
        <form class="pl-4 pb-4 pr-4">
            <div class="form-group text-dark">
                <h3>Hello! You caught us before we're ready.</h3>
                <p>We're working hard to put the finishing touches onto the app. If you'd like us to send you a reminder when we're ready, just enter your email.</p>
                <input type="email" style="border-color: rgba(0,0,0,0.05)!important" class="form-control py-3 px-4 bg-light" name="email" placeholder="Enter your email here">
            </div>
            <button type="submit" class="btn btn-blue btn-block p-3"><strong>Let me know when it's out!</strong></button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
// $(function(){
//     $('.slideshow img:nth-of-type(1)').prependTo('.slideshow');
    
//     $('.slideshow img:gt(0)').hide();
    
//     setInterval(function() {
    
//         $('.slideshow :first-child').fadeOut('slow').next('img').fadeIn('slow').end().appendTo('.slideshow');
    
//     }, 6000);
// });
</script>
@endsection