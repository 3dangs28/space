
-- Codigo de barra
-- https://www.youtube.com/watch?v=Xyl8Ofd5VUo

-- adm -->administrador
-- col -->colaborador
-- usr -->usuario común

CREATE DATABASE animales;
use animales;


-- join de usuarios y perfiles
SELECT 
  t1.ID_USR, t1.NOMBRE, t1.APELLIDO, t1.GENERO, t1.TELEFONO, t1.CORREO, t1.USUARIO, t1.CLAVE, t1.ESTATUS,
  t1.ID_PERFIL, t2.PERFIL
FROM
    USUARIOS as t1
        INNER JOIN
    USR_PERFILES as t2 ON t1.ID_PERFIL = t2.ID_PERFIL;



INSERT INTO  USR_PERFILES ( PERFIL ,  DESCRIPCION ) VALUES ('ADMINISTRADOR', 'PUEDE HACER TODO');
INSERT INTO  USR_PERFILES ( PERFIL ,  DESCRIPCION ) VALUES ('COLABORADOR', 'SOLO PUEDE VER REPORTES');
INSERT INTO  USR_PERFILES ( PERFIL ,  DESCRIPCION ) VALUES ('USUARIO', 'SOLO PUEDE VER EL CONTENIDO DEL SITIO');


CREATE TABLE  USR_PERFILES  (
   ID_PERFIL int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   PERFIL  varchar(30) NOT NULL,
   DESCRIPCION  text NOT NULL
);


CREATE TABLE  USUARIOS  (
   ID_USR INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   ID_PERFIL INT NOT NULL,
   NOMBRE  varchar(30) NOT NULL,
   APELLIDO  varchar(30) NOT NULL,
   GENERO boolean NOT NULL,
   TELEFONO varchar(20) NOT NULL,
   CORREO varchar(40) NOT NULL,
   USUARIO varchar(30) NOT NULL,
   CLAVE varchar(30) NOT NULL,
   ESTATUS boolean NOT NULL,
   FECHA_REG DATE,
   FOREIGN KEY (ID_PERFIL) REFERENCES USR_PERFILES(ID_PERFIL)
);


CREATE TABLE TIPO_ESPECIES  (
   ID_TIPO INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   ID_USR INT NOT NULL,
   TIPO  varchar(40) NOT NULL,
   ESTATUS boolean NOT NULL,
   FECHA_REG DATE,
   FOREIGN KEY (ID_USR) REFERENCES USUARIOS(ID_USR)
);


CREATE TABLE ESPECIES  (
   ID_ESPECIES INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   ID_USR INT NOT NULL,
   ID_TIPO INT NOT NULL,
   NOMBRE  varchar(30) NOT NULL,
   DESCRIPCION text,
   IMG_RUTA varchar (75) NOT NULL,
   ESTATUS boolean NOT NULL,
   FECHA_REG DATE,
   FOREIGN KEY (ID_USR) REFERENCES USUARIOS(ID_USR),
   FOREIGN KEY (ID_TIPO) REFERENCES TIPO_ESPECIES(ID_TIPO)
);


-- join de especies
SELECT 
t1.ID_ESPECIES, t1.ID_USR,t3.NOMBRE as USUARIO, t1.ID_TIPO, t2.TIPO, t1.NOMBRE, t1.DESCRIPCION,t1.FECHA_REG, t1.ESTATUS 
FROM
    ESPECIES as t1, TIPO_ESPECIES as t2, USUARIOS as t3
    WHERE t1.ID_TIPO = t2.ID_TIPO
    AND 
    t1.ID_USR = t3.ID_USR
    ;



  SELECT aud.id_solicitud, to_char(aud.FECHA_SOLICITUD,'dd/mm/yyyy') FECHA_SOLICITUD,aud.CODIGO_PROYECTO, 
uni.DESC_UNIDAD as UNIDAD, tpo.DETALLE_COMPLETO as TIPO_AUDITORIA, pry.DESC_ABREV as TIPO_PROYECTO, aud.AUDITORES,
aud.objetivo_gen_auditoria,aud.ALCANCE_AUDITORIA,aud.PERIODO_EXA,aud.OBJ_ALCANCE,aud.OBJ_RIESGO, aud.DETALLE_PLAN, aud.MOD_ESTATUS,
                sis.nombre,sis.apellido,aud.no_orden, aud.TITULO_AUDITORIA,aud.FECHA_DESDE_SUPER,
                aud.FECHA_HASTA_SUPER, aud.PROCESOS, aud.FECHA_INI_AUDI, aud.FECHA_FIN_AUDI
FROM up_usuarios_sis sis, UP_ADM_AUDITORIAS aud,UNIDADES uni, UP_ADM_TIPO_AUDITORIAS tpo, UP_ADM_AUD_PROY pry
WHERE aud.id_user_supervisor = sis.id_user and aud.VISTO_BUENO='V' and aud.VISTO_PLAN IS NULL
and aud.UNIDAD_AUDITAR = uni.UNIDAD
and aud.UBICACION_AUDITAR = uni.UB_UBICACION
and aud.NIVEL_EJECUTIVO_AUDITAR = uni.NE_NIVEL_EJECUT
and aud.ID_SECUENCIA  = tpo.ID_SECUENCIA 
and aud.ID_PROY  = pry.ID_PROY
order by aud.id_solicitud desc;


CREATE TABLE  MENU  (
   ID_MENU INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   ID_USR INT NOT NULL,
   NOMBRE_MENU varchar (50) NOT NULL,
   ENLACE  varchar (50) NOT NULL,
   POSICION  varchar(2) NOT NULL,
   FECHA_REG DATE,
   FOREIGN KEY (ID_USR) REFERENCES USUARIOS(ID_USR)
);



