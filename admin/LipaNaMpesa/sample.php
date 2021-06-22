<?php




function insert_response($jsonMpesaResponse)
{
    // $servername = "localhost";
    // $database = "bank_dbms";
    // $username = "root";
    // $password = "";

   

    try {
        $con = new PDO('mysql:host=localhost;dbname=bank_dbms', 'root', '');
        echo "Connection was Successful";
    } catch (PDOException $e) {
        die("Error Connecting " . $e->getMessage());
    }

    try {
        $insert = $con->prepare("INSERT INTO `sample`(`resultCode`) VALUES (':One')");

        $insert->execute((array)($jsonMpesaResponse));

        $Transaction = fopen('callbackResponse.txt', 'a');
        fwrite($Transaction, json_encode($jsonMpesaResponse));
        fclose($Transaction);
    } catch (PDOException $e) {
        $errlog = fopen('error.txt', 'a');
        fwrite($errlog, $e->getMessage());
        fclose($errlog);

        $logFailedTransaction = fopen('FailedTransaction.txt', 'a');
        fwrite($logFailedTransaction, json_encode($jsonMpesaResponse));
        fclose($logFailedTransaction);
    }
}
