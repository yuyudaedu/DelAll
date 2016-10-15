<?php
header('content-type:text/html;charset=utf-8');
$dbconfig = array(
    'dsn' => 'mysql:host=localhost;dbname=del_all;charset=utf8',
    'user' => 'root',
    'pwd' => ''
);

try {
    extract($dbconfig);
    $pdo = new PDO($dsn, $user, $pwd);
    $ids = $_POST['ids'];
    $ids = explode(',',$ids);
    foreach ($ids as $id){
        $addSql = "DELETE FROM user WHERE id=($id)";
        $stmt = $pdo->prepare($addSql);
        $res = $stmt->execute();
    }
    if ($res) {
        echo json_encode(array('state'=>1));
    }
} catch (PDOException $e) {
    $e->getMessage();
}
