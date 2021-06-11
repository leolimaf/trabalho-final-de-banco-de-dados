
-- 2) Qual(is) m�dicos atenderam quais pacientes?
select fun.nome as 'M�dico', cli.nome as 'Paciente'  from funcionario fun
inner join medico med on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
left join consulta con on med.fk_Funcionario_cod_funcionario = con.fk_Medico_fk_Funcionario_cod_funcionario
left join cliente cli on cli.cod_cliente = con.fk_Cliente_cod_cliente;

/* AJUSTAR REGRA DE NEG�CIO: COMISS�O DA CLINICA NOT NULL, VALOR DEFAULT E INSERIR VALORES */
-- 3) Qual o valor pago a cada m�dico, menos a comiss�o
select f.nome as 'M�dico', (idp.valor_recebido ) as 'Valor recebido pelo m�dico menos a comiss�o' from funcionario f
inner join informacoes_de_pagamento idp on f.cod_funcionario = idp.fk_Funcionario_cod_funcionario 
inner join medico m on f.cod_funcionario = m.fk_Funcionario_cod_funcionario;

/* AJUDAR REGRA DE NEG�CIO -> A MESMA QUE A DO 3 */
-- 4) Qual o valor arrecadado com comiss�es

-- 5) Qual m�dico atende mais pacientes
select fun.nome as 'M�dico', count(*) as Atendimentos from funcionario fun
inner join medico med on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
inner join consulta con on med.fk_Funcionario_cod_funcionario  = con.fk_Medico_fk_Funcionario_cod_funcionario
inner join cliente cli on cli.cod_cliente = con.fk_Cliente_cod_cliente
group by fun.nome
having count(*) > 1
order by Atendimentos desc
limit 1;

-- 6) Qual especialidade atende mais e arrecada mais

-- 8) Informa��es para planos de sa�de: Quais planos s�o mais atendidos
select pds.nome as 'Planos de Sa�de', count(*) as Atendimentos from plano_de_saude pds
inner join atende a on pds.cod_plano_de_saude = a.fk_Plano_de_Saude_cod_plano_de_saude
inner join medico m on m.fk_Funcionario_cod_funcionario = a.fk_Medico_fk_Funcionario_cod_funcionario
group by pds.nome
order by Atendimentos desc;

-- 9) Qual a m�dia e a mediana da idade dos pacientes
-- M�dia
select avg(c.idade) as 'M�dia' from cliente c
-- Mediana
select c.idade as 'Mediana' from (select idade, 
count(1) over (partition by 'A') as total_linhas, 
Row_number() over (order by idade asc) as quantidade_idades from   cliente x) c
where c.quantidade_idades = Round(c.total_linhas / 2.0, 0);

/* AJUSTAR REGRA DE NEG�CIO: REGIME DE TRABALHO -> PRESTADOR DE SERVI�O OU FUNCIONARIO */
-- 10) Listar os m�dicos que s�o prestadores de servi�o
