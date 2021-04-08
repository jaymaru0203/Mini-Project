@extends('Master.master')

@section('title','Feed')

@section('header')

<style type="text/css">
  h2.typeQ{
    position: absolute;
    font-size: 14px; 
    padding: 5px 10px;
    top: -40px;
    right: -15px;
    background-color: #ff2316;
    color: white;
    border-radius: 5px;
}

@media screen and (max-width: 650px) {
  h2.typeQ{
    position: absolute;
    font-size: 14px; 
    padding: 5px 10px;
    top: -50px;
    right: -20px;
    background-color: #ff2316;
    color: white;
    border-radius: 5px;
}

.flex-container {
  display: flex;
  flex-wrap: wrap;
}


</style>
@endsection

@section('content')
<!-- <div class="left-container">

<div class="col-sm p-2 d-flex justify-content-center align-items-center">
  <div class="circle"><img src="{{URL::asset('/images/fy.png')}}" alt=""></div>
  <span class="badge badge-notify">3</span>
  <span class="year">FY</span>
</div>

<div class="col-sm mt-2  p-2 d-flex justify-content-center align-items-center">
    <div class="circle"><img src="{{URL::asset('/images/sy.png')}}" alt=""></div>
    <span class="badge badge-notify">1</span>
    <span class="year">SY</span>
</div>

<div class="col-sm mt-2 p-2 d-flex justify-content-center align-items-center">
    <div class="circle"><img src="{{URL::asset('/images/ty.png')}}" alt=""></div>
    <span class="badge badge-notify">5</span>
    <span class="year">TY</span>
</div>

<div class="col-sm mt-2 p-2 d-flex justify-content-center align-items-center">
    <div class="circle"><img src="{{URL::asset('/images/ly.png')}}" alt=""></div>
    <span class="badge badge-notify">2</span>
    <span class="year">LY</span>
</div>

<div class="col-sm mt-2 p-2 d-flex justify-content-center align-items-center">
    <div class="circle ml-4"><img src="{{URL::asset('/images/others.png')}}" alt=""></div>
    <span class="badge badge-notify">0</span>
    <span class="year">Other</span>
</div>

</div> -->

    <div class="right-container">
      
      <!-- ask question container -->
      <div class="post-container filter" >
        <h1 class="filter-heading">Filter Results</h1>
        <form action="filter" method="GET" class="flex-container">
          <div class="filter-options">
            <input type="radio" name="filterData" id="placements" class="checkbox" value="Placements">
            <label for="placements">Placements</label>
          </div>
          <div class="filter-options">
            <input type="radio" name="filterData" id="cocurricular" class="checkbox" value="Co-curricular">
            <label for="cocurricular">Co-Curricular</label>
          </div>
          <div class="filter-options">
            <input type="radio" name="filterData" id="masters" class="checkbox" value="Masters">
            <label for="masters">Masters</label>
          </div>
          <div class="filter-options">
            <input type="radio" name="filterData" id="hackathons" class="checkbox" value="Hackathons">
            <label for="hackathons">Hackathons</label>
          </div>
          <div class="filter-options">
            <input type="radio" name="filterData" id="internships" class="checkbox" value="Internships">
            <label for="internships">Internships</label>
          </div>
          <div class="filter-options">
            <input type="radio" name="filterData" id="others" class="checkbox" value="Others">
            <label for="others">Others</label>
          </div>
          <div class="filter-options">
            <input type="radio" name="filterData" id="all" class="checkbox" value="all">
            <label for="all">All</label>
          </div>
          <div class="filter-options">
            <button type="submit" class="filter-btn">Filter</button>
          </div>
        </form>
      </div>
      
      <!-- posted questions -->
      @foreach($question as $q)
      <div class="post-container posted">
    
      <div class="userdetails-container">
        <div class="user-image">


         <?php 
            $conn = new mysqli('localhost', 'root' , '' , 'laravel');
            $email = session()->get('user');
            $qemail = $q->user_email;

            // $sql = "SELECT DISTINCT sender FROM chat_messages WHERE sender!='$email' AND chatRoomID='$id1'";
            $sql = "SELECT * FROM nusers WHERE user_email='$qemail'";
            $res = $conn->query($sql);
            if($res->num_rows > 0){
            while($r=$res->fetch_assoc()){ ?>

           <img src="{{asset('storage/uploads')}}/<?php echo $r['image']; ?>" alt="">

         
          </div>

        <div class="user-details">
          <h1><?php echo $r['name']; ?></h1>
            <?php }} ?>
          <h2>Question For : {{ $q->year }} | {{ $q->branch }}</h2>
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


      <div class="question-container">
        @if($user_details->year == $q->year && $user_details->branch == $q->branch)
        <form action="postanswer" method="GET">
          <input type="hidden" name="question_id" value="{{$q->question_id}}">
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary" type="button">
                <a href="allanswers/{{$q->question_id}}"><i class="fas fa-comment-alt message-icon" style="vertical-align: middle;"></i></a>
              </button>
            </div>
            <input type="text" class="form-control" name="answer" placeholder="Write an Answer.." aria-label="Write an Answer.." aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-location-arrow" style="font-size:20px;vertical-align: middle;"></i></button>
          </div>
          
        </form>
        @else
        <form >
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary" type="button">
                <a href="allanswers/{{$q->question_id}}"><i class="fas fa-comment-alt message-icon" style="vertical-align: middle;"></i></a>
              </button>
            </div>
            <input type="text" class="form-control" name="answer" placeholder="You aren't eligible to answer this question..." aria-label="Write an Answer.." aria-describedby="button-addon2" disabled>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" disabled><i class="fa fa-location-arrow" style="font-size:20px;vertical-align: middle;"></i></button>
          </div>
          
        </form>
        
        @endif
      </div>
      </div>

      @endforeach
 

    </div>

@endsection