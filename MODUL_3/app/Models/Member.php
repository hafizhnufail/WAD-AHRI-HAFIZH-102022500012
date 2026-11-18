<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'tabel_data';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'email',
        'nohp',
        'level_member',
    ];
}