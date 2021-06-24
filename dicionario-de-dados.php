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

      <div class="container">
          <div class="row">
              <div class="col">
                <div class="card border-primary mt-5 mb-5">
                    <div class="card-header">Módulo de Gerenciamento</div>
                    <div class="card-body">
                        <h4 class="card-title mb-3">Clínica de Consultas Médicas</h4>
                        <pre>/* Entidades */
insert into Cliente (nome, endereco, estado_civil, idade, sexo, doenca_pre_existente, exames_realizados)
values 
('Alberto de Souza Ferreira', 'Rua Campanário nº 67 - Bairro São José, Belo Horizonte', 'Divorciado', '69', 'M', '0', null),
('Ana Maria das Cruzes Teixeira', 'Rua Vila Nova nº 23 - Bairro Planalto, Belo Horizonte', 'Casada', '71', 'F', '0', null),
('Luciana Batista Cardoso', 'Rua São Cristovão nº 44 - Bairro Cachoeirinha, Sabará', 'Casada', '66', 'F', '0', 'Angiografia pulmonar; Campimetria ocular'),
('Sergio Luiz dos Santos', 'Rua Alvorada nº 134 - Bairro São Camilo, Belo Horizonte', 'Solteiro', '43', 'M', '0', null),
('Laudenir Almeida Luxemburgo', 'Rua Olimpus nº 111 - Bairro Industrial, Contagem', 'Casado', '56', 'M', '1', 'Campimetria ocular'),
('Glória Marçal Mendonça', 'Rua Alagoinhas nº 91 - Bairro Centro - Sabará', 'Casada', '59', 'F', '0', 'Espirometria'),
('Nataniel Osório Cesário', 'Rua Santo Antônio nº 89 - Bairro São Francisco, Contagem', 'Solteiro', '48', 'M', '1', 'Eletroencefalograma com mapeamento cerebral'),
('Dario Linhares Almeida', 'Rua Dona Albertina nº 51 - Bairro Centro , Betim', 'Casado', '53', 'M', '0', null),
('Fátima Assis Salgueiro', 'Rua Argentina nº 21 - Bairro Nações Unidas , Sabará', 'Viúva', '76', 'F', '0', 'Angiografia pulmonar'),
('Luís Araujo Carvalho', 'Rua Delfim Moreira nº 156 - Bairro Bela Vista , Belo Horizonte', 'Casado', '79', 'M', '0', null),
('Gabriel Rodrigues Oliveira', 'Rua São Januário nº 268 - Bairro Vila Velha , Sabará', 'Viúvo', '81', 'M', '0', 'Eletroencefalograma com mapeamento cerebral'),
('Fernanda Barros Rodrigues', 'Rua Travessa Buenópolis nº 183 - Bairro Vila Nossa Senhora da Aparecida , Belo Horizonte', 'Casada', '63', 'F', '0', null);

insert into Funcionario (nome, data_nascimento, endereco, sexo, funcao, data_admissao, salario_bruto, estado_civil, dependentes) 
values
('Fábio Cunha Goncalves','1980-05-10', 'Rua Hugo Soares Fagundes nª 1271 - Bairro Gloria, São Paulo', 'M', 'Faxineiro', '2000-10-10', '1500.20', 'Solteiro', '1'),
('Melissa Santos Carvalho','1995-04-06', 'Rua Madre Bárbara Maix nª 70 - Bairro Bela Vista, Contagem', 'F', 'Recepcionista', '2018-05-20', '1542.54', 'Casada', '2'),
('Victor Souza Gomes','1992-07-20', 'Rua A nª 225 - Bairro Assis, Rio de Janeiro', 'M', 'Recepcionista', '2020-05-15', '2000.20', 'Casado', '2'),
('Ryan Gomes Melo','1986-07-16', 'Avenida Doutor Otaviano Pereira Mendes nª 1129 - Bairro Alvorada, Belo Horizonte', 'M', 'Assistente de RH', '2005-10-16', '3700.25', 'Casado', '3'),
('Fábio Almeida Cardoso','1990-10-25', 'Quadra 110 Sul Avenida LO 3 nª 127  - Bairro Palmas, Rio de Janeiro ', 'M', 'Auxiliar administrativo', '2008-12-24', '3750.25', 'Solteiro', '1'),
('Davi Rocha Santos','1970-02-21', 'Praça dos Diamantes nª 606 - Bairro Serra, Belo Horizonte', 'M', 'Oftamologista', '1995-01-01', '4000.10', 'Casado', '4'),
('Lavinia Pinto Almeida','1990-04-04', 'Rodovia Mauro Miranda Madureira nª 121 - Bairro Amazonas, Betim ', 'F', 'Ginecologista', '2000-01-12', '7040.54', 'Casada', '2'),
('Júlia Alves Castro','1985-04-10', 'Rua Eugênio ldefonso nª 1465 - Bairro Horto, São Paulo', 'F', 'Enfermeira', '2005-07-22', '1600.40', 'Solteira', '1'),
('Martim Silva Costa','1988-11-11', 'Rua Alcatifa nª 432 - Bairro Centro, Belo Horizonte', 'M', 'Psiquiatra', '2015-07-22', '6601.42', 'Casado', '3'),
('Joao Cardoso Martins','1960-05-06', 'Travessa Caxias nª 418 - Bairro Santa Tereza, Porto Alegre', 'M', 'Cirurgião Plástico', '1990-01-04', '10000.12', 'Casado', '4'),
('Rebeca Cardoso Goncalves','1994-02-14', 'Rua 42 nª 796 - Bairro Andradas , Manaus', 'F', 'Cardiologista', '2018-03-17', '2200.13', 'Solteira', '1'),
('Alice Fernandes Pinto','1974-01-18', 'Rua José Benício nª 200 - Bairro Santos, São Paulo', 'F', 'Oftamologista', '2000-10-25', '9800.19', 'Casada', '2'),
('Arthur Barros Alves','1967-06-03','Rua Jornal Mário Galvão nº 700 - Bairro Aparecida, Belo Horizonte', 'M', 'Cirurgião Plástico', '2016-10-13', '9.020', 'Casado','4'),
('Isabella Ferreira Souza','1975-08-21', 'Rua B nª 243 - Bairro Assis, Rio de Janeiro', 'F', 'Psiquiatra', '2021-01-19', '5000.20', 'Casada', '3'),
('Lucas Barbosa Dias','1983-01-30', 'Rua Pouso Alegre nª 33 - Bairro Nova Almeida, Betim', 'M', 'Cardiologista', '2018-01-21', '5000.20', 'Casado', '3');

