<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Negociação | Sharebooks</title>
    	<meta name="description" content="Mensagens">
    	<meta charset="utf-8">
        <link rel='shortcut icon' href="/resources/img/logo.ico" type='image/x-icon' />
        <link rel="stylesheet" href="/resources/estilo.css"/>
        <meta name="robots" content="index, follow">
    </head>
    <body id="index">
        <?php 
            include('includes/menu-interno.php');
        ?>
        <main>
            <div id="capa"></div>
            <div id="cont-perfil">
                <img src="/resources/img/perfil/<?= $info->ds_foto; ?>" id="perfil">
                <h1>Negociação:</h1>
                    <?php
                        foreach($conversa->result_array() as $row) { 
                            echo "<p>" . date("d/m/y G:i", strtotime($row['dt_msg'])) . " - " . $row['nm_usuario'] . ": <b>" . $row['ds_msg'] . "</b></p>"; 
                        }
                        
                    ?>
                <form action="/index.php/Usuario/enviarMsg" method="POST" enctype="multipart/form-data" id="form-cadastro">
                    <input type="hidden" name="id_to" value="<?php echo $row['id_to']; ?>"/>
                    <input type="hidden" name="id_from" value="<?php echo $row['id_from']; ?>"/>
                    <input type="hidden" name="ds_transacao" value="<?php echo $row['ds_transacao']; ?>"/>
                    <input type="text" name="ds_msg" placeholder="Digite sua mensagem" autofocus />
                    <input type="submit" value="Enviar"/>
                </form>
            </div>
        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>