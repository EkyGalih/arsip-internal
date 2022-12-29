<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Files::paginate(10);
        return view('welcome', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files      = $request->file('berkas');
        $ext        = array('xls', 'xlsx', 'pdf', 'doc', 'docx');
        $filename   = $request->kategori . '-' . $files->getClientOriginalName();

        if (in_array($files->getClientOriginalExtension(), $ext)) {
            if ($files->getSize() < 5000000) {
                $files->move('berkas/', $filename);
                $request->berkas = 'berkas/' . $filename;
            } else {
                Session::put('warning', 'Berkas Lebih Besar dari 5MB');
                return redirect()->back();
            }
            Files::create([
                'nama_files' => $request->berkas,
                'bidang_id' => $request->bidang_id,
                'kategori' => $request->kategori,
                'diupload_oleh' => Helpers::GetMac()
            ]);
            Session::put('success', 'Berkas sudah diunggah!');
            return redirect()->back();
        } else {
            Session::put('warning', 'Extensi Berkas Tidak Sesuai, hanya berkas dengan extensi (xls, xlsx, pdf, doc, docx)');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berkas     = Files::findOrFail($id);
        $files      = $request->file('berkas');

        if ($files == null) {
            $berkas->update([
                'bidang_id' => $request->bidang_id,
                'kategori' => $request->kategori,
                'diupload_oleh' => Helpers::GetMac()
            ]);
            Session::put('success', 'Berkas berhasil diubah!');
            return redirect()->back();
        } else {
            $ext        = array('xls', 'xlsx', 'pdf', 'doc', 'docx');
            $filename   = $request->kategori . '-' . $files->getClientOriginalName();

            if (in_array($files->getClientOriginalExtension(), $ext)) {
                if ($files->getSize() < 5000000) {
                    unlink($berkas->nama_files);
                    $files->move('berkas/', $filename);
                    $request->berkas = 'berkas/' . $filename;
                } else {
                    Session::put('warning', 'Berkas Lebih Besar dari 5MB');
                    return redirect()->back();
                }
                $berkas->update([
                    'nama_files' => $request->berkas,
                    'bidang_id' => $request->bidang_id,
                    'kategori' => $request->kategori,
                    'diupload_oleh' => Helpers::GetMac()
                ]);
                Session::put('success', 'Berkas diubah!');
                return redirect()->back();
            } else {
                Session::put('warning', 'Extensi Berkas Tidak Sesuai, hanya berkas dengan extensi (xls, xlsx, pdf, doc, docx)');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Files::findOrFail($id);

        unlink($file->nama_files);
        $file->delete();
        Session::put('success', 'Berkas dihapus!');
        return redirect()->back();
    }
}
