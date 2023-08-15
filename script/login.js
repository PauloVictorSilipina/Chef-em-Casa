let lista = localStorage.getItem('user').split(',');
console.log(lista);


const form = document.getElementById('form');
const username = document.getElementById('usuario');
const password = document.getElementById('password');

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
    console.log(inputUser);
    console.log("col-lg-8 offset-lg-2 input-control col-12 success");
    console.log(inputPass);
    console.log("col-lg-8 offset-lg-2 input-control success");
    console.log("---------------------")
    if(inputUser === "col-lg-8 offset-lg-2 input-control col-12 success" && inputPass === "col-lg-8 offset-lg-2 input-control success"){
        console.log("aaaaaaaaa")
        for (var i = 0; i < lista.length; i = i+2) {
            if ((username.value.trim() == lista[i]) && (password.value.trim() == lista[i+1])) {
                window.location.assign("/index.php");
            }
    }
 }};   

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();

    if(usernameValue === '') {
        setError(username, 'Usuário deve ser preenchido!');
    } else {
        setSuccess(username);
    }


    if(passwordValue === '') {
        setError(password, 'Senha deve ser preenchida!');
    } else if (passwordValue.length < 6 || passwordValue.length > 30) {
        setError(password, 'Senha deve ter entre 6 a 30 caracteres!');
    } else {
        setSuccess(password);
    }

};
/*
function limpar(){
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
}

*/