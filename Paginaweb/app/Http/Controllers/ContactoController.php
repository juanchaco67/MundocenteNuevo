<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Mail;

class ContactoController extends Controller
{
    //
    public static function enviar_correo(Request $request){
        $data = array(
            //'user' => $user,
            'nombre' => $request['nombre'], 
            'correo' => $request['correo'], 
            'asunto' => $request['asunto'], 
            'mensaje' => $request['mensaje'],
        );

     	Mail::send('emails.mensaje_contacto', $data, function($message) use ($request){
     		$message->from($request['correo']);
			$message->to('z3pi@hotmail.com')->subject($request['asunto']);
		});

	 	Session::flash('mensaje', 'Tu mensaje ha sido enviado correctamente');
		return view('/contacto');
    }
 
}
