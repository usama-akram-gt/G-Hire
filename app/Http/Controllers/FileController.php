<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\file;
use DB;

class FileController extends Controller
{
    public function storeFile(Request $req,$id){
    	
    	if($req->hasFile('file')){
            $path = $req->file('file')->store('public');
            $new_path = str_replace("public/", "", $path);
            $filename = $req->file->getClientOriginalName();
    		$filesize = $req->file->getClientSize();
    		$file = new file();
    		$file->name = $filename;
    		$file->size = $filesize;
            $file->path = $new_path;
    		$file->project_id = $id;
    		$file->userid_fk = Auth::user()->id;
    		$file->save();


            DB::table('ongoingprojects')->where('project_id', $id)->update(['status' => 'Submitted']);


    		return back();
    	}
    }

     public function filecontrolling(Request $req,$id){
        DB::table('ongoingprojects')->where('project_id', $id)->update(['status' => 'Endorsement']);
        return back();
    }
}
