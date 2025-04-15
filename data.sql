-- INSERTS
-- Plaza
INSERT INTO Plaza (idPlaza, nombre) VALUES
(1, 'Plaza Centro'),
(2, 'Plaza Norte'),
(3, 'Plaza Sur');

-- EmpresaFacturacion
INSERT INTO EmpresaFacturacion (idEmpresaF, nombre, idPlaza) VALUES
(1, 'Empresa A', 1),
(2, 'Empresa B', 1),
(3, 'Empresa C', 2),
(4, 'Empresa D', 2),
(5, 'Empresa E', 3),
(6, 'Empresa F', 3);

-- Departamento
INSERT INTO Departamento (idDepartamento, nombre, idEmpresaF) VALUES
(1, 'Recursos Humanos', 1),
(2, 'Finanzas', 1),
(3, 'Operaciones', 2),
(4, 'Logística', 2),
(5, 'Producción', 3),
(6, 'Ventas', 3),
(7, 'Marketing', 4),
(8, 'Compras', 4),
(9, 'Tecnología', 5),
(10, 'Diseño', 5),
(11, 'Calidad', 6),
(12, 'Legal', 6);

-- Empleado
INSERT INTO Empleado (idEmpleado, nombre, apellidoP, apellidoM, imss, registroPatronal, cp, nss, rfc, curp, fechaAltaImss, sdi, estado, creditoInfonavit, fechaIngreso, fechaAguinaldo, estatus, idDepartamento) 
VALUES
(1, 'Juan', 'Pérez', 'López', '1234567890', 'RP123456', 75000, '9876543210', 'JUAP900101XYZ', 'JUPL900101HDFRZN01', '2020-01-01', 500.75, 'Activo', 1000.00, '2019-01-01', '2023-12-15', 1, 1),
(2, 'María', 'Gómez', 'Martínez', '1234567891', 'RP123457', 76000, '9876543211', 'MARG900102XYZ', 'MARM900102MDFRZN01', '2021-05-01', 450.50, 'Activo', 800.00, '2020-04-15', '2023-12-15', 1, 2),
(3, 'Pedro', 'Hernández', 'Ramírez', '1234567892', 'RP123458', 77000, '9876543212', 'PEHR900103XYZ', 'PEHR900103HDFRZN01', '2019-09-01', 520.00, 'Activo', 950.00, '2018-09-01', '2023-12-15', 1, 3),
(4, 'Ana', 'López', 'García', '1234567893', 'RP123459', 78000, '9876543213', 'ANLO900104XYZ', 'ANLO900104MDFRZN01', '2022-03-01', 480.75, 'Activo', 1100.00, '2021-03-15', '2023-12-15', 1, 4),
(5, 'Luis', 'Ramírez', 'Cruz', '1234567894', 'RP123460', 79000, '9876543214', 'LURA900105XYZ', 'LURA900105HDFRZN01', '2020-07-01', 505.50, 'Activo', 1200.00, '2019-07-01', '2023-12-15', 1, 5),
(6, 'Laura', 'Torres', 'Méndez', '1234567895', 'RP123461', 80000, '9876543215', 'LATO900106XYZ', 'LATO900106MDFRZN01', '2021-12-01', 465.25, 'Activo', 700.00, '2020-12-15', '2023-12-15', 1, 6),
(7, 'Miguel', 'Martínez', 'Vargas', '1234567896', 'RP123462', 81000, '9876543216', 'MIMA900107XYZ', 'MIMA900107HDFRZN01', '2018-06-01', 530.00, 'Activo', 1300.00, '2017-06-01', '2023-12-15', 1, 7),
(8, 'Claudia', 'Rojas', 'Sánchez', '1234567897', 'RP123463', 82000, '9876543217', 'CLRO900108XYZ', 'CLRO900108MDFRZN01', '2019-11-01', 510.75, 'Activo', 950.00, '2018-11-15', '2023-12-15', 1, 8),
(9, 'Jorge', 'González', 'Hernández', '1234567898', 'RP123464', 83000, '9876543218', 'JOGO900109XYZ', 'JOGO900109HDFRZN01', '2022-01-01', 495.50, 'Activo', 850.00, '2021-01-15', '2023-12-15', 1, 9),
(10, 'Sofía', 'Morales', 'Pérez', '1234567899', 'RP123465', 84000, '9876543219', 'SOMO900110XYZ', 'SOMO900110MDFRZN01', '2023-04-01', 460.25, 'Activo', 750.00, '2022-04-15', '2023-12-15', 1, 10),
(11, 'Daniel', 'Fernández', 'Ortiz', '1234567810', 'RP123466', 85000, '9876543220', 'DAFE900111XYZ', 'DAFE900111HDFRZN01', '2020-10-01', 490.00, 'Activo', 950.00, '2019-10-01', '2023-12-15', 1, 11),
(12, 'Isabel', 'Luna', 'Cárdenas', '1234567811', 'RP123467', 86000, '9876543221', 'ISLU900112XYZ', 'ISLU900112MDFRZN01', '2019-02-01', 520.50, 'Activo', 1000.00, '2018-02-15', '2023-12-15', 1, 12),
(13, 'Carlos', 'Reyes', 'Ruiz', '1234567812', 'RP123468', 87000, '9876543222', 'CARE900113XYZ', 'CARE900113HDFRZN01', '2021-08-01', 505.75, 'Activo', 900.00, '2020-08-15', '2023-12-15', 1, 13),
(14, 'Patricia', 'Navarro', 'López', '1234567813', 'RP123469', 88000, '9876543223', 'PANA900114XYZ', 'PANA900114MDFRZN01', '2020-03-01', 470.50, 'Activo', 800.00, '2019-03-01', '2023-12-15', 1, 14),
(15, 'Fernando', 'Castillo', 'Gómez', '1234567814', 'RP123470', 89000, '9876543224', 'FECA900115XYZ', 'FECA900115HDFRZN01', '2022-07-01', 480.75, 'Activo', 850.00, '2021-07-15', '2023-12-15', 1, 15);

