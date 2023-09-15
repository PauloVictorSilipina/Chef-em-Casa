document.addEventListener("DOMContentLoaded", function() {
    // Selecione a tag <a> de logout pelo ID
    var logoutLink = document.getElementById("logout-link");

    // Adicione um ouvinte de evento de clique para a tag <a>
    logoutLink.addEventListener("click", function(e) {
        e.preventDefault(); // Impede o comportamento padrão do link (navegar para outra página)

        // Use AJAX para chamar o PHP que executa o logout
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "logout.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Redirecione para a página de login ou outra página após o logout
                window.location.href = "login.php"; // Substitua "login.php" pelo URL da sua página de login
            }
        };
        xhr.send();
    });
});