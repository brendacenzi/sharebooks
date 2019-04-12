/*function disp(){
    document.getElementById("legenda").innerHTML = "";
    document.getElementById("disponibilizar").style.display = "none";
    document.getElementById("botoes-transacao").style.display = "block";
    document.getElementById("total-estado").style.display = "block";
    document.getElementById("estado").style.display = "block";
    document.getElementsByTagName("body")[0].style.overflow = "hidden";
}

function cancDisp(){
    document.getElementById("legenda").innerHTML = "";
    document.getElementById("disponibilizar").style.display = "block";
    document.getElementById("botoes-transacao").style.display = "none";
    document.getElementById("total-estado").style.display = "none";
    document.getElementById("estado").style.display = "none";
    document.getElementsByTagName("body")[0].style = "overflow-y: scroll";
}

*/
//PRA MENSAGEM
var idTimer  = 0;


function legCancela(x){
    var r;
    switch (x) {
        case 1:
            r = "Cancelar disp. para doação";
            break;
        case 2:
            r = "Cancelar disp. para troca";
            break;
        case 3:
            r = "Cancelar disp. para empréstimo";
            break;
    }
    $('#legenda').text(r);
}

function legenda(x){
    var r;
    switch (x) {
        case 1:
            r = "Adicionar na estante";
            break;
        case 2:
            r = "Disponibilizar para doação";
            break;
        case 3:
            r = "Disponibilizar para troca";
            break;
        case 4:
            r = "Disponibilizar para empréstimo";
            break;
        case 5:
            r = "Retirar da estante";
            break;
    }
    $('#legenda').text(r);
}

function legendaSolic(x){
    var r;
    switch (x) {
        case 1:
            r = "Solicitar doação";
            break;
        case 2:
            r = "Solicitar troca";
            break;
        case 3:
            r = "Solicitar empréstimo";
            break;
    }
    $('#legenda').text(r);
}

function indispSolic(x){
    var r;
    switch (x) {
        case 1:
            r = "Indisponível para doação";
            break;
        case 2:
            r = "Indisponível para troca";
            break;
        case 3:
            r = "Indisponível para empréstimo";
            break;
    }
    $('#legenda').text(r);
}

function cancelaSolic(x){
    var r;
    switch (x) {
        case 1:
            r = "Cancelar solicitação de doação";
            break;
        case 2:
            r = "Cancelar solicitação de troca";
            break;
        case 3:
            r = "Cancelar solicitação de empréstimo";
            break;
    }
    $('#legenda').text(r);
}

function legendaBack(){
    $('#legenda').text("Escolha uma opção");
}

function trocar(x){
    if (x == 1){
        $('#opc-livro div:nth-child(1) hr').css('border','1.5px solid #3da8ad');
        $('#opc-livro div:nth-child(2) hr').css('border','1.5px solid #fff');
    }else{
        $('#opc-livro div:nth-child(1) hr').css('border','1.5px solid #fff');
        $('#opc-livro div:nth-child(2) hr').css('border','1.5px solid #3da8ad');
    }
}


function destrocar(){
    if ($('#busca-estante').css('display') == 'block'){
        $('#opc-livro div:nth-child(1) hr').css('border','1.5px solid #3da8ad');
        $('#opc-livro div:nth-child(2) hr').css('border','1.5px solid #fff');
    }else{
        $('#opc-livro div:nth-child(1) hr').css('border','1.5px solid #fff');
        $('#opc-livro div:nth-child(2) hr').css('border','1.5px solid #3da8ad');
    }
}

function showForm(x){
    if(x == 'busca-estante'){
        $('#opc-livro div:nth-child(1) hr').css('border','1.5px solid #3da8ad');
        $('#opc-livro div:nth-child(2) hr').css('border','1.5px solid #fff');
        $('#busca-estante').css('display','block');
        $('#busca-interesse').css('display','none');
    }else{
        $('#opc-livro div:nth-child(1) hr').css('border','1.5px solid #fff');
        $('#opc-livro div:nth-child(2) hr').css('border','1.5px solid #3da8ad');
        $('#busca-estante').css('display','none');
        $('#busca-interesse').css('display','block');
    }
}

function showlogin(){
    $("#login").show("slow");
}

$(document).mouseup(function (e) {
    var div = $("#login");
    if (!div.is(e.target) && div.has(e.target).length === 0) {
        if (div.is(':visible')) {
            div.toggle("slow");
        }
    }
    
    var div = $("#estado");
    if (!div.is(e.target) && div.has(e.target).length === 0) {
        if (div.is(':visible')) {
            div.toggle("slow");
        }
    }
    
    var div = $("#escolhido");
    if (!div.is(e.target) && div.has(e.target).length === 0) {
        if (div.is(':visible')) {
            div.toggle("slow");
        }
    }
    
    var div = $("#div-emprestimo");
    if (!div.is(e.target) && div.has(e.target).length === 0) {
        if (div.is(':visible')) {
            div.toggle("slow");
        }
    }
});

function showEstado(){
    $("#estado").show("slow");
}


function fundoDev(img){
    var url = "url('/resources/img/" + img + ".jpg')";
    $("#cont-dev").css("background-image", url).hide().fadeIn();
    $("#dev p").css("color", "#fff")
}

