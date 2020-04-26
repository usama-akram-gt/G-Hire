<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Message;
use App\Events\messagesEvent;


class Profile extends Controller
{
    public function index(){
        $contacts = array();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as unread_count'))->where('from', '=', auth()->id())->where('read','=',false)->groupBy('to')->get();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as read_count'))->where('from', '=', auth()->id())->where('read','=',true)->groupBy('to')->get();
        $users = array();
        for ($i = 0; $i < count($contacts); $i++){
            foreach($contacts[$i] as $contact){
                $users[] = User::where('id', '=', $contact->to)->get();
            }   
        }
        $usertype = DB::table('users')->where('id','=',auth()->id())->get('usertype');
         if($usertype[0]->usertype == 'ProductOwner'){
            //check he has uploaded any project or not?
            $projects[] = DB::table('projects')->where('userid_fk','=',auth()->id())->get();

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

        }
        if($usertype[0]->usertype == 'Developer'){
            //check on how many he has applied via appliedprojects
            $projects[] = DB::table('appliedprojects')->where('dev_id','=',auth()->id())->get();

            //check how much are on-going
            for ($i = 0; $i < count($projects); $i++){
                foreach($projects[$i] as $project){
                    $ongoingprojects[] = DB::table('ongoingprojects')->where('project_id','=',$project->project_id)->where('dev_id','=',auth()->id())->get();
                }   
            }

            //now getting product-owner detials and projects details to show
            for ($i = 0; $i < count($ongoingprojects); $i++){
                foreach($ongoingprojects[$i] as $ongoingproject){
                    $prodO_details[] = DB::table('users')->where('id','=',$ongoingproject->prodO_id)->get();
                    $live_projects[] = DB::table('projects')->where('id','=',$ongoingproject->project_id)->get();
                }   
            }
        }
        return view('profile',compact('users','live_projects'));
    }
    
}
