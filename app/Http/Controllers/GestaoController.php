<?php

namespace App\Http\Controllers;

use App\Http\Requests\GestaoFormRequest;
use App\Http\Requests\UpdateGestaoFormRequest;
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
     public function gestaoUpdate(UpdateGestaoFormRequest $request){
            $gestao = Gestao::find($request->id);
            if(!isset($gestao)){
                return response()->json([
                    'status' => false,
                    'message' => "Gestão não encontrada"
                ]);
            }
            if(isset($request->titulo)){
                $gestao->titulo = $request->titulo;
            }
            if(isset($request->desricao)){
                $gestao->desricao = $request->desricao;
            }
            if(isset($request->data_inicio)){
                $gestao->data_inicio = $request->data_inicio;
            }
            if(isset($request->data_termino)){
                $gestao->data_termino = $request->data_termino;
            }
            if(isset($request->valor_projeto)){
                $gestao->valor_projeto = $request->valor_projeto;
            }
            if(isset($request->status)){
                $gestao->status = $request->status;
            }
            $gestao->update();
            return response()->json([
                'status' => true,
                'message' => 'Gestão atualizada'
            ]);
    }
    public function gestaoDelete($id){
        $gestao = Gestao::find($id);
        if(!isset($gestao)){
            return response()->json([
                'status' => false,
                'message' => 'Gestão não encontrada'
            ]);
        }
        $gestao->delete();
        return response()->json([
            'status' => true,
            'message' => 'Gestão deletada com êxito'
        ]);
        }
        public function gestaoId($id){
            $gestao = Gestao::find($id);
            if($gestao == null){
                return response()->json([
                    'status' => false,
                    'message' => "Gestão não encontrada "
                ]);
            }
            return response()->json([
                'status' => true,
                'data' => $gestao
            ]);
        }
        public function gestaoTitulo(Request $request){
            $gestao = Gestao::where('titulo', 'like', '%' . $request->titulo . '%')->get();
            if(count($gestao) > 0){
                return response()->json([
                    'status' => true,
                    'data' => $gestao
                ]);
            }
            return response()->Json([
                'status' => true,
                'message' => "Não há resultados para pesquisa"
            ]);
        }
}