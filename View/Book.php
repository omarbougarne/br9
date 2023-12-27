<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des livres</h1>
    <table>
        <tr>
        <th>ISBN</th>
        <th>Titre</th>
        <th>Genra</th>
        <th>Price</th>
        <th>Number of pages</th>
        <th>Author</th>
        </tr>
        <?php
            foreach($books as $book1){
                echo "<tr> 
                    <td>".$book1->getISBN()."</td>
                    <td>".$book1->getTitle()."</td>
                    <td>".$book1->getGenre()."</td>
                    <td>".$book1->getNumofPges()."</td>
                    <td>".$book1->getPrice()."</td>
                    <td>".$book1->getAuthor()."</td>
                </tr>";
            }
        ?>
            <td></td>
    </table>
</body>
</html>
