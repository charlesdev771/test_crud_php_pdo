<?php



    function update_my_table($id)
    {
        $pdo = new PDO("mysql:host=localhost;dbname=crudPhp", 'root', '');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $id = $_GET['update'];

        $stmt = $pdo->prepare("UPDATE clientes SET nome=:nome, email=:email WHERE id=:id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    if(isset($_POST['nome']))
    {
        $id = $_GET['update'];
        update_my_table($id);
        echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    }




?>


<form method="post">
    <input type="text" name="nome">
    <input type="text" name="email">
    <input type="submit" value="Send">
</form>

<?php 
        $pdo = new PDO("mysql:host=localhost;dbname=crudPhp", 'root', '');

    $id = $_GET['update'];

    $sql = $pdo->prepare("SELECT * FROM clientes where id = $id");
    $sql->execute();

    $fetchClientes = $sql->fetchAll();

    foreach ($fetchClientes as $key => $value)
    {
        echo '<a href="?update='.$value['id'].'"></a>'.$value['nome'] . ' | ' .$value['email'] . '</a>';
        echo '<hr>';
 }

?>