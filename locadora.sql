create database locadora;

use  locadora;

======================================================================

create table USUARIO(
nome  int,
cpf  varchar (100),
idade  int,
primary key(nome)
);


======================================================================


create table ENDERECO (
rua  int,
bairro int,
cidade int,
PRIMARY KEY(rua)
);

======================================================================

create table FILMES (
idfilme int auto_increment,
quantidade varchar (100),
nome int,
genero int,
duracao varchar (100),
ano date,
PRIMARY KEY (idfilme)
);





======================================================================

CREATE TABLE LOCA (
idlocar INT AUTO_INCREMENT,
idfilme INT,
data_reservas DATE,
PRIMARY KEY (idlocar),
CONSTRAINT fk_loca_filmes
FOREIGN KEY (idfilme)
REFERENCES filmes (idfilme)

);

======================================================================

CREATE TABLE RESERVA (
idlocar INT AUTO_INCREMENT,
idfilme INT,
nome INT,
data_reservas DATE,
PRIMARY KEY (idlocar),
CONSTRAINT fk_reserva_filmes
FOREIGN KEY (idfilme)
REFERENCES filmes (idfilme),
CONSTRAINT fk_reserva_usuario
FOREIGN KEY (nome)
REFERENCES usuario (nome)

);























 









-- Table `mydb`.`filme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`filme` (
  `idfilme` INT NULL AUTO_INCREMENT,
  `nome` INT NOT NULL,
  `genero` INT NULL,
  `duracao` VARCHAR(100) NULL,
  `ano` VARCHAR(100) NULL,
  PRIMARY KEY (`nome`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`locar`
-- -----------------------------------------------------
CREATE TABLE `locar` (
  `filme_nome` INT NULL,
  `data_reserva` DATE NULL,
  `idlocar` INT NOT NULL AUTO_INCREMENT,
 
  PRIMARY KEY (`filme_nome`),
  INDEX `fk_locar_filme_idx` (`filme_nome` ASC),
  CONSTRAINT `fk_locar_filme`
    FOREIGN KEY (`filme_nome`)
    REFERENCES `mydb`.`filme` (`nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;






