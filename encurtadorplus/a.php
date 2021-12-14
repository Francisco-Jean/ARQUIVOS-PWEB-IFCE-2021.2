<?php

include 'acessobanco.php';

$ref = $_GET['l'];
$stmt = mysqli_stmt_init($conn);
$sql = "SELECT url FROM link WHERE referencia = ?";
$stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
if ($stmt_prepared_okay) {
    mysqli_stmt_bind_param($stmt, "s", $ref);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $result);
    while(mysqli_stmt_fetch($stmt)){
        $sql = "INSERT INTO acesso (hora, referencia) VALUES (?,?);";
        $stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
        if ($stmt_prepared_okay) {
            date_default_timezone_set("America/Sao_Paulo");
            $data = date("H");
            mysqli_stmt_bind_param($stmt, "ss", $data, $ref);
            mysqli_stmt_execute($stmt);
            header ('location:'.$result);
            mysqli_stmt_close($stmt);
        }
        exit();
    }
    mysqli_stmt_close($stmt);
    header("HTTP/1.0 404 Not Found");
}
?>