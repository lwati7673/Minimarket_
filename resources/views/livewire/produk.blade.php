<div>
   <div class="container">
    <div class="row my-2">
        <div class="col-12">
            <button wire:click ="pilihMenu('lihat')" class ="btn {{$pilihanMenu=='lihat'? 'btn-primary' : 'btn-outline-primary'}}">
                Semua produk
        </button>
        <button wire:click ="pilihMenu('tambah')" class ="btn {{$pilihanMenu=='tambah'? 'btn-primary' : 'btn-outline-primary'}}">
               Tambah produk
        </button>

        <button wire:click ="pilihMenu('excel')" class ="btn {{$pilihanMenu=='excel'? 'btn-primary' : 'btn-outline-primary'}}">
               Import produk
        </button>
        <button wire:loading class="btn btn-info">
               Loading....
        </button>
        
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        @if($pilihanMenu=='lihat')
        <div class="card border-primary">
            <div class="card-header">
                Semua produk
            </div>
            <div class="card-body">
            <table class ="table table-boardered">
                <thead>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Stok</th>
                    <th>Data</th>

                </thead>
                <tbody>
                    @foreach ($semuaProduk as $produk )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$produk->kode}}</td>
                        <td>{{$produk->nama}}</td>
                        <td>{{$produk->harga}}</td>
                        <td>{{$produk->stok}}</td>
                        <td>
                        <button wire:click ="pilihEdit({{$produk->id}})" class ="btn {{$pilihanMenu=='edit'? 'btn-primary' : 'btn-primary'}}">
                         Edit Produk
                        </button>
                        <button wire:click ="pilihHapus({{$produk->id}})" class ="btn {{$pilihanMenu=='hapus'? 'btn-danger' : 'btn-danger'}}">
                         Hapus Produk
                         </button>
                        </td>
                      </tr>
                    
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        @elseif($pilihanMenu=='tambah')
        <div class="card border-primary">
            <div class="card-header">
                Tambah produk
            </div>
            <div class="card-body">
                <form wire:submit="simpan">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" wire:model="nama">
                    @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br />
                    <label>Kode Barang</label>
                    <input type="number" class="form-control" wire:model="kode">
                    @error('kode')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br />
                    <label>harga Barang</label>
                    <input type="number" class="form-control" wire:model="harga">
                    @error('harga')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br />
                    <label>Stok</label>
                    <input type="number" class="form-control" wire:model="stok">
                    @error('stok')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                </form>
            
            </div>
        </div>
        @elseif($pilihanMenu=='edit')
        <div class="card border-primary">
            <div class="card-header">
                Edit Barang
            </div>
            <div class="card-body">
            <form wire:submit="simpanEdit">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" wire:model="nama">
                    @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br />
                    <label>Kode Barang</label>
                    <input type="number" class="form-control" wire:model="kode">
                    @error('kode')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br />
                    <label>harga</label>
                    <input type="number" class="form-control" wire:model="harga">
                    @error('harga')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label>stok</label>
                    <input type="number" class="form-control" wire:model="stok">
                    @error('stok')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-2" wire:click='simpan'>Simpan</button>
                    <button type="button" class="btn btn-secondary mt-2" wire:click='batal'>Batal</button>
                </form>
            </div>
        </div>
        @elseif($pilihanMenu=='hapus')
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                Hapus produk
            </div>
            <div class="card-body">
            Anda Yakin Akan Menghapus produk Ini?
            
            <p>Nama : {{$produkTerpilih->nama}}</p>
            <p>Kode Barang : {{$produkTerpilih->kode}}</p>
            <br/>
            <button class="btn btn-danger" wire:click='hapus'>Hapus</button>
            <button class="btn btn-secondary" wire:click='batal'>Batal</button>
            </div>
        </div>
        @elseif($pilihanMenu=='excel')
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                Import produk
            </div>
            <div class="card-body">
          <form wire:submit='importExcel'>
            <input type="file" class="form-control" wire:model='fileExcel'>
            <br/>
            <button class="btn btn-primary" type="submit">Kirim</button>
          </form>
         
            </div>
        </div>
        @endif   
        </div>
    </div>
    
   </div>
</div>


