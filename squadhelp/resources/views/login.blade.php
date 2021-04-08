
@extends('Master.master')

@section('title','Login')

@section('header')
<style type="text/css">
 
.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}


.form-group label{
  font-size: 1.5rem;
  font-weight: 500;
}

.form-control{
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

.errors{
  color: red;
  font-size: 12px;
  font-weight: 300;
}

.form-group{
  margin-top: 2rem;
  margin-bottom: 0rem;
}
.input-group{
  margin-top: 15px; 
}
input[type=radio] {
     margin: 7px -12px;
   }

.input-group label{
  font-weight: 500;
}

.form-control:focus {
  border-color: #ABCDEF !important;
  box-shadow: 0 0 5px rgba(171,205,239,1) !important;
  font-size: 14px;
  font-weight: 500;
  color:#434343;
}


.logdet {
    text-align: center;
    text-transform: uppercase;
    font-size: 30px;
    margin-bottom: 50px;
    font-weight: bold;
    letter-spacing: 1px;
}
#btn{
  background-color: #e5564d;
  border-radius: 5px;
  color: white;
  height: 48px;

}
.btn:hover{
  color: white;
  box-shadow:0 0 3px #e5564d!important; 
}

.foot{
    text-align: center;    
    margin-top: 30px;
    letter-spacing: 0.6px;
    font-size: 15px;
    font-weight: 500;
}

.btn{
  color: white;
  font-size: 15px;
  font-weight: 500;
}

.fit-image{
width: 100%;
object-fit: cover;
height: auto; /* only if you want fixed height */
}

@media (max-width: 990px) {
   form{
    margin-top:50px;
}
}

@media (max-width: 500px) {
  .form-control{
  width: 288px;
  height: 38px;
  background-color: #ffffff;
  font-size: 12px;
  font-weight: 500;
  color: #737999;
}

#btn{
  height: 40px;
}

.form-control:focus {
  
  font-size: 12px;
  font-weight: 500;
  color: #737999;
}


  .logdet{
    font-size: 25px;
  }

  form{
    margin-top:50px;
  }

}

button:focus {outline:0 !important;}
</style>
@endsection

@section('content')
  <div class="wrapper mt-3">
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-lg-6  align-self-center p-0" >
          <div class="row m-0 justify-content-center">
            <form action="loginuser" method="post">
              @csrf
              <div  class="logdet">Welcome Back</div>
              @if(Session::get('error'))
         
                  <h6 style="text-align: center">{{ Session::get('error') }}</h6>

              @endif
              <div class="form-group">
               <!-- <label for="name">Email</label> -->
                 <input type="text" class="form-control" name="user_email" placeholder="Your Email">
              </div>  <span class="errors">@error('user_email'){{$message}}@enderror</span>
              <div class="form-group">
              <!--  <label for="pass">Password</label> -->
                 <input type="password" name="password" class="form-control" id="pass" placeholder="Your Password">
              </div><span class="errors">@error('password'){{$message}}@enderror</span>
             <!--  <div class="input-group">
                 
                    <div class="form-check col-6">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label for="remember" class="form-check-label" style="color: #5d4a41;font-size: 12px;padding: 0 3px;"

                    >Remember Me</label>
                  </div>
                  <label for="forgot-password" class="col-6 p-0">
                    <a href="#" class="float-right" style="color: #5d4a41;;font-size: 12px;">Forgot Password?</a>
                  </label>
                </div> -->
              <div class=" form-group d-flex justify-content-center" id="btn">
               <button type="submit" class="btn btn-block">Sign In</button>
              </div>
              <p class="foot">Don't have an account yet?<a href="/signup" style="color: #ce907e;padding-left: 3px;text-decoration-line: underline;">Sign up</a></p>
            </form>
          </div>
        </div>
        <div class="col-lg-6 p-0">
          <img src= "{{ asset('images/Questions.gif') }}" class="img-responsive fit-image">
        </div>
      </div>
    </div>
  </div>




@endsection