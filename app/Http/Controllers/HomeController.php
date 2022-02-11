<?php

namespace App\Http\Controllers;

use App\Exports\DAtaMhsExport;
use App\Imports\DataMhsImport;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users'  => Mahasiswa::latest()->paginate(5)->withQueryString()
        ]);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file'  => 'required|mimes:csv,xls,xlsx'
        ]);
        Excel::import(new DataMhsImport(), $request->file('file'));
        return redirect('/dashboard')->with('msg', 'Data Berhasil Diimport');
    }

    public function export()
    {
        return Excel::download(new DAtaMhsExport, 'mhs.xlsx');
    }

    public function delete()
    {
        Mahasiswa::truncate();
        return redirect('/dashboard')->with('msg', 'Data Mahasiswa Berhasil Dihapus');
    }
}
