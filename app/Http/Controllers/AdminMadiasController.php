<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;

class AdminMadiasController extends Controller
{
    //
    public function index(){
        
        $photos = Photo::all();
        
        return view('admin.media.index', compact('photos') );
        
    }
    public function create(){
        
        return view('admin.media.create');
    }
    
     public function store(Request $request){
        
        $file=$request->file('file');
        $name = time()."_".$file->getClientOriginalName();
        $file->move('images', $name);
         
        Photo::create(['path'=>$name]);
        
        return redirect('admin/media');
        // return  "upload";
    }
    
    public function destroy($id)
    {
        
        $photo = Photo::findOrFail($id);
        
        @unlink(public_path()."/images/".$photo->path);
        
        $photo->delete();
        
        return redirect('/admin/media');
        //
    }
    
    public function show($id)
    {
        //
    }

}
