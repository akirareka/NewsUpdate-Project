<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Masukan;
use Doctrine\ORM\Query\AST\WhereClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            if(Auth::user()->role == 'Admin'){
                $artikel = Artikel::latest()->get();
                return view('admin.artikel.show',compact('artikel'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
            }else{
                return redirect()->to('home')
                        ->with('error', 'Anda tidak memiliki akses');
            }
        
    }
    public function create()
    {
        if(Auth::user()->role == 'Admin'){
            return view('admin.artikel.add');
        }else{
            return redirect()->to('home')
                    ->with('error', 'Anda tidak memiliki akses');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'author' => 'required',
            'isi_artikel' => 'required',
            'category' => 'required',
            'ringkasan' => 'required',
            'foto' => 'required','mimes:jpeg,png,bmp,tiff |max:4096',
        ]);
        if ($request->hasfile('foto')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('images'), $filename);
        }
        Artikel::create([
            'judul' => $request->judul,
            'category' => $request->category,
            'author' => $request->author,
            'isi_artikel' => $request->isi_artikel,
            'ringkasan' => $request->ringkasan,
            'foto'=>$filename,
        ]);
        return redirect()->to('admin/artikel');
    }
    
    public function edit($id)
    {
        if(Auth::user()->role == 'Admin'){
        $artikel = Artikel::where('id',$id)->first();
        return view('admin.artikel.edit', compact('artikel'));
        }else{
            return redirect()->to('home')
                    ->with('error', 'Anda tidak memiliki akses');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'author' => 'required',
            'isi_artikel' => 'required',
            'category' => 'required',
            'ringkasan' => 'required',
        ]);

        $artikel = Artikel::findOrFail($request->id);
        if($request->file('foto') == ""){
            $artikel->update([
            'judul' => $request->judul,
            'category' => $request->category,
            'author' => $request->author,
            'isi_artikel' => $request->isi_artikel,
            'ringkasan' => $request->ringkasan,
            ]);
        }else{
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
            $request->file('foto')->move(public_path('images'), $filename);

            $artikel->update([
                'judul' => $request->judul,
                'category' => $request->category,
                'author' => $request->author,
                'isi_artikel' => $request->isi_artikel,
                'foto' => $filename,
                'ringkasan' => $request->ringkasan,
            ]);
        }
        return redirect()->to('admin/artikel');
    }

    public function destroy($id)
    {  
        if(Auth::user()->role == 'Admin'){
            Masukan::where('artikel_id',$id)->delete();
            $post = Artikel::findOrFail($id);
            $post->delete();
            return redirect()->to('admin/artikel');
        }else{
            return redirect()->to('home')
                    ->with('error', 'Anda tidak memiliki akses');
        }
    }
}