-- CuentaBancaria
INSERT INTO CuentaBancaria (idCuentaB, cuentaBancaria, tarjeta, clabeI, nombreBanco, idEmpleado) 
VALUES
(1, '987654320', '2222111133335555', '002010987654321098', 'Banco M', 3),
(2, '234567890', '3333222244446666', '002011234567890987', 'Banco N', 4),
(3, '567891233', '4444333355557777', '002012345678901234', 'Banco O', 5),
(4, '345678911', '5555444466668888', '002013456789012345', 'Banco P', 6),
(5, '456789122', '6666555577779999', '002014567890123456', 'Banco Q', 7),
(6, '678912344', '7777666688881111', '002015678901234567', 'Banco R', 8),
(7, '789123455', '8888777799992222', '002016789012345678', 'Banco S', 9),
(8, '891234566', '9999888811113333', '002017890123456789', 'Banco T', 10);

INSERT INTO HistorialQuincena (idHistorialQ, quincena, fecha, idEmpleado) 
VALUES
(1, 1, '2023-01-15', 1),
(2, 2, '2023-01-30', 2),
(3, 1, '2023-02-15', 3),
(4, 2, '2023-02-28', 4),
(5, 1, '2023-03-15', 5),
(6, 2, '2023-03-30', 6),
(7, 1, '2023-04-15', 7),
(8, 2, '2023-04-30', 8),
(9, 1, '2023-05-15', 9),
(10, 2, '2023-05-30', 10);

INSERT INTO PrimaVacacional (idPrimaV, descripcion, saldo, fecha, idEmpleado)
VALUES
(1, 'Prima vacacional anual', 1500.00, '2023-06-01', 1),
(2, 'Prima vacacional anual', 1800.00, '2023-06-01', 2),
(3, 'Prima vacacional anual', 1700.00, '2023-06-01', 3),
(4, 'Prima vacacional anual', 2000.00, '2023-06-01', 4),
(5, 'Prima vacacional anual', 1600.00, '2023-06-01', 5),
(6, 'Prima vacacional anual', 1900.00, '2023-06-01', 6),
(7, 'Prima vacacional anual', 1750.00, '2023-06-01', 7),
(8, 'Prima vacacional anual', 1550.00, '2023-06-01', 8),
(9, 'Prima vacacional anual', 1800.00, '2023-06-01', 9),
(10, 'Prima vacacional anual', 1650.00, '2023-06-01', 10);

INSERT INTO SaldoImss (idSaldoI, descripcion, saldo, fecha, idEmpleado)
VALUES
(1, 'Saldo IMSS inicial', 500.00, '2023-01-01', 1),
(2, 'Saldo IMSS inicial', 450.00, '2023-01-01', 2),
(3, 'Saldo IMSS inicial', 600.00, '2023-01-01', 3),
(4, 'Saldo IMSS inicial', 550.00, '2023-01-01', 4),
(5, 'Saldo IMSS inicial', 520.00, '2023-01-01', 5),
(6, 'Saldo IMSS inicial', 530.00, '2023-01-01', 6),
(7, 'Saldo IMSS inicial', 470.00, '2023-01-01', 7),
(8, 'Saldo IMSS inicial', 620.00, '2023-01-01', 8),
(9, 'Saldo IMSS inicial', 610.00, '2023-01-01', 9),
(10, 'Saldo IMSS inicial', 500.00, '2023-01-01', 10);

INSERT INTO Vacaciones (idVacaciones, descripcion, fecha, idEmpleado)
VALUES
(1, 'Vacaciones primer trimestre', '2023-03-15', 1),
(2, 'Vacaciones segundo trimestre', '2023-06-15', 2),
(3, 'Vacaciones tercer trimestre', '2023-09-15', 3),
(4, 'Vacaciones cuarto trimestre', '2023-12-15', 4),
(5, 'Vacaciones primer trimestre', '2023-03-15', 5),
(6, 'Vacaciones segundo trimestre', '2023-06-15', 6),
(7, 'Vacaciones tercer trimestre', '2023-09-15', 7),
(8, 'Vacaciones cuarto trimestre', '2023-12-15', 8),
(9, 'Vacaciones primer trimestre', '2023-03-15', 9),
(10, 'Vacaciones segundo trimestre', '2023-06-15', 10);

INSERT INTO Supervisor (idSupervisor, nombreCompleto)
VALUES
(1, 'Jorge Ramírez'),
(2, 'Ana López'),
(3, 'Carlos Mendoza'),
(4, 'María Torres'),
(5, 'Luis Hernández'),
(6, 'Sofía Castillo'),
(7, 'Diego Sánchez'),
(8, 'Elena Rodríguez'),
(9, 'Miguel Flores'),
(10, 'Carla González');

