




function esqueciSenha(){
    var esqueciSenha = document.getElementById('esqueciSenha')
    var TelaLogin = document.getElementById('divInput');

    TelaLogin.style.display = 'none';   
    esqueciSenha.style.display = 'flex';
    esqueciSenha.style.flexDirection = 'column'
    esqueciSenha.style.justifyContent = 'center';
    esqueciSenha.style.alignContent = 'center';
}