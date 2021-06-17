<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Leonardo Lima">
    <meta name="description" content="Módulo de gerenciamento de clinica de consultas médicas proposto no trabalho final da disciplina de Banco de Dados do curso de Ciência da Computação da EMGE - Escola de Engenharia e Ciência da Computação">
    <title>Módulo de Gerenciamento de Clínica de Consultas Médicas</title>
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a href="../index.php" class="navbar-brand">Trabalho Final - Banco de Dados</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-md-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="download">Modelo <span class="caret"></span></a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" rel="noopener" href="modelo-conceitual.php">Conceitual</a>
                  <a class="dropdown-item" href="modelo-logico.php">Lógico</a>
                  <a class="dropdown-item" href="modelo-fisico.php">Físico</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../dicionario-de-dados.php">Dicionário de Dados</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="download">Cadastrar / Consultar <span class="caret"></span></a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" rel="noopener" href="../cliente.php">Cliente</a>
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

      <div class="container">
          <div class="row">
              <div class="col">
                <div class="card border-primary mt-5 mb-5">
                    <div class="card-header">Módulo de Gerenciamento</div>
                    <div class="card-body">
                      <h4 class="card-title mb-3">Clínica de Consulta Médica - Modelo Lógico</h4>
                        <div class="d-flex justify-content-center">
                          <img class="img-fluid" src="../assets/img/Modelo-Logico.JPG" alt="Modelo Lógico">
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>

      <footer class="footer mt-auto py-3 bg-primary mt-5">
        <div class="container text-center">
          <span class="text-light"><a href="https://github.com/leolimaf/trabalho-final-de-banco-de-dados" target="_blank" style="color: #ffffff; font-size: 33px;"><i class="fa fa-github" aria-hidden="true"></i></a></span>
        </div>
      </footer>

      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>