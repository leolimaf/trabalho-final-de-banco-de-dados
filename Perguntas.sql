-- 1) Quantas consultas foram realizadas num determinado período e os valores recebidos
select count(*) as 'Número de consultas', sum(idp.valor_recebido) as 'Valor Total' from consulta con
inner join medico med on med.fk_Funcionario_cod_funcionario = con.fk_Medico_fk_Funcionario_cod_funcionario
inner join funcionario fun on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
left join informacoes_de_pagamento idp on idp.fk_Funcionario_cod_funcionario = fun.cod_funcionario;

-- 2) Qual(is) médicos atenderam quais pacientes?
select fun.nome as 'Médico', cli.nome as 'Paciente'  from funcionario fun
inner join medico med on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
left join consulta con on med.fk_Funcionario_cod_funcionario = con.fk_Medico_fk_Funcionario_cod_funcionario
left join cliente cli on cli.cod_cliente = con.fk_Cliente_cod_cliente;
select * from vw_medico_atende_paciente;

-- 3) Qual o valor pago a cada médico, menos a comissão
select f.nome as 'Médico', (idp.valor_recebido ) as 'Valor recebido pelo médico menos a comissão' from funcionario f
inner join informacoes_de_pagamento idp on f.cod_funcionario = idp.fk_Funcionario_cod_funcionario 
inner join medico m on f.cod_funcionario = m.fk_Funcionario_cod_funcionario;

-- 4) Qual o valor arrecadado com comissões
select sum(valor_recebido) as 'Valor arrecadado' from informacoes_de_pagamento;

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
select med.especialidade as Especialidade, sum(pds.valor_consulta) as Lucro from medico med
inner join consulta con on med.fk_Funcionario_cod_funcionario = con.fk_Medico_fk_Funcionario_cod_funcionario
inner join cliente cli on cli.cod_cliente = con.fk_Cliente_cod_cliente
inner join possui pos on cli.cod_cliente = pos.fk_Cliente_cod_cliente
inner join plano_de_saude pds on pds.cod_plano_de_saude = pos.fk_Plano_de_Saude_cod_plano_de_saude
group by med.especialidade
having count(*) > 1
order by Lucro desc
limit 1;

-- 7) O paciente em tratamento crônico não pode passar mais de 6 meses entre consultas, o sistema deverá informar automaticamente
 delimiter $$
create procedure tratamento_menos_de_seis_meses(in CodCliente int)
begin
	select c.nome as Paciente, if(c.doenca_pre_existente = '1', concat('Não pode passar mais de 6 meses entre consultas'), null) as Alerta
			from cliente c
            where cod_cliente = CodCliente;
end
$$ 
delimiter ;
call tratamento_menos_de_seis_meses(5);
call tratamento_menos_de_seis_meses(2);
call tratamento_menos_de_seis_meses(7);

select c.nome as Paciente, if(c.doenca_pre_existente = '1', concat('O paciente em tratamento crônico não pode passar mais de 6 meses entre consultas'), null) as Mensagem 
from cliente c;

-- 8) Informações para planos de saúde: Quais planos são mais atendidos
select pds.nome as 'Planos de Saúde', count(*) as Atendimentos from plano_de_saude pds
inner join atende a on pds.cod_plano_de_saude = a.fk_Plano_de_Saude_cod_plano_de_saude
inner join medico m on m.fk_Funcionario_cod_funcionario = a.fk_Medico_fk_Funcionario_cod_funcionario
group by pds.nome
order by Atendimentos desc;

-- 9) Qual a média e a mediana da idade dos pacientes
-- Média
select avg(c.idade) as 'Média' from cliente c;
-- Mediana
select c.idade as 'Mediana' from (select idade, 
count(1) over (partition by 'A') as total_linhas, 
Row_number() over (order by idade asc) as quantidade_idades from   cliente x) c
where c.quantidade_idades = Round(c.total_linhas / 2.0, 0);

-- 10) Listar os médicos que são prestadores de serviço
select f.nome as 'Prestador de serviço' from funcionario f
inner join medico m on f.cod_funcionario = m.fk_Funcionario_cod_funcionario
 where upper(m.regime_trabalho) = 'PRESTADOR DE SERVIÇO';
