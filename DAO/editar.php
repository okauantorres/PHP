<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$usuario = false;
$id = filter_input(INPUT_GET, 'id');
if($id) {
    
    $usuario = $usuarioDao->findById($id);

} 


if($usuario === false){
    header("Location: index.php");
}


?>

<h1> Editar Usúario</h1>
<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$usuario->getId();?>"/>
    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$usuario->getNome();?>"/>
    </label><br/><br/>

    <label>
        Email:<br/>
        <input type="email" name="email" value="<?=$usuario->getEmail();?>"/>
    </label><br/><br/>

    <input type="submit" value="Salvar"/>
</form>