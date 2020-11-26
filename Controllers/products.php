<?php 
    $id = $user["id"];
    try {

        $STH = $DBH->query("SELECT * FROM product where added_by=$id");
        # setting the fetch mode PDO::FETCH_ASSOC –which also is the default fetch mode if notset
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        # showing theresults
        while($row = $STH->fetch()){
            ?>

<tr>
    <th scope='row'> <?php echo $row['code']; ?> </th>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td>KES <?php echo number_format($row['unit_price']); ?></td>
    <td><a class="btn btn-primary m-1" href="dashboard.php?action=Edit&code=<?php echo $row['code']; ?>"><i class="far fa-edit"></i> Edit</a><a class="btn btn-danger m-1" href="dashboard.php?action=Delete&code=<?php echo $row['code']; ?>"><i class="far fa-trash-alt"></i> Delete</a></td>
</tr>


<?php
    }
}
catch(PDOException $e){
    echo "Couldn't fetch the products";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
}
?>