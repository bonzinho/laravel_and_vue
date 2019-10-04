<?php
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request){

        $rules = [
            'email' => 'required|email|unique:subscribers|max:128',
        ];
        $customMessage = [
            'required' => 'O campo de email é obrigatório',
            'email' => 'Por favor registe um email válido',
            'unique' => 'Este email já está registado na nossa base de dados',
            'max' => 'o email dve ter no máximo 128 caracteres',
        ];

        $this->validate($request, $rules, $customMessage);

        $new = new Subscriber();
        $new->email = $request->email;
        $new->save();
        return response()->json(['success' => 'Obrigado pela sua subscrição!']);
    }




}
