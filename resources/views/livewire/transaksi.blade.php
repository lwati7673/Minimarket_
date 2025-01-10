
<div>
   <div class="container">
    <div class="row mt-3">
        <div class="col-12">
            @if(!$transaksiAktif)
            <button class="btn btn-primary" wire:click='transaksiBaru'>Transaksi Baru</button>
            @else
            <button class="btn btn-danger" wire:click='batalTransaksi'>Batalkan Transaksi</button>
            <button class="btn btn-info" wire:loading>Loading...</button>
            @endif
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-8">
        <div class="card border-primary">
        <div class="card-body">
            <h4 class="card-title">No Invoice : </Title></h4>
            <table>
               <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
               </thead>
               <tbody>
                <!-- <tr>
                    <td>1</td>
                    <td>Barang 1</td>
                    <td>10000</td>
                    <td>2</td>
                    <td>20000</td>
                    <td>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                </tr> -->
               </tbody>
            </table>

             </div>    
             </div>
        </div>

        <div class="col-4">
             <div class="card border-primary mt-2">
        <div class="card-body">
            <h4 class="card-title">Total Bayar</Title></h4>
            <div  class="flex justify-content-between">
                <span>Rp.</span>
                <span>{{number_format('9898876',2,'.',',')}}</span>
            </div>
                </div>    
             </div>

             <div class="card border-primary mt-2">
        <div class="card-body">
            <h4 class="card-title">Bayar</Title></h4>
            <input type="number" name="form-control" placeholder="Bayar">
                </div>    
             </div>

             <div class="card border-primary mt-2">
        <div class="card-body">
            <h4 class="card-title">Kembalian</Title></h4>
            <span>Rp.</span>
                <span>{{number_format('9898876',2,'.',',')}}</span>
                </div>    
             </div>
             <button class="btn btn-success mt-2 w-100">Bayar</button>
        </div>

        
        

    </div>
   </div>
</div>


