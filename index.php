<?php
session_start();

if (isset($_SESSION['login'])) {
    $class = 'none';
} else {
    $class = 'form';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    echo "<div class='container'>
        <form method='post' class='$class'>
            <input type='text' placeholder='nome' name='nome'>
            <input type='text' placeholder='sobrenome' name='sobrenome'>
            <input type='number' placeholder='idade' name='idade'>
            <select name='sexo'>
                <option selected> Sexo </option>
                <option value='masculino'>Masculino</option>
                <option value='feminino'>Feminino</option>
            </select>
            <input type='submit' name='enviar' value='Enviar'>
        </form>
    </div>";


    if (!isset($_SESSION['login'])) {
        echo 'Preencha os campos!';
        if (isset($_POST['enviar'])) {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $sexo = $_POST['sexo'];
            $idade = $_POST['idade'];
            $_SESSION['login'] = [$nome, $sobrenome, $sexo, $idade];
        }
    } else {

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $sexo = $_POST['sexo'];
        $idade = $_POST['idade'];

        if ($sexo == 'feminino') {

            $bemvindo = 'bem-vinda';
        } else {
            $bemvindo = 'bem-vindo';
        }

        echo
        "<div class='container'>
            <div class='box'>
                <h3>Seja $bemvindo</h3>
                <br>
                <h4>Nome: $nome $sobrenome</h4>
                <h4>Idade: $idade</h4>
                <h4>Sexo: $sexo</h4>
            </div>
        </div>";
    }
    ?>
</body>

</html>