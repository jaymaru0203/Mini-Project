<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
          <!-- AOS -->
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
             box-sizing: border-box;
        }
        body{
            background-color: #e75d570d;
            color: #222;
            font-family: 'Raleway', sans-serif;
        }
        .topnav{
            height: 6vh;
            width: 100vw;
            background-color: #222;
            position: fixed;
            box-shadow: 0px 0.2px 5px #444;
        }
        #logo{
            height: 4vh;
            margin: 1vh 1vw;
        }
        .profile{
            float: right;
            margin: 2vh 3vw;
            font-size: 2vh;
            font-weight: 600;
            color: #fff;
        }
        /* Style the tab */
        .tab {
          float: left;
          background-color: #222;
          width: 20%;
          min-width: 160px;
          height: 94vh;
          padding-top: 5vh;
          position: fixed;
          top: 6vh;
        }
        h3, h2{
            text-align: center;
            margin: 0.5vh auto 2vh auto;
            color: #0f046c;
        }
        .tab h2{
          color: #eee;
        }
        hr{
            width: 75%;
            border: 0.5px solid #888;
            margin: 1vh auto 3vh auto;
        }
        
        /* Style the buttons inside the tab */
        .tab button {
          display: block;
          background-color: inherit;
          color: #eee;
          padding: 12px 16px;
          width: 100%;
          border: none;
          outline: none;
          text-align: left;
          cursor: pointer;
          transition: 0.3s;
          font-size: 18px;
        }
        /*#defaultOpen{}*/
        
        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #666;
        }
        
        /* Create an active/current "tab button" class */
        .tab button.active {
          background-color: #666;
          color: #fff;
        }
        i{
            cursor: pointer;
        }

        /*Transaction*/

        #boxx{
          display: grid;
          grid-template-columns: 1fr 1fr 1fr;
          padding: 3%;
        }

        .order-box{
          width: 97%;
          padding: 18px;
          border-radius: 8px ; 
          margin: 0px 15px;
          border: 1px solid #ccc;
          box-shadow: 0px 0px 48px -36px rgba(140,140,140,0.86);
        }

        h5.card-title{
          font-size: 17px;
          font-weight: 600;
          margin: 14px 0px;
          color: #212121;
        }

        h5.card-title span{
          font-size: 20px;
          font-weight: 400;
          color: #404040;
          padding-left: 5px; 
          margin: 0 3px;
        }



        .arrival-form{
            margin: 0;
            padding: 0;
        }

        .arrival-form input{
          margin: 5px 0px;
          padding: 5px 10px;
          height: 40px;
          font-size: 15px;
        }
        
        
        .status-btn {
            justify-content: space-between;
            display: flex;
            margin: 10px 0px 0px;
        }

        .accept{
            border: 0;
            outline: none;
            padding: 8px 2px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 3px solid #e75d57;
            border-radius: 7px;
            color: #fff;
            background: #e75d57;
            cursor: pointer;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            width: 100px;
            
        }
        .reject{
            border: 0;
            outline: none;
            padding: 8px 2px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 3px solid #e75d57;
            border-radius: 7px;
            color: #e75d57;
            background: #fff;
            cursor: pointer;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            width: 100px;
            

        }
        /* Style the tab content */
        .tabcontent {
          float: right;
          width: 73%;
          min-height: 80vh;
          background-color: #fff;
          margin: 3vw;
          margin-top: 6vw;
          overflow: auto;
        }

        form{
            padding: 3vw;
            margin: 0 0 3vw;
            background-color: #fff;
        }
        input{
            font-size: 16px;
            width: 100%;
            padding: 10px;
            border: none;
            border: 2px solid #ddd;
            border-radius: 5px;
            color: #444;
            margin-bottom: 40px;
            margin-top: 10px;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            background-color: #fff;
        }

        input:focus {
            outline: 0;
            border-color: #0f046c;
          }
          select{
            outline: 0;
            background-color: #fff;
            color: #444;
            font-size: 16px;
          }
          select:focus{
            border-color: #888;
            outline:none;
        }
        label {
            font-size: 18px;
            font-weight: bold;
            color: #444;
            margin-bottom: 15px;
          }
          .button {
            border: 0;
            outline: none;
            border-radius: 0;
            padding: 10px 0;
            font-size: 18px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 3px solid #e75d57;
            border-radius: 7px;
            color: #fff;
            background: #e75d57;
            cursor: pointer;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            width: 45%;
            margin: 10px 1.25%;
          }
          .button:hover, .button:focus { background: #e75d57; color: #fff; }
          ::placeholder{
            opacity: 0.7;
          }
          .grid-container{
            display: grid;
            grid-gap: 10px;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 15px;
            column-gap: 30px;
          }
          .grid-item{
              margin-right: 3vw;
              padding: 0.5vw;
              max-height: 3vw;
          }
          .muted-text{
            color: #aaa;
            font-size: 14px;
            margin: 2vw 1vw;
            display: inline;
          }
          .showAll{
            width: 100%;
            min-height: 20vh;
            background-color: #fff;
            padding: 2vw;
            overflow: auto;
          }
          table{
            width: 95%;
            margin: 2vw auto;
            overflow: auto;
            white-space: nowrap;
          }
          table, td, th{
            border-collapse: collapse;
            border: 0.2px solid #666;
            padding: 10px;
            text-align: center;
          }
          tr:nth-child(even){
            background-color: #fefefe;
          }
          .statistics{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            margin: 1vw auto;
            grid-gap: 4vw;
            padding: 2vw 2vw 0 2vw;
          }
          .cards{
            background-color: #eee;
            border-radius: 10px;
            padding: 1vw;
            height: 15vh;
            text-align: center;
            font-size: 24px;
          }
          .statText{
            font-size: 35px;
            color: #0f046c;
          }
          .button1 {
            border: 0;
            outline: none;
            border-radius: 0;
            padding: 10px 0;
            font-size: 18px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 3px solid #e75d57;
            border-radius: 7px;
            color: #fff;
            cursor: pointer;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            width: 25%;
            margin: auto auto;
            zoom: 0.7;
            background: #e75d57;
        }
        .button1:hover, .button1:focus { background: #e75d57; color: #fff; }

        .error{
            color: red;
            text-align: center;
            font-size: 16px;
            padding: 20px;
        }

        .edBtn{
            background: #0f046c;
            color: #fff;
        }

        /* MODAL CSS */

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.8);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @keyframes example {
            0%   {margin-top: -15%;}
            100% {margin-top: 5%}
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 10px;
            border: 1px solid #373435;
            width: 50%;
            border-radius: 15px;
            animation: example 0.3s ease-out;
        }

        .close, .closeEdit, .closeDeleteModal, .closeSal {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: 900;
            margin-right: 8px;
        }

        .close:hover, .close:focus, .closeEdit:hover, .closeEdit:focus, .closeDeleteModal:hover, .closeDeleteModal:focus, .closeSal:hover, .closeSal:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-label, .modal-input{
            font-size: 16px;
            font-weight: 500;
        }

        hr{
            width: 85%;
            border-bottom: 1px solid #0f046c;
        }
    </style>
</head>
<body>
<div class="topnav">
<img src="{{ asset('images/logo.png') }}" style="height: 100%;">
     <div class="profile" onclick="sidebar()"><i class="fa fa-bars" aria-hidden="true"></i></div>
     <div class="profile" >{{ session()->get('admin') }}</div>
</div>
<div class="tab">
    <h2>ADMIN</h2>
    <button class="tablinks" onclick="openCity(event, 'users')" id="defaultOpen">Users</button>
    <button class="tablinks" onclick="openCity(event, 'reportedQuestions')">Reported Questions</button>
    <button class="tablinks" onclick="openCity(event, 'reportedAnswers')">Reported Answers</button>
    <button class="tablinks" onclick="openCity(event, 'reportedUsers')">Reported Users</button>
    <a href="/login/" style="all: unset; color: inherit;"><button class="tablinks" onclick="openTab(event, 'logout')">Logout</button></a><br><br><hr><br>
</div>


<div id="users" class="tabcontent">

  @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block" style="width: 70%; margin: 5px auto;">
          <button type="button" class="close" data-dismiss="alert">×</button>	
              <strong>{{ $message }}</strong>
      </div>
  @endif
    <div class="showAll">
    <h2>All Users</h2>
    <table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>EMail ID</th>
        <th>Status</th>
        <th>Year</th>
        <th>Branch</th>
    </tr>

    @foreach($users as $user)

        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->user_email }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->year }}</td>
            <td>{{ $user->branch }}</td>
        </tr>

    @endforeach

    </table>

    </div>
