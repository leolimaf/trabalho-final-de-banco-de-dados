
-- 2) Qual(is) médicos atenderam quais pacientes?
select fun.nome as 'Médico', cli.nome as 'Paciente' 
from funcionario fun
inner join medico med
on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
left join consulta con
on med.fk_Funcionario_cod_funcionario = con.fk_Medico_fk_Funcionario_cod_funcionario
left join cliente cli 
on cli.cod_cliente = con.fk_Cliente_cod_cliente;

/* TERMINAR */
-- 5) Qual médico atende mais pacientes
select fun.nome as 'Médico que atende mais pacientes'
from funcionario fun
inner join medico med
on fun.cod_funcionario = med.fk_Funcionario_cod_funcionario
inner join consulta con
on med.fk_Funcionario_cod_funcionario  = con.fk_Medico_fk_Funcionario_cod_funcionario
inner join cliente cli
on cli.cod_cliente = con.fk_Cliente_cod_cliente

-- 9) Qual a média e a mediana da idade dos pacientes
-- Média
select avg(c.idade) as 'Média'
from cliente c
-- Mediana
select c.idade as 'Mediana'
from (select idade, 
               count(1) over (partition by 'A') as total_linhas, 
               Row_number() over (order by idade asc) as quantidade_idades
        from   cliente x) c
where c.quantidade_idades = Round(c.total_linhas / 2.0, 0);
