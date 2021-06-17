<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Leonardo Lima">
  <meta name="description" content="Módulo de gerenciamento de clinica de consultas médicas proposto no trabalho final da disciplina de Banco de Dados do curso de Ciência da Computação da EMGE - Escola de Engenharia e Ciência da Computação">
  <title>Módulo de Gerenciamento de Clínica de Consultas Médicas</title>
  <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
  <?php require_once "processa-dados-cliente.php" ?>
  <div class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a href="index.php" class="navbar-brand">Trabalho Final - Banco de Dados</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-md-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="download">Modelo <span class="caret"></span></a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" rel="noopener" href="modelos/modelo-conceitual.php">Conceitual</a>
                  <a class="dropdown-item" href="modelos/modelo-logico.php">Lógico</a>
                  <a class="dropdown-item" href="modelos/modelo-fisico.php">Físico</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dicionario-de-dados.php">Dicionário de Dados</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="download">Cadastrar / Consultar <span class="caret"></span></a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" rel="noopener" href="cliente.php">Cliente</a>
                  <a class="dropdown-item" href="#">Plano de Saúde</a>
                  <a class="dropdown-item" href="#">Funcionário</a>
                  <a class="dropdown-item" href="#">Médico</a>
                  <a class="dropdown-item" href="#">Informações de Pagamento</a>
                </div>
              </li>
            </ul>
      </div>
    </div>
  </div>

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col col-md-3">
        <h3>Cadastrar cliente</h3>
        <hr>
        <form action="processa-dados-cliente.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="form-group">
            <label for="nomeCliente" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" maxlength="120" value="<?php echo $nome ?>">
          </div>
          <div class="form-group mt-3">
            <label for="enderecoCliente" class="form-label">Endereço:</label>
            <input type="text" name="endereco" class="form-control" maxlength="120" value="<?php echo $endereco ?>">
          </div>
          <div class="form-group mt-3">
            <label for="estadoCivilCliente" class="form-label">Estado civil:</label>
            <input type="text" name="estadoCivil" class="form-control" maxlength="45" value="<?php echo $estadoCivil ?>">
          </div>
          <div class="form-group mt-3">
            <label for="idadeCliente" class="form-label">Idade:</label>
            <input type="number" name="idade" class="form-control" value="<?php echo $idade ?>">
          </div>
          <div class="form-group mt-3">
            <label for="sexoCliente" class="form-label">Sexo:</label>
            <select class="form-select" id="selectSexoCliente" name="sexo">
              <option <?php if ($sexo == 'F') echo 'selected' ?>>Feminino</option>
              <option <?php if ($sexo == 'M') echo 'selected' ?>>Masculino</option>
            </select>
          </div>
          <div class="form-group mt-3">
            <label for="doencaPreExistenteCliente" class="form-label">Doença pré-existente:</label>
            <select class="form-select" id="selectDoencaPreExistenteCliente" name="doencaPreExistente">
              <option <?php if ($doencaPreExistente == '0') echo 'selected' ?>>Não</option>
              <option <?php if ($doencaPreExistente == '1') echo 'selected' ?>>Sim</option>
            </select>
          </div>
          <div class="form-group">
            <label for="examesRealizadosCliente" class="form-label mt-3">Exames realizados:</label>
            <textarea class="form-control mb-3" id="textareaExamesRealizados" name="examesRealizados" rows="3"><?php echo $examesRealizados ?></textarea>
          </div>
          <?php
          if (isset($_SESSION['mensagem']) && $_SESSION['msg_tipo'] === "success") {
            echo "<div class='alert alert-success text-center'>$_SESSION[mensagem]</div>";
            unset($_SESSION['mensagem']);
          } elseif (isset($_SESSION['mensagem']) && $_SESSION['msg_tipo'] === "warning") {
            echo "<div class='alert alert-warning text-center'>$_SESSION[mensagem]</div>";
            unset($_SESSION['mensagem']);
          } elseif (isset($_SESSION['mensagem']) && $_SESSION['msg_tipo'] === "update") {
            echo "<div class='alert alert-info text-center'>$_SESSION[mensagem]</div>";
            unset($_SESSION['mensagem']);
          }
          if ($update === true) {
            echo "<div class='form-group text-center'>
                                    <input type='submit' name='editar' class='btn btn-info' value='Editar'>
                        </div>";
          } else {
            echo "<div class='form-group text-center mt-3'>
                            <input type='submit' name='cadastrar' class='btn btn-primary' value='Cadastrar'>
                        </div>";
          }

          ?>
        </form>
      </div>
      <div class="col col-md-9">
        <div class="scroll">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Estado civil</th>
                <th scope="col">Idade</th>
                <th scope="col">Sexo</th>
                <th scope="col">Doença pré-existente</th>
                <th scope="col">Exames realizados</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stmt = $conn->prepare("SELECT * FROM cliente");
              $stmt->execute();
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($results as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                  echo "<td>$value</td>";
                }
                echo "<td>
                                <a class='btn btn-info mb-1' href='?editar=$row[cod_cliente]'>Editar</a>
                                <a class='btn btn-danger' href='processa-dados-cliente.php?deletar=$row[cod_cliente]'>Deletar</a>
                            </td>
                        </tr>";
              }
              ?>
            </tbody>
          </table>
          <?php
          if (isset($_SESSION['mensagem']) && $_SESSION['msg_tipo'] === "danger") {
            echo "<div class='offset-3 col-6'>
                        <div class='alert alert-danger text-center'>$_SESSION[mensagem]</div>
                        </div>";
            unset($_SESSION['mensagem']);
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer mt-auto py-3 bg-primary">
    <div class="container text-center">
      <span class="text-light"><a href="https://github.com/leolimaf/trabalho-final-de-banco-de-dados" target="_blank" style="color: #ffffff; font-size: 33px;"><i class="fa fa-github" aria-hidden="true"></i></a></span>
    </div>
  </footer>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>