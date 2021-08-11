<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    
     */
    public function index()
    {
        // tampil data
        $blogs = Blog::all();
        return view('/index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()

    {
        return view('tambah');
    }

    public function simpan(Request $request){
        $request->validate([
            'gambar' => 'required',
            'judul' => 'required',
            'conten' => 'required',
      
        ]);

        // $sendgambar = $request->gambar->getClientOriginalName().'_'. time().'_'. $request->gambar->extension();
        // $request->gambar->move(public_path('images'),$sendgambar);
        Blog::create([
            'gambar'=>$request['gambar'],
            'judul'=>$request['judul'],
            'conten'=>$request['conten'],
        
        ]);
        return redirect('/index')->with('status','Data Berhasil Di Tambah');
    }

    public function delete(Request $request,$id){
        $blogs = Blog::find($id);
        $blogs->delete();
        return redirect('index')->with('status','data berhasil di hapus');

    }

    
    public function edit($id){
        $blogs = Blog::where('id' , $id)->first();
        return view('edit' , compact('blogs'));
    }
    
    public function update(Request $request,$id){
        $blogs = Blog::find($id);
        $blogs->gambar = $request->gambar;
        $blogs->judul = $request->judul;
        $blogs->conten = $request->conten;
        if($request->gambar == ''){
            $blogs->save();
            return redirect('index')->with('status','data berhasil di ubah');
        }
        else{
            $blogs->gambar = $request->gambar;

            $blogs->save();
            return redirect('index')->with('status','data berhasil di ubah');

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
