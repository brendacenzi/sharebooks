<div id="escolhido">
    <?php
        foreach($premio->result_array()  as $row) { 
            echo "<img src='./../../../resources/img/premios/" . $row['ds_imagem'] . "' width='150'/>";
            echo "<div>";
            echo "<span>" . $row['nm_premio'] . "  (" . $row['qt_pontos'] . " pontos)</span>";
            echo "<form action='/index.php/Premio/debitar' method='post'>
                    <input type='text' name='recebedor' placeholder='Quem vai receber?' autofocus required>
                    <input type='text' name='endereco' placeholder='Endereço' required>
                    <input type='text' name='cidade' placeholder='Cidade' required>
                    <input type='text' name='estado' placeholder='Estado' maxlength=2 required>
                    <input type='text' name='cep' placeholder='CEP' maxlength=9 required>
                    <input type='hidden' name='qtponto' value='" . $row['qt_pontos'] . "'><br>
                    <input type='submit' value='Solicitar' class='poss'>
                </form>";
            echo "</div>";
        }
    ?>
</div>