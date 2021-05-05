@extends('Master.master')

@section('title','Profile')

@section('header')
<style>
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
        vertical-align: middle;
    }

    h2.typeQ {
        position: absolute;
        font-size: 16px;
        padding: 5px 10px;
        top: -20px;
        right: -10px;
        background-color: #ff2316;
        color: white;
        border-radius: 5px;
    }

    .report {
        float: right;
        border: none;
        background-color: #e63600;
        color: white;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 500;
        padding: 4px 8px;
        margin: 4px 5px 0 0;
    }

    .report a {
        color: unset;
        text-decoration: unset;
    }

    .votes {
        float: left;
        display: inline;
    }


    #prof-container {
        margin-top: 8em !important;
        margin-right: 10px;
        margin-left: 10px;
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

    button {
        outline: none;
    }

    button:focus {
        outline: none;
    }

    .nav-tabs .nav-link.active {

        color: #e5564d;
        background-color: #f2f2f2;
        border-color: #f2f2f2 #f2f2f2;
        border-bottom: 3px solid #e5564d;
    }

    .nav-tabs .nav-link.active:hover {
        border-color: #f2f2f2 #f2f2f2;
        border-bottom: 3px solid #e5564d;
    }

    .nav-tabs .nav-link:hover {
        border: none;
    }

    .nav-tabs .nav-link {
        padding: 10px 50px;
    }

    .nav-tabs .nav-item button:focus {
        outline: none;
    }

    .nav-link {
        background-color: #f2f2f2;
        font-size: 1.4rem;
        font-weight: 600;
        letter-spacing: 1px;
        color: #636262;
    }

    .nav-tabs {
        border: none;
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

        .nav-tabs .nav-link {
            padding: 10px 30px;
        }

        .nav-link {
            background-color: #f2f2f2;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1px;
            color: #636262;
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

    @media only screen and (max-width: 730px) {
        .nav-tabs .nav-link {
            padding: 10px 20px;
        }

        .nav-link {
            background-color: #f2f2f2;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #636262;
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

        h2.typeQ {
            position: absolute;
            font-size: 14px;
            padding: 5px 10px;
            top: -25px;
            right: -15px;
            background-color: #ff2316;
            color: white;
            border-radius: 5px;
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
<div id="pre-loader" class="loader-container">
    <div id="loader">
        <img src="{{ asset('images/loader1.gif') }}">
    </div>
</div>

<div id="prof-container" class="px-5 pb-0">
    @if(session()->has("smessage"))
    <div class="mb-4 alert alert-success alert-block" style="width: 100%;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{session()->get("smessage")}}</strong>
    </div>
    @elseif(session()->has("emessage"))
    <div class="mb-4 alert alert-danger alert-block" style="width: 100%;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{session()->get("emessage")}}</strong>
    </div>
    @endif


    <div class="row">
        <div class="col-2">
            <img src="{{asset('storage/uploads/'.session()->get('user_img'))}}" class="rounded-circle my-img" />
        </div>
        <div class="col-6 details">
            <h3 class="detail-top name">{{ $user->name }}</h3>
            <h3 class="username">{{ $user->status }}</h3>
        </div>
        <div class="col-4 my-details">
            <h3 class="detail-top my-data"><span class="font-weight-bold">Branch - </span> {{$user->branch}}</h3>
            @if($user->status == "Student")
            <h3 class="my-data"><span class="font-weight-bold">Year -</span> {{$user->year}}</h3>
            @endif
        </div>
    </div>

    <hr class="mt-5" />

    <ul class="nav nav-tabs justify-content-center mt-5 submenu" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link  active" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="questions-tab" data-toggle="tab" data-target="#questions" type="button" role="tab" aria-controls="questions" aria-selected="false">Your Questions</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link " id="answers-tab" data-toggle="tab" data-target="#answers" type="button" role="tab" aria-controls="answers" aria-selected="false">Your Answers</button>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form class="edit-form mt-4" method="post" action="editprofile">
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
                <div class="mt-5 btn-div">
                    <button type="submit" class="btn my-btn btn-lg btn-block">
                        Save Changes
                    </button>
                </div>
            </form>

            <form class="edit-form mt-4" method="post" action="editimage" enctype="multipart/form-data">
                @csrf
                <div class="form-row mt-4">
                    <div class="col my-col3">
                        <label for="" class="form-label">Profile Image</label><br>
                        <input class="mt-2" name="image" type="file" />
                        <span class="error">@error('image'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="mt-5 btn-div">
                    <button type="submit" class="btn my-btn btn-lg btn-block">
                        Edit Image
                    </button>
                </div>
            </form><br><br><br>

        </div>

        <div class="tab-pane fade" id="questions" role="tabpanel" aria-labelledby="questions-tab">
            <!-- posted questions -->

            @foreach($question as $q)
            <div class=" d-flex justify-content-center">
                <div class="post-container posted mb-3">

                    <div class="userdetails-container">
                        <div class="user-image">


                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'laravel');
                            $email = session()->get('user');

                            $sql = "SELECT * FROM nusers WHERE user_email='$email'";
                            $res = $conn->query($sql);
                            if ($res->num_rows > 0) {
                                while ($r = $res->fetch_assoc()) { ?>

                                    <img src="{{asset('storage/uploads')}}/<?php echo $r['image']; ?>" alt="">


                        </div>

                        <div class="user-details">
                            <h1><?php echo $r['name']; ?></h1>
                    <?php }
                            } ?>
                    @if($q->qsFor == "Teacher")
                    <h2>Question For : {{ $q->qsFor }}s | {{ $q->branch }}</h2>
                    @else
                    <h2>Question For : {{ $q->year }} | {{ $q->branch }}</h2>
                    @endif
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
                        @if(($user->branch == $q->branch || $q->branch == "All") && (( ($user->status == "Student" && $q->qsFor == "Student") && ($user->year == $q->year || $q->year == "All")) || ($user->status == "Teacher" && $q->qsFor == "Teacher")))
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
                        <form>
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
            </div>
            @endforeach

        </div>

        <div class="tab-pane fade" id="answers" role="tabpanel" aria-labelledby="answers-tab">

            @foreach($answers as $a)
            <div class="d-flex justify-content-center">
                <div class="post-container posted">

                    <div class="userdetails-container">
                        <div class="user-image">
                            <img src="{{asset('storage/uploads')}}/{{\App\Http\Controllers\AuthController::getUser($a->answer_by)->image}}" alt="">

                        </div>
                        <div class="user-details">


                            <h1>{{ \App\Http\Controllers\AuthController::getUser($a->answer_by)->name }}</h1>

                            <h2>{{ \App\Http\Controllers\AuthController::getUser($a->answer_by)->user_email }}</h2>

                            <h2>{{ \App\Http\Controllers\AuthController::getUser($a->answer_by)->status }} of {{ \App\Http\Controllers\AuthController::getUser($a->answer_by)->branch }} | {{ \App\Http\Controllers\AuthController::getUser($a->answer_by)->year }}</h2>
                        </div>

                        <div class="post-date">
                            <a href="allanswers/{{ \App\Http\Controllers\AnswerController::getAnswer($a->answer_id)->question_id }}">
                                <h2 class="typeQ">Question</h2>
                            </a>
                            <p>{{$a->created_at}}</p>
                        </div>

                    </div>

                    <!-- question -->
                    <div class="row question-info">

                        <div class="col-12 question">
                            <p>{{$a->answer}}</p>
                        </div>

                    </div>
                    <div class="votes">
                        @if(\App\Http\Controllers\AnswerController::getVote($a->answer_id) > 0)
                        <div style="float: left;padding-right:10px;font-size: 20px; "><i class="fas fa-arrow-up"></i> {{$a->upvote_count}}</div>
                        <div style="float: left;padding-right:10px;font-size: 20px;"><i class="fas fa-arrow-down"></i> {{$a->downvote_count}}</div>
                    </div>
                    <!-- <button class="report"><a href="/reportA/{{$a->answer_id}}">Report</a></button> -->
                </div>
                @else
                <div style="float: left;padding-right:10px;font-size: 20px; "><a href="/upvote/{{$a->answer_id}}"><i class="fas fa-arrow-up"></i></a> {{$a->upvote_count}}</div>
                <div style="float: left;padding-right:10px;font-size: 20px;"><a href="/downvote/{{$a->answer_id}}"><i class="fas fa-arrow-down"></i></a> {{$a->downvote_count}}</div>
            </div>
            <!-- <button class="report"><a href="/reportA/{{$a->answer_id}}">Report</a></button> -->
        </div>
        @endif
    </div>
    @endforeach

</div>

</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    jQuery(window).on('load', function() {
        jQuery('#pre-loader').delay(1200).fadeOut();
    });
</script>
@endsection