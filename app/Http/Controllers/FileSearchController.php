<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileSearch;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use DB;

class FileSearchController extends Controller
{
    public function index()
    {
        
        $path = public_path('files');
        $files = File::allfiles($path);
        $count = 0;
        //$files = File::files($path);
        
        return view('search', compact('files','count'));
    }
    public function search(Request $request)
    {
        $word = $request->input('search');

        $path = public_path('files');
        $files = File::allfiles($path);
        $countw = 0;
        $req = $request->all();
        $data = new FileSearch;
        $results = [];
        foreach ($files as $file) {
          //  dump($file->getFileName());
            
            $fileContents = str_word_count($file->getContents(), 1);
            foreach ($fileContents as $fileContent) {
                $countw++;
                if (strcasecmp($fileContent, $word) == 0) {
                    if (isset($results[$file->getFileName()])) {
                        $results[$file->getFileName()] += 1;
                        
                    } else {
                        $results[$file->getFileName()] =1;
                    }
                } 
            }
        
        }
        arsort($results);
       // dd($results);
        return response()->view('search', compact('results','word','countw'));
    }
    public function delete_files(Request $request)
    {
        $path = public_path('files');
        $files = File::allfiles($path);
        File::delete($path.'/'.$request['file_delete']);
        return redirect()->route('dashboard');
    }

}
