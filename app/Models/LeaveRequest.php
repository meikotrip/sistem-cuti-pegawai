<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'idLR';
    protected $fillable = [
        'idUser',
        'idDivisi',
        'tanggalMulai',
        'tanggalAkhir',
        'alamat',
        'alasanCuti',
        'duration',
        'isAcceptedKadepartemen',
        'isAcceptedKahrd'
    ];

    protected $dates = ['tanggalMulai', 'tanggalAkhir'];

    protected static function booted()
    {
        static::saving(function ($leaveRequest) {
            $start_date = Carbon::parse($leaveRequest->tanggalMulai);
            $end_date = Carbon::parse($leaveRequest->tanggalAkhir);

            // Menghitung selisih hari antara tanggal mulai dan tanggal selesai
            $duration = $start_date->diffInDays($end_date);

            $leaveRequest->duration = $duration;
        });
    }
}
