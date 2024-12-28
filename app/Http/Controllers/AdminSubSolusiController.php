<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Projek;
use App\Models\Solutions;
use App\Models\GambarProjek;
use App\Models\SubSolutions;
use Illuminate\Http\Request;
use App\Models\KategoriProjek;
use Illuminate\Support\Facades\Storage;

class AdminSubSolusiController extends Controller
{
    public function index()
    {
        $data = [
            'subsolutionss' => SubSolutions::orderBy('created_at', 'desc')->get(),
            'solutions' => Solutions::all(),
        ];
        return view('Admin.sub-solutions.index', $data);
    }

    public function create()
    {
        return view('Admin.sub-solutions.create', [
            'solutions' => Solutions::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'solution_id' => 'required|exists:solution,id',
            'description1' => 'nullable|string',
            'description2' => 'nullable|string',
            'video' => 'nullable|string',
        ]);

        $subsolution = SubSolutions::create([
            'nama' => $request->input('nama'),
            'solution_id' => $request->input('solution_id'),
            'description1' => $request->input('description1'),
            'description2' => $request->input('description2'),
            'video' => $request->input('video'),
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->route('sub-solutions.index')->with('success', 'Sub Solutions berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $subSolution = SubSolutions::findOrFail($id);
        $solutions = Solutions::all();
        return view('Admin.sub-solutions.edit', compact('subSolution', 'solutions'));
    }



    public function update(Request $request, $id)
    {
        $subSolution = SubSolutions::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'solution_id' => 'required|exists:solution,id',
            'description1' => 'nullable|string',
            'description2' => 'nullable|string',
            'video' => 'nullable|string',
        ]);

        $subSolution->update($request->only([
            'nama', 'solution_id', 'description1', 'description2', 'video'
        ]));

        $subSolution->save();

        toast('Berhasil mengubah data!', 'success');
        return redirect()->back()->with('success', 'Sub Solutions berhasil diubah.');
    }

    public function destroy($id)
    {
        $subSolution = SubSolutions::findOrFail($id);

        $subSolution->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
