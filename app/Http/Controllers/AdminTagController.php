<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class AdminTagController extends Controller
{
    public function index()
    {
        $data = [
            'tags' => Tag::orderBy('created_at', 'desc')->get(), // paginate the results
        ];
        return view('Admin.tag.index', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Tag::create([
            'nama' => $request->nama,
        ]);

        toast('Berhasil menambahkan data!','success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $tag = Tag::findOrFail($id);

        $tag->nama = $request->nama;

        $tag->save();
        toast('Berhasil mengubah data!','success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        toast('Berhasil menghapus data!','success');
        return redirect()->back();
    }

}
