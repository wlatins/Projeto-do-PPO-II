create database fishing_database;
use fishing_database;

create table admin (
id_admin int not null,
email_admin varchar(45) not null,
senha_admin varchar(45) not null,
primary key (id_admin)
);

create table pessoa (
id_pessoa int not null auto_increment,
nome_pessoa varchar(45) not null,
cpf_pessoa varchar(45) not null,
email_pessoa varchar(45) not null,
senha_pessoa varchar(45) not null,
telefone_pessoa varchar(45) not null,
primary key (id_pessoa)
);

create table projeto (
id_projeto int not null auto_increment,
titulo_projeto varchar(45) not null,
autor_projeto varchar(45) not null,
descricao_projeto varchar(1000) not null,
img_projeto longblob not null,
id_pessoa_fk int not null,
primary key (id_projeto),
foreign key (id_pessoa_fk) references pessoa (id_pessoa) on delete cascade
);

create table empresa (
id_empresa int not null auto_increment,
nome_empresa varchar(45) not null,
cnpj_empresa varchar(45) not null,
email_empresa varchar(45) not null,
senha_empresa varchar(45) not null,
telefone_empresa varchar(45) not null,
primary key (id_empresa)
);

insert into admin (id_admin, email_admin, senha_admin) values (0, "walterscjunior7@gmail.com", "e/Fhn_4k685g");
select * from admin;
select * from empresa;
select * from pessoa;
select * from projeto;
#drop database fishing_database;