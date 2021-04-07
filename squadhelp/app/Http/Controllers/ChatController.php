<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use App\Models\Nuser;

class ChatController extends Controller
{
    public function rooms(Request $req){
        $email = $req->session()->get('user');
        $sql = DB::select("SELECT * FROM chat_rooms WHERE email1='$email' OR email2='$email'");
        return view('chat', ['chat_rooms'=>$sql]);
    }

    public function chat($id){
        session(['chatRoomID'=>$id]);
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

    public function search(Request $req){
        $search = $req->searchContact;
        $sql = DB::select("SELECT * FROM Nusers WHERE name LIKE '%$search%'");
        return view('chat', ['searchUsers'=>$sql]);
    }

    public function createRoom($id){
        
        
        $email1 = session()->get('user');
        $result = Nuser::where('id','=',$id)->get();
        $email2 = $result[0]->user_email;

        $matchThese = ['email1' => $email1, 'email2' => $email2];
        $matchThese2 = ['email1' => $email2, 'email2' => $email1];
        $count1 = ChatRoom::where($matchThese)->count();
        $count2 = ChatRoom::where($matchThese2)->count();
        if($count1 == 0 && $count2 == 0){
            $room = new ChatRoom;
            $room->email1 = $email1;
            $room->email2 = $email2;
            $room->save();
            $result1 = ChatRoom::where($matchThese)->get();
            $idd = $result1[0]->id;
            return redirect('messages/'.$idd);
        }
        elseif($count1 != 0){
            $result1 = ChatRoom::where($matchThese)->get();
            $idd = $result1[0]->id;
            return redirect('messages/'.$idd);
        }
        else{
            $result1 = ChatRoom::where($matchThese2)->get();
            $idd = $result1[0]->id;
            return redirect('messages/'.$idd);
        }
  
        
    }
}
