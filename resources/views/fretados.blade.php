@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">Cadastrar fretado</button>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="example" class="display nowrap" style="width:100%">
           <thead>
                <tr>
                   <th>ID</th>
                   <th>Nome da empresa</th>
                   <th>Solicitante</th>
                   <th>Total de passageiros</th>
                   <th>Data de partida</th>
                   <th>Data de retorno</th>
                   <th>Ação</th>
                </tr>
             </thead>
         </table>  
           
       </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastro de fretados</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/fretados" method="POST">
                <div class="modal-body">
              
                    @csrf
                    <div class="form-group row">
                        <label for="nome_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Nome da empresa') }}</label>

                        <div class="col-md-6">
                            <input id="nome_empresa" type="text" class="form-control @error('nome_empresa') is-invalid @enderror" name="nome_empresa" value="{{ old('nome_empresa') }}" required autocomplete="nome_empresa" autofocus>

                            @error('nome_empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cnpj" class="col-md-4 col-form-label text-md-right">{{ __('CNPJ') }}</label>

                        <div class="col-md-6">
                            <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}" required autocomplete="cnpj" autofocus>

                            @error('cnpj')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nome_solicitante" class="col-md-4 col-form-label text-md-right">{{ __('Nome Solicitante') }}</label>

                        <div class="col-md-6">
                            <input id="nome_solicitante" type="text" class="form-control @error('nome_solicitante') is-invalid @enderror" name="nome_solicitante" value="{{ old('nome_solicitante') }}" required autocomplete="nome_solicitante" autofocus>

                            @error('nome_solicitante')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF Solicitante') }}</label>

                        <div class="col-md-6">
                            <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>

                            @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail do Solicitante') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="endereco_partida" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de partida') }}</label>

                        <div class="col-md-6">
                            <input id="endereco_partida" type="text" class="form-control endereco_partida @error('endereco_partida') is-invalid @enderror" name="endereco_partida" value="{{ old('endereco_partida') }}" required autocomplete="endereco_partida" autofocus>

                            @error('endereco_partida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cep_partida" class="col-md-4 col-form-label text-md-right">{{ __('CEP Partida') }}</label>

                        <div class="col-md-6">
                            <input id="cep_partida" type="text" class="form-control mask_cep cep_partida @error('cep_partida') is-invalid @enderror" name="cep_partida" value="{{ old('cep_partida') }}" required autocomplete="cep_partida" autofocus>

                            @error('cep_partida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="endereco_destino" class="col-md-4 col-form-label text-md-right">{{ __('Endereço Destino') }}</label>

                        <div class="col-md-6">
                            <input id="endereco_destino" type="text" class="form-control endereco_destino @error('endereco_destino') is-invalid @enderror" name="endereco_destino" value="{{ old('endereco_destino') }}" required autocomplete="endereco_destino" autofocus>

                            @error('endereco_destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="cep_destino" class="col-md-4 col-form-label text-md-right">{{ __('CEP Destino') }}</label>

                        <div class="col-md-6">
                            <input id="cep_destino" type="text" class="form-control mask_cep cep_destino @error('cep_destino') is-invalid @enderror" name="cep_destino" value="{{ old('cep_destino') }}" required autocomplete="cep_destino" autofocus>

                            @error('cep_destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="data_partida" class="col-md-4 col-form-label text-md-right">{{ __('Data/Hora de Partida') }}</label>

                        <div class="col-md-6">
                            <input id="data_partida" type="text" class="form-control @error('data_partida') is-invalid @enderror" name="data_partida" value="{{ old('data_partida') }}" required autocomplete="data_partida" placeholder="00/00/0000 00:00:00" autofocus>

                            @error('data_partida')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="data_retorno" class="col-md-4 col-form-label text-md-right">{{ __('Data/Hora de Retorno') }}</label>

                        <div class="col-md-6">
                            <input id="data_retorno" type="text" class="form-control @error('data_retorno') is-invalid @enderror" name="data_retorno" value="{{ old('data_retorno') }}" required autocomplete="data_retorno" placeholder="00/00/0000 00:00:00" autofocus>

                            @error('data_retorno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    
                        <label for="passageiros" class="col-md-4 col-form-label text-md-right">{{ __('Passageiros sem fretados vinculados') }}</label>
                        <?php $passageiros = App\passageiro::where('fretamento_id','=',NULL)->get(['id','nome'])?>
                        <div class="form-group row">
                        @foreach ($passageiros as $p)
                        
                            <div class="col-md-6">
                                <input type="checkbox" name="passageiros[]" id="passageiro_{{$p->id}}" value="{{$p->id}}" required>&nbsp;{{ $p->nome }} &nbsp;<br>
                            </div>
                          
                        @endforeach
                      <div>
              
                </div>
                <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
          </div>
        </div>
    </div>

</div> 
<script type="application/javascript">
    jQuery(document).ready(function($){

        var table = $('#example').DataTable( {
     rowReorder: {
              selector: 'td:nth-child(2)'
           },
           responsive: true,
           processing: true,
           serverSide: true,
           ajax: "{!! route('fretados_table') !!}",
            "columns"    : [
              {'data': 'id'},  
              {'data': 'nome_empresa'},
              {'data': 'nome_solicitante'},
              {'data': 'qtd_passageiros'},
              {'data': 'data_partida'},
              {'data': 'data_retorno'},
              {
            "data": "action",
            "render": function(data, type, row, meta){
                return '<a href="/fretados/'+row.id+'" class="btn btn-warning">Editar</a>';
            }
        }
              
           ],
            "language": {
               "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
               
            }
  });
     
    })
</script>           
@endsection