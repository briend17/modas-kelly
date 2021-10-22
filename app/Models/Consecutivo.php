<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consecutivo extends Model
{
    public $fillable = [
        'consecutivo_valor',
        'user_created',
        'user_updated'
    ];

    public static function getConsecutivo($instancia,$user_id, $longitud = 8,$prefijo = null) {
        $input = [];
        $modelo = $instancia->consecutivo()->getMorphClass();
        $consecutivo = Consecutivo::where('consecutable_type',$modelo)
                    ->orderBy('id','desc')
                    ->first();

        if(empty($consecutivo)){
            $input['consecutivo_valor'] = '1';
        }else{
            // incrementar el consecutivo valor
            $input['consecutivo_valor'] = $consecutivo->consecutivo_valor+1;
        }

        $input['user_created'] = $user_id;
        $input['user_updated'] = $user_id;

        $consecutivo = $instancia->consecutivo()->create($input);

        return  $prefijo.str_pad($consecutivo->consecutivo_valor, $longitud, "0", STR_PAD_LEFT);
    }

    // RELACIONES
    public function consecutivoTable(){
        return $this->morphTo();
    }
}
