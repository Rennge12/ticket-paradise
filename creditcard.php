<?php
    include('buy.php');
    $objekts = new card;

    $obj = [
        'msg' => '',
        'errCardNumber' => '',
        'errCardHolder' => '',
        'errExpiryDate' => '',
        'errCvv' => '',
        'id' => '',
        'CardNumber' => $_POST['card-number'],
        'CardHolder' => $_POST['card-holder'],
        'ExpiryDate' => $_POST['expiry-date'],
        'cvv' => $_POST['cvv'],
    ];

    if(empty($_POST['expiry-date'])){
        $obj['errExpiryDate'] = "Deriguma termina ievadlauks ir tukss!";
    }
    if(empty($_POST['card-number'])){
        $obj['errCardNumber'] = "Kartes numura ievadlauks ir tukss!";
    }
    if(empty($_POST['card-holder'])){
        $obj['errCardHolder'] = "Kartes ipasnieka ievadlauks ir tukss!";
    }
    if(empty($_POST['cvv'])){
        $obj['errCvv'] = "cvv ievadlauks ir tukss!";
    }


    if(empty($obj['errCardHolder'])&&empty($obj['errCvv'])&&
    empty($obj['cardNumberInput'])&&empty($obj['expiryDateInput'])){

    $cardHolder = $_POST['card-holder'];
    $cardNumber = $_POST['card-number'];
    $expiryDate = $_POST['expiry-date'];
    $cvv = $_POST['cvv'];

    $sql = "INSERT INTO credit_card_info (card_number, card_holder, expiry_date, cvv)
    VALUES ('$cardNumber', '$cardHolder', '$expiryDate', '$cvv')";

        $id = $objekts->insert($sql);
            if ($id) {
            $ob = $objekts->select("SELECT*FROM credit_card_info WHERE ID=$id");
            while($row=$ob->fetch_assoc()){
                $obj['CardHolder'] = $row['card_holder'];
            }
            $obj['msg'] = 'Dati veiksmigi pievienoti';
            $obj['id'] = $id;
            }
    }

    echo json_encode($obj);