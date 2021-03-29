
@extends('Master.master')

@section('title','Feed')

@section('content')
<div class="left-container">

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

</div>

    <div class="right-container">

      <!-- ask question container -->
      <div class="post-container">

        <div class="userdetails-container">
          <div class="user-image">
            <img src="https://cdn.peoople.app/image/profile/truster/1879448_22022020051811322524_opt.jpg" alt="">
          </div>
  
          <div class="user-details">
            <h1>Jubin Kamdar</h1>
            <h2>jubin.kamdar@somaiya.edu</h2>
          </div>
        </div>

        <div class="question-container">

          <form action="postquestion" method="GET">

            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Ask a Question" aria-label="Ask a Question" aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-location-arrow" style="font-size:20px"></i></button>
            </div>
            
          </form>

        </div>
      </div>

      <!-- posted questions -->
      <div class="post-container posted">

        <div class="userdetails-container">
          <div class="user-image">
            <img src="https://cdn.peoople.app/image/profile/truster/1879448_22022020051811322524_opt.jpg" alt="">
          </div>
  
          <div class="user-details">
            <h1>Esha Vats</h1>
            <h2>esha.vats@somaiya.edu</h2>
          </div>

          <div class="post-date">
            <p>1 March,2021 | 2:30pm</p>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, voluptas.?</p>
          </div>

        </div>
        

        <div class="question-container">

          <form action="postquestion" method="GET">
            
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button">
                  <i class="fas fa-comment-alt message-icon"><span class="message-count">15</span></i>
                </button>
              </div>
              <input type="text" class="form-control" placeholder="Write an Answer.." aria-label="Write an Answer.." aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-location-arrow" style="font-size:20px"></i></button>
            </div>
            
          </form>
          
        </div>
      </div>
 

    </div>

@endsection