<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Projek;
use App\Models\Solutions;
use App\Models\GambarProjek;
use App\Models\GambarSubsolution;
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
            'description3' => 'nullable|string',
            'video' => 'nullable|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $subsolution = SubSolutions::create([
            'nama' => $request->input('nama'),
            'solution_id' => $request->input('solution_id'),
            'description1' => $request->input('description1'),
            'description2' => $request->input('description2'),
            'description3' => $request->input('description3'),
            'video' => $request->input('video'),
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('public/subsolution_images', $fileName);
                $imageName = 'subsolution_images/' . $fileName;

                GambarSubsolution::create([
                    'subsolution_id' => $subsolution->id,
                    'gambar' => $imageName,
                ]);
            }
        }

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->route('sub-solutions.index')->with('success', 'Sub Solutions berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $subSolution = SubSolutions::with('gambar')->findOrFail($id);
        $solutions = Solutions::all();
        return view('Admin.sub-solutions.edit', compact('subSolution', 'solutions'));
    }



    public function update(Request $request, $id)
    {
        $subSolution = SubSolutions::with('gambar')->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'solution_id' => 'required|exists:solution,id',
            'description1' => 'nullable|string',
            'description2' => 'nullable|string',
            'description3' => 'nullable|string',
            'video' => 'nullable|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $subSolution->update($request->only([
            'nama', 'solution_id', 'description1', 'description2', 'description3', 'video'
        ]));

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $imagePath = $file->storeAs('subsolution_images', $fileName, 'public');
                GambarSubsolution::create([
                    'subsolution_id' => $subSolution->id,
                    'gambar' => $imagePath,
                ]);
            }
        }

        $subSolution->save();

        toast('Berhasil mengubah data!', 'success');
        return redirect()->back()->with('success', 'Sub Solutions berhasil diubah.');
    }

    public function removeImage(Request $request, $id)
    {
        $imageId = $request->input('image_id');
        $subsolution = SubSolutions::findOrFail($id);
        $image = GambarSubsolution::find($imageId);
        if ($image && $image->subsolution_id == $subsolution->id) {
            Storage::disk('public')->delete($image->gambar);
            $image->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Image not found or not part of the project.'], 404);
    }

    public function destroy($id)
    {
        $subSolution = SubSolutions::findOrFail($id);
        foreach ($subSolution->gambar as $image) {
            if (Storage::disk('public')->exists($image->gambar)) {
                Storage::disk('public')->delete($image->gambar);
            }
            $image->delete();
        }

        $subSolution->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
