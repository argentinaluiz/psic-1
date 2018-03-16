<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Patient;

class PatientsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        return !$search ?
            [] :
            //o método whereHas já faz o join automaticamente. Passo o nome do relacionamento (model: user). Na query uso o nome da tabela (users)
            Patient::whereHas('user', function ($query) use ($search) {
                $query->where('users.name', 'LIKE', "%{$search}%");//para uma busca genérica, vc passa entre porcentagem %
            })->take(10)->get();
    }
}
