<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Exports\MahasiswaExport;
use PDF;
use Excel;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function home_mahasiswa()
    {
        $data=DB::table('mahasiswa')->get();
        return view('mahasiswa', ['data'=>$data, 'latest'=>$this->getLatestData()]);
    }

    public function show_add() {
        return view('add', ['latest'=>$this->getLatestData()]);
    }


    private function getLatestData() {
        return DB::table('mahasiswa')->orderBy('NIM', 'desc')->first();
    }

    public function save(request $request)
    {
        $data=array("nim"=>$request->nim,
        "nama"=>$request->nama,
        "alamat"=>$request->alamat,
        "hp"=>$request->hp);

        $latest = $this->getLatestData();

        if ($latest != null && $latest->nim == $request->nim) {
            Session::flash('message', 'NIM ' . $request->nim . ' sudah digunakan.');
            Session::flash('alert', 'warning');
            return redirect('/mahasiswa')->with(array('status'=>false));
        }

        $data=Mahasiswa::create($data);

        $alert_msg = $data ? 'Berhasil mengubah data. NIM: ' . $request->nim : "Gagal menambahakan data.";
        $alert = $data ? "success" : "danger";

        Session::flash('message', 'Berhasil menambahkan data. NIM: ' . $request->nim);
        Session::flash('alert', 'success');
        return redirect('/mahasiswa')->with(array('status'=>true));
    }

    public function edit_data(request $request)
    {
        $data=Mahasiswa::where('nim', $request->nim)->update(array(
        "nama"=>$request->nama,
        "alamat"=>$request->alamat,
        "hp"=>$request->hp));

        $alert_msg = $data ? 'Berhasil mengubah data. NIM: ' . $request->nim : "Gagal menambahakan data.";
        $alert = $data ? "success" : "danger";

        Session::flash('message', $alert_msg);
        Session::flash('alert', $alert);
        return redirect('/mahasiswa')->with(array('status'=>true));
    }

    public function show_edit($nim)
    {
        $data=Mahasiswa::where('nim',$nim)->get();
        return view('edit', ['data'=>$data]);
    }

    public function delete($nim)
    {
        $data=Mahasiswa::where('nim', $nim)->delete();

        $alert_msg = $data ? 'Berhasil menghapus data. NIM: ' . $nim : "Gagal menghapus data.";
        $alert = $data ? "success" : "danger";

        Session::flash('message', 'Berhasil menghapus data. NIM: ' . $nim);
        Session::flash('alert', 'danger');
        return redirect('/mahasiswa')->with(array('status'=>true));
    }

    public function downloadPDF()
    {
        $data=Mahasiswa::all();
        $pdf = PDF::loadview('cetak_pdf', ['data'=>$data]);
        return $pdf->download('laporan-mahasiswa.pdf');
    }

    public function downloadExcel()
    {
        return Excel::download(new MahasiswaExport, 'laporan-mahasiswa.xlsx');
    }
}
