CREATE database GestaoDeFundos;

USE GestaoDeFundos;

CREATE TABLE Usuario(
id INT PRIMARY KEY, 
Nome NVARCHAR(60), 
Email NVARCHAR (60),
Senha NVARCHAR(15)
);

CREATE TABLE Carteira(
id INT PRIMARY KEY, 
UsuarioId INT, 
SaldoActual DOUBLE(9,2)
);

CREATE TABLE Gasto(
Id INT PRIMARY KEY, 
CarteiraId INT, 
Descricao NVARCHAR(100), 
Valor DOUBLE(9,2), 
DataCompra DATETIME
);

CREATE TABLE Movimentacao(
Id INT PRIMARY KEY, 
CarteiraId INT, 
Tipo ENUM ('Entrada', 'Saída'),
Descricao NVARCHAR(100), 
Valor DOUBLE(9,2), 
DataCompra DATETIME
);

alter table Carteira
add constraint fk_User
foreign key (UsuarioId)
references Usuario(id);

alter table Gasto
add constraint fk_Gasto
foreign key (CarteiraId)
references Carteira (id);

alter table Gasto drop constraint fk_Gasto;

alter table Movimentacao
add constraint fk_Movimentacao
foreign key (CarteiraId)
references Carteira (id);