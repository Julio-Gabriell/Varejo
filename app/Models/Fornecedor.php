<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $primaryKey = 'idfornecedor';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'cnpj', 'telefone'];
}
