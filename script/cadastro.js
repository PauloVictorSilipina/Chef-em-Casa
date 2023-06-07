localStorage.setItem('user','Flávio,123456,Roberto,654321');
lista = localStorage.getItem('user').split(',');
console.log(lista);


const form = document.getElementById('form');
const username = document.getElementById('usuario');
const password = document.getElementById('password');
const checkpassword = document.getElementById('confirm-password');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
    login(inputControl);
};

const login = element => {
    const inputPass = String(password.parentElement.classList).trim();
    const inputUser = String(username.parentElement.classList).trim();
    const inputCheck = String(checkpassword.parentElement.classList).trim();
    if(inputPass === "input-control success" && inputUser === "input-control success" && inputCheck === "input-control success"){
        window.location.href = "login.html";
    }
 };   

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    const checkpasswordValue = checkpassword.value.trim();

    if(usernameValue === '') {
        setError(username, 'Usuário deve ser preenchido!');
    } else {
        setSuccess(username);
    }


    if(passwordValue === '') {
        setError(password, 'Senha deve ser preenchida!');
    } else if (passwordValue.length < 6 || passwordValue.length > 30) {
        setError(password, 'Senha deve ter entre 6 a 30 caracteres!')
    } else {
        setSuccess(password);
    }
    
    if(checkpasswordValue == '') {
        setError(checkpassword, 'Preencha o campo de confirmação de senha!')
    } else if (checkpasswordValue != passwordValue) {
        setError(checkpassword, 'A senhas devem estar iguais!')
    } else {
        setSuccess(checkpassword);
    }

};
/*
function limpar(){
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
}

*/