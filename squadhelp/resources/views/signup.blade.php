
@extends('Master.master')

@section('title','Signup')

@section('header')

<style type="text/css">
.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

.error{
  color: red;
  font-size: 12px;
  font-weight: 300;"
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

.form-group{
  margin-top: 1rem;
  margin-bottom: 0rem; 
}
.input-group{
  margin-top: 15px; 
}
input[type=radio] {
     margin: 5px -12px;
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

input::placeholder  { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #434343; /* Firefox */
}

.selectdiv select{
  width: 400px;
  height: 48px;
  background-color: #ffffff;
  font-size: 14px;
  font-weight: 500;
  color: #434343;
  border-radius: 5px;
  border: 1px solid #d6d6d6;
  padding: 6px 12px; 
  margin-top: 1rem;

}

.selectdiv{
  position: relative;
}

.selectdiv:after {
    content: '\f107';
    font: normal normal normal 15px/1 FontAwesome;
    color: #737b83;
    right: 11px;
    top: 20px;
    height: 34px;
    padding: 15px 0px 0px 8px;
    position: absolute;
    pointer-events: none;
}

/* IE11 hide native button (thanks Matt!) */
.selectdiv select{
 -webkit-appearance: none;
}

.logdet {
    text-align: center;
    text-transform: uppercase;
    font-size: 30px;
    margin-top: 20px;
    font-weight: bold;
    letter-spacing: 1px;
}
#btn{
  background-color: #e5564d;
  border-radius: 5px;
  height: 48px;

}
.btn:hover{
  color: white;
  box-shadow:0 0 3px #e5564d!important; 
}

.radioname{
  color: #5d4a41;font-size: 15px;padding: 0 5px;
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
  width: 270px;
  height: 35px;
  background-color: #ffffff;
  font-size: 12px;
  font-weight: 500;
  color: #737999;
}

.radioname{
  font-size: 12px;
}
input[type=radio] {
     margin: 7px -12px;
   }

.selectdiv select{
  width: 270px;
  height: 35px;
  font-size: 12px;
  font-weight: 500;
  color: #434343;}

.selectdiv:after {
    font: normal normal normal 12px/1 FontAwesome;
    color: #737b83;
    right: 20px;
    top: 12px;
    height: 34px;
    padding: 15px 0px 0px 8px;
    position: absolute;
    pointer-events: none;
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
  <div class="wrapper mt-4">
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-lg-6  align-self-center p-0" >
      
          <div class="row m-0 justify-content-center">
            <form action="signupuser" method="post">
              @csrf
              <div class="logdet">Register</div>
              @if(Session::get('register_status'))
         
                  <h6 style="text-align: center">{{ Session::get('register_status') }}</h6>

              @endif
              <div class="form-group">
                 <input type="text" class="form-control" id="name"name="name" placeholder="Your Name">
              </div><span class="error">@error('name'){{$message}}@enderror</span>

               <div class="input-group">
                    <div class="form-check col-6">
                    <input class="form-check-input" type="radio" name="status" value="Student">
                    <label for="remember" class="form-check-label radioname"
                    >Student</label>
                  </div>
                   <div class="form-check col-6">
                    <input class="form-check-input" type="radio" name="status" value="Teacher">
                    <label for="remember" class="form-check-label radioname" 

                    >Teacher</label>
                  </div>
                </div>
                <span class="error">@error('status'){{$message}}@enderror</span>

                <div class="selectdiv">  
                  <select name="year" id="year">
                    <option value="0">Select Year of Study</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                  </select>
                </div>
                <span class="error">@error('year'){{$message}}@enderror</span>

                <div class="selectdiv">  
                  <select name="branch" id="branch">
                    <option value="0">Select Your Branch</option>
                    <option value="Comps">Comps</option>
                    <option value="IT">IT</option>
                    <option value="Mech">Mech</option>
                    <option value="Extc">Extc</option>
                  </select>
                </div> <span class="error">@error('branch'){{$message}}@enderror</span>
          
              <div class="form-group">
                 <input type="text" class="form-control" name="user_email" id="email" placeholder="Your Email">
              </div>  <span class="error">@error('user_email'){{$message}}@enderror</span>


              <div class="form-group">
                 <input type="password" class="form-control" name="password" placeholder="Your Password">
              </div>
              <span class="error">@error('password'){{$message}}@enderror</span>

              
              <div class=" form-group d-flex justify-content-center" id="btn">
               <button type="submit" class="btn btn-block">Sign Up</button>
              </div>
              <p class="foot">Already have an account?<a href="/login" style="color: #ce907e;padding-left: 3px;text-decoration-line: underline;">Sign In</a></p>
            </form>
          </div>
        </div>
        <div class="col-lg-6 p-0">
          <img src="images/Questions_SIN.gif" class="img-responsive fit-image">
        </div>
      </div>
    </div>
  </div>

@endsection



