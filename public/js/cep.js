$(document).ready(function($) {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $(".cep_partida").val("");
        $(".endereco_partida").val("");
       
    }
    
    //Quando o campo cep perde o foco.
    $(".cep_partida").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $(".endereco_partida").val("...");
                
                // $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        var endereco_partida = dados.logradouro+" - "+dados.bairro+"-"+dados.localidade+"-"+dados.uf
                        //Atualiza os campos com os valores da consulta.
                        $(".endereco_partida").val(endereco_partida);
                        
                        // $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();

                        swal({
                            title: 'CEP Inválido!',
                            text: 'Verifique o número digitado',
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        })
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                swal({
                    title: 'CEP Inválido!',
                    text: 'Verifique o número digitado',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                })
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    function limpa_formulário_cep_destino() {
        // Limpa valores do formulário de cep.
        $(".cep_destino").val("");
        $(".endereco_destino").val("");
       
    }
    
    //Quando o campo cep perde o foco.
    $(".cep_destino").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $(".endereco_destino").val("...");
                
                // $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        var endereco_destino = dados.logradouro+" - "+dados.bairro+"-"+dados.localidade+"-"+dados.uf
                        //Atualiza os campos com os valores da consulta.
                        $(".endereco_destino").val(endereco_destino);
                        
                        // $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep_destino();

                        swal({
                            title: 'CEP Inválido!',
                            text: 'Verifique o número digitado',
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        })
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep_destino();
                swal({
                    title: 'CEP Inválido!',
                    text: 'Verifique o número digitado',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                })
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});