</div>

<div id="reportedQuestions" class="tabcontent">
  <div class="showAll">
      <h2>Reported Questions</h2>
      <table>
      <tr>
          <th>ID</th>
          <th>Question</th>
          <th>Name of Questioner</th>
          <th>Email ID</th>
          <th>No. of Answers</th>
          <th>Delete Question</th>
      </tr>

          @foreach($reportedQ as $qs)

            <tr>
                <td>{{ $qs->question_id }}</td>
                <td>{{ $qs->question }}</td>
                <td>{{ $qs->name }}</td>
                <td>{{ $qs->email }}</td>
                <td>{{ \App\Http\Controllers\ReportController::getAnswerCount($qs->question_id) }}</td>
                <td><button style="padding: 5px;" class="edBtn" onclick="document.getElementById('{{ $qs->question_id }}').style.display='block'">Delete</button></td>
            </tr>

            <!-- Delete Modal -->
            <div id="{{ $qs->question_id }}" class="modal">
              <div class="modal-content">
                  <span class="closeDeleteModal" onclick="document.getElementById('{{ $qs->question_id }}').style.display='none'">&times;</span>
                  <form action="/delQs/{{ $qs->question_id }}" method="POST" style="margin-bottom: 10px;margin-top: -30px; background:none;">
                    @csrf
                    <h2 class="heading">Delete Question</h2>
                    <center><hr>
                        <h3>Are you sure you want to delete this Question by {{ $qs->name }}?</h3>
                        <input type="submit" value="Delete Question" name="delQs" class="button">
                    </center>
                  </form>
              </div>
            </div>
            @endforeach
      </table>
    </div>
