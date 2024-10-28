create database if not exists cconnect;
use cconnect;

create table if not exists usuarios(
	id int auto_increment primary key,
	nome_completo text,
    cep int(8),
    email text,
    senha text,
    telefone text
);
create table if not exists moradia(
	id int auto_increment primary key,
    id_usuarios int,
    nome text,
    cep text,
    email text,
    senha text,
    telefone text,
    tipo varchar (10)
);

create table if not exists chat(
	id int auto_increment primary key,
    usuario text,
    mensagem text,
    problema text,
    datas TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table if not exists email_logs(
	id int auto_increment primary key,
	receptor text,
	titulo text,
	mensagem text,
	codigo int 
);

insert into usuarios (email, senha) value ('rick@123456', '123');
insert into chat (mensagem, usuario, problema) value ('teste11', 'henrique123', 'queda de luz');
select * from email_logs;
select * from chat;
select * from usuarios;
select * from moradia;
