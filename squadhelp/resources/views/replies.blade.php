@extends('Master.master')

@section('title','Answers')

@section('content')

<div class="right-container">

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
          <h2 style="font-size:15px;margin-left:25px">User: {{ $a->answer_by }}</h2>
        </div>

        <div class="post-date">
          <p>{{$a->created_at}}</p>
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
          <p style="text-transform:uppercase;">{{$a->answer}}</p>
        </div>

      </div>
      </div>

@endforeach


</div>

@endsection