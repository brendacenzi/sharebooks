<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Cadastro de usuário | Sharebooks </title>
    	<?php
    	    include('includes/meta.php');
    	?>
    	<meta name="description" content="Cadastre-se no sistema e compartilhe livros">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script type="text/javascript">	
    		
    		$(document).ready(function () {

    			$.getJSON("<?php echo base_url('resources/js/estados_cidades.json'); ?>", function (data) {
    				var items = [];
    				var options = '<option value="">Escolha um estado</option>';	
    				$.each(data, function (key, val) {
    					options += '<option value="' + val.nome + '">' + val.nome + '</option>';
    				});					
    				$("#estados").html(options);				
    				
    				$("#estados").change(function () {				
    				
    					var options_cidades = '';
    					var str = "";					
    					
    					$("#estados option:selected").each(function () {
    						str += $(this).text();
    					});
    					
    					$.each(data, function (key, val) {
    						if(val.nome == str) {							
    							$.each(val.cidades, function (key_city, val_city) {
    								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
    							});							
    						}
    					});
    					$("#cidades").html(options_cidades);
    					
    				}).change();		
    			
    			});
    		
    		});
    		
    	</script>		
    </head>
    
    <body id="cadastrar-banner">
        <?php 
            include('includes/menu.php');
        ?>    
        <main>
            <div id="campanha">
                <h1>CADASTRE-SE.</h1>
            </div>
            <form action="/index.php/Usuario/cadastrar" method="POST" enctype="multipart/form-data" id="form-cadastro">
                <p>Foto de Perfil:</p>
                <input id="foto" name="foto" type="file" accept=".jpg" />
                <p>* Nome:</p>
                <input type="text" name="nome" required/>
                
                <div>
                    <div class="divide">
                        <p>* CPF:</p>
                        <input type="number" name="cpf" id="cpf" required/>
                    </div>
                    <div class="divide2">
                        <p>* Data de nascimento:</p>
                        <input type="date" name="nascimento" placeholder="Nascimento" required/>
                    </div>
                </div>
                
                <div>
                    <div class="divide">
                        <p>* E-mail:</p>
                        <input type="email" name="login" required/>
                    </div>
                    <div class="divide2">
                        <p>* Senha:</p>
                        <input type="password" name="senha" required/>
                    </div>
                </div>
                
                <div>
                    <div class="divide">
                        <p>* Estado:</p>
                		<select id="estados" name="estado">
                			<option value=""></option>
                		</select>
                	</div>
            		<div class="divide2">
                		<p>* Cidade:</p>
                		<select id="cidades" name="cidade">
            		    </select>
            		</div>
        		</div>
        		
                <p>Descrição pessoal:</p>
                <textarea name="descricao" rows="7" maxlength="300"></textarea>
        	    <fieldset>
        	        <legend><p>Interesses:</p></legend>
        	        <label>
                		<input type="checkbox" name="interesses[]" value="Aventura"> Aventura
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Biografia"> Biografia
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Científico"> Científico
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Comédia"> Comédia
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Crônica"> Crônica
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Didático"> Didático
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Drama"> Drama
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Erótico"> Erótico
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Fantasia"> Fantasia
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Ficção científica"> Ficção
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Infantil"> Infantil
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Poesia"> Poesia
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Política"> Política
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Religioso"> Religioso
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Romance"> Romance
                	</label>
                	<label>
                		<input type="checkbox" name="interesses[]" value="Terror"> Terror
                	</label>
                </fieldset>
                <input type="submit" value="Cadastrar"/>
            </form>
        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>