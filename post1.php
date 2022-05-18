<?php
    include "conn.php";

    $text = isset($_POST['text']) ? $_POST['text'] : "";
    // echo $text;

    $sql = "INSERT INTO `data` (`text`)
    VALUES ('<font color=`ff0000`>Traffic Internet Melebihi Dari 50 Mbps</font>');";
    // 
    echo $sql;

    $query = mysqli_query($conn, $sql);
    if($query){
        $msg = "Data Berhasil di input";
    }else{
        $msg = "Data Gagal di input";
    }

    $response = array(
        'status' => 'OK',
        'msg' => $msg
    );

    echo json_encode($response);
?>
