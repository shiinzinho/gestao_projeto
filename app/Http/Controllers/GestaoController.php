<?php

namespace App\Http\Controllers;

use App\Http\Requests\GestaoFormRequest;
use App\Models\Gestao;
use Illuminate\Http\Request;

class GestaoController extends Controller
{
    public function gestao(GestaoFormRequest $request)
    {
        $gestao = Gestao::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_inicio' => $request->data_inicio,
            'data_termino' => $request->data_termino,
            'valor_projeto' => $request->valor_projeto,
            'status' => $request->status
        ]);
        return response()->json([
            'sucess' => true,
            'message' => "Registro de gestão concluido",
            'data' => $gestao
        ]);
    }
}