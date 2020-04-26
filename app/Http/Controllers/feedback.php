<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Message;
use App\Events\messagesEvent;
use Auth;

class feedback extends Controller
{
    public function storeFeedback(Request $req,$id,$pid)
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
        $rpt=$req->input("resptime");
        $comm=$req->input("comm");
        $recommend=$req->input("recommend");
        $remarks=$req->input("remarks");
        $stars=$req->input("stars");
        //echo  $id;
        //write insert data code from here...
        $data=array("stars"=>$stars,'responsetime'=>$rpt,'communincation'=>$comm,
        'recommend'=>$recommend,'remarks'=>$remarks,'dev_id'=>$id,'prodOid_fk'=>auth()->id());
        DB::table('feedbacks')->insert($data);
        DB::table('ongoingprojects')->where('project_id', $pid)->update(['status' => 'Complete']);
        return back();
    }
    public function givefeedback()
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
        return view('ProductOwner.feedback',compact('users'));
    }
}
