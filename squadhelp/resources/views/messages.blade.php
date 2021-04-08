
@extends('Master.master')

@section('title','Messages')

@section('header')

<style>

        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            outline: none;
        }
        .outer{
            margin-top: 70px;
        }
        .sidebar {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          left: 0;
          background-color: #fff;
          overflow-x: hidden;
          transition: 0.3s;
          box-shadow: 1px 0px 3px 0px #888;
        }
        a{
            all: unset;
        }
        
        .sidebar a {
          padding: 3% 5%;
          text-decoration: none;
          font-size: 22px;
          color: #777;
          display: block;
          transition: 0.3s;
          cursor: pointer;
          margin: 0;
        }
        
        .sidebar a:hover {
          color: #999;
          background: #eee;
        }
        #searchForm{
            position: sticky;
            width: 100%;
            background: #eee;
            font-size: 22px;
            color: #fff;
            box-shadow: 0px 1px 3px 0px #888;
        }

        #searchContact{
            border: 0.1px solid #999;
            width: 80%;
            border-radius: 25px;
            padding: 2%;
            font-size: 16px;
            margin: 3% 5%;
            outline: none;
            opacity: 0.7;
        }

        #searchButton{
            border: none;
            cursor: pointer;
            vertical-align: middle;
        }

        hr{
            margin: 0 auto;
            border-bottom: 0.1px solid #fefefe;
            opacity: 0.2;
        }
        
        .openbtn {
          font-size: 22px;
          cursor: pointer;
          color: #444;
          padding: 10px 15px;
          border: none;
          outline: none;
          margin-right: 5%;
          background: none;
        }

        #profilePicture{
            border: none;
            border-radius: 50%;
            width: 12%;
            margin: 0;
            margin-right: 5%;
            vertical-align: middle;
        }

        #notif{
            background: seagreen;
            border-radius: 50%;
            float: right;
            color: #fff;
            font-size: 12px;
            padding: 5% 10%;
            margin-bottom: 5%;
        }

        #chatDate{
            font-size: 18px;
            float: right;
            margin: 0 2% 0 0 ;
        }
        
        #main {
          background: #eee;
          transition: margin-left .3s;
          padding: 0;
          min-height: 95vh; /* CHANGE THIS ACCORDING TO NAVBAR HEIGHT */
        }

        #topbar{
            width: 100%;
            background: #ddd;
            font-size: 22px;
            color: #444;
            padding: 0.5%;
            box-shadow: 0px 1px 3px 0px #888;
            position: fixed !important;
            z-index: 999999;
        }

        #topbar #profilePicture{
            width: 45px;
            margin: 0 1%;
            float: right;
        }

        #chatForm{
            width: 100%;
            margin: 0;
            background: #fff;
            padding: 10px;
            position: fixed;
            bottom: 0;
            overflow: hidden;
        }
        #message{
            padding: 10px;
            color: #444;
            font-size: 18px;
            width: 85%;
        }
        #submit{
            width: 13%;
            background: #e7584f;
            color: #fff;
            font-size: 21px;
            border: none;
            cursor: pointer;
            padding: 10px 5px;
        }

        #chatContainer{
            width: 100%;
            display: inline-flex;
            flex-direction: column;
            overflow-x: hidden;
            overflow-y: auto;
            padding-bottom: 5%;
            padding-top: 5%;
        }

        .chatMessage{
            background: #fff;
            width: 40%;
            padding: 1%;
            font-size: 18px;
            color: #444;
            margin: 1% 0 1% 1.5%;
            border-radius: 15px 15px 15px 0px;
            box-shadow: 1px 1px 3px 0px #999;
        }
        .chatMessage2{
            background: #fbc6c4;
            width: 40%;
            padding: 1%;
            font-size: 18px;
            color: #444;
            margin: 1% 1% 1% 1.5%;
            border-radius: 15px 15px 0px 15px;
            box-shadow: -1px 1px 3px 0px #999;
            align-self: flex-end;
        }
        .time1{
            font-size: 12px;
            margin: -0.5% 0 0% 1.5%;
        }
        .time2{
            font-size: 12px;
            margin: -0.5% 1% 0% 1.5%;
            float: right !important;
            text-align: right;
        }
        
        @media screen and (max-width: 540px){
            #chatForm{
                zoom: 0.8;
            }
            #message{
                width: 75%;
            }
            #submit{
                width: 20%;
            }
            #chatContainer{
                padding-bottom: 15%;
            }
            .chatMessage, .chatMessage2{
                padding: 3%;
                margin: 1% 3%;
            }
            #searchContact{
                width: 70%;
            }
            .sidebar{
                padding-top: 15px;
            }
            .sidebar a{
              font-size: 18px;
            }
        }

    </style>

@endsection

@section('content')
<div class="outer">
      
      <div id="main">
        <div id="topbar">
        <?php 
            $conn = new mysqli('localhost', 'root' , '' , 'laravel');
            $email = session()->get('user');
            $id1 = session('chatRoomID');

            // $sql = "SELECT DISTINCT sender FROM chat_messages WHERE sender!='$email' AND chatRoomID='$id1'";
            $sql = "SELECT * FROM chat_rooms WHERE id='$id1' AND (email1='$email' OR email2='$email')";
            $res = $conn->query($sql);
            if($res->num_rows > 0){
            while($r=$res->fetch_assoc()){
                $em = $r['email1'];
                if($email == $em){
                    $em=$r['email2'];
                }
                $sql2 = "SELECT * FROM Nusers WHERE user_email='$em'";
                $result = $conn->query($sql2);
                while($re=$result->fetch_assoc()){ ?>
                    <img src="https://via.placeholder.com/150" id="profilePicture"> <h2><?php echo $re['name'] ?></h2>
                <?php }}}
                ?>
            
            <form action="/chatForm" method="post" id="chatForm">
                @csrf
                <input type="text" name="message" id="message" placeholder="Type your Message..">
                <input type="number" name="chatRoomID" id="chatRoomID" value="{{ $id }}" hidden>
                <button type="submit" id="submit">Send</button>
            </form>
        </div>
        <div id="chatContainer">
            @if(isset($chats))
                @foreach($chats as $msg)
                    @if($msg->sender == session()->get('user'))
                        <span class="chatMessage2">{{ $msg->message }}</span>
                        <span class="time2">{{ $msg->created_at }}</span>
                    @else
                        <span class="chatMessage">{{ $msg->message }}</span>
                        <span class="time1">{{ $msg->created_at }}</span>
                    @endif
                @endforeach
            @endif
        </div>
      </div>
      <hr id="endLine">
</div>

<script>
    setInterval(function(){
        $(" #chatContainer").load(" #chatContainer");
    }, 1000);

    // setInterval(function(){
    //         window.scrollTo(0,document.body.scrollHeight);
    //         document.getElementById('endLine').scrollIntoView;
    // }, 100);

    // var cont = document.getElementById("chatContainer");
    // setInterval(function(){
    //     var shouldScroll = cont.scrollTop + cont.clientHeight === cont.scrollHeight;
    //     if(shouldScroll){
    //         window.scrollTo(0,document.body.scrollHeight);
    //         document.getElementById('endLine').scrollIntoView;
    //     }
    // }, 10000);

    // document.getElementById("chatContainer").onload = (function(){
    //     window.scrollTo(0,document.body.scrollHeight);
    //     document.getElementById('endLine').scrollIntoView;
    // });
</script>

@endsection