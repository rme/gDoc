<?php
require_once 'dmsConexion.php';

echo '
    <script src="js/ckeditor.js"></script>
    <script src="js/sample.js"></script>
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/toolbarconfigurator/lib/codemirror/neo.css">

    <script type="text/javascript">
				function doDespPlantilla() {
          plt_id = document.getElementById("doc_plt_id").value;
					$("#div_plantilla").load("servicios/dmsDespPlantilla.php?id=" + plt_id);
				}
    </script>

    <h1>Plantillas</h1><hr>
    <form method="post" action="./dmsCrearDoc2.php">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr><td align="right">Tipo</td><td>
          <select id="doc_tdoc_id" name="doc_tdoc_id">
    ';
foreach($conn->query('SELECT * from dms_tipos_documento') as $row) {
  $tdoc_id = $row['tdoc_id'];
  $tdoc_descripcion = $row['tdoc_descripcion'];
  echo '<option value='.$tdoc_id.'>'.$tdoc_descripcion.'</option>';
}
echo '      </select></td>
          </tr>
          <tr>
            <td align="right">Plantilla</td><td>
              <select id="doc_plt_id" name="doc_plt_id" onChange="doDespPlantilla()">
    ';
foreach($conn->query('SELECT * from dms_plantillas') as $row) {
  $plt_id = $row['plt_id'];
  $plt_descripcion = $row['plt_descripcion'];
  echo '<option value='.$plt_id.'>'.$plt_descripcion.'</option>';
}
echo '        </select>
            <font color="red">(Catalogaci&oacute;n)</font>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div id="div_plantilla"></div>
          </td>
        </tr>
      </table>
    </form>

    <div id="editor">
      <h1>Hola mundo!</h1>
      <p>Aqui un template ...</a>.</p>
    </div>

    <script>
    	initSample();
    </script>
    ';
