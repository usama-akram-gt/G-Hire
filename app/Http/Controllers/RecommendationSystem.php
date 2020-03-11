<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Message;
use App\Events\messagesEvent;
use Auth;

class RecommendationSystem extends Controller
{
    // for developer, displays list of projects based on specilization works fine 100%
    public function startProjectRecommendation(){
        $contacts = array();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as unread_count'))->where('from', '=', auth()->id())->where('read','=',false)->groupBy('to')->get();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as read_count'))->where('from', '=', auth()->id())->where('read','=',true)->groupBy('to')->get();
        $users = array();
        for ($i = 0; $i < count($contacts); $i++){
            foreach($contacts[$i] as $contact){
                $users[] = User::where('id', '=', $contact->to)->get();
            }   
        }
        
        //$spec=DB::table('specialization')->select('specialization')->where('userid_fk',auth()->id())->get();
        //dd($data['data']);
        //echo $spec;
        //$spec='web programming';
        //$spec='mobile applications';
        //$projects=DB::table('projects')->where('catagory',$spec)->get();
        $projects=DB::table('projects')
            ->wherein('catagory', function($query)
            {
                $query->select(DB::raw('specialization'))
                      ->from('specialization')
                      ->where('userid_fk','=',auth()->id());
            })
            ->get();
            
        return $projects; //returns to projects class
        //dd($projects);
        //echo $projects;
        /*if($projects->count() > 0){
            //return view('Developer.applytoprojects',compact('users','projects'));
            return $projects;
        }
        else{
            //return view('Developer.applytoprojects',compact('users'));
            return $projects;
        }*/
    }

    // for customer, finds the best suited developers list
    public function startDeveloperRecommendation(Request $req, $id, $catagory){
        $contacts = array();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as unread_count'))->where('from', '=', auth()->id())->where('read','=',false)->groupBy('to')->get();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as read_count'))->where('from', '=', auth()->id())->where('read','=',true)->groupBy('to')->get();
        $users = array();
        for ($i = 0; $i < count($contacts); $i++){
            foreach($contacts[$i] as $contact){
                $users[] = User::where('id', '=', $contact->to)->get();
            }   
        }

        //$spec=DB::table('specialization')->where('specialization',$catagory)->get();
        //echo $id;
        //echo $catagory;
        $devlist=DB::table('users')
        ->wherein('id', function($query) use ($catagory)
        {
            $query->select(DB::raw('userid_fk'))
                  ->from('specialization')
                  ->where('specialization', '=', $catagory);
        })
        ->get();
        foreach($devlist as $list)
        {
            $port=DB::table('portfolios')->where('userid_fk',$list->id)->get();
            $spec=DB::table('specialization')->where('userid_fk',$list->id)->get();
        }
        //dd($spec);
        //$ranks=DB::table('ranks')->where('dev_id',$data->userid_fk)->orderBy('rank', 'desc')->get();
        //$ranks=DB::table('ranks')->where('dev_id',1)->orderBy('rank', 'desc')->get();
        //$devlist=DB::table('users')->where('id',1)->get();
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
        //dd($live_projects);
        //exit();
        if(count($devlist)>0)
        {
            return view('ProductOwner.recommendeddevelopers',compact('devlist','port','spec','users','live_projects'));
        }
        else{
            return view('ProductOwner.recommendeddevelopers',compact('users','live_projects'));
        }
    }

    public function startProjectRecommendationNew(){
        $contacts = array();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as unread_count'))->where('from', '=', auth()->id())->where('read','=',false)->groupBy('to')->get();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as read_count'))->where('from', '=', auth()->id())->where('read','=',true)->groupBy('to')->get();
        $users = array();
        for ($i = 0; $i < count($contacts); $i++){
            foreach($contacts[$i] as $contact){
                $users[] = User::where('id', '=', $contact->to)->get();
            }   
        }
        
        $spec=DB::table('portfolios')->select('specialization')->where('userid_fk',auth()->id())->get();
        $spec='web programming';
        //$spec='mobile applications';
        $projects=DB::table('projects')->where('catagory','=',$spec)->get();
        //dd($projects);
        //echo $projects;
        if($projects->count() > 0){
            //sreturn view('Developer.applytoprojects',compact('users','projects'));
            return view('Developer.Dashboard',compact('projects'));
            //return $projects;
        }
        else{
            return view('Developer.Dashboard');
        }
    }
}
