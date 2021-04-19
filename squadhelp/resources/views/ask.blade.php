@extends('Master.master')

@section('title','Ask a Question')

@section('header')
<style type="text/css">

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
        vertical-align: middle;}
  /* Ask a question */
  .heading {
    text-align: center;
    padding: 3rem 4rem 0;
  }
  label{
    font-size: 22px;
    font-weight: 500;
  }

  #my-form.form-container {
    padding: 1.7rem 27rem 0;
  }

  #my-form .col-6 {
    padding: 0 !important;
  }

  #my-form .form-select {
    /* padding: 0 5rem; */
    width: 100%;
  }

  #my-form select {
    border: none;
  }

  #my-form .col {
    border-left: none;
    border-top: none;
    border-bottom: none;
  }

  #my-form .my-border {
    border: 1px solid rgb(207, 207, 207);

  }

  #my-form .my-btn {
    background-color: #e5564d;
    color: white;
    font-weight: 700;
  }

  #my-form .my-btn:hover {
    background-color: #b33229;
  }

  .error{
    color: red;
    font-size: 12px;
    font-weight: 300;
  }

  /* Responsive Styling */
  @media only screen and (max-width: 1450px) {
    #my-form.form-container {
      padding: 1.7rem 20rem 0;
    }
  }

  @media only screen and (max-width: 1200px) {
    #my-form.form-container {
      padding: 1.7rem 15rem 0;
    }
  }

  @media only screen and (max-width: 900px) {
    #my-form.form-container {
      padding: 1.7rem 12rem 0;
    }
  }

  @media only screen and (max-width: 754px) {
    #my-form.form-container {
      padding: 1.7rem 8rem 0;
    }
  }

  @media only screen and (max-width: 630px) {
    #my-form.form-container {
      padding: 1.7rem 5rem 0;
    }
  }

  @media only screen and (max-width: 530px) {
    #my-form.form-container {
      padding: 1.7rem 2rem 0;
    }
    #my-form .my-btn {
      font-size: 1.2em !important;
    }
    .heading h1 {
      font-size: 1.8em !important;
    }
    .heading {
      padding-top: 1.3rem;
    }
  }

  @media only screen and (max-width: 431px) {
    #my-form.form-container {
      padding: 1.5rem 2rem 0;
    }
    #my-form .my-btn {
      font-size: 1em !important;
    }
    #my-form .my-btn-div {
      padding: 10px 15px !important;
    }
    #my-form option {
      font-size: 10px !important;
    }
    #my-form select.form-select {
      font-size: 15px;
    }
    .heading h1 {
      font-size: 1.7em !important;
    }
    .heading {
      padding-top: 1.7rem;
    }
  }

  @media only screen and (max-width: 340px) {
    .heading h1 {
      font-size: 1.5em !important;
    }
    .heading {
      padding-top: 1em;
    }

    #my-form.form-container {
      padding-top: 1em;
    }
    #my-form .my-btn-div {
      padding: 10px 0 15px !important;
    }
    #my-form .my-btn {
      font-size: 15px !important;
    }
    #my-form select.form-select {
      font-size: 10px;
    }
  }

  @media only screen and (max-width: 302px) {
    .heading {
      padding: 1em 0 0 !important;
    }
    #my-form .my-btn-div {
      margin: 0 10px !important;
    }
  }
</style>
@endsection

@section('content')
<div id="pre-loader" class="loader-container">
            <div id="loader">
               <img src="{{ asset('images/loader1.gif') }}">
            </div>
    </div>
<!-- Form -->
<div class="mt-5 pt-5">
  <div class="heading">
    <h1>Ask a Question</h1>
  </div>
  <form id="my-form" class="form-container" method="post" action="question">
    @csrf

    <div class="mb-3">
      <label for="question" class="form-label">Question</label>
      <textarea class="form-control" name="question" id="question" rows="5" placeholder="Write here..."></textarea>
      <span class="error">@error('question'){{$message}}@enderror</span>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Who should answer it?</label>

      <div class="form-check container my-3">
        <input class="form-check-input" type="radio" name="qsFor" value="Student" id="qsFor1" onchange="show(this)">
        <label class="form-check-label mr-5" for="qsFor1">
          Student
        </label>

        <input class="form-check-input" type="radio" name="qsFor" value="Teacher" id="qsFor2" onchange="hide(this)">
        <label class="form-check-label" for="qsFor2">
          Teacher
        </label><br>
        <span class="error">@error('qsFor'){{$message}}@enderror</span>
      </div>

      <div class="container my-2" id="yearBranch" >
        <div class="row">

          <div class="col-6" style="border: 1px solid rgb(207, 207, 207);">
            <select name="branch" id="branch" class="form-select py-2" required>
              <option selected value="All">Select branch</option>
              <option value="IT">IT</option>
              <option value="CS">CS</option>
              <option value="MECH">MECH</option>
              <option value="EXTC">EXTC</option>
              <option value="ETRX">ETRX</option>
              <option value="All">All</option>
            </select>
            <span class="error">@error('branch'){{$message}}@enderror</span>
          </div>

          <div class="col-6">
            <select id="year" name="year" class="form-select py-2" style="visibility: hidden; border: 1px solid rgb(207, 207, 207);" required>
              <option selected value="All">Select year of study</option>
              <option value="FY">FY</option>
              <option value="SY">SY</option>
              <option value="TY">TY</option>
              <option value="LY">LY</option>
              <option value="All">All</option>
            </select>
            <span class="error">@error('year'){{$message}}@enderror</span>
          </div>

        </div>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Question Category</label>
      <div class="my-2 my-border">
        <select id="type" name="type" class="form-select py-2" required>
          <option selected value="0">Select Question Category</option>
          <option value="Placements">Placements</option>
          <option value="Co-curricular">Co-curricular</option>
          <option value="Masters">Masters</option>
          <option value="Hackathons">Hackathons</option>
          <option value="Internships">Internships</option>
          <option value="Others">Others</option>
        </select>
      </div>
        <span class="error">@error('type'){{$message}}@enderror</span>
    </div><br>
    <div class="px-5 pt-3 mx-5 my-btn-div">
      <button type="submit" class="btn my-btn btn-lg btn-block">
        Add Question
      </button>
    </div>
  </form>
</div><br><br>

<script>
      jQuery(window).on('load', function(){ 
         jQuery('#pre-loader').delay(1200).fadeOut(); 
         });

  function show(x){
    if(x.checked){
      document.getElementById("year").style.visibility = "visible";

    }
  }
  function hide(x){
    if(x.checked){
      document.getElementById("year").style.visibility = "hidden";
    }
  }



</script>
@endsection

@section('script')
<script type="text/javascript">
      jQuery(window).on('load', function(){ 
         jQuery('#pre-loader').delay(1200).fadeOut(); 
         });
</script>
@endsection