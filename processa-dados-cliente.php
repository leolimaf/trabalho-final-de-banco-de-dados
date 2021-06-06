<?php
session_start();

try 
{
    $conn = new PDO("mysql:dbname=trabalho_final;host=localhost", "root", "1234567");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $erro) 
{
    $mensagem = $erro->getMessage();
}

$id = 0;
$nome = '';
$endereco = '';
$estadoCivil = '';
$idade = 0;
$sexo = '';
$doencaPreExistente = '';
$examesRealizados = '';
$update = false;

if(isset($_POST['cadastrar']) || isset($_POST['editar'])) {
    if((empty($_POST['nome']) || empty($_POST['endereco']) || empty($_POST['estadoCivil']) || ($_POST['idade'] <= 0)  || empty($_POST['sexo']) || empty($_POST['doencaPreExistente']))){

        $_SESSION['mensagem'] = "Os campos acima devem ser preenchidos corretamente!";
        $_SESSION['msg_tipo'] = "warning";

        header("location: cliente.php");
    }
}


if (isset($_POST['cadastrar']) && !empty($_POST['nome']) && !empty($_POST['endereco']) && !empty($_POST['estadoCivil']) && ($_POST['idade'] > 0) && !empty($_POST['sexo'])) {

    $_POST['sexo'] = $_POST['sexo'] == 'Feminino' ? 'F' : 'M';
    $_POST['doencaPreExistente'] = $_POST['doencaPreExistente'] == 'Não' ? '0' : '1';

    $stmt = $conn->prepare("INSERT INTO cliente (nome, endereco, estado_civil, idade, sexo, doenca_pre_existente, exames_realizados) 
                            VALUES (:NOME, :ENDERECO, :ESTADOCIVIL, :IDADE, :SEXO, :DOENCAPREEXISTENTE, :EXAMESREALIZADOS)");

    $stmt->bindParam(":NOME", $_POST['nome']);
    $stmt->bindParam(":ENDERECO", $_POST['endereco']);
    $stmt->bindParam(":ESTADOCIVIL", $_POST['estadoCivil']);
    $stmt->bindParam(":IDADE", $_POST['idade']);
    $stmt->bindParam(":SEXO", $_POST['sexo']);
    $stmt->bindParam(":DOENCAPREEXISTENTE", $_POST['doencaPreExistente']);
    $stmt->bindParam(":EXAMESREALIZADOS", $_POST['examesRealizados']);

    $stmt->execute();

    $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
    $_SESSION['msg_tipo'] = "success";

    header("location: cliente.php");
}

if (isset($_GET['deletar'])) {

    $stmt = $conn->prepare("DELETE FROM cliente WHERE cod_cliente = :ID");

    $stmt->bindParam(":ID", $_GET['deletar']);

    $stmt->execute();

    $_SESSION['mensagem'] = "Usuário removido com sucesso!";
    $_SESSION['msg_tipo'] = "danger";

    header("location: cliente.php");
}

if (isset($_GET['editar'])) {

    $stmt = $conn->prepare("SELECT * FROM cliente WHERE cod_cliente = :ID");
    $stmt->bindParam(":ID", $id);
    $id = (int) $_GET['editar'];
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $nome = $results[0]["nome"];
    $endereco = $results[0]["endereco"];
    $estadoCivil = $results[0]["estado_civil"];
    $idade =$results[0]["idade"];
    $sexo = $results[0]["sexo"];
    $doencaPreExistente = $results[0]["doenca_pre_existente"];
    $examesRealizados = $results[0]["exames_realizados"];
    $update = true;

}

if (isset($_POST['editar']) && !empty($_POST['nome']) && !empty($_POST['endereco']) && !empty($_POST['estadoCivil']) && ($_POST['idade'] > 0) && !empty($_POST['sexo'])) {
    
    $stmt = $conn->prepare("UPDATE cliente 
                            SET nome = :NOME, endereco = :ENDERECO, estado_civil = :ESTADOCIVIL, idade = :IDADE, sexo = :SEXO, doenca_pre_existente = :DOENCAPREEXISTENTE, exames_realizados = :EXAMESREALIZADOS
                            WHERE cod_cliente = :ID");

    $_POST['sexo'] = $_POST['sexo'] == 'Feminino' ? 'F' : 'M';
    $_POST['doencaPreExistente'] = $_POST['doencaPreExistente'] == 'Não' ? '0' : '1';

    $stmt->bindParam(":NOME", $_POST['nome']);
    $stmt->bindParam(":ENDERECO", $_POST['endereco']);
    $stmt->bindParam(":ESTADOCIVIL", $_POST['estadoCivil']);
    $stmt->bindParam(":IDADE", $_POST['idade']);
    $stmt->bindParam(":SEXO", $_POST['sexo']);
    $stmt->bindParam(":DOENCAPREEXISTENTE", $_POST['doencaPreExistente']);
    $stmt->bindParam(":EXAMESREALIZADOS", $_POST['examesRealizados']);
    $stmt->bindParam(":ID", $_POST['id']);

    $stmt->execute();

    $_SESSION['mensagem'] = "Os dados do usuário foram alterados com sucesso!";
    $_SESSION['msg_tipo'] = "update";

    header("location: cliente.php");
}