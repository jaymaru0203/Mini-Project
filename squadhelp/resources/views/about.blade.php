@extends('Master.master')

@section('title','About Us')

@section('header')
<style type="text/css">
  .wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
  }


  .loader-container {
    background: #fff;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 9999;
  }


  #loader {
    display: block;
    position: absolute;
    font-size: 0;
    left: 50%;
    top: 50%;
    width: 100px;
    height: 100px;
    transform: translateY(-50%) translateX(-50%);
  }

  #loader img {
    display: block;
    width: 100%;
    vertical-align: middle;
  }

  .form-group label {
    font-size: 1.5rem;
    font-weight: 500;
  }

  .form-control {
    width: 400px;
    height: 48px;
    background-color: #ffffff;
    font-size: 14px;
    font-weight: 500;
    color: #434343;
    border-radius: 5px;
    border: 1px solid #d6d6d6;
    padding: 6px 12px;
  }

  .errors {
    color: red;
    font-size: 12px;
    font-weight: 300;
  }

  .form-group {
    margin-top: 2rem;
    margin-bottom: 0rem;
  }

  .input-group {
    margin-top: 15px;
  }

  input[type=radio] {
    margin: 7px -12px;
  }

  .input-group label {
    font-weight: 500;
  }

  .form-control:focus {
    border-color: #ABCDEF !important;
    box-shadow: 0 0 5px rgba(171, 205, 239, 1) !important;
    font-size: 14px;
    font-weight: 500;
    color: #434343;
  }


  .logdet {
    text-align: center;
    text-transform: uppercase;
    font-size: 30px;
    margin-bottom: 50px;
    font-weight: bold;
    letter-spacing: 1px;
  }

  #btn {
    background-color: #e5564d;
    border-radius: 5px;
    color: white;
    height: 48px;

  }

  .btn:hover {
    color: white;
    box-shadow: 0 0 3px #e5564d !important;
  }

  .foot {
    text-align: center;
    margin-top: 30px;
    letter-spacing: 0.6px;
    font-size: 15px;
    font-weight: 500;
  }

  .btn {
    color: white;
    font-size: 15px;
    font-weight: 500;
  }

  body {
    background-color: #fff;
  }

  .fit-image {
    width: 95%;
    object-fit: cover;
    height: auto;
    /* only if you want fixed height */
  }

  .about{
      text-align: justify;
  }

  @media (max-width: 990px) {
    form {
      margin-top: 50px;
    }
    .about-heading{
        margin-top: 120px !important;
    }
  }

  @media (max-width: 500px) {
    .form-control {
      width: 288px;
      height: 38px;
      background-color: #ffffff;
      font-size: 12px;
      font-weight: 500;
      color: #737999;
    }

    #btn {
      height: 40px;
    }

    .form-control:focus {

      font-size: 12px;
      font-weight: 500;
      color: #737999;
    }


    .logdet {
      font-size: 25px;
    }

    form {
      margin-top: 50px;
    }
  }

  button:focus {
    outline: 0 !important;
  }
</style>
@endsection

@section('content')
<div id="pre-loader" class="loader-container">
  <div id="loader">
    <img src="{{ asset('images/loader1.gif') }}">
  </div>
</div>
<div class="wrapper mt-3">
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-lg-6 align-self-center p-0">
        <div class="row m-0 justify-content-center">
          <h2 class="my-4 about-heading">About Us</h2>
          <p class="about px-5">
            Due to the pandemic, students cannot communicate to other students and faculty. There has been a communication gap between the college and the students. The freshers who have joined college this year in the middle of the Pandemic have no knowledge of the College and its customs and traditions. The interaction between juniors and seniors is hindered and the doubt solving or helping is not possible. Access to faculty is also limited through mail and hence doubt solving is not as effective as physically in college. <br>
            With SquadHelp, we wish to help the juniors as well as all those students who are affected by the communication gap. We aim to deploy this project for all the students and faculty to use and create a safe and monitored environment within the college. With all the possible future scope and improvements in mind, we present the first edition of the project - SquadHelp!
          </p>
        </div>
      </div>
      <div class="col-lg-6 p-0">
        <img src="{{ asset('images/Questions.gif') }}" class="img-responsive fit-image">
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
  jQuery(window).on('load', function() {
    jQuery('#pre-loader').delay(1200).fadeOut();
  });
</script>
@endsection