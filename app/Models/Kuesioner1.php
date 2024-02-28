<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kuesioner1 extends Model
{
    use HasFactory;

    protected $table = 'kuesioner1';
    protected $fillable = [

        'nama',
        'role_id',
        'daerah_id',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
        'q8',
        'q9',
        'q10',
        'q11',
        'q12',
        'q13',
        'q14',
        'q15',
        'q16',
        'q17',
        'q18',
        'q19',
        'q20',
        'ket1',
        'ket2',
        'ket3',
        'ket4',
        'ket5',
        'ket6',
        'ket7',
        'ket8',
        'ket9',
        'ket10',
        'ket11',
        'ket12',
        'ket13',
        'ket14',
        'ket15',
        'ket16',
        'ket17',
        'ket18',
        'ket19',
        'ket20',
        'image',
        'original_file_name',
        

    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
