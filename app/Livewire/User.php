<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as ModelUser;
use Livewire\WithFileUploads;

class User extends Component
{
    use WithFileUploads;
        public $pilihanMenu ='lihat';
        public $nama;
        public $email;
        public $password;
        public $peran;
        public $penggunaTerpilih;

        public function pilihEdit($id){
            $this->penggunaTerpilih = ModelUser::findOrFail($id);
            $this->nama = $this->penggunaTerpilih->nama;
            $this->email = $this->penggunaTerpilih->email;
            $this->peran = $this->penggunaTerpilih->peran;
            $this->pilihanMenu = 'edit';

    }

    public function simpanEdit(){
        $this->validate([
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:users,email,'.$this->penggunaTerpilih->id],
           
            'peran' => 'required',
           
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'peran.required' => 'Peran tidak boleh kosong',
           
        ]);

        $simpan = $this->penggunaTerpilih;
        $simpan->name = $this->nama;
        $simpan->email = $this->email;
        if ($this->password){
        $simpan->password = bcrypt($this->password);
        $simpan->peran = $this->peran;
        $simpan->save();
        $this->reset(['nama','email','password','peran','penggunaTerpilih']);
        $this->pilihanMenu ='lihat';

    }
}


        public function pilihHapus($id){
                $this->penggunaTerpilih = ModelUser::findOrFail($id);
                $this->pilihanMenu = 'hapus';

        }
        public function hapus()
        {
            $this->penggunaTerpilih->delete();
            $this->reset();
        }
        public function batal()
        {
            $this->reset();
        }
        // public function simpan()
        // {

        // }
        public function simpan(){
            $this->validate([
                'nama' => 'required',
                'email' => ['required', 'email', 'unique:users'],
                'password' => 'required',
                'peran' => 'required',
               
            ],[
                'nama.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'peran.required' => 'Peran tidak boleh kosong',
               
            ]);

            $simpan = new ModelUser();
            $simpan->name = $this->nama;
            $simpan->email = $this->email;
            $simpan->password = bcrypt($this->password);
            $simpan->peran = $this->peran;
            $simpan->save();

            $this->reset(['nama','email','password','peran']);
            $this->pilihanMenu ='lihat';
        }
        public function pilihMenu($menu){
            $this->pilihanMenu = $menu;
        }
    public function render()
    {
        return view('livewire.user')->with([
            'semuaPengguna' => ModelUser::all()
       ] );
    }
}
