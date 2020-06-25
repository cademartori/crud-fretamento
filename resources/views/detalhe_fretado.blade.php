@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="/fretados/{{ request()->id }}" method="POST">
           <?php 
           
            $form = App\fretado::where('id','=',request()->id)->first(); 
            
            $dp = explode(' ',$form->data_partida);
            $par = explode("-",$dp[0]);
            $partida = $par[2].'/'.$par[1].'/'.$par[0].' '.$dp[1];

            $dr = explode(' ',$form->data_retorno);
            $ret = explode('-',$dr[0]);
            $retorno = $ret[2].'/'.$ret[1].'/'.$ret[0].' '.$dr[1];
           
           ?>
           @csrf
        <input type="hidden" name="id" value="{{ request()->id }}">
           <div class="form-group row">
            <label for="nome_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Nome da empresa') }}</label>

            <div class="col-md-6">
                <input id="nome_empresa" type="text" class="form-control @error('nome_empresa') is-invalid @enderror" name="nome_empresa" value="{{ $form->nome_empresa }}" required autocomplete="nome_empresa" autofocus>

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
                <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ $form->cnpj }}" required autocomplete="cnpj" autofocus>

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
                <input id="nome_solicitante" type="text" class="form-control @error('nome_solicitante') is-invalid @enderror" name="nome_solicitante" value="{{ $form->nome_solicitante }}" required autocomplete="nome_solicitante" autofocus>

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
                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ $form->solicitante_cpf }}" required autocomplete="cpf" autofocus>

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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $form->solicitante_email }}" required autocomplete="email" autofocus>

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
                <input id="endereco_partida" type="text" class="form-control endereco_partida @error('endereco_partida') is-invalid @enderror" name="endereco_partida" value="{{ $form->partida_endereco }}" required autocomplete="endereco_partida" autofocus>

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
                <input id="cep_partida" type="text" class="form-control mask_cep cep_partida @error('cep_partida') is-invalid @enderror" name="cep_partida" value="{{ $form->partida_cep }}" required autocomplete="cep_partida" autofocus>

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
                <input id="endereco_destino" type="text" class="form-control endereco_destino @error('endereco_destino') is-invalid @enderror" name="endereco_destino" value="{{ $form->destino_endereco }}" required autocomplete="endereco_destino" autofocus>

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
                <input id="cep_destino" type="text" class="form-control mask_cep cep_destino @error('cep_destino') is-invalid @enderror" name="cep_destino" value="{{ $form->destino_cep }}" required autocomplete="cep_destino" autofocus>

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
                <input id="data_partida" type="text" class="form-control @error('data_partida') is-invalid @enderror" name="data_partida" value="{{ $partida }}" required autocomplete="data_partida" placeholder="00/00/0000 00:00:00" autofocus>

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
                <input id="data_retorno" type="text" class="form-control @error('data_retorno') is-invalid @enderror" name="data_retorno" value="{{ $retorno }}" required autocomplete="data_retorno" placeholder="00/00/0000 00:00:00" autofocus>

                @error('data_retorno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <label for="passageiros" class="col-md-4 col-form-label text-md-right">{{ __('Passageiros sem fretados vinculados') }}</label>
                        <?php $passageiros = App\passageiro::where('fretamento_id', NULL)->orWhere('fretamento_id',$form->id)->get(['id','nome','fretamento_id'])?>
                        <div class="form-group row required" >
                        @foreach ($passageiros as $p)

                            @if ($p->fretamento_id == $form->id)
                            <div class="col-md-6">
                                <input type="checkbox" name="passageiros[]" class="@if($errors->any()) is-invalid @endif" id="passageiro_{{$p->id}}" value="{{$p->id}}" checked >&nbsp;{{ $p->nome }} &nbsp;<br>
                                @if($errors->any())
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first() }}</strong>
                                </span>
                                @endif
                            </div>
                            @else
                            <div class="col-md-6">
                                <input type="checkbox" name="passageiros[]" class="@if($errors->any()) is-invalid @endif" id="passageiro_{{$p->id}}" value="{{$p->id}}" >&nbsp;{{ $p->nome }} &nbsp;<br>
                                @if($errors->any())
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first() }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            @endif
                        
                            
                          
                        @endforeach
                        
                      <div>
                          <br>

            <button type="submit" class="btn btn-primary">Atualizar</button>
       </form>
    </div>    
</div>

@endsection