<?php
require_once 'dmsConexion.php';

echo '
    <h1>Plantillas</h1><hr>
    <table border="1" cellpadding="0" cellspacing="0">
    <thead>
        <tr><th>ID</th><th>PLANTILLA</th><th>CAMPOS</th></tr>
    </thead>
    <tbody>
    ';

foreach($conn->query('SELECT * from dms_plantillas') as $row) {
    $plt_id = $row['plt_id'];
    $plt_descripcion = $row['plt_descripcion'];
    $plt_campos = $row['plt_campos'];
    $json_campos = json_decode($plt_campos);

    $html_campos = '';
    foreach ($json_campos->data as $c) {
        $html_campos .= json_encode($c) . '<br>';
    }

    echo '
        <tr valign="top">
            <td>'.$plt_id.'</td>
            <td>'.$plt_descripcion.'</td>
            <td>'.$html_campos.'</td>
        </tr>';
}

echo '</tbody>
    </table>';
