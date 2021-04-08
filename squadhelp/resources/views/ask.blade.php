@extends('Master.master')

@section('title','Ask a Question')

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
            <select id="year" name="year" class="form-select py-2" required>
              <option selected>Select year of study</option>
              <option value="FY">FY</option>
              <option value="SY">SY</option>
              <option value="TY">TY</option>
              <option value="LY">LY</option>
              <option value="All">All</option>
            </select>
          </div>
          <div class="col-6">
            <select name="branch" class="form-select py-2" required>
              <option selected>Select branch</option>
              <option value="IT">IT</option>
              <option value="CS">CS</option>
              <option value="MECH">MECH</option>
              <option value="EXTC">EXTC</option>
              <option value="ETRX">ETRX</option>
              <option value="All">All</option>
            </select>
          </div>

        </div>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Question Category</label>
      <div class="my-2 my-border">
        <select id="type" name="type" class="form-select py-2" required>
          <option selected>Select Question Category</option>
          <option value="Placements">Placements</option>
          <option value="Co-curricular">Co-curricular</option>
          <option value="Masters">Masters</option>
          <option value="Hackathons">Hackathons</option>
          <option value="Internships">Internships</option>
          <option value="Others">Others</option>
        </select>

      </div>
    </div>
    <div class="px-5 pt-3 mx-5">
      <button type="submit" class="btn my-btn btn-lg btn-block">
        Add Question
      </button>
    </div>
  </form>
</div>

@endsection