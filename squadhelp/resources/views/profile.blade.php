@extends('Master.master')

@section('title','Profile')

@section('header')
<style>
    #prof-container {
        margin-top: 7em !important;
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
</style>
@endsection

@section('content')

<div id="prof-container" class="m-5 px-5 pb-0">
    <div class="row">
        <div class="col-2">
            
            <img src="{{asset('storage/uploads/'.session()->get('user_img'))}}" width="150" height="150" class="rounded-circle" />
        </div>
        <div class="col-6">
            <h3 class="mt-4 name">{{ $user->name }}</h3>
            <h4 class="username">{{ $user->status }}</h4>
            @if(session()->has("message"))
            <h4 class="username">{{session()->get("message")}}</h4>
            @endif
        </div>
        <div class="col-4 my-details">
            <h4 class="mt-4"><span class="font-weight-bold">Year -</span> {{$user->year}}</h4>
            <h4><span class="font-weight-bold">Branch - </span> {{$user->branch}}</h4>
        </div>
    </div>
    <hr class="mt-5" />
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active prof-nav-link pl-0" href="#">Edit Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link prof-nav-link" href="#">Your Questions</a>
        </li>

        <li class="nav-item">
            <a class="nav-link prof-nav-link" href="#">Your Answers</a>
        </li>
    </ul>
    <form class="edit-form mt-4" method="post" action="editprofile" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="col-md-6 pr-5">
                <label for="" class="form-label">Name</label>
            <!--     <?php
                $name = $user->name;
                ?> -->
                <input type="text" name="name" class="form-control" value="{{$user->name}}" />
                <span class="error">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="col-md-6 pl-4">
                <label for="" class="form-label">Email</label>
                <input type="email" name="user_email" class="form-control" value={{$user->user_email}} />
                <span class="error">@error('user_email'){{$message}}@enderror</span>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col-md-6 pr-5">
                <label for="" class="form-label">Branch</label>
                <br />
                <select name="branch" id="inputState" class="form-select form-control py-2">
                    <option value="0">Select Your Branch</option>
                    <option value="COMPS">COMPS</option>
                    <option value="ETRX">ETRX</option>
                    <option value="EXTC">EXTC</option>
                    <option value="IT">IT</option>
                    <option value="MECH">MECH</option>
                </select>
                <span class="error">@error('branch'){{$message}}@enderror</span>
            </div>
            <div class="col-md-6 pl-4">
                <label for="" class="form-label">Year</label>
                <br />
                <select name="year" id="inputState" class="form-select form-control py-2">
                    <option value="0">Select Year of Study</option>
                    <option value="FY">FY</option>
                    <option value="SY">SY</option>
                    <option value="TY">TY</option>
                    <option value="LY">LY</option>
                </select>
                <span class="error">@error('year'){{$message}}@enderror</span>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col-md-6 pr-5">
                <label for="" class="form-label">Old Password</label>
                <input name="old_password" type="password" class="form-control" placeholder="*********" />
                <span class="error">@error('old_password'){{$message}}@enderror</span>
            </div>
            <div class="col-md-6 pl-4">
                <label for="" class="form-label">New Password</label>
                <input name="new_password" type="password" class="form-control" placeholder="*********" />
                <span class="error">@error('new_password'){{$message}}@enderror</span>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col-3">
                <label for="" class="form-label">Profile Image</label>
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
@endsection