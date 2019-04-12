<div id="barra"></div>
<div id="menu">
    <a href="/"><img src="../../resources/img/sharebooks.png" alt="Logotipo"/></a>
    <div id="sub">
        <nav>
            <ul>
                <li><a href="/index.php/Sharebooks/sobre">O Sharebooks</a></li>
                <li><a href="/index.php/Sharebooks/funcionamento">Como funciona</a></li>
                <li><a href="/index.php/Sharebooks/termos">Termos de uso</a></li>
                <li><a href="/index.php/Sharebooks/contato">Contato</a></li>
            </ul>
        </nav>
        <ul>
            <li><a href="/index.php/Usuario/cadastro">Cadastrar</a></li>
            <li onclick="showlogin()">Entrar</li>
        </ul>
    </div>
</div>
<div id="login">
    <h2>Login</h2>
    <form action="/index.php/Usuario/autenticar" method="POST">
        <p>Usuário:</p>
        <input type="text" name="login" autofocus required/>
        <p>Senha:</p>
        <input type="password" name="senha" required/>
        <input type="submit" value="Entrar"/>
    </form>
    <p>
        <a href="/index.php/Usuario/senha">Esqueci minha senha</a><br>
        <a href="/index.php/Usuario/cadastro">Novo cadastro</a>
    </p>
</div>
<img src="../../resources/img/list.png" id="btn-menu" onclick="mostraMenu()">

<script type="text/javascript" src="../../resources/js/script.js"></script>
