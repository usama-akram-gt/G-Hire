<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Message;
use App\Events\messagesEvent;
use Auth;

class Projects extends Controller
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

        //startProjectRecommendation();
        $projects=app('App\Http\Controllers\RecommendationSystem')->startProjectRecommendation();

        //check on how many he has applied via appliedprojects
        $dev_projects[] = DB::table('appliedprojects')->where('dev_id','=',auth()->id())->get();

        //check how much are on-going
        for ($i = 0; $i < count($dev_projects); $i++){
            foreach($dev_projects[$i] as $dev_project){
                $ongoingprojects[] = DB::table('ongoingprojects')->where('project_id','=',$dev_project->project_id)->where('dev_id','=',auth()->id())->get();
            }   
        }

        //now getting product-owner detials and projects details to show
        for ($i = 0; $i < count($ongoingprojects); $i++){
            foreach($ongoingprojects[$i] as $ongoingproject){
                $prodO_details[] = DB::table('users')->where('id','=',$ongoingproject->prodO_id)->get();
                $live_projects[] = DB::table('projects')->where('id','=',$ongoingproject->project_id)->get();
            }   
        }
        
        if(count($projects) > 0){
            return view('Developer.applytoprojects',compact('users','projects','live_projects'));
        }
        else{
            return view('Developer.applytoprojects',compact('users'));
        }
        //dd($projects);    
    } 

    public function postproject(){
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
        return view('ProductOwner.postproject',compact('users','live_projects'));
    } 


    public function activeProjects(Request $request,$id){
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

            //getting that specific project according to $id
            for ($i = 0; $i < count($live_projects); $i++){
                foreach($live_projects[$i] as $live_project){
                    $current_ongoing_project[] = DB::table('ongoingprojects')->where('project_id','=',$id)->get();
                }   
            }

            //Now getting that is any file related to that project has uploaded?
            for ($i = 0; $i < count($current_ongoing_project); $i++){
                foreach($current_ongoing_project[$i] as $current_ongoing_prj){
                    $files[] = DB::table('files')->where('project_id','=',$current_ongoing_prj->project_id)->get();
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

            //Info related to that single project
            for ($i = 0; $i < count($live_projects); $i++){
                foreach($live_projects[$i] as $live_project){
                    $current_ongoing_project[] = DB::table('ongoingprojects')->where('project_id','=',$id)->get();
                }   
            }
        }
        return view('activeproject',compact('users','current_ongoing_project','live_projects','files'));
    } 

    public function postnewproject(Request $request){   
        DB::table('projects')->insert([
            [ 'title' => $request->title,
            'description' => $request->description,
            'file' => 'Requirements.pdf',
            'catagory' => $request->catagory,
            'deliverytime' => $request->deliverytime,
            'budget' => $request->budget,
            'tags' => $request->tags,
            'userid_fk' => auth()->id()]
        ]);
        return response()->json(['title' => $request->tags],200);
    } 

    public function startTest(Request $request,$id,$catagory){
        $contacts = array();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as unread_count'))->where('from', '=', auth()->id())->where('read','=',false)->groupBy('to')->get();
        $contacts[] = Message::select('to',DB::raw('COUNT("to") as read_count'))->where('from', '=', auth()->id())->where('read','=',true)->groupBy('to')->get();
        $users = array();
        for ($i = 0; $i < count($contacts); $i++){
            foreach($contacts[$i] as $contact){
                $users[] = User::where('id', '=', $contact->to)->get();
            }   
        }
        $projects = DB::table('projects')->where('id','=',$id)->get();
        $tests = DB::table('tests')->where('catagory','=',$catagory)->inRandomOrder()->limit(10)->get();

        //check on how many he has applied via appliedprojects
        $dev_projects[] = DB::table('appliedprojects')->where('dev_id','=',auth()->id())->get();

        //check how much are on-going
        for ($i = 0; $i < count($dev_projects); $i++){
            foreach($dev_projects[$i] as $dev_project){
                $ongoingprojects[] = DB::table('ongoingprojects')->where('project_id','=',$dev_project->project_id)->where('dev_id','=',auth()->id())->get();
            }   
        }

        //now getting product-owner detials and projects details to show
        for ($i = 0; $i < count($ongoingprojects); $i++){
            foreach($ongoingprojects[$i] as $ongoingproject){
                $prodO_details[] = DB::table('users')->where('id','=',$ongoingproject->prodO_id)->get();
                $live_projects[] = DB::table('projects')->where('id','=',$ongoingproject->project_id)->get();
            }   
        }


        if(count($projects) > 0 && count($tests) > 0){
            return view('Developer.tests',compact('users','projects','tests','live_projects'));
        }
        else{
            return view('Developer.tests',compact('users'));
        }    
    } 


    public function applyForProject(Request $req,$id,$title){   
        $off=$req->input('offerings');
        $offm=$req->input('offeramount');
        $offt=$req->input('time');
        $data=array("project_id"=>$id,'dev_id'=>auth()->id(),'dev_username'=>Auth::user()->fname,'project_title'=>$title,'offerings'=>$off,
        'offeramount'=>$offm,'time'=>$offt);
        DB::table('appliedprojects')->insert($data);
        return back();
    } 

    public function getPostedProjects()
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
        $data['data']=DB::table('projects')->where('userid_fk',auth()->id())->get();
        //dd($data['data']);
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
        if(count($data)>0)
        {
            return view('ProductOwner.postedprojects',compact('data','users','live_projects'));
        }else{
            return view('ProductOwner.postedprojects');
        }
    }

    public function editProject(Request $req, $projid)
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
        DB::table('projects')->where('id', $projid)->where('userid_fk', auth()->id())->update(['title' => $req->input("title"),
        'description'=>$req->input("description"),
        'catagory'=>$req->input("catagory"),
        'budget'=>$req->input("budget"),
        'file'=>'Requirements.pdf',
        ]);
        $data['data']=DB::table('projects')->where('userid_fk',auth()->id())->get();
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
        return view('ProductOwner.postedprojects',compact('data','users','live_projects'));
    }


    public function getEmployeeList($projid)
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
        $data['data']=DB::table('appliedprojects')->where('project_id',$projid)->get();
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
        if(count($data)>0)
        {
            return view('ProductOwner.appliedemployee',compact('data','users','live_projects'));
        }else{
            return view('ProductOwner.appliedemployee');
        }
    }
}