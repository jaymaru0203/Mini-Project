@extends('Master.master')


@section('title','Answers')

@section('header')
<style type="text/css">
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

  .question p {
    font-weight: 500;
    font-size: 15px;
  }
</style>
@endsection

@section('content')

<div class="right-container">
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block" style="width: 70%;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  <h2 class="question-heading" style="text-transform:uppercase">Question</h2>

  <div class="post-container posted">

    <div class="userdetails-container">
      <div class="user-image">
        <img src="{{asset('storage/uploads')}}/{{\App\Http\Controllers\AuthController::getUser($question->user_email)->image}}" alt="">
      </div>

      <div class="user-details">


        <h1>{{ \App\Http\Controllers\AuthController::getUser($question->user_email)->name }}</h1>

        <h2>{{ \App\Http\Controllers\AuthController::getUser($question->user_email)->user_email }}</h2>

        @if($question->qsFor == "Teacher")
        <h2>Question For : {{ $question->qsFor }}s | {{ $question->branch }}</h2>
        @else
        <h2>Question For : {{ $question->year }} | {{ $question->branch }}</h2>
        @endif
      </div>

      <div class="post-date">
        <p>{{$question->created_at}}</p>
      </div>

    </div>

    <!-- question -->
    <div class="row question-info">
      <div class="col-11 question">
        <h4>{{$question->question_content}}</h4>
      </div>

    </div>

  </div>

  <h2 class="answer-heading" style="margin-top:20px;text-transform:uppercase">Answers</h2>

  @foreach($answers as $a)

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
        <p>{{$a->created_at}}</p>
      </div>

    </div>

    <!-- question -->
    <div class="row question-info">

      <div class="col-12 question">
        <h5>{{$a->answer}}</h5>
      </div>

    </div>
    <div class="votes">
      @if(\App\Http\Controllers\AnswerController::getVote($a->answer_id) > 0)
      <div style="float: left;padding-right:10px;font-size: 20px; "><i class="fas fa-arrow-up"></i> {{$a->upvote_count}}</div>
      <div style="float: left;padding-right:10px;font-size: 20px;"><i class="fas fa-arrow-down"></i> {{$a->downvote_count}}</div>
    </div>
    <button class="report"><a href="/reportA/{{$a->answer_id}}">Report</a></button>
  </div>
  @else
  <div style="float: left;padding-right:10px;font-size: 20px; "><a href="/upvote/{{$a->answer_id}}"><i class="fas fa-arrow-up"></i></a> {{$a->upvote_count}}</div>
  <div style="float: left;padding-right:10px;font-size: 20px;"><a href="/downvote/{{$a->answer_id}}"><i class="fas fa-arrow-down"></i></a> {{$a->downvote_count}}</div>
</div>
@if(\App\Http\Controllers\AuthController::getUser($a->answer_by)->status != "Teacher")
  <button class="report"><a href="/reportA/{{$a->answer_id}}">Report</a></button>
@endif
</div>
@endif

@endforeach


</div>

@endsection