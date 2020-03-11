<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\file;

class FileController extends Controller
{
    public function storeFile(Request $req,$id){
    	
    	if($req->hasFile('file')){
            $path = $req->file('file')->store('public');
            $filename = $req->file->getClientOriginalName();
    		$filesize = $req->file->getClientSize();
    		$file = new file();
    		$file->name = $filename;
    		$file->size = $filesize;
    		$file->project_id = $id;
    		$file->userid_fk = Auth::user()->id;
    		$file->save();	
    		return back();
    	}
    }
}
