<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DetailTransaksi;

class Transaksi extends Model
{
    protected $fillable =['kode', 'total', 'status'];
    public function detilTransaksi(){
        return $this->hasMany('App\Models\DetilTransaksi::class');
    }
}
