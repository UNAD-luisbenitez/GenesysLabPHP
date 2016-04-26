USE bd_genesyslab;

INSERT INTO Modulos(IdModulo,NameModulo) VALUES (1,'Personal Administrativo'),
  (2,'Personal Misional'),(3,'Visitantes');

INSERT INTO Cargos(IdCargo,NameCargo,DescripcionCargo)
  VALUES (1,'Gerente','Gerente principal de la sede'),
  (2,'Ingeniero Lider','Lidera equipos de trabajo e investigacion'),
  (3,'Secretariado','Colabora en tareas administrativas'),
  (4,'Ingeniero','Hace parte de equipos de trabajo'),
  (0,'Ninguno','No pertenece a la empresa');

INSERT INTO Dependencias(IdDependencia,NameDependencia,DescripcionDependencia)
  VALUES (1,'Gerencia','Tareas administrativas'),
  (2,'Contaduria','finanzas de la empresa'),
  (3,'Investigacion Y Desarrollo','Se crean y perfeccionan productos'),
  (0,'Ninguno', 'Sin asignar');

INSERT INTO SystemAdmins(IdAdmin,NombreAdmin,ApellidosAdmin,PassAdmin)
  VALUES (1234567890,'Luis','Benitez',AES_ENCRYPT('m1-P4ss123','Un4d.81-PwECry12:13:F8'));
##PassAdmin esta ecriptandose con AES, primer parametro es la contrasenia
##segundo parametro llave de cifrado

INSERT INTO Personas(IdPersonas,NamePersonas,ApellidosPersonas,GeneroPersonas,
ProfesionPesonas,Cargos_IdCargo,Dependencias_IdDependencia)
  VALUES (987452368,'Ana','Sanchez','femenino','Tecnologo En Gestion Empresarial',
  3,2),
 (18352247,'Felipe','Cardenas','masculino','Ingeniero Quimico',4,3), (34721325,'Cristina','Arias','femenino','Magister en Ciencias (Quimica)',2,3),
 (114685749,'Daniel','Arevalo','masculino','Magister en Economia',1,1),
 (114685749,'Juanito','Clavito','masculino','',0,0);
