<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versiculo extends Model
{
    use HasFactory;

    protected $fillable = ['capitulo', 'versiculos', 'texto','livro_id'];

    public function livro(){
        return $this->belongsTo(Livro::class);
    }
}