function tiraFundo(){
    var url = "url()";
    $("#cont-dev").css("background-image", url);
    $("#dev p").css("color", "#555")
}
/*$("fundoDev").click(function(){
    $("#cont-dev").fadeIn();
    $("#cont-dev").fadeIn("slow");
    $("#dev p").fadeIn(3000);
});
$("tirarFundo").click(function(){
    $("#cont-dev").fadeOut();
    $("#cont-dev").fadeOut("slow");
    $("#dev p").fadeOut(3000);
});
*/
function solicEmprestimo(){
    $("#div-emprestimo").show("emprestimo");
}

function mostraMenu(){
    if ($("#sub").css('display') == 'none')
        $("#sub").css('display','block');
    else
        $("#sub").css('display','none');
        
}

//Pagina conversa
$(function(){
    $(".cadaConversa").click(function(){
        let id = $(this).data("id");
        let to = $(this).data("to");
        let t = this;
        idTimer = id;
        //Designa a conversa
        $("#cdconv").val(id);
        $("#cv").val(id);
        //Designa para quem deve enviar a mensagem
        $("#para").val(to);
        $.ajax({
            url: "https://tcc2-brendacenzi.c9users.io/index.php/Usuario/mensagemConversa/"+id,
            method: "GET",
            processData: false,
        }).done(function(resposta){
            $("#conversa").html("");
            let iduser = $(".some").data("user");
            [].forEach.call(resposta, function(msg){
                if (iduser == parseInt(msg.id_to)){
                    $.ajax({
                url: "https://tcc2-brendacenzi.c9users.io/index.php/Usuario/trocaLida/"+msg.id_msg,
                method: "GET",
                processData: false,
            });
                    //Do outro
                    $("#conversa").append("<p class='msg-outro'>"+msg.ds_msg+"</p>");
                }else{
                    $("#conversa").append("<p class='msg-minha'>"+msg.ds_msg+"</p>");
                }
            });
            let solicitante = $(t).find(".cont-cor p strong").text();
            let livro = $(t).find(".cont-cor p span").first().text();
            let tr;
            let cor;
            switch ($(t).data("tipo")) {
                case 1:
                    tr = " - Doação";
                    cor = "#3da8ad";
                    break;
                case 2:
                    tr = " - Troca";
                    cor = "#faa61a";
                    break;
                case 3:
                    tr = " - Empréstimo";
                    cor = "#8b4d9f";
                    break;
            }
            $("#nomelivro").html(livro);
            $("#nomeusu").html(solicitante);
            $("#tipotransacao").html(tr);
            $("#cont-conversa").css('display', 'inline-block');
            $("#info-conv").css('border', '2px solid ' + cor);
            $("#nomelivro, #tipotransacao").css('color', cor);
            $("#conversa-confirmar input[type='submit']").css('background-color', cor);
            $("#conversa-apagar input[type='submit']").css('background-color', cor);
        }).fail(function(resposta){
            $("#conversa").html( resposta );
        });
    });
    
    
    //Enviar
    //Vou dar uma olhada no teu input e no teu botao la na pagina
    //Id do botao SHOOOW
    $("#send").click(function(){
        //Pega a mensagem pelo id
        let msg = $("#msg").val();
        //Fazer uma validacaozinha pra ver se tem texto
        // Vazio || Em Branco || null
        if(msg == "" || msg == " " || msg == null){
            //Sai do metodo, se quiser dar um alert é a tua hora
            return false;
        }
        //Pega o id da conversa pra usar no futuro
        let id = $("#conv").val();
        $("#form-conversa").ajaxSubmit({
            // Se enviado com sucesso
            success: function (resposta) {
                //Limpa Input
                $("#msg").val("");
                //Adiciona mensagema tela
                $("#conversa").append("<p class='msg-minha'>"+msg+"</p>");
                //Adicionaa ultima mensagem à tabela da esquerda
                $("span[data-last='"+id+"']").text(msg.ds_msg);
                
                return false; 
            },
     
            // Se acontecer algum erro
            error: function () {
                // Escondendo indicador de carregamento
                //botao.button('reset');
            }
        });
        return false; 
        // .done(function(response){
        //     console.log(response);
        // }).fail(function(response){
        //     console.log(response);
        // });
    });
});


setInterval(function(){
    if (idTimer == 0){
        return false;
    }
    $.ajax({
        url: "https://tcc2-brendacenzi.c9users.io/index.php/Usuario/mensagemNova/"+idTimer,
        method: "GET",
        type: "GET",
        processData: false,
    }).done(function(resposta){
        if(resposta.length == 0 || !Array.isArray(resposta)){
            return false;
        }
        [].forEach.call(resposta, function(msg){
            $.ajax({
                url: "https://tcc2-brendacenzi.c9users.io/index.php/Usuario/trocaLida/"+msg.id_msg,
                method: "GET",
                processData: false,
            });
            //Do outro
            $("#conversa").append("<p class='msg-outro'>"+msg.ds_msg+"</p>");
            $("span[data-last='"+idTimer+"']").text(msg.ds_msg);
        });
    }).fail(function(resposta){
    });
    
}, 5000 );

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});