@extends('Master.master')

@section('title','Profile')

@section('header')
<style>
    #prof-container {
        margin-top: 8em !important;
    }

    #prof-container .my-img {
        width: 200px;
        height: 200px;
    }

    #prof-container .detail-top {
        margin-top: 2em;
    }

    #prof-container .my-details {
        text-align: right;
        color: #e5564d;
    }

    #prof-container .name {
        font-weight: 700;
    }

    #prof-container .username {
        color: #636262;
    }

    #prof-container span.font-weight-bold {
        color: black;
    }

    #prof-container hr {
        border: 1px solid #cacaca;
    }

    #prof-container .prof-nav-link {
        color: #636262;
        font-weight: 700;
        font-size: 1.3rem;
    }

    #prof-container .prof-nav-link.active {
        color: #e5564d;
    }

    #prof-container .my-btn {
        background-color: #e5564d;
        color: white;
        font-weight: 700;
    }

    #prof-container .my-btn:hover {
        background-color: #b33229;
    }

    #prof-container .btn-div {
        padding: 0 23rem;
    }

    #prof-container .error {
        color: red;
        display: block;
    }

    #prof-container input[type="file"] {
        background-color: #e5564d;
        color: white;
    }

    button{
        outline: none;
    }

    button:focus{
        outline: none;
    }

    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
        background: none;
    }

    .nav-tabs .nav-link.active{
        border-bottom-color: #f2f2f2;
    }

    @media only screen and (max-width: 1500px) {
        #prof-container .details {
            padding-left: 6em;
        }

        #prof-container .btn-div {
            padding: 0 17rem;
        }
    }

    @media only screen and (max-width: 1000px) {
        #prof-container .details {
            padding-left: 8em;
        }

        #prof-container .btn-div {
            padding: 0 12rem;
        }
    }

    @media only screen and (max-width: 767px) {
        #prof-container .col-md-6.pl-4.my-col2 {
            padding: 0 !important;
            margin-top: 1em;
        }

        #prof-container .my-img {
            width: 150px;
            height: 150px;
        }

        #prof-container .col-md-6.pr-5.my-col1 {
            padding: 0 !important;
        }

        #prof-container .name,
        #prof-container .username,
        #prof-container .my-data {
            font-size: 1.5em;
        }

        #prof-container .name.detail-top,
        #prof-container .my-data.detail-top {
            margin-top: 2em !important;
        }

        #prof-container .details {
            padding-left: 8em;
        }

        #prof-container .btn-div {
            padding: 0 10rem;
        }
    }

    @media only screen and (max-width: 709px) {
        #prof-container .prof-nav-link {
            font-size: 1.2rem;
        }
    }

    @media only screen and (max-width: 694px) {
        #prof-container .prof-nav-link {
            font-size: 1.1em;
        }

        #prof-container .details {
            padding-left: 7em;
        }

        #prof-container .btn-div {
            padding: 0 8em;
        }

        #prof-container .my-btn {
            font-size: 1em;
        }

        #prof-container .my-img {
            width: 130px;
            height: 130px;
        }

        #prof-container .name,
        #prof-container .username,
        #prof-container .my-data {
            font-size: 1.2em;
        }

        #prof-container .name.detail-top,
        #prof-container .my-data.detail-top {
            margin-top: 1.5em !important;
        }
    }

    @media only screen and (max-width: 655px) {
        #prof-container .prof-nav-link {
            font-size: 1em;
        }
    }

    @media only screen and (max-width: 608px) {

        #prof-container {
            padding: 0 !important;
        }

        #prof-container .name.detail-top,
        #prof-container .my-data.detail-top {
            margin-top: 1.8em !important;
        }

        #prof-container .name,
        #prof-container .username,
        #prof-container .my-data {
            font-size: 1.2em;
        }

        #prof-container .prof-nav-link,
        #prof-container .form-label,
        #prof-container .form-control {
            font-size: 1em;
        }

        #prof-container .btn-div {
            padding: 0 6em;
        }

    }

    @media only screen and (max-width: 513px) {

        #prof-container .prof-nav-link,
        #prof-container .form-label,
        #prof-container .form-control {
            font-size: 0.9em;
        }

        #prof-container .details {
            padding-left: 6em;
        }
    }

    @media only screen and (max-width: 482px) {

        #prof-container .name,
        #prof-container .username,
        #prof-container .my-data {
            font-size: 1em;
        }

        #prof-container .details {
            padding-left: 7em;
        }

        #prof-container .name.detail-top,
        #prof-container .my-data.detail-top {
            margin-top: 2.4em !important;
        }

        #prof-container .submenu .nav-link {
            padding: .5rem 0.8rem;
        }
    }

    @media only screen and (max-width: 463px) {
        #prof-container .submenu .nav-link {
            padding: .5rem 0.6rem;
        }

        #prof-container .my-img {
            width: 110px;
            height: 110px;
        }

        #prof-container .details {
            padding-left: 5em;
        }

        #prof-container .name,
        #prof-container .username,
        #prof-container .my-data {
            font-size: 0.95em;
        }

        #prof-container .name.detail-top,
        #prof-container .my-data.detail-top {
            margin-top: 2em !important;
        }
    }

    @media only screen and (max-width: 454px) {
        #prof-container input[type="file"] {
            width: 100%;
            font-size: 0.8em;
        }

        #prof-container .prof-nav-link,
        #prof-container .form-label,
        #prof-container .form-control {
            font-size: 0.8em;
        }

        #prof-container .btn-div {
            padding: 0 4em;
        }

        #prof-container .my-btn {
            font-size: 0.9em;
        }

        #prof-container .my-col3 {
            padding: 0;
        }
    }

    @media only screen and (max-width: 412px) {
        #prof-container .my-img {
            width: 90px;
            height: 90px;
        }

        #prof-container .name.detail-top,
        #prof-container .my-data.detail-top {
            margin-top: 1.3em !important;
        }

        #prof-container .details {
            padding-left: 4em;
        }

        #prof-container .my-details {
            padding-left: 0;
        }

        #prof-container .prof-nav-link,
        #prof-container .form-label,
        #prof-container .form-control {
            font-size: 0.7em;
        }

        #prof-container .my-btn {
            font-size: 0.8em;
        }
    }

    @media only screen and (max-width: 380px) {

        #prof-container .my-img {
            width: 70px;
            height: 70px;
        }

        #prof-container .submenu .nav-link {
            padding: .5rem 0.4rem;
        }

        #prof-container .name,
        #prof-container .username,
        #prof-container .my-data {
            font-size: 0.8em;
        }

        #prof-container .name.detail-top,
        #prof-container .my-data.detail-top {
            margin-top: 1.1em !important;
        }

        #prof-container .details {
            padding-left: 3em;
        }
    }

    @media only screen and (max-width: 380px) {
        #prof-container .submenu .nav-link {
            padding: .5rem 0.3rem;
        }

        #prof-container .prof-nav-link,
        #prof-container .form-label,
        #prof-container .form-control {
            font-size: 0.65em;
        }

        #prof-container .edit-form {
            margin-top: 0.7em !important;
        }

        #prof-container .btn-div {
            margin-top: 2em !important;
        }
    }

    @media only screen and (max-width: 352px) {
        #prof-container .btn-div {
            padding: 0 2em;
        }

        #prof-container .prof-nav-link {
            padding-left: 0 !important;
            margin-right: 1em;
        }
    }

    @media only screen and (max-width: 327px) {

        #prof-container {
            margin: 6em 2em !important;
        }

        #prof-container hr {
            margin-top: 2em !important;
        }

        #prof-container .my-img {
            width: 50px;
            height: 50px;
        }

        #prof-container .name,
        #prof-container .username,
        #prof-container .my-data {
            font-size: 0.6em;
        }
    }
