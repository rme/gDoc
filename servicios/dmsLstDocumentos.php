<?php
require_once '../dmsConexion.php';

$html = ' <h3>Mis Documentos</h3>
          <table border="1" cellspacing="0" cellpading="0">
          <tr>
            <th>ID</th>
            <th>VALIDEZ</th>
            <th>TIPO</th>
            <th>PLANTILLA</th>
            <th>CONTENIDO</th>
            <th>CATALOGO</th>
          </tr>';
$res = $conn->query("select d.*, td.tdoc_descripcion, p.plt_descripcion from dms_documentos d
                      inner join dms_tipos_documento td on td.tdoc_id = d.doc_tdoc_id
                      inner join dms_plantillas p on p.plt_id = d.doc_plt_id
                      order by d.doc_id desc");
foreach($res as $row) {
  $html .= '<tr>
              <td align="right">'.$row["doc_id"].'</td>
              <td align="center">'.$row["doc_validez"].' dias </td>
              <td>'.$row["tdoc_descripcion"].'</td>
              <td>'.$row["plt_descripcion"].'</td>
              <td>'.$row["doc_contenido"].'</td>
              <td>'.$row["doc_catalogo"].'</td>
            </tr>';
}
$html .= '</table>';
echo $html;