insert into Plano_de_Saude (nome, registro_anvisa, valor_consulta)
values
('SulAmérica', 'KJ45DW', '200.00'),
('AssimSaúde', 'HI3Q7', '150.00'),
('GreenLine', 'ART254', '155.99'),
('Bradesco', 'BR2W33', '100.98'),
('Amil', 'ART21Q', '255.55'),
('Hapvida', 'HPU772' , '180.80');

insert into Informacoes_de_Pagamento (valor_recebido, comissao_clinica, data_recebimento, data_repasse, imposto_retido, fk_Funcionario_cod_funcionario, fk_Plano_de_Saude_cod_plano_de_saude)
values
('30.22', default, '2021-05-06', '2021-05-20', default, '5', '3'), 
('40.58', default, '2021-06-01', '2021-06-03', default, '2', '6'),
('50.58', default, '2021-01-20', '2021-02-01', default, '12', '1'),
('30.10', default, '2021-04-01', '2021-04-03', default, '11', '4'),
('50.18', '0.2', '2021-03-20', '2021-03-29', default, '1', '5'),
('45.16', default, '2021-02-15', '2021-02-25', default, '10', '2'),
('80.00', default, '2021-05-12', '2021-05-18', default, '8', '5'),
('100.00',default, '2021-01-01', '2021-01-07', default, '3', '1'),
('10.00', default, '2021-02-07', '2021-002-14', default, '2', '3'),
('37.88', default, '2021-04-05', '2021-04-18', default, '7', '2'),
('40.00', '0.3', '2021-03-10', '2021-03-20', default, '4', '6'),
('78.55', default, '2021-06-01', '2021-06-05', default, '6', '3');

insert into Medico (crm, especialidade, escola_origem, tipo_residencia_medica, regime_trabalho,fk_Funcionario_cod_funcionario)
values
('M4578', 'Oftalmologia', 'UFMG', 'Oftalmologia', 'Funcionario',  '6'),
('M2317', 'Clinico Geral', 'USP', 'Pediatria', 'Prestador de Serviço', '7'),
('M1780', 'Cardiologia', 'UFMG', 'Cardiologia', 'Funcionario', '8'),
('M4200', 'Psiquiatria', 'UFRJ', 'Psiquiatria', 'Prestador de Serviço', '9'),
('M7563', 'Cirurgiao', 'PUC', 'Clinico Geral', 'Funcionario', '10'),
('M8546', 'Cardiologia', 'USP', 'Cardiologia', 'Prestador de Serviço', '11'), 
('M3457', 'Oftalmologia', 'UFMG', 'Oftalmologia', 'Funcionario', '12'), 
('M2891', 'Clinico Geral', 'PUC', 'Oftalmologia', 'Prestador de Serviço', '13'),
('M4579', 'Psiquiatria', 'USP', 'Psiquiatria', 'Funcionario', '14'), 
('M3754', 'Clinico Geral', 'UNI', 'Clinico Geral', 'Funcionario', '15');

/* Relacionamentos */
insert into Possui (fk_Cliente_cod_cliente, fk_Plano_de_Saude_cod_plano_de_saude)
values
('1', '2'),
('5', '3'),
('1', '1'),
('6', '6'),
('7', '2'),
('8', '4'),
('9', '5'),
('4', '2'),
('2', '6'),
('10', '5'),
('7', '4'),
('3', '3'),
('11', '1'),
('12', '2'),
('5', '4'),
('11', '3');

insert into Atende (fk_Plano_de_Saude_cod_plano_de_saude, fk_Medico_fk_Funcionario_cod_funcionario)
values
('3', '6'),
('1', '7'),
('6', '8'),
('1', '9'),
('2', '10'),
('4', '11'),
('3', '12'),
('6', '13'),
('5', '14'),
('5', '15'),
('2', '15'),
('4', '14'),
('3', '13'),
('6', '12'),
('1', '7'),
('4', '8'),
('2', '9'),
('6', '10'),
('3', '10'),
('4', '7'),
('3', '7');

insert into Consulta(fk_Medico_fk_Funcionario_cod_funcionario, fk_Cliente_cod_cliente)
values
('6','1'),
('6','2'),
('6','3'),
('6','4'),
('6','5'),
('7','6'),
('7','7'),
('8','8'),
('8','9'),
('8','10'),
('9','10'),
('9','11'),
('9','12'),
('10','9'),
('11','9'),
('12','8'),
('12','7'),
('12','6'),
('12','5'),
('13','5'),
('14','4'),
('14','2');</pre>
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