</div>

<div id="reportedAnswers" class="tabcontent">
<div class="showAll">
    <h2>Reported Answers</h2>
    <table>
    <tr>
        <th>ID</th>
        <th>Answer</th>
        <th>Name of Answerer</th>
        <th>Email ID</th>
        <th>Delete Answer</th>
    </tr>

        @foreach($reportedA as $ans)

            <tr>
                <td>{{ $ans->answer_id }}</td>
                <td>{{ $ans->answer }}</td>
                <td>{{ $ans->name }}</td>
                <td>{{ $ans->email }}</td>
                <td><button style="padding: 5px;" class="edBtn" onclick="document.getElementById('{{ $ans->answer_id }}').style.display='block'">Delete</button></td>
            </tr>


            <!-- Delete Modal -->
            <div id="{{ $ans->answer_id }}" class="modal">
            <div class="modal-content">

                <span class="closeDeleteModal" onclick="document.getElementById('{{ $ans->answer_id }}').style.display='none'">&times;</span>

                <form action="/delAns/{{ $ans->answer_id }}" method="POST" style="margin-bottom: 10px;margin-top: -30px; background:none;">
                @csrf
                <h2 class="heading">Delete Answer</h2>
                <center><hr>
                    <h3>Are you sure you want to delete this Answer by {{ $ans->name }}?</h3>
                    <input type="submit" value="Delete Answer" name="delAns" class="button">
                </center>
                </form>

            </div>
            </div>
            @endforeach

    </table>

    </div>
</div>

<div id="reportedUsers" class="tabcontent">
    <div class="showAll">
        <h2>Reported Users</h2>
        <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email ID</th>
                <th>Action</th>
            </tr>

            @foreach($reportedU as $us)

                <tr>
                    <td>{{ $us->user_id }}</td>
                    <td>{{ $us->name }}</td>
                    <td>{{ $us->email }}</td>
                    <td>
                      <a href="/warnUser/{{ $us->user_id }}"><button style="padding: 5px;" class="edBtn">Warning</button></a> 
                      <button style="padding: 5px;" class="edBtn" onclick="document.getElementById('{{ $us->user_id }}').style.display='block'">Ban User</button>
                    </td>
                </tr>


                <!-- Delete Modal -->
                <div id="{{ $us->user_id }}" class="modal">
                    <div class="modal-content">

                        <span class="closeDeleteModal" onclick="document.getElementById('{{ $us->user_id }}').style.display='none'">&times;</span>

                        <form action="/banUser/{{ $us->user_id }}" method="POST" style="margin-bottom: 10px;margin-top: -30px; background:none;">
                        @csrf
                        <h2 class="heading">Ban User</h2>
                        <center><hr>
                            <h3>Are you sure you want to Ban {{ $us->name }}?</h3>
                            <input type="submit" value="Ban User" name="banUser" class="button">
                        </center>
                        </form>

                    </div>
                </div>
                @endforeach

        </table>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
   function sidebar(){
    var sidebars = document.getElementsByClassName("tab")[0];
    var maincontent = document.getElementsByClassName("tabcontent");
    if (sidebars.style.margin=="0px"){
    sidebars.style.margin = "-290px";
    
     for (i = 0; i < maincontent.length; i++) {
        maincontent[i].style.width = "96%";
      }
   }else{
       sidebars.style.margin = "0px";
    
     for (i = 0; i < maincontent.length; i++) {
        maincontent[i].style.width = "73%";
      }
   }
}

    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
</script>
    
</body>
</html>