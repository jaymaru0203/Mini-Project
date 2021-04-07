<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    public function rooms(Request $req){
        $email = $req->session()->get('user');
        $sql = DB::select("SELECT * FROM chat_rooms WHERE email1='$email' OR email2='$email'");
        return view('chat', ['chat_rooms'=>$sql]);
    }

    public function chat($id){
        $sql = ChatMessage::where("chatRoomID",$id)->get();
        return view('messages', ["chats"=>$sql, "id"=>$id]);
    }

    public function message(Request $req){
        $msg = new ChatMessage();
        $msg->chatRoomID = $req->chatRoomID;
        $msg->message = $req->message;
        $msg->sender = $req->session()->get('user');
        $msg->save();
        $id = $req->chatRoomID;
        return redirect('messages/'.$id);
    }
}