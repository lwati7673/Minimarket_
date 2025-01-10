<?php

namespace App\Livewire;

use App\Models\Produk as ModelProduk;
use Livewire\Component;
use LiveWire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Produk as ImportProduk;



class Produk extends Component
{
    use WithFileUploads;
    public $pilihanMenu ='lihat';
    public $nama;
    public $kode;
    public $harga;
    public $stok;
    public $produkTerpilih;
    public $fileExcel;

    public function importExcel(){
        Excel::import(new ImportProduk, $this->fileExcel);
        $this->reset();
    }

    public function pilihEdit($id){
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->nama = $this->produkTerpilih->nama;
        $this->kode = $this->produkTerpilih->kode;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok = $this->produkTerpilih->stok;
        $this->pilihanMenu = 'edit';

}

public function simpanEdit(){
    $this->validate([
        'nama' => 'required',
        'kode' => ['required','unique:produks,kode,'.$this->produkTerpilih->id],
        'harga' => 'required',
        'stok' => 'required',

       
    ],[
        'nama.required' => 'Nama tidak boleh kosong',
        'kode.required' => 'kode tidak boleh kosong',
        'kode.unique' => 'kode sudah diiisi',
        'harga.required' => 'harga tidak boleh kosong',
        'stok.required' => 'harga tidak boleh kosong',
       
    ]);

    $simpan = $this->produkTerpilih;
    $simpan->nama = $this->nama;
    $simpan->kode = $this->kode;
    $simpan->harga = $this->harga;
    $simpan->stok = $this->stok;
    $simpan->save();

    $this->reset(['nama','kode','harga','stok','produkTerpilih']);
    $this->pilihanMenu ='lihat';

}


    public function pilihHapus($id){
            $this->produkTerpilih = ModelProduk::findOrFail($id);
            $this->pilihanMenu = 'hapus';

    }
    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->reset();
    }
    public function batal()
    {
        $this->reset();
    }
    public function simpan(){
        $this->validate([
            'nama' => 'required',
            'kode' => ['required', 'unique:produks,kode'],
            'harga' => 'required',
            'stok' => 'required',
           
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'kode.required' => 'kode tidak boleh kosong',
            'kode.kode' => 'kode tidak valid',
            'kode.unique' => 'kode sudah terdaftar',
            'harga.required' => 'harga tidak boleh kosong',
            'stok.required' => 'stok tidak boleh kosong',
            
           
        ]);

        $simpan = new ModelProduk();
        $simpan->nama = $this->nama;
        $simpan->kode = $this->kode;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();

        $this->reset(['nama','kode','harga','stok']);
        $this->pilihaMenu ='lihat';
    }
    public function pilihMenu($menu){
        $this->pilihanMenu = $menu;
    }
    public function render()
    {
        return view('livewire.produk')->with([
            'semuaProduk' => ModelProduk::all()
        ]);
    } 
}
