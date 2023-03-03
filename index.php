<?php



    if (isset($_GET['delete']))
    {
        $pdo = new PDO("mysql:host=localhost;dbname=crudPhp", 'root', '');
        $id = (int)$_GET['delete'];
        $pdo->exec("DELETE FROM clientes WHERE id=$id");
        echo "Deleted";
    }

    function insert_db()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=crudPhp", 'root', '');
       $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?,?)");
       $sql->execute(array($_POST['nome'], $_POST['email']));
       echo "Insert!";
    }

   if(isset($_POST['nome']))
   {
    insert_db();
   }

    //if(isset($_GET['update']))
   //// {
   //     $nome = $_POST['nome'];
   //     $email = $_POST['email'];
    //    $id = $_GET['id'];
    ///    $sql = $pdo->prepare("UPDATE clientes SET nome = $nome, email = $email WHERE id = 1;");
    //    $sql->execute(array($_POST['nome'], $_POST['email']));
    //    echo "Insert!";
    //}

    function update_with_id($id)
    {
        $nome = "bob";
        $pdo->exec("UPDATE clientes set nome='$nome' WHERE id='$id'");
    }

?>


<form method="post">
    <input type="text" name="nome">
    <input type="text" name="email">
    <input type="submit" value="Send">
</form>

<?php 

$pdo = new PDO("mysql:host=localhost;dbname=crudPhp", 'root', '');

    $sql = $pdo->prepare("SELECT * FROM clientes");
    $sql->execute();

    $fetchClientes = $sql->fetchAll();

    foreach ($fetchClientes as $key => $value)
    {
        echo ' <a href="update.php?update='.$value['id'].'">(update)</a> </a>';

        echo '<a href="?delete='.$value['id'].'">(Delete)</a>'.$value['nome'] . ' | ' .$value['email'] . '</a>';
        echo '<hr>';
    }

?>