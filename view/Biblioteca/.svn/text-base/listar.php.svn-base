<h1 class="title"><a href="#">Listado de bibliotecas</a></h1>
<?php
foreach ($result['referencias'] as $key => $value) {
    echo "<h1>$key</h1>";   //estas son las bibliotecas
    echo "<div class='bibliotecas'>";
    foreach ($value as $key1 => $value1) {
        echo "<div class='tipo_referencia'>";   // libro/articulo/...
        echo $key1; //estas son las referencias
        echo "</div>";
        foreach ($value1 as $refk => $referencia) {
            echo "<div class='$key1'>";
            $campos = $result['campos_activos'][$key1];
            $id_referencia = $referencia['id'];

            echo '<form action="?controller=Referencia&action=eliminar" method="POST">';
            echo "<input type='hidden' name='referencia' value='$id_referencia'/>";
            echo "<input type='hidden' name='tipo_referencia' value='$key1'/>";
            echo "<input type='submit'  value='' class='delete_submit'/>";

            foreach ($campos as $akey => $afinal) {
                if ($afinal == "t") {
                    echo "<div><b>" . $akey . "</b>: " . $referencia[$akey] . "</div>";
                }
            }
            echo "</form>";
            echo "</div>";
        }
    }
    echo "</div>";
}
?>