<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\File;
use App\Models\ImportFile;
use Excel;

class FileController extends Controller
{
    public function index(){
        return view('app');
    }
    
    public function fileUpload(Request $request){
        $request->validate([
        'file' => 'required|mimes:csv,xls,xlsx|max:2048'
        ]);

        $fileUpload = new File;

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->file_path = '/storage/app/' . $filePath;
            $fileUpload->save();

            Excel::import(new ImportFile, $request->file('file'));
    
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
    }
}
