create database bd_genesyslab;
use bd_genesyslab;
-- SENTENCIAS DE DEFINICION
CREATE TABLE IF NOT EXISTS cargos (
	IdCargo TINYINT(1) UNSIGNED NOT NULL,
  	NameCargo VARCHAR(100) NOT NULL,
  	DescripcionCargo VARCHAR(200) NULL,
  	PRIMARY KEY (IdCargo)
);

CREATE TABLE IF NOT EXISTS dependencias(
  	IdDependencia TINYINT(1) UNSIGNED NOT NULL,
  	NameDependencia VARCHAR(120) NOT NULL,
  	DescripcionDependencia VARCHAR(200) NULL,
  	PRIMARY KEY (IdDependencia)
);

CREATE TABLE IF NOT EXISTS modulos (
  	IdModulo TINYINT(1) UNSIGNED NOT NULL,
  	NameModulo VARCHAR(80) NOT NULL,
  	PRIMARY KEY (IdModulo)
);

CREATE TABLE IF NOT EXISTS systemadmins(
  	IdAdmin BIGINT(1) UNSIGNED NOT NULL,
  	NombreAdmin VARCHAR(120) NOT NULL,
  	ApellidosAdmin VARCHAR(120) NULL,
  	PassAdmin VARCHAR(40) NOT NULL,
  	FotoAdmin LONGBLOB NULL,
  	PRIMARY KEY (IdAdmin)
);

CREATE TABLE IF NOT EXISTS personas(
  	IdPersonas BIGINT(1) UNSIGNED NOT NULL,
  	NamePersonas VARCHAR(100) NOT NULL,
  	ApellidoPersonas VARCHAR(100) NULL,
  	GeneroPersonas VARCHAR(10) NOT NULL,
  	ProfesionPersonas VARCHAR(100) NULL,
  	FotoPersonas LONGBLOB NULL,
  	Cargos_IdCargo TINYINT(1) UNSIGNED NOT NULL,
  	Dependencias_IdDependencia TINYINT(1) UNSIGNED NOT NULL,
  	Modulos_IdModulos TINYINT(1) UNSIGNED NOT NULL,
  	PRIMARY KEY (IdPersonas),
    FOREIGN KEY (Cargos_IdCargo) REFERENCES cargos(IdCargo),
    FOREIGN KEY (Dependencias_IdDependencia) REFERENCES dependencias(IdDependencia),
    FOREIGN KEY (Modulos_IdModulos) REFERENCES modulos(IdModulo)
);

CREATE TABLE IF NOT EXISTS Historiales(
  	SerialHistorial BIGINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  	HoraIngreso DATETIME(1) NOT NULL,
  	HoraSalida DATETIME(1) NULL,
  	Personas_IdPersonas BIGINT(1) UNSIGNED NOT NULL,
  	PRIMARY KEY (SerialHistorial),
    FOREIGN KEY (Personas_IdPersonas) REFERENCES Personas (IdPersonas)
);