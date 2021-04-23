@extends('Master.master')

@section('title','Feed')

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


  h2.typeQ{
    position: absolute;
    font-size: 16px; 
    padding: 5px 10px;
    top: -20px;
    right: -10px;
    background-color: #ff2316;
    color: white;
    border-radius: 5px;
}

.selectdiv select{
  width: 100%;
  min-width:140px;
  height: 48px;
  background-color: #ffffff;
  font-size: 14px;
  font-weight: 500;
  color: #434343;
  border-radius: 5px;
  border: 1px solid #d6d6d6;
  padding: 6px 12px; 

}

.selectdiv{
  position: relative;
}

.selectdiv:after {
    content: '\f107';
    font: normal normal normal 15px/1 FontAwesome;
    color: #737b83;
    right: 7px;
    top: 3px;
    height: 34px;
    padding: 15px 0px 0px 8px;
    position: absolute;
    pointer-events: none;
}

.selectdiv select{
 -webkit-appearance: none;
}


@media screen and (max-width: 650px) {
  h2.typeQ{
    position: absolute;
    font-size: 14px; 
    padding: 5px 10px;
    top: -25px;
    right: -15px;
    background-color: #ff2316;
    color: white;
    border-radius: 5px;
}


.selectdiv select{

 margin: 5px 0px;
}


.flex-container {
  display: flex;
  flex-wrap: wrap;
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



    <div class="right-container">
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block" style="width: 100%;">
        <button type="button" class="close" data-dismiss="alert">×</button>	
              <strong>{{ $message }}</strong>
      </div>
    @endif
      <!-- ask question container -->
      @if($user_details->status == "Student")
      <div class="post-container filter" >
        <h1 class="filter-heading">Filter Results</h1>
        <form action="filter" method="GET" class="flex-container">
         <div class="container-fluid">
          <div class="row">
           <div class="col-lg-3 col-md-3">
           <div class="selectdiv">  
                  <select name="filtercategory" id="filtercategory">
                    <option selected value="0">Select Category</option>
                    <option value="Placements">Placements</option>
                    <option value="Internships">Internships</option>
                    <option value="Hackathons">Hackathons</option>
                    <option value="Co-curricular">Co-curricular</option>
                    <option value="Others">Others</option>
            </select>
          </div>
          </div>
          <div class="col-lg-3 col-md-3">
          <div class="selectdiv">  
                  <select name="filterbranch" id="filterbranch">
                    <option selected value="0">Select Branch</option>
                    <option value="COMPS">COMPS</option>
                    <option value="ETRX">ETRX</option>
                    <option value="EXTC">EXTC</option>
                    <option value="IT">IT</option>
                    <option value="MECH">MECH</option>
                    <option value="All">All</option>
                  </select>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="selectdiv">  
                  <select name="filteryear" id="filteryear">
                    <option selected value="0">Select Year </option>
                    <option value="FY">FY</option>
                    <option value="SY">SY</option>
                    <option value="TY">TY</option>
                    <option value="LY">LY</option>
                    <option value="All">All</option>
                  </select>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="filter-options">
              <button type="submit" class="filter-btn">Filter</button>
            </div>
          </div>
        </div>
        </div> 
        </form>
      </div>
      
      @else

      <div class="post-container filter" >
        <h1 class="filter-heading">Filter Results</h1>
        <form action="filterTeacher" method="GET" class="flex-container">
         <div class="container-fluid">
          <div class="row">
           <div class="col-lg-3 col-md-3">
           <div class="selectdiv">  
                  <select name="filtercategory" id="filtercategory">
                    <option selected value="0">Select Category</option>
                    <option value="Placements">Placements</option>
                    <option value="Internships">Internships</option>
                    <option value="Hackathons">Hackathons</option>
                    <option value="Co-curricular">Co-curricular</option>
                    <option value="Others">Others</option>
                </select>
          </div>
          </div>
          <div class="col-lg-3 col-md-3">
          <div class="selectdiv">  
                  <select name="filterbranch" id="filterbranch">
                    <option selected value="0">Select Branch</option>
                    <option value="COMPS">COMPS</option>
                    <option value="ETRX">ETRX</option>
                    <option value="EXTC">EXTC</option>
                    <option value="IT">IT</option>
                    <option value="MECH">MECH</option>
                    <option value="All">All</option>
                  </select>
            </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="filter-options">
              <button type="submit" class="filter-btn">Filter</button>
            </div>
          </div>
        </div>
        </div> 
        </form>
      </div>

      @endif
      


      <!-- posted questions -->
      @foreach($question as $q)
      <div class="post-container posted mb-3">
    
      <div class="userdetails-container">
        <div class="user-image">
         <img src="{{asset('storage/uploads')}}/{{\App\Http\Controllers\AuthController::getUser($q->user_email)->image}}" alt="">
       </div>

     <div class="user-details">

     
      <h1>{{ \App\Http\Controllers\AuthController::getUser($q->user_email)->name }}</h1>
        
      <h2>{{ \App\Http\Controllers\AuthController::getUser($q->user_email)->user_email }}</h2>

            @if($q->qsFor == "Teacher")
              <h2>Question For : {{ $q->qsFor }}s | {{ $q->branch }}</h2>
            @else
              <h2>Question For : {{ $q->year }} | {{ $q->branch }}</h2>
            @endif
         
        <!-- <h2>{{ \App\Http\Controllers\AuthController::getUser($q->user_email)->status }} of {{ \App\Http\Controllers\AuthController::getUser($q->user_email)->branch }} | {{ \App\Http\Controllers\AuthController::getUser($q->user_email)->year }}</h2> -->
        </div>

        <div class="post-date">
          <h2 class="typeQ">{{ $q->type_of_question }}</h2>
          <p>{{ $q->created_at }}</p>
        </div>
          
      </div>

      <!-- question -->
      <div class="row question-info">
        
        <div class="col-11 question">
          <p>{{ $q->question_content }}</p>
        </div>

      </div>

<!-- ADD TEACHER LOGIC HERE REST ALL IS DONE -->
      <div class="question-container">
        @if(($user_details->branch == $q->branch || $q->branch == "All") && (( ($user_details->status == "Student" && $q->qsFor == "Student") && ($user_details->year == $q->year || $q->year == "All")) || ($user_details->status == "Teacher" && $q->qsFor == "Teacher")))
        <form action="postanswer" method="GET">
          <input type="hidden" name="question_id" value="{{$q->question_id}}">
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <input type="text" class="form-control" name="answer" placeholder="Write an Answer.." aria-label="Write an Answer.." aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-location-arrow" style="font-size:20px;vertical-align: middle;"></i></button>
          </div>
        </form>
        <div style="text-align: center;"><a href="allanswers/{{$q->question_id}}">Show All Answers</a></div>

        @else
        <form >
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <input type="text" class="form-control" name="answer" placeholder="You aren't eligible to answer this question..." aria-label="Write an Answer.." aria-describedby="button-addon2" disabled>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" disabled><i class="fa fa-location-arrow" style="font-size:20px;vertical-align: middle;"></i></button>
          </div>
        </form>
        <div style="text-align: center;"><a href="allanswers/{{$q->question_id}}">Show All Answers</a></div>
        
        @endif
      </div>
      </div>

      @endforeach
 

    </div><br><br><br><br>



@endsection

@section('script')
<script type="text/javascript">
      jQuery(window).on('load', function(){ 
         jQuery('#pre-loader').delay(1200).fadeOut(); 
         });
</script>
@endsection