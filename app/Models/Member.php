<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 'members';
    protected $fillable = [
        'no_id',
        'nama',
        'alamat',
        'nomor_telepon',
        'member_id'
    ];
    protected $casts = [
        'no_id'     => 'string',
        'member_id' => 'integer'
    ];

    public function downline()
    {
        return $this->hasMany(Member::class, 'member_id', 'id');
    }

    public function upline()
    {
        return $this->belongsTo(Member::class, 'member_id')
            ->withDefault(['nama' => 'none']);
    }
}
