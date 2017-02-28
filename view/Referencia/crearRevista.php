<h1 class="title"><a href="#">Crear una Revista</a></h1>
<form action="?controller=Referencia&action=crearRevista" method="POST">
    <table style="margin-left: 20px;">
        <tr>
            <td>Seleccione una biblioteca</td>
            <td>
                <select name="nombre_biblioteca">
                    <?php
                    foreach ($result['bibliotecas'] as $value) {
                        echo "<option>" . $value['nombre_biblioteca'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        if ($result['campos']['issn'] == "t") {
            echo "<tr>";
            echo "<td>ISSN</td>";
            echo '<td><input type="text" name="issn" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['titulo'] == "t") {
            echo "<tr>";
            echo "<td>T&iacute;tulo</td>";
            echo '<td><input type="text" name="titulo" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['numero'] == "t") {
            echo "<tr>";
            echo "<td>N&uacute;mero</td>";
            echo '<td><input type="text" name="numero" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['volumen'] == "t") {
            echo "<tr>";
            echo "<td>Volumen</td>";
            echo '<td><input type="text" name="volumen" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['anno_publicacion'] == "t") {
            echo "<tr>";
            echo "<td>A&ntilde;o de publicaci&oacute;n</td>";
            echo '<td><input type="text" name="anno_publicacion" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['edicion'] == "t") {
            echo "<tr>";
            echo "<td>Edici&oacute;n</td>";
            echo '<td><input type="text" name="edicion" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['editorial'] == "t") {
            echo "<tr>";
            echo "<td>Editorial</td>";
            echo '<td><input type="text" name="editorial" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['frecuencia'] == "t") {
            echo "<tr>";
            echo "<td>Frecuencia</td>";
            echo '<td><input type="text" name="frecuencia" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['cant_paginas'] == "t") {
            echo "<tr>";
            echo "<td>Cantidad de p&aacute;ginas</td>";
            echo '<td><input type="text" name="cant_paginas" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['direccion_online'] == "t") {
            echo "<tr>";
            echo "<td>Direcci&oacute;n de acceso en l&iacute;nea</td>";
            echo '<td><input type="text" name="direccion_online" value="" /></td>';
            echo "</tr>";
        }
        ?>
        <tr>
            <td><input type="submit" value="Crear" name="create" /></td>
        </tr>
    </table>
</form>