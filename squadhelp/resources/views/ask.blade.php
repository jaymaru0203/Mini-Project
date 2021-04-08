@extends('Master.master')

@section('title','Ask a Question')

@section('header')
<style type="text/css">
  /* Ask a question */
  .heading {
    text-align: center;
    padding: 3rem 4rem 0;
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

  #my-form .col,
  #my-form .col-6 {
    border: 1px solid rgb(207, 207, 207);
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
    </div>

    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Who should answer it?</label>
      <div class="container my-2">
        <div class="row">
          <div class="col-6">
            <select id="year" name="year" class="form-select py-2">
              <option selected>Select year of study</option>
              <option value="FY">FY</option>
              <option value="SY">SY</option>
              <option value="TY">TY</option>
              <option value="LY">LY</option>
            </select>
          </div>
          <div class="col-6">
            <select name="branch" class="form-select py-2">
              <option selected>Select branch</option>
              <option value="IT">IT</option>
              <option value="CS">CS</option>
              <option value="MECH">MECH</option>
              <option value="EXTC">EXTC</option>
              <option value="ETRX">ETRX</option>
            </select>
          </div>

        </div>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Who should answer it?</label>
      <div class="my-2 my-border">
        <select id="type" name="type" class="form-select py-2">
          <option selected>Select type of question</option>
          <option value="Placements">Placements</option>
          <option value="Co-curricular">Co-curricular</option>
          <option value="Masters">Masters</option>
          <option value="Hackathons">Hackathons</option>
        </select>

      </div>
    </div>
    <div class="px-5 pt-3 mx-5 my-btn-div">
      <button type="submit" class="btn my-btn btn-lg btn-block">
        Add Question
      </button>
    </div>
  </form>
</div>

@endsection