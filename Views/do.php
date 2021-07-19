<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
    $req = $db->prepare('ALTER TABLE store
    DROP COLUMN idCategory;');
$req->execute();
} catch (Exception $e) {
    die('Error :' . $e->getMessage());
}


?>
