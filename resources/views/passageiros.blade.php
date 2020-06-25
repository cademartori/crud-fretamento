@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">Cadastrar Passageiro</button>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="example" class="display nowrap" style="width:100%">
           <thead>
                <tr>
                   <th>ID</th>
                   <th>Passageiro</th>
                   <th>Idade</th>
                   <th>Fretado</th>
                   <th>Ação</th>
                </tr>
             </thead>
         </table>  
           
       </div>

       <!-- Modal -->
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cadastro de passageiros</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/passageiros" method="POST">
                    <div class="modal-body">
                  
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idade" class="col-md-4 col-form-label text-md-right">{{ __('Idade') }}</label>

                            <div class="col-md-6">
                                <input id="idade" type="text" class="form-control @error('idade') is-invalid @enderror" name="idade" value="{{ old('idade') }}" required autocomplete="idade" autofocus>

                                @error('idade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                  
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
              </div>
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
           ajax: "{!! route('passageiros_table') !!}",
            "columns"    : [
              {'data': 'id'},  
              {'data': 'nome'},
              {'data': 'idade'},
              {'data': 'fretamento_id'},
              {
            "data": "action",
            "render": function(data, type, row, meta){
                return '<a href="/passageiros/'+row.id+'" class="btn btn-warning">Editar</a>';
            }
        }
              
           ],
            "language": {
               "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
               
            }
  });
        // $.ajax({
        //     url: '/passageiros_table',
        //     type: 'GET',
        //     success: function(data){
        //         console.log(data)
        //     }
        // });
    })
</script>        
@endsection