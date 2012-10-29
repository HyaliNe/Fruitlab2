<html>
    <body>
    <h2>Payment History</h2>
    <table border="1">
    <tr><th>Single Item ID</th><th>Title</th><th>Price</th><th>Quantity</th><th>Total</th><th>Image</th><th>Status</th></tr>
    <?php
    $sum = 0;
    print_r($sales);
    foreach($sales as $s){ 
     $sum = $sum + ($s['price'] * $s['quantity']);
     ?>
    <tr><td><?=$s['single_item_id']?></td><td><?=$s['title']?></td><td><?=$s['price']?></td><td><?=$s['quantity']?></td><td><?=$s['quantity']*$s['price']?></td><td><img src='<?=$s['image_path']?>' width='100' height='100'/></td></tr>
     <?
    }
    ?>
    <tr><td></td><td></td><td></td><td>Total:<?=$sum?></td><td></td><td></td></tr>
    </table>    
    </body>
</html>
