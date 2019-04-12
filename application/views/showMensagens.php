<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Mensagens | Sharebooks
        </title>
    	<?php
    	    include('includes/meta.1.php');
    	?>
    	<meta name="description" content="Mensagens enviadas sobre as solicitações aceitas">
    </head>
    <body>
        <?php 
            include('includes/menu-interno.php');
        ?>   
        <main class="container2">
            <h1>Mensagens</h1>
            <div class="cont-flex">
                <div id="pessoas">
                <?php 
                    foreach($result->result_array()  as $row) {
                        if ($row['ds_tipo'] == 1)
                            $cor = "div-d";
                        else{
                            if ($row['ds_tipo'] == 2)
                                $cor =  "div-t";
                            else
                                $cor = "div-e";
                        }
                        echo "<div class='cadaConversa " . $cor ."' data-tipo='".$row['ds_tipo']."' data-id='".$row["id_conversa"]."' data-to='".($usuario == $row['idsolicitante']? $row['idsolicitado'] : $row['idsolicitante'] )."'>";
                        
                        echo "<div class='cont-cor'>";
                        if ($usuario == $row['idsolicitante']){ 
                            echo "<img src='../../resources/img/perfil/" . $row['imgsolicitado'] . "'><p>";
                            echo "<strong>" . $row['solicitado'] . "</strong>";
                            // $corta = split(' ', $row['solicitado'])[0];
                        }else{
                            echo "<img src='../../resources/img/perfil/" . $row['imgsolicitante'] . "'><p>";
                            echo "<strong>" . $row['solicitante'] . "</strong>";
                        }
                        // echo $row['cd_usuariosolicitado'];
                        // echo $row['cd_livrosolicitado'];
                        echo "<br><span>" . $row['nm_livro'] . "</span><br>";
                        echo "<span data-last='".$row["id_conversa"]."'>" . substr($row['msg'], 0, 20) . "...</span></p>";
                        echo "<div class='limpa'></div>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
                </div>
                <div id="cont-conversa">
                    <div id="info-conv">
                        <div id="sub-conv">
                            <span id="nomelivro"></span>
                            <span id="tipotransacao"></span><br>
                            <span id="nomeusu"></span><br>
                        </div>
                        <div id="sub-conv2">
                            <form action='/index.php/Conversa/apagar' id='conversa-apagar' method='post'>
                                <input id="conv" name="conv" type='hidden'>
                                <input type="submit" value="">
                            </form>
                            <form action='/index.php/Conversa/confirmar' id='conversa-confirmar' method='post'>
                                <input id="cv" name="cv" type='hidden'>
                                <input type="submit" value="">
                            </form>
                        </div>
                    </div>
                    <div id="conversa">
                        
                    </div>
                    <form action='/index.php/Usuario/enviaMensagem' id='form-conversa' method='post'>
                        <input id="msg" name="msg" type='text' placeholder='Digite sua mensagem'>
                        <input id="para" name="para" type='hidden'>
                        <input id="cdconv" name="conv" type='hidden'>
                        <button id="send" type="button">Enviar</button>
                    </form>
                </div>
            </div>
            <div class='some' data-user="<?= $usuario;?>"></div>
        </main>
        <?php
            include('includes/footer.php');
        ?>
    </body>
</html>