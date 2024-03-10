<?php 
    include('TicketClass.php');
    $objekts= new ticket;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="myModal" class="modal">
    <div class="input-form">
    <span class="close">&times;</span>
        <label for="title">Title: </label>
            <input class="input-field" type="text" name="titleInput" id="title">
        <label for="desc">Description: </label>
            <input class="input-field" type="text" name="descInput" id="desc">
        <label for="price">Price: </label>
            <input class="input-field" type="decimal" name="priceInput" id="price">
        <label for="image">Image URL: </label>
            <input class="input-field" type="text" name="imageInput" id="image">
        <label for="status">Status: </label>
            <input class="input-field" type="text" name="statusInput" id="status">
        <label for="time">Date and Time: </label>
            <input class="input-field" type="date" name="timeInput" id="time"> 
        <label for="place">Place: </label>
            <input class="input-field" type="text" name="placeInput" id="place">
            <button id="button" class="button" onclick=save()>Pievienot</button>
    </div>
    </div>
    <div class="container">
        <div class="top-cont">
            <select class="dropdown">
                <option value="1">nesakartots</option>
                <option value="2">kartot no A-Z</option>
                <option value="3">kartot no Z-A</option>
            </select>
            <button class="circle" id="myBtn">+</button>
            
        </div>
        <div class="bottom-cont">
            <?php $ob=$objekts->select("SELECT*FROM tickets");
                if(!$ob){
                    echo 'Database is empty';
                }else{
                while($row=$ob->fetch_assoc()){
                ?>
            <div class="list" id="list<?=$row['ticket_ID'] ?>">
                    <div class="title">
                        <p> <?= $row['title']?></p>
                    </div>
                    <div class="desc">
                        <p> <?= $row['description']?></p>
                    </div>
                    <div class="image">
                        <img src="<?= $row['image']?>"> </img>
                    </div>
                    <div class="price">
                        <p> <?= $row['price']?></p>
                    </div>
                    <div class="time">
                        <p> <?= $row['time']?></p>
                    </div>
                    <div class="place">
                        <p> <?= $row['place']?></p>
                    </div>
                    <div class="status">
                        <p> <?= $row['status']?></p>
                    </div>
                    <button class="button" onclick="buy()">Buy Ticket</button>
            </div>
                <?php
                }
                }
            ?>
        </div>
    </div>
</body>
<script src="ticketscript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</html>