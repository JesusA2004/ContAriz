DROP DATABASE IF EXISTS gestionEmpleados;
CREATE DATABASE gestionEmpleados;
USE gestionEmpleados;

create table Patron(
    idPatron int primary key,
    nombre varchar(120)
);

-- Tabla Plaza
CREATE TABLE Plaza (
    idPlaza INT PRIMARY KEY,
    nombre VARCHAR(120),
    idPatron int,
    FOREIGN KEY (idPatron) REFERENCES Patron(idPatron) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla EmpresaFacturacion
CREATE TABLE EmpresaFacturacion (
    idEmpresaF INT PRIMARY KEY,
    nombre VARCHAR(120),
    idPlaza INT, -- Relación con Plaza
    FOREIGN KEY (idPlaza) REFERENCES Plaza(idPlaza) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla Departamento
CREATE TABLE Departamento (
    idDepartamento INT PRIMARY KEY,
    nombre VARCHAR(120),
    idEmpresaF INT, -- Relación con EmpresaFacturacion
    FOREIGN KEY (idEmpresaF) REFERENCES EmpresaFacturacion(idEmpresaF) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla Empleado
CREATE TABLE Empleado (
    idEmpleado INT PRIMARY KEY,
    nombre VARCHAR(50),
    apellidoP VARCHAR(50),
    apellidoM VARCHAR(50),
    imss VARCHAR(50),
    registroPatronal VARCHAR(50),
    cp INT, 
    nss VARCHAR(50),
    rfc VARCHAR(50),
    curp VARCHAR(50),
    fechaAltaImss DATE,
    sdi FLOAT,
    estado VARCHAR(50),
    creditoInfonavit FLOAT,
    fechaIngreso DATE,
    fechaAguinaldo DATE,
    estatus INT,
    idDepartamento INT,
    FOREIGN KEY (idDepartamento) REFERENCES Departamento(idDepartamento) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla CuentaBancaria
CREATE TABLE CuentaBancaria (
    idCuentaB INT PRIMARY KEY, 
    cuentaBancaria VARCHAR(50) NOT NULL,  
    tarjeta VARCHAR(16),                
    clabeI VARCHAR(18),           
    nombreBanco VARCHAR(100),  
    idEmpleado INT,
    FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado)
);

-- Otras tablas
CREATE TABLE HistorialQuincena (
    idHistorialQ INT PRIMARY KEY,
    quincena INT,
    fecha DATE,
    idEmpleado INT,
    FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado)
);

CREATE TABLE PrimaVacacional (
    idPrimaV INT PRIMARY KEY,
    descripcion VARCHAR(100),
    saldo FLOAT,
    fecha DATE,
    idEmpleado INT,
    FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado)
);

CREATE TABLE SaldoImss (
    idSaldoI INT PRIMARY KEY,
    descripcion VARCHAR(100),
    saldo FLOAT,
    fecha DATE,
    idEmpleado INT,
    FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado)
);

CREATE TABLE Supervisor (
    idSupervisor INT PRIMARY KEY,
    nombreCompleto VARCHAR(100)
);

CREATE TABLE Vacaciones (
    idVacaciones INT PRIMARY KEY, 
    descripcion VARCHAR(100),
    fecha DATE,
    idEmpleado INT,
    FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado)
);
