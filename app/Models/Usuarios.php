<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primarykey = 'usu_id';
    
    public $timestamps = false;

    protected $fillable = [
        'usu_nome',
        'usu_email',
        'usu_senha'
    ];

    //relacionamento

    // 1:N - um para muitos (um usuario pode ter muitos produtos)

    public function produtos(){
            //$this->hasMany(ModeloRelacionado::class, 'FK','PK');
        return $this->hasMany(Produtos::class, 'usu_id','usu_id'); //chave estrangeira - chave primária
    }
}
