<html>
    <body>
    <h2>Purchase Statement</h2>
    <?php
    foreach($purchases as $s){
     ?>
    <table border="1">
    <tr><th>Cart_ID</th><th>Date</th><th>Status</th><th>Reference</th></tr>
    <tr><td><?=$s['cart_id']?></td><td><?=$s['date']?></td><td><?=$s['status']?></td><td><?=$s['reference_no']?></td></tr>
    </table>
    <br/>
    <?php
    ?>
    <table border="1">
        <tr><th>Title</th><th>Price</th><th>Quantity</th></tr>
    <?php
        for($i = 0; $i < sizeof($s['singlelineitem']);$i++){ 
        $k = $s['singlelineitem'][$i];
   ?>
        <tr><td><?=$k['title']?></td><td><?=$k['price']?></td><td><?=$k['quantity']?></td></tr>
    <?php
        }
    ?>
    </table>
    <br/>
    <?php
    }
    ?>
    </body>
</html>
