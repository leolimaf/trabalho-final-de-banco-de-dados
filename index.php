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
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a href="index.php" class="navbar-brand">Trabalho Final - Banco de Dados</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-md-auto">
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

      <div class="container">
          <div class="row">
              <div class="col">
                <div class="card border-primary mt-5 mb-5">
                    <div class="card-header">Módulo de Gerenciamento</div>
                    <div class="card-body">
                      <h4 class="card-title mb-3">Clínica de Consulta Médica</h4>
                      <ol>
                          <li class="card-text">Cliente: nome, endereço, estado civil, idade, sexo, doença pré-existente, exames realizados</li>
                          <li class="card-text">Plano de Saúde: Nome, registro na ANVISA, valores pagos por consulta</li>
                          <li class="card-text">Médico: Nome, CRM, especialidade, data nascimento, escola de origem, tipo de residência médica, estado civil, regime de trabalho (prestador de serviço/funcionário), planos que atende</li>
                          <li class="card-text">Funcionários clínica:  nome, data nascimento, endereço, sexo, função, data de admissão, salario bruto, estado civil,  dependentes</li>
                          <li class="card-text">Informação de pagamento: valores recebidos por médico, comissão da clínica se houver, data do recebimento, data do repasse ao médico, imposto retido(5%)</li>
						  <li class="card-text">Deverá implementar procedure, function, views e trigger, no mínimo uma para cada item</li>
					  </ol>
                      <h5>Passos do trabalho:</h5>
                      <ol type="a">
                          <li class="card-text">Efetuar a modelagem lógica, física e conceitual, usando BrModelo (Não pode ser outro)</li>
                          <li class="card-text">Fazer o dicionário de dados</li>
                          <li class="card-text">Poderá ser em grupo de até 03 pessoas</li>
                          <li class="card-text">O trabalho será apresentado via web, no ambiente de produção</li>
                          <li class="card-text">As apresentações ocorreram de 14 a 19 de Junho, via web</li>
                          <li class="card-text">Deverá ser postado, o projeto conceitual, projeto logico e físico, bem como as implementações em PHP, e o dicionário de dados no moodle, até 21/06/2021</li>
                      </ol>
                      <h5>Perguntas essenciais a serem respondidas:</h5>
                      <ol>
                          <li class="card-text">Quantas consultas foram realizadas num determinado período e os valores recebidos</li>
                          <li class="card-text">Qual(is) médicos atenderam quais pacientes</li>
                          <li class="card-text">Qual o valor pago a cada médico, menos a comissão</li>
                          <li class="card-text">Qual o valor arrecadado com comissões</li>
                          <li class="card-text">Qual médico atende mais pacientes</li>
                          <li class="card-text">Qual especialidade atende mais e arrecada mais</li>
                          <li class="card-text">O paciente em tratamento crônico não pode passar mais de 6 meses entre consultas, o sistema deverá informar automaticamente</li>
                          <li class="card-text">Informações para planos de saúde: Quais planos são mais atendidos</li>
                          <li class="card-text">Qual a média e a mediana da idade dos pacientes</li>
                          <li class="card-text">Listar os médicos que são prestadores de serviço</li>
                      </ol>
                    </div>
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