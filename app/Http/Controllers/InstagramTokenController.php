<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstagramToken;

class InstagramTokenController extends Controller
{
    public function index()
    {
        $data = [
            'instagram_tokens' => InstagramToken::orderBy('created_at', 'desc')->get(),
        ];
        return view('Admin.instagram-token.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'access_token' => 'required|string',
        ]);

        InstagramToken::create([
            'access_token' => $request->access_token,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'access_token' => 'required|string',
        ]);

        InstagramToken::updateOrCreate([], ['access_token' => $request->access_token]);

        toast('Berhasil memperbarui data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $token = InstagramToken::findOrFail($id);
        $token->delete();

        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
