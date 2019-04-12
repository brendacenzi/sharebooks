<div id="barra"></div>
<div id="menu">
    <a href="/index.php/Sharebooks/pesquisa"><img src="/../resources/img/sharebooks.png" alt="Logotipo" id="segundo"/></a>
    <div id="sub2">
        <nav>
            <ul>
                <li><a href="/index.php/Usuario/estante">Minha estante</a></li>
                <li><a href="/index.php/Usuario/mensagens">Mensagens</a></li>
                <li><a href="/index.php/Usuario/solicitacoes">Solicitações</a></li>
                <li><a href="/index.php/Usuario/perfil">Meu perfil</a></li>
                <li><a href="/index.php/Sharebooks/premios">Resgatar prêmios</a></li>
            </ul>
        </nav>
        <ul>
            <li id="sair">
                <form action="/index.php/Usuario/sair" method="post">
                    <input type="submit" value="Sair">
                </form> 
            </li>
        </ul>
    </div>
</div>
<img src="/../resources/img/list.png" id="btn-menu" onclick="mostraMenu()">