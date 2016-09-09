<?php
require_once '../dmsConexion.php';

$id = $_REQUEST["id"];

foreach($conn->query("SELECT * from dms_plantillas where plt_id = $id ") as $row) {
  $plt_id = $row['plt_id'];
  $plt_descripcion = $row['plt_descripcion'];
  $plt_campos = $row['plt_campos'];
  $json_campos = json_decode($plt_campos);

  $html_campos = '<table>';
  foreach ($json_campos->data as $c) {
    $campo = $c->campo;
    $titulo = $c->titulo;
    $longitud = $c->longitud;
    $componente = isset($c->longitud) ? $c->componente : "";
    $filas = isset($c->filas) ? $c->filas : "";
    $columnas = isset($c->columnas) ? $c->columnas : "";
    $html_campos .= '<tr valign="top"><td align="right">'.$titulo.'</td><td> :: </td>';
    switch ($componente) {
      case "TEXT":
        $html_campos .= '<td><input type="text" id="___'.$campo.'" name="___'.$campo.'" size="'.$longitud.'"></td>';
        break;
      case "TEXTAREA":
        $html_campos .= '<td><textarea id="___'.$campo.'" name="___'.$campo.'" rows="'.$filas.'" cols="'.$columnas.'"></textarea></td>';
        break;
      default:
        $html_campos .= '<td>Desconocido</td>';
        break;
    }
    $html_campos .= '</tr>';
  }
  $html_campos .= '<tr><td><input type="submit" value="Grabar"></td></tr></table>';
  echo $html_campos;
}
