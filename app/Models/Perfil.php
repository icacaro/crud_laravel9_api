<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
    ];
    protected $table ='perfil';

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function usuarioperfil()
    {
        return $this->belongsTo(UsuarioPerfil::class);
    }
}