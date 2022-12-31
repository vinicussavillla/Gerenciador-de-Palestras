$('.cpf').mask('000.000.000-00'); 
$('.cep').mask('00000-000'); 
$('.uf').mask('AA');
$('.telefone').mask('(00) 0000-0000');
$('.celular').mask('(00) 00000-0000');

$(document).on('blur', '#cep', function(){
    const cep = $(this).val();

    $.ajax({
        url:'https://viacep.com.br/ws/'+cep+'/json/', 
        method:'GET', 
        dataType:'json',
        success: function(data) {
            if(data.erro) {
                alert('Endereço não encontrado!');
            }
            
            console.log(data);
            $('#uf').val(data.uf);
            $('#rua').val(data.logradouro);
            $('#cidade').val(data.localidade);
            $('#bairro').val(data.bairro);
        }
    });
});