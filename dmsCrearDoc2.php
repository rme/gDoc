<?php
require_once './dmsConexion.php';

$data =  $_POST;

$doc_tdoc_id = $data["doc_tdoc_id"];
$doc_plt_id = $data["doc_plt_id"];
$doc_validez = $data["doc_validez"];

// captura campos del tipo '___xxx'
$dinamicos = array();
foreach ($_POST as $key => $value) {
  if (substr($key, 0, 3) == '___') {
    $dinamicos[substr($key, 3)] = $value;
  }
}
$doc_catalogo = json_encode($dinamicos);

$sSQL = "insert into dms_documentos (doc_tdoc_id, doc_plt_id, doc_validez, doc_contenido, doc_catalogo) values
             ('$doc_tdoc_id',
              '$doc_plt_id',
              '$doc_validez',
              'xxx',
              '$doc_catalogo') ";
$conn->query($sSQL);

// $data["doc_contenido"]

header('Location: index.html');
