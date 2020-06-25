<?php

namespace App\Http\Controllers;

use App\fretado;
use App\passageiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class FretadoController extends Controller
{
    public function index(){
        return view('fretados');
    }

    public function content_table(){
        return Datatables::of(DB::table('fretados')->select('*'))->make(true);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome_empresa' => ['required', 'string'],
            'cnpj' => ['required', 'string'],
            'nome_solicitante' => ['required', 'string'],
            'cpf' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'endereco_partida' => ['required', 'string'],
            'cep_partida' => ['required', 'string'],
            'endereco_destino' => ['required', 'string'],
            'cep_destino' => ['required', 'string'],
            'passageiros' => ['required'],
        ]);
    }

    public function insert(Request $request){
            $nome_empresa = $request->nome_empresa;
            $cnpj = $request->cnpj;
            $nome_solicitante = $request->nome_solicitante;
            $cpf = $request->cpf;
            $email = $request->email;
            $endereco_partida = $request->endereco_partida;
            $cep_partida = $request->cep_partida;
            $endereco_destino = $request->endereco_destino;
            $cep_destino = $request->cep_destino;

            $data_partida = $request->data_partida;
            $dp = explode(' ',$data_partida);
            $par = explode("/",$dp[0]);
            $partida = $par[2].'-'.$par[1].'-'.$par[0].' '.$dp[1];
            
            $data_retorno = $request->data_retorno;
            $dr = explode(' ',$data_retorno);
            $ret = explode('/',$dr[0]);
            $retorno = $ret[2].'-'.$ret[1].'-'.$ret[0].' '.$dr[1];

            $fretados = new fretado();
            $fretados->nome_empresa = $nome_empresa;
            $fretados->cnpj = $cnpj;
            $fretados->nome_solicitante = $nome_solicitante;
            $fretados->solicitante_cpf = $cpf;
            $fretados->solicitante_email = $email;
            $fretados->partida_endereco = $endereco_partida;
            $fretados->partida_cep = $cep_partida;
            $fretados->destino_endereco = $endereco_destino;
            $fretados->destino_cep = $cep_destino;
            $fretados->data_partida = $partida;
            $fretados->data_retorno = $retorno;
            $fretados->qtd_passageiros = 0;
            $fretados->save();

            $fid = $fretados->id;

            $count = 0;
            foreach($request->passageiros as $key){
                $count++;
                passageiro::where('id','=',$key)->update(['fretamento_id'=>$fid]);
            }

                fretado::where('id','=',$fid)->update(['qtd_passageiros' => $count]);

                return response()->view('fretados', [], 201);
    }

    public function indexUpdate($id){
        return view('detalhe_fretado', compact('id'));
    }

    public function Update(Request $request){

        $id = $request->id;
        $nome_empresa = $request->nome_empresa;
        $cnpj = $request->cnpj;
        $nome_solicitante = $request->nome_solicitante;
        $cpf = $request->cpf;
        $email = $request->email;
        $endereco_partida = $request->endereco_partida;
        $cep_partida = $request->cep_partida;
        $endereco_destino = $request->endereco_destino;
        $cep_destino = $request->cep_destino;

        $data_partida = $request->data_partida;
        $dp = explode(' ',$data_partida);
        $par = explode("/",$dp[0]);
        $partida = $par[2].'-'.$par[1].'-'.$par[0].' '.$dp[1];
        
        $data_retorno = $request->data_retorno;
        $dr = explode(' ',$data_retorno);
        $ret = explode('/',$dr[0]);
        $retorno = $ret[2].'-'.$ret[1].'-'.$ret[0].' '.$dr[1];

        fretado::where('id',$id)->update(['nome_empresa' => $nome_empresa,
                                          'cnpj' => $cnpj,
                                          'nome_solicitante' => $nome_solicitante,
                                           'solicitante_cpf' => $cpf,
                                          'solicitante_email' => $email,
                                          'partida_endereco' => $endereco_partida,
                                          'partida_cep' =>  $cep_partida,
                                          'destino_endereco' => $endereco_destino,
                                          'destino_cep' => $cep_destino,
                                          'data_partida' => $partida,
                                          'data_retorno' => $retorno
                                          ]);

        
        if($request->passageiros !== NULL){
            //deixa todos passageiros vinculado a este fretado null e entao aplica novamente nos que foram aceitos
            foreach($request->passageiros as $key){
                passageiro::where('fretamento_id','=',$id)->update(['fretamento_id'=>NULL]);
            }
      
            $count = 0;
            foreach($request->passageiros as $key){
                $count++;
                passageiro::where('id','=',$key)->update(['fretamento_id'=>$id]);
            }
            fretado::where('id','=',$id)->update(['qtd_passageiros' => $count]); 
                
                return redirect()->route('fretados', []);        
        }else{
            return Redirect::back()->withErrors(['Ao menos um passageiro deve ser selecionado']);
        }

    }
}
