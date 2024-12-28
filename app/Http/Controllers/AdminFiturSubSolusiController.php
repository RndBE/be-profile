<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Projek;
use App\Models\Solutions;
use App\Models\GambarProjek;
use App\Models\SubSolutions;
use Illuminate\Http\Request;
use App\Models\KategoriProjek;
use App\Models\FiturSubSolutions;
use Illuminate\Support\Facades\Storage;

class AdminFiturSubSolusiController extends Controller
{
    public function index()
    {
        $data = [
            'fitursubsolutionss' => FiturSubSolutions::orderBy('created_at', 'desc')->get(),
            'subsolutions' => SubSolutions::all(),
        ];
        return view('Admin.fitur-sub-solutions.index', $data);
    }

    // public function create()
    // {
    //     return view('Admin.fitur-sub-solutions.create', [
    //         'subsolutions' => SubSolutions::all(),
    //     ]);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'sub_solution_id' => 'required|exists:sub_solution,id',
        ]);

        // Menangani Icon
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('public/solutions/icon-fitur-subsolution', $fileName);
            $iconPath = 'solutions/icon-fitur-subsolution/' . $fileName;
        }

        // Simpan data ke database
        FiturSubSolutions::create([
            'nama' => $request->nama,
            'description' => $request->description,
            'icon' => $iconPath,
            'sub_solution_id' => $request->sub_solution_id,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }


    // public function edit($id)
    // {
    //     $subSolution = SubSolutions::findOrFail($id);
    //     $solutions = Solutions::all();
    //     return view('Admin.sub-solutions.edit', compact('subSolution', 'solutions'));
    // }



    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'sub_solution_id' => 'required|exists:sub_solution,id',
        ]);
        $fitursubsolution = FiturSubSolutions::findOrFail($id);
        if ($request->hasFile('icon')) {
            if ($fitursubsolution->icon && Storage::exists('public/' . $fitursubsolution->icon)) {
                Storage::delete('public/' . $fitursubsolution->icon);
            }
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('public/solutions/icon-fitur-subsolution', $fileName);
            $fitursubsolution->icon = 'solutions/icon-fitur-subsolution/' . $fileName;
        }
        $fitursubsolution->nama = $request->nama;
        $fitursubsolution->description = $request->description;
        $fitursubsolution->sub_solution_id = $request->sub_solution_id;
        $fitursubsolution->save();

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $fitursubSolution = FiturSubSolutions::findOrFail($id);

        $fitursubSolution->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
