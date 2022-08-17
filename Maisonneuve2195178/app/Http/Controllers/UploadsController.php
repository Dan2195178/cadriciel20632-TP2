<?php

namespace App\Http\Controllers;

use App\Models\ShareFile;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;


class UploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = ShareFile::all();
        
        return view('upload_file.index', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        return  view('upload_file.create');
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        //
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }

        $request->validate([
            'title' => 'required|min:2',
            'date' => 'required',
            'file_url' => 'required|mimes:zip,pdf,doc,docx|max:2048',
           

        ]);

        //upload to directory public/uploads
        if ($request->hasFile('file_url') && $request->file('file_url')->isValid()) {
          
            // renommer
            $filename = sha1(time() . rand(100000, 999999)) . '.' . $request->file('file_url')->extension();
           
            dump($filename);
           
            // déplacer
            $filepath = 'uploads/';
          
            $request->file('file_url')->move($filepath, $filename);
            $file_url = $filepath.$filename;
           $file_extension =$request->file('file_url')->getClientOriginalExtension()?? '';
        }
   
   
        //insert to DB
        $newFile = ShareFile::create([
            'title' => $request->title,
            'date' => $request->date,
            'user_id' => $user_id,
            'file_url' => $file_url,
            'file_extension' => $file_extension
        ]);
       
     
         return redirect(route('upload.index'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShareFile  $shareFile
     * @return \Illuminate\Http\Response
     */
    public function show(ShareFile $shareFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShareFile  $shareFile
     * @return \Illuminate\Http\Response
     */
    public function edit(ShareFile $shareFile)
    {
        
       return view('upload_file.edit', ['file' => $shareFile]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShareFile  $shareFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShareFile $shareFile)
    {
        $shareFile->update([
            'title' => $request->title
            
        ]);

        return redirect(route('upload.index', $shareFile->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShareFile  $shareFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShareFile $shareFile)
    {
          //supprimer le fichier physique du répertoire public et enlever l'enregistremnt associé à ce fichier du DB
   

     $shareFile = ShareFile::find($shareFile->id);
     $url = $shareFile->file_url;
     //relevé du l'espace commun
     $shareFile->delete($url);
     //relevé du DB
     $shareFile->delete();


      return redirect(route('upload.index'));
    }

    public function downloadFile($shareFile)
    {
       return response()->download($shareFile);
        // if (file_exists($file_path))
        //     
        // else
        //    return back()->with('error404', 'Failed to find that resource');
    }
}
