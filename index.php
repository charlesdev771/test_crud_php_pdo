<?php

    $pdo = new PDO("mysql:host=localhost;dbname=crudPhp", 'root', '');


    if (isset($_GET['delete']))
    {
        $id = (int)$_GET['delete'];
        $pdo->exec("DELETE FROM clientes WHERE id=$id");
        echo "Deletado!" . $id;
    }

    if(isset($_POST['nome']))
    {
        $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?,?)");
        $sql->execute(array($_POST['nome'], $_POST['email']));
        echo "Inserido!";
    }

    $nome = "bob";

    $pdo->exec("UPDATE clientes set nome='$nome' WHERE id=8");
?>


<form method="post">
    <input type="text" name="nome">
    <input type="text" name="email">
    <input type="submit" value="Send">
</form>

<?php 

    $sql = $pdo->prepare("SELECT * FROM clientes");
    $sql->execute();

    $fetchClientes = $sql->fetchAll();

    foreach ($fetchClientes as $key => $value)
    {
        echo '<a href="?delete='.$value['id'].'">(X)</a>'.$value['nome'] . ' | ' .$value['email'] . '</a>';
        echo '<hr>';
    }

?>