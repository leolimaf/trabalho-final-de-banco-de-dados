
-- 2) Qual(is) médicos atenderam quais pacientes?
select fun.nome as 'Médico', cli.nome as 'Paciente'  from funcionario fun
inner join medico med on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
left join consulta con on med.fk_Funcionario_cod_funcionario = con.fk_Medico_fk_Funcionario_cod_funcionario
left join cliente cli on cli.cod_cliente = con.fk_Cliente_cod_cliente;

-- 3) Qual o valor pago a cada médico, menos a comissão
select f.nome as 'Médico', (idp.valor_recebido ) as 'Valor recebido pelo médico menos a comissão' from funcionario f
inner join informacoes_de_pagamento idp on f.cod_funcionario = idp.fk_Funcionario_cod_funcionario 
inner join medico m on f.cod_funcionario = m.fk_Funcionario_cod_funcionario;

-- 4) Qual o valor arrecadado com comissões

-- 5) Qual médico atende mais pacientes
select fun.nome as 'Médico', count(*) as Atendimentos from funcionario fun
inner join medico med on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
inner join consulta con on med.fk_Funcionario_cod_funcionario  = con.fk_Medico_fk_Funcionario_cod_funcionario
inner join cliente cli on cli.cod_cliente = con.fk_Cliente_cod_cliente
group by fun.nome
having count(*) > 1
order by Atendimentos desc
limit 1;

-- 6) Qual especialidade atende mais e arrecada mais

-- 8) Informações para planos de saúde: Quais planos são mais atendidos
select pds.nome as 'Planos de Saúde', count(*) as Atendimentos from plano_de_saude pds
inner join atende a on pds.cod_plano_de_saude = a.fk_Plano_de_Saude_cod_plano_de_saude
inner join medico m on m.fk_Funcionario_cod_funcionario = a.fk_Medico_fk_Funcionario_cod_funcionario
group by pds.nome
order by Atendimentos desc;

-- 9) Qual a média e a mediana da idade dos pacientes
-- Média
select avg(c.idade) as 'Média' from cliente c
-- Mediana
select c.idade as 'Mediana' from (select idade, 
count(1) over (partition by 'A') as total_linhas, 
Row_number() over (order by idade asc) as quantidade_idades from   cliente x) c
where c.quantidade_idades = Round(c.total_linhas / 2.0, 0);

-- 10) Listar os médicos que são prestadores de serviço
select f.nome as 'Prestador de serviço' from funcionario f
inner join medico m on f.cod_funcionario = m.fk_Funcionario_cod_funcionario
 where upper(m.regime_trabalho) = 'PRESTADOR DE SERVIÇO';
