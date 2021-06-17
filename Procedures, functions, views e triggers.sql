/* STORED PROCEDURES */
-- Funcionario
delimiter $$
create procedure imprime_idade_media_funcionario()
begin
	select avg(YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(data_nascimento)))) as 'Idade Média' from funcionario;
end
$$ 
delimiter ;
call imprime_idade_media_funcionario();

-- Cliente
delimiter $$
create procedure insere_cliente(in Nome varchar(120), in Endereco varchar(120), in EstadoCivil varchar(45), in Idade int,
								Sexo char(1), in DoencaPreExistente tinyint, in ExamesRealizados text)
begin
	insert into Cliente (nome, endereco, estado_civil, idade, sexo, doenca_pre_existente, exames_realizados)
    values (Nome, Endereco, EstadoCivil, Idade, Sexo, DoencaPreExistente, ExamesRealizados);
end
$$ 
delimiter ;
call insere_cliente('Henrique Barros Rodrigues', 'Rua Travessa Buenópolis nº 182 - Bairro Vila Nossa Senhora da Aparecida , Belo Horizonte', 'Casado', '56', 'M', '0', null);

-- Plano de Saúde
delimiter $$
create procedure lista_nome_de_todos_planos_de_saude()
begin
    select nome as 'Planos de Saúde' from plano_de_saude;
end
$$ 
delimiter ;
call lista_nome_de_todos_planos_de_saude();

-- Médico
delimiter $$
create procedure lista_especialidades_medico()
begin 
    select m.especialidade as 'Especialidade', f.nome as 'Médico' from medico m
    inner join funcionario f on f.cod_funcionario = m.fk_Funcionario_cod_funcionario;
 end
 $$
 delimiter ;
 call lista_especialidades_medico();
 
-- Informações de Pagamento
delimiter $$
create procedure media_valor_recebido()
begin 
     select avg(valor_recebido) as 'Média dos valores recebidos' from informacoes_de_pagamento;
 end
 $$
 delimiter ;
 call media_valor_recebido();
 
 /* Functions */
 -- Funcionário
 SET GLOBAL log_bin_trust_function_creators = 1;
 delimiter $$
create function idade_funcionario(CodFuncionario int) returns int
begin
	declare idade int;
	set idade = 0;
    select YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(data_nascimento))) into idade from funcionario where cod_funcionario = CodFuncionario;
	return idade;
end
$$ 
delimiter ;
select idade_funcionario(1);

-- Cliente
 delimiter $$
create function doenca_pre_existente(CodCliente int) returns int
begin
    
	return (select doenca_pre_existente from cliente where cod_cliente = CodCliente);
end
$$ 
delimiter ;
select doenca_pre_existente(3);

-- Médico
 delimiter $$
create function nome_por_crm(Crm varchar(45)) returns varchar(120)
begin
    
	return (select f.nome from funcionario f
			inner join medico m on f.cod_funcionario = m.fk_Funcionario_cod_funcionario
            where m.crm = Crm);
end
$$ 
delimiter ;
select nome_por_crm('M7563');

-- Informações de Pagamento
 delimiter $$
create function dias_entre_repasse_e_recebimento(Cod_Pagamento int) returns int
begin
	return (select (data_repasse - data_recebimento) as 'Dias entre repasse e recebimento' from informacoes_de_pagamento where cod_pagamento = Cod_Pagamento limit 1);
end
$$ 
delimiter ;
select dias_entre_repasse_e_recebimento(6);

/* Views */
-- Funcionario
create view vw_medico_atende_paciente
as select fun.nome as 'Médico', cli.nome as 'Paciente'  from funcionario fun
inner join medico med on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
left join consulta con on med.fk_Funcionario_cod_funcionario = con.fk_Medico_fk_Funcionario_cod_funcionario
left join cliente cli on cli.cod_cliente = con.fk_Cliente_cod_cliente;
select * from vw_medico_atende_paciente;

-- Cliente
create view vw_cliente_possui_plano_de_saude
as select c.nome as 'Cliente', pds.nome as 'Plano de Saúde' from cliente as c
inner join possui as p on c.cod_cliente = p.fk_Cliente_cod_cliente
inner join plano_de_saude as pds on pds.cod_plano_de_saude = p.fk_Plano_de_Saude_cod_plano_de_saude;
select * from vw_cliente_possui_plano_de_saude;

-- Plano de Saúde
 