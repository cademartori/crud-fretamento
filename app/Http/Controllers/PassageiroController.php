<?php

namespace App\Http\Controllers;

use App\fretado;
use App\passageiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;



class PassageiroController extends Controller
{
    public function index(){
        return view('passageiros');
    }

    public function content_table(){


             // Consulta os dados a serem exibidos
         
         // Monta os dados de acordo com o datatable
     
            return Datatables::of(DB::table('passageiros')->select('*'))->make(true);
        
         

         /**
         *
         * Retorna os dados no formato 
         * requisitado pelo datatable e 
         * impede o envio da coluna action
         * para a tabela.
         *
         * Isso porque a coluna action,
         * não possui dados, e sim os botões 
         * de ação editar e excluir. 
         **/
         //return $datatable->blacklist(['action'])->make(true);
        // $sql = DB::table('Passageiros')->get();

        // $output[] = ['id'=>'','nome' =>'','idade'=>'','fretado'=>''];
        
        // foreach($sql as $s){
        //     $fretado = fretado::select('nome_empresa')->where('id','=',$s->fretamento_id)->first();
        //     $output[] .= ['id'=>$s->id,'nome' =>$s->nome,'idade'=>$s->idade,'fretado'=>$fretado->nome_empresa];
        // }

        // return response()->json($output, 200);

    }

    public function insert(Request $request){
            $nome = $request->input('nome');
            $idade = $request->input('idade');

           $passageiros = new passageiro();

           $passageiros->nome = $nome;
           $passageiros->idade = $idade;
           $passageiros->save();

            return response()->view('passageiros', [], 201);
    }


    public function indexUpdate($id){
        return view('detalhe_passageiro', compact('id'));
    }


    public function show($id){
        $passageiro = passageiro::where("id",'=',$id)->first();

        //form group de nome
        $output = '<input type="hidden" name="_token" value="'.@csrf_token().'">
                   <input type="hidden" name="id" value="'.$id.'"> 
        <div class="form-group row">
                <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                <div class="col-md-6">
                    <input id="nome" type="text" class="form-control" name="nome" value="'.$passageiro->nome.'" required autocomplete="nome" autofocus>
                </div>
        </div>';

        //form group de idade
        $output .= '<div class="form-group row">
        <label for="idade" class="col-md-4 col-form-label text-md-right">Idade</label>

        <div class="col-md-6">
            <input id="idade" type="number" class="form-control" name="idade" value="'.$passageiro->idade.'" required autocomplete="idade" autofocus>
            </div>
                        </div>';
            

          
                           

       return response()->json($output, 200);                 
    }

    public function Update(Request $request){
            $nome = $request->nome;
            $idade = $request->idade;
            $id = $request->id;
            $passageiro = passageiro::where('id','=',$id)->update(['nome' => $nome, 'idade' => $idade]);

            $msg = array('ok' => "Atualizado com sucesso");
            return response()->view('detalhe_passageiro',compact('msg'),204);



    }
}
