create database transporte;

create table transporte(
	matricula int,
    nome varchar(50),
    meioLocomocao varchar(50),
    tempoFaculdade double,
    veiculoProprio int,
    tempoDestino double,
    primary key(matricula)
);