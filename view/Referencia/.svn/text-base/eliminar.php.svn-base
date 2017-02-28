<h1 class="title"><a href="#">Eliminar una biblioteca</a></h1>
<form action="?controller=Biblioteca&action=eliminar" method="POST">

    <table>
        <tr>
            <td>Seleccione la biblioteca que desea eliminar</td>

            <td><select name="nombre">
                    <option>Seleccione</option>
                    <?php
                    foreach ($result['bibliotecas'] as $value) {
                        echo "<option>".$value['nombre_biblioteca']."</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td><input type="submit" value="Eliminar" name="create" /></td>
        </tr>
    </table>
</form>