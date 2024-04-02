$('.componentes-barra').on('click', function(){
    $("#teste").hide()
})


function showHide(whatToShowHide){
    if($('#' + whatToShowHide + 'Div').is(':visible')){
        $('#' + whatToShowHide + 'Div').hide();
    }else if($('#' + whatToShowHide + 'Div').is(':hidden')){
        $('#' + whatToShowHide + 'Div').show();
    }
}

$('#monsters').on('click', function(){showHide('monsters')})

$('.monster').on('click', function(){
    // $('.barra-lateral').css('height', '205.8vh')
    // $('.barra-lateral').css('width', '50vw')
})
$(document).ready(function() {
    $('.formMonster').submit(function(event){
        event.preventDefault(); // evitar comportamento padrão de enviar o formulário
        var formData = $(this).serialize(); // serializar dados do formulário em uma string
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            success: function(response) {
                $('#testeDiv').html(response); // exibir a resposta do servidor na div #ResultPesquisaPessoas
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // exibir o erro no console
            }
        }); 
    });            
});
