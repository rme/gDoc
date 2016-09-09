--
-- Mockup Diorama
-- BD para Gestion Documental
--

create table dms_tipos_documento (
tdoc_id serial not null primary key,
tdoc_descripcion varchar(50) not null
);

insert into dms_tipos_documento (tdoc_descripcion) values
('publico'),
('privado');

create table dms_plantillas (
plt_id serial not null primary key,
plt_descripcion varchar(50) not null,
plt_campos jsonb not null
);

insert into dms_plantillas (plt_descripcion, plt_campos) values
('Memorandum felicitacion', '{"data":[
    {"campo":"campo1", "titulo":"Para", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo2", "titulo":"De", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo3", "titulo":"Cc", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo4", "titulo":"Asunto", "longitud":"200", "componente":"TEXTAREA", "filas":"3", "columnas":"50", "filas":"3", "columnas":"50"}
    ]}'),
('Memorandum llamada de atencion', '{"data":[
    {"campo":"campo_a", "titulo":"Para", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo_b", "titulo":"De", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo_c", "titulo":"Cc", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo_d", "titulo":"Asunto", "longitud":"200", "componente":"TEXTAREA", "filas":"3", "columnas":"50", "filas":"3", "columnas":"50"}
    ]}'),
('Informe Tecnico', '{"data":[
    {"campo":"campo1", "titulo":"Para", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo2", "titulo":"De", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo3", "titulo":"Via", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo4", "titulo":"Objeto del Informe", "longitud":"1000", "componente":"TEXTAREA", "filas":"3", "columnas":"50"}
    ]}'),
('Inf Legal', '{"data":[
    {"campo":"campo1", "titulo":"Para", "longitud":"20", "componente":"TEXT"},
    {"campo":"campo2", "titulo":"De", "longitud":"20", "componente":"TEXT"},
    {"campo":"campo3", "titulo":"Objeto del Informe", "longitud":"1000", "componente":"TEXTAREA", "filas":"3", "columnas":"50"}
    ]}'),
('Proyecto', '{"data":[
    {"campo":"campo11", "titulo":"Unidad Organizacional", "longitud":"100", "componente":"TEXT"},
    {"campo":"campo22", "titulo":"Responsable del Proyecto", "longitud":"45", "componente":"TEXT"},
    {"campo":"campo33", "titulo":"Titulo Proyecto", "longitud":"1000", "componente":"TEXTAREA", "filas":"3", "columnas":"50"},
    {"campo":"campo44", "titulo":"Objeto del Proyecto", "longitud":"2000", "componente":"TEXTAREA", "filas":"3", "columnas":"50"}
]}');

create table dms_documentos (
doc_id serial not null primary key,
doc_tdoc_id int not null,
doc_plt_id int not null,
doc_validez int not null default '0',
doc_contenido text,
doc_catalogo jsonb not null
);

insert into dms_documentos (doc_tdoc_id, doc_validez, doc_contenido) values
('1', '0', 'Contenido UNO'),
('2', '0', 'Contenido Segundo');
