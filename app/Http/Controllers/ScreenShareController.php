<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use DB;
use App\User;

class ScreenShareController extends Controller
{
    //
    public function startScreenSharing(){
        $contacts = array();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as unread_count'))->where('from', '=', auth()->id())->where('read','=',false)->groupBy('to')->get();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as read_count'))->where('from', '=', auth()->id())->where('read','=',true)->groupBy('to')->get();
        $users = array();
        for ($i = 0; $i < count($contacts); $i++){
            foreach($contacts[$i] as $contact){
                $users[] = User::where('id', '=', $contact->to)->get();
            }   
        }

        //check he has uploaded any project or not?
        $projects[] = DB::table('projects')->where('userid_fk','=',auth()->id())->get();
        $ongoingprojects=array();
        $live_projects=array();
        //if he uploaded any project then check wether he accepts someone related to that project?
        for ($i = 0; $i < count($projects); $i++){
            foreach($projects[$i] as $project){
                $ongoingprojects[] = DB::table('ongoingprojects')->where('project_id','=',$project->id)->get();
            }   
        }


        //now get every developer detail against each live project
        for ($i = 0; $i < count($ongoingprojects); $i++){
            foreach($ongoingprojects[$i] as $ongoingproject){
                $dev_details[] = DB::table('users')->where('id','=',$ongoingproject->dev_id)->get();
                $live_projects[] = DB::table('projects')->where('id','=',$ongoingproject->project_id)->get();
            }   
        }

        $total_invested = 0;
        for ($i = 0; $i < count($live_projects); $i++){
            foreach($live_projects[$i] as $live_project){
                $budget = DB::table('projects')->where('id','=',$live_project->id)->get('budget');
                $total_invested += $budget[0]->budget;
            }   
        }

        return view('ScreenSharing',compact('users','live_projects'));
    }
}