</style>
@endsection

@section('content')

<div id="prof-container" class="m-5 px-5 pb-0">
    <div class="row">
        <div class="col-2">
            <img src="{{asset('storage/uploads/'.session()->get('user_img'))}}" class="rounded-circle my-img" />
        </div>
        <div class="col-6 details">
            <h3 class="detail-top name">{{ $user->name }}</h3>
            <h3 class="username">{{ $user->status }}</h3>
            @if(session()->has("message"))
            <h4 class="username">{{session()->get("message")}}</h4>
            @endif
        </div>
        <div class="col-4 my-details">
            <h3 class="detail-top my-data"><span class="font-weight-bold">Branch - </span> {{$user->branch}}</h3>
        @if($user->status == "Student")
            <h3 class="my-data"><span class="font-weight-bold">Year -</span> {{$user->year}}</h3>
        @endif
        </div>
    </div>
    <hr class="mt-5" />
    <!-- <ul class="nav nav-tabs submenu" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active prof-nav-link pl-0" href="#">Edit Profile</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link prof-nav-link" href="#">Your Questions</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link prof-nav-link" href="#">Your Answers</a>
        </li>
    </ul> -->

    <ul class="nav nav-tabs justify-content-center mt-5 submenu" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link prof-nav-link active" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true" >Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link prof-nav-link" id="questions-tab" data-toggle="tab" data-target="#questions" type="button" role="tab" aria-controls="questions" aria-selected="false" >Your Questions</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link prof-nav-link" id="answers-tab" data-toggle="tab" data-target="#answers" type="button" role="tab" aria-controls="answers" aria-selected="false" >Your Answers</button>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active"  id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form class="edit-form mt-4" method="post" action="editprofile" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="col-md-6 pr-5 my-col1">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control form-control-lg" value="{{$user->name}}" />
                        <span class="error">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 pl-4 my-col2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="user_email" readonly class="form-control form-control-lg" value="{{$user->user_email}}" />
                        <span class="error">@error('user_email'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col-md-6 pr-5 my-col1">
                        <label for="" class="form-label">Branch</label>
                        <br />
                        <select name="branch" id="inputState" class="form-select form-control form-control-lg py-2">
                            <option value="0">Select Your Branch</option>
                            <option value="COMPS">COMPS</option>
                            <option value="ETRX">ETRX</option>
                            <option value="EXTC">EXTC</option>
                            <option value="IT">IT</option>
                            <option value="MECH">MECH</option>
                        </select>
                        <span class="error">@error('branch'){{$message}}@enderror</span>
                    </div>
                    @if($user->status == "Student")
                    <div class="col-md-6 pl-4 my-col2">
                        <label for="" class="form-label">Year</label>
                        <br />
                        <select name="year" id="inputState" class="form-select form-control form-control-lg py-2">
                            <option value="FY" selected>Select Year of Study</option>
                            <option value="FY">FY</option>
                            <option value="SY">SY</option>
                            <option value="TY">TY</option>
                            <option value="LY">LY</option>
                        </select>
                        <span class="error">@error('year'){{$message}}@enderror</span>
                    </div>
                    @endif
                </div>
                <div class="form-row mt-4">
                    <div class="col-md-6 pr-5 my-col1">
                        <label for="" class="form-label">Old Password</label>
                        <input name="old_password" type="password" class="form-control form-control-lg" placeholder="*********" />
                        <span class="error">@error('old_password'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 pl-4 my-col2">
                        <label for="" class="form-label">New Password</label>
                        <input name="new_password" type="password" class="form-control form-control-lg" placeholder="*********" />
                        <span class="error">@error('new_password'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col my-col3">
                        <label for="" class="form-label">Profile Image</label><br>
                        <input class="mt-2" name="image" type="file" />
                        <span class="error">@error('image'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="mt-5 btn-div">
                    <button type="submit" class="btn my-btn btn-lg btn-block">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade"  id="questions" role="tabpanel" aria-labelledby="questions-tab">
            Questions Tab
        </div>

        <div class="tab-pane fade"  id="answers" role="tabpanel" aria-labelledby="answers-tab">
            Answers Tab
        </div>

    </div>
</div>
@endsection