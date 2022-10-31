CREATE SCHEMA `bd_alma`;

USE `bd_alma`;

CREATE TABLE `apiario` (
  `idApiario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeApiario` varchar(45) DEFAULT NULL,
  `colmeiaLocalizacao` varchar(100) DEFAULT NULL,
  `condicaoApiario` varchar(100) DEFAULT NULL,
  `produtividadeApiario` set('Excelente','Boa','Neutro','Ruim','Péssimo') DEFAULT NULL,
  `FK_COLMEIA` int(11) NOT NULL
);

CREATE TABLE `colmeia` (
  `idColmeia` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAbelha` varchar(45) NOT NULL,
  `colmeiaApiario` varchar(45) NOT NULL,
  `condicaoColmeia` varchar(100) NOT NULL
);

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `dataContratacao` varchar(10) NOT NULL,
  `horario` set('Matutino','Vespertino','Integral','Noturno') NOT NULL,
  `posto` set('Gerente','Secretária','Apicultor') NOT NULL
);

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
);

ALTER TABLE `apiario`
  ADD PRIMARY KEY (`idApiario`),
  ADD KEY `FK_COLMEIA` (`FK_COLMEIA`);

ALTER TABLE `colmeia`
  ADD PRIMARY KEY (`idColmeia`);

ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

ALTER TABLE `apiario`
  ADD CONSTRAINT `apiario_ibfk_1` FOREIGN KEY (`FK_COLMEIA`) REFERENCES `colmeia` (`idColmeia`);
COMMIT;
