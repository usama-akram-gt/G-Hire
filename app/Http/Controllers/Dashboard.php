<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Message;
use App\Events\messagesEvent;

class Dashboard extends Controller
{
    public function index()
    {
        $contacts = array();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as unread_count'))->where('from', '=', auth()->id())->where('read','=',false)->groupBy('to')->get();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as read_count'))->where('from', '=', auth()->id())->where('read','=',true)->groupBy('to')->get();
        $users = array();
        for ($i = 0; $i < count($contacts); $i++){
            foreach($contacts[$i] as $contact){
                $users[] = User::where('id', '=', $contact->to)->get();
            }   
        }
        return view('dashboard',compact('users'));
    }
}
