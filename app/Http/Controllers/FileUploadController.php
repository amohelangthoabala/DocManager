<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Session;
use DB;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }
    
    public function store(Request $request)
    {
         /*
        $validatedData = $request->validate([
         'file' => 'required|file|mimes:txt,pdf,png,jpg|max:2048',
        
        ]);*/
        $file = $request->file('file');
        $fileModel = new File;
        
        //$fileModel = $request->file('file')->getClientOriginalName();
        $fileModel = time().'_'.$file->getClientOriginalName();

        $fname = $file->getFileName();
        $fsize = $file->getSize();
 
        //$fileModel = $request->file('file')->store('public/files');
        
        $location = 'files';
      
        // Upload file
        $file->move($location,$fileModel);

        $values = array('name' => $fname,'size' => $fsize);
        $savef = File::create($values);
        //DB::table('files')->insert($values);

        return redirect('dashboard');
 
    }
}
