@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="/passageiros/{{ request()->id }}" method="POST">
            <div id="append">

            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
       </form>
    </div>    
</div>

<script type="application/javascript">
    $(document).ready(function($){
        $.ajax({
            url: '/form_passageiros/{{ request()->id }}',
            type: 'GET',
            
            success: function(data){
                $("#append").html(data)
                
                
            }
        })

        
    })
</script>
@endsection