CREATE DATABASE eleicoes
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

-- tabela de criação da votação
-- id_votacao identificação para a votação
-- titulo da votação para ser exibida nas telas
create table VOTACAO(
	id_votacao int
	,titulo varchar(255)
	,data_inicio datetime
	,data_fim datetime
	,PRIMARY KEY (id_votacao)
);

-- id_chapa identificação da chapa para o voto
-- id_votacao atrela as chapas à votação
create table CHAPA(
	id_chapa int
	,id_votacao int
	,titular varchar(255)
	,suplente varchar(255)
	,PRIMARY KEY (id_chapa)
	,FOREIGN KEY (id_votacao) REFERENCES VOTACAO(id_votacao)
);

-- tabela que simula um aluno
create table USUARIO(
	cod_aluno int
	,senha varchar(255)
	,nome varchar(255)
	,PRIMARY KEY (cod_aluno)
);

-- tabela para guardar os votos dos candidatos
-- voto_1 e 2 representam as chapas votadas
-- cod_aluno registra o aluno qua já votou para não votar novamente
create table VOTO(
	id_voto int
	,cod_aluno int
	,id_voto_1 int
	,id_voto_2 int
	,PRIMARY KEY (id_voto)
	,FOREIGN KEY (cod_aluno) REFERENCES USUARIO(cod_aluno)
);


-- scripts para popular os bancos
insert into VOTACAO values (1, "Votação para direção do IFRS", '2018-06-01 12:00:00', '2018-07-31 19:59:59');

insert into CHAPA values (10, 1, 'Evandro', 'Marcelo');
insert into CHAPA values (15, 1, 'Augusto', 'Hertzog');
insert into CHAPA values (20, 1, 'César', 'Guilherme');
insert into CHAPA values (22, 1, 'Tiago', 'Rafael');

insert into USUARIO values (0145130, "12345", "Augusto Hertzog");
insert into USUARIO values (1, "1", "Fulano");
insert into USUARIO values (2, "2", "Ciclano");
insert into USUARIO values (3, "3", "Beltrano");