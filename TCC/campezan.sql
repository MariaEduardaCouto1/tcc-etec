create database campezan;
use campezan;

create table paciente(
cod_pac int not null primary key auto_increment,
nome varchar(50) not null,
cpf int(14) not null unique,
data_nasc date not null,
email varchar(80) not null unique,
cep bigint(8) not null,
rua varchar(50) not null,
numero int not null,
bairro varchar(50) not null,
cidade varchar (50) not null,
estado varchar (50) not null,
telefone varchar (11),
senha varchar(32) not null);

create table medico(
crm int not null primary key auto_increment unique,
nome varchar(50) not null,
cpf int not null,
especialidade varchar(50) not null,
email_med varchar(80) not null);

create table consulta(
cod_consul int not null primary key auto_increment,
crm int not null,
cod_pac int not null,
data_consul date not null,
hora_consul time not null,
foreign key (crm) references medico(crm),
foreign key (cod_pac) references paciente(cod_pac));

create table exame(
num_exame int primary key not null auto_increment,
nome_exame varchar(50) not null,
data_exame date not null,
hora_exame time not null,
observacao varchar(200));

create table exame_consulta(
cod_consul int not null,
num_exame int not null,
foreign key (cod_consul) references consulta(cod_consul),
foreign key (num_exame) references exame(num_exame));

CREATE TABLE exame_paciente (
    cod_examepac int primary key not null auto_increment,
    num_exame int not null,
    cod_pac int not null,
    data_consulta date not null,
    tipo_exame varchar(50) not null,
    caminho_arquivo varchar(200) not null,
    foreign key (num_exame) references exame(num_exame),
    foreign key (cod_pac) references paciente(cod_pac)
);

create table prontuario(
num_pront int primary key not null auto_increment,
cod_pac int not null,
doencas varchar(500) not null,
alergias varchar(500) not null,
cirurgias varchar(500) not null,
tipo_sanguineo varchar(5) not null,
medicamentos varchar(500) not null,
obser_med varchar(600),
foreign key (cod_pac) references paciente(cod_pac));

create table contato (
cod_msg int not null primary key auto_increment,
nome varchar(50) not null,
mensagem longtext not null,
email varchar(80) not null,
fone varchar(80) not null,
created datetime not null);