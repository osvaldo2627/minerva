<h1 class="title"><a href="#">Crear una referencia de Tesis</a></h1>
<form action="?controller=Referencia&action=crearTesis" method="POST">
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
        if ($result['campos']['titulo'] == "t") {
            echo "<tr>";
            echo "<td>T&iacute;tulo</td>";
            echo '<td><input type="text" name="titulo" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['departamento'] == "t") {
            echo "<tr>";
            echo "<td>Departamento</td>";
            echo '<td><input type="text" name="departamento" value="" /></td>';
            echo "</tr>";
        }
        if ($result['campos']['autores'] == "t") {
            echo "<tr>";
            echo "<td>Autores</td>";
            echo '<td><textarea name="autores" rows="4" cols="20"></textarea></td>';
            echo "</tr>";
        }
        if ($result['campos']['direccion_contacto_autores'] == "t") {
            echo "<tr>";
            echo "<td>Direcci&oacute;n de contacto de los autores</td>";
            echo '<td><textarea name="direccion_contacto_autores" rows="4" cols="20"></textarea></td>';
            echo "</tr>";
        }
        if ($result['campos']['cant_paginas'] == "t") {
            echo "<tr>";
            echo "<td>Cantidad de p&aacute;ginas</td>";
            echo '<td><input type="text" name="cant_paginas" value="" /></td>';
            echo "</tr>";
        }

        if ($result['campos']['palabras_clave'] == "t") {
            echo "<tr>";
            echo "<td>Palabras clave</td>";
            echo '<td><textarea name="palabras_clave" rows="4" cols="20"></textarea></td>';
            echo "</tr>";
        }

        if ($result['campos']['direccion_online'] == "t") {
            echo "<tr>";
            echo "<td>Direcci&oacute;n de acceso en l&iacute;nea</td>";
            echo '<td><input type="text" name="direccion_online" value="" /></td>';
            echo "</tr>";
        }

        if ($result['campos']['tutor'] == "t") {
            echo "<tr>";
            echo "<td>Tutor</td>";
            echo '<td><input type="text" name="tutor" value="" /></td>';
            echo "</tr>";
        }

        if ($result['campos']['anno_defensa'] == "t") {
            echo "<tr>";
            echo "<td>A&ntilde;o de defensa</td>";
            echo '<td><input type="text" name="anno_defensa" value="" /></td>';
            echo "</tr>";
        }
        ?>
        <tr>
            <td><input type="submit" value="Crear" name="create" /></td>
        </tr>
    </table>
</form>