


<?php
    $data = $result['usuario']
?>
<h1 class="title"><a href="#">Mi perfil</a></h1>
<form action="?controller=Users&action=modificar" method="POST">
    <div style="width: 100%">
        <div>usuario:</div> <input type="text" name="username" value="<?php echo $data['username']?>" readonly></input>

        <div>nombre completo:</div><input type="text" name="name" value="<?php echo $data['name']?>"></input>

        <div>password</div><input type="password" name="password" value="<?php echo $data['password']?>"></input>
        <div>repetir password</div><input type="password" name="repPassword" value="<?php echo $data['password']?>"></input>
        <div style="width:6em;"><input type="submit" name="modificar" value="modificar"></input></div>
    </div>
</form>