$servername = "mel.db.elephantsql.com";
$username = "umtjlmre";
$password = "m1HDhEWFO-wXz48kddMw3bAo6vUv4i6x";
$dbname = "umtjlmre";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$query = "SELECT MAX(cod_perfil) AS maximo FROM usuario";
$resultado = mysqli_query($conn, $query);
$linha = mysqli_fetch_assoc($resultado);
$maiorNumero = $linha['maximo'];

$novoNumero = $maiorNumero + 1;

$nome = $_POST['nome'];
$senha = $_POST['senha'];

mysqli_query($conn, "INSERT INTO usuario (cod_perfil, nome, senha) VALUES ('$novoNumero', '$nome', '$senha')");

$conn->close();