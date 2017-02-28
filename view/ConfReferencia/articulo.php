<h1 class="title"><a href="#">Selecciones los campos validos para los articulos</a></h1>
<div id="contenidos">
    <form action="?controller=ConfReferencia&action=articulo" method="POST">
        <table>
            <tr>
                <td>
                    <?php
                    $arrayCampos = $result['campos'];
                    foreach ($arrayCampos as $key => $value) {
                        if ($key == 'id')
                            continue;
                        if ($value == 't')
                            echo "<input type='checkbox' checked name='$key'>$key</input><br>";
                        else
                            echo "<input type='checkbox' name='$key'>$key</input><br>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Actualizar" name="actualizar" /></td>
            </tr>
        </table>
    </form>
</div>
