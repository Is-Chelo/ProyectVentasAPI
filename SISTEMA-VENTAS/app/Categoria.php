<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //Usamos la tabla categoria
    protected $table = 'categoria';

    //Definimos nuestra llave primaria
    protected $primaryKey='idcategoria';

    //Bloquea los campos UPDATE_AT y CREATE_AT que tiene por defecto laravel
    public $timestamps = false;
    
    //campos modificables
    protected $fillable=['nombre','descripcion','condicion'];


    
    
}
