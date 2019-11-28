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

        $projects = DB::table('projects')->get();
        if(count($projects) > 0){
            return view('Developer.applytoprojects',compact('users','projects'));
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
        return view('ProductOwner.postproject',compact('users'));
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
        
        if(count($data)>0)
        {
            return view('ProductOwner.postedprojects',compact('data','users'));
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
        return view('ProductOwner.postedprojects',compact('data','users'));
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

        if(count($data)>0)
        {
            return view('ProductOwner.appliedemployee',compact('data','users'));
        }else{
            return view('ProductOwner.appliedemployee');
        }
    }
}