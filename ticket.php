<?php 
    include('TicketClass.php');

    $objekts = new ticket;

    $obj = [
        'msg' => '',
        'errTitle' => '',
        'errDesc' => '',
        'errPrice' => '',
        'errImage' => '',
        'errPlace' => '',
        'errStatus' => '',
        'PriceError' => '',
        'id' => '',
        'desc' => $_POST['descInput'],
        'title' => $_POST['titleInput'],
        'time' => $_POST['timeInput'],
        'image' => $_POST['imageInput'],
        'place' => $_POST['placeInput'],
        'status' => $_POST['statusInput'],
        'price' => $_POST['priceInput']
    ];

    if(empty($_POST['titleInput'])){
        $obj['errTitle'] = "Nosaukuma ievadlauks ir tukss!";
    }
    if(empty($_POST['descInput'])){
        $obj['errDesc'] = "Apraksta ievadlauks ir tukss!";
    }
    if(empty($_POST['imageInput'])){
        $obj['errImage'] = "Attēla ievadlauks ir tukss!";
    }
    if(empty($_POST['placeInput'])){
        $obj['errPlace'] = "Notikuma vietas ievadlauks ir tukss!";
    }
    if(empty($_POST['timeInput'])){
        $obj['errTime'] = "Datuma un laika ievadlauks ir tukss!";
    }
    if(empty($_POST['statusInput'])){
        $obj['errStatus'] = "Statusa ievadlauks ir tukss!";
    }
    if(empty($_POST['priceInput'])){
        $obj['PriceError'] = "Cenas ievadlauks ir tukss!";
    }



    if(empty($obj['errTitle'])&&empty($obj['errDesc'])&&
    empty($obj['errImage'])&&empty($obj['PriceError'])&&empty($obj['errStatus'])
    &&empty($obj['errPlace'])&&empty($obj['errTime'])){

        $name = $_POST['titleInput'];
        $desc = $_POST['descInput'];
        $price = $_POST['priceInput'];
        $status = $_POST['statusInput'];
        $image = $_POST['imageInput'];
        $time = $_POST['timeInput'];
        $place = $_POST['placeInput'];

        $sql = ("INSERT INTO tickets (`title`,`description`, 
        `price`, `status`, `image`, `time`, `place`) 
        VALUES ('$name', '$desc', '$price', '$status', '$image', 
        '$time', '$place')");

        $id = $objekts->insert($sql);
            if ($id) {
            $ob = $objekts->select("SELECT*FROM tickets WHERE ticket_ID=$id");
            while($row=$ob->fetch_assoc()){
                $obj['time'] = $row['time'];
            }
            $obj['msg'] = 'Dati veiksmigi pievienoti';
            $obj['id'] = $id;
            }
    }

    echo json_encode($obj);
?>