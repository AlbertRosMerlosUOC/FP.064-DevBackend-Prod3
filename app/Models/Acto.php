<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Acto extends Model {

        protected $table = 'actos';
        protected $primaryKey = 'Id_acto';
        public $timestamps = true;

        protected $fillable = [
            'Fecha',
            'Hora',
            'Titulo',
            'Descripcion_corta',
            'Descripcion_larga',
            'Num_asistentes',
            'Id_tipo_acto',
        ];

        public function tipoActo()
        {
            return $this->belongsTo(TipoActo::class, 'Id_tipo_acto');
        }
    }

?>
