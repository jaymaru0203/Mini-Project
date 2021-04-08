@extends('Master.master')

@section('title','Feed')

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
      <div class="post-container filter">
        <h1 class="filter-heading">Filter Results</h1>
        <form action="filter" method="GET">
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
        
        {{-- if else logic i have made changes in controller just send the file name and change the below  
        if statement

        @if()

        @else

        <img src="{{URL::asset('/images/user_icon.png')}}" alt="">

        @endif --}}

          <img src="{{URL::asset('/images/user_icon.png')}}" alt="">

        </div>

        <div class="user-details">
          <h1>Esha Vats</h1>
          <h2>{{ $q->user_email }}</h2>
        </div>

        <div class="post-date">
          <p>{{ $q->created_at }}</p>
        </div>
          
      </div>

      <!-- question -->
      <div class="row question-info">

        <div class="col-1 votes">
          <i class="fas fa-arrow-up"></i>
          <h4>20</h4>
          <i class="fas fa-arrow-down"></i>
        </div>
        
        <div class="col-11 question">
          <p>{{ $q->question_content }}</p>
        </div>

      </div>


      <div class="question-container">
        @if($user_details_year == $q->year)
        <form action="postanswer" method="GET">
          <input type="hidden" name="question_id" value="{{$q->question_id}}">
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary" type="button">
                <a href="allanswers/{{$q->question_id}}"><i class="fas fa-comment-alt message-icon"></i></a>
              </button>
            </div>
            <input type="text" class="form-control" name="answer" placeholder="Write an Answer.." aria-label="Write an Answer.." aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-location-arrow" style="font-size:20px"></i></button>
          </div>
          
        </form>
        @else
        <form >
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary" type="button">
                <a href="allanswers/{{$q->question_id}}"><i class="fas fa-comment-alt message-icon"></i></a>
              </button>
            </div>
            <input type="text" class="form-control" name="answer" placeholder="Write an Answer.." aria-label="Write an Answer.." aria-describedby="button-addon2" readonly>
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-location-arrow" style="font-size:20px"></i></button>
          </div>
          
        </form>
        
        @endif
      </div>
      </div>

      @endforeach
 

    </div>

@endsection