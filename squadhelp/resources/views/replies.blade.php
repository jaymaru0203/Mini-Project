@extends('Master.master')


@section('title','Answers')

@section('header')
<style type="text/css">
 .report{
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

  .report a{
    color: unset;
    text-decoration:unset;
  }

  .votes{
    float: left;
    display: inline;
  }

  .question p{
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
  
  <div class="post-date">
    <p>{{$question->created_at}}</p>
  </div>
    
</div>

<!-- question -->
<div class="row question-info">
  <div class="col-11 question">
    <p style="text-transform:uppercase;">{{$question->question_content}}</p>
  </div>

</div>

</div>

<h2 class="answer-heading" style="margin-top:20px;text-transform:uppercase">Answers</h2>

@foreach($answers as $a)

<div class="post-container posted">

      <div class="userdetails-container">
      <div class="user-details">
          <h2 style="font-size:15px;font-weight: 700;margin-left:25px">User: {{ $a->answer_by }}</h2>
        </div>

        <div class="post-date">
          <p>{{$a->created_at}}</p>
        </div>
          
      </div>

      <!-- question -->
      <div class="row question-info">
        
        <div class="col-12 question">
          <p style="text-transform:uppercase;">{{$a->answer}}</p>
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
            <button class="report"><a href="/reportA/{{$a->answer_id}}">Report</a></button>
          </div>
        @endif

@endforeach


</div>

@endsection