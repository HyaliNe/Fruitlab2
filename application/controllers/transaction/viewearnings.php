<html>
  <body>
    <h2>View Earnings</h2>
    <table border="1">
    <tr><th>ID</th><th>Title</th><th>Price</th><th>Quantity</th><th>Total</th><th>Image</th></tr>
    <?php
    $sum = 0;
    foreach($sales as $s){ 
     $sum = $sum + ($s['price'] * $s['quantity']);
     ?>     
    <tr><td><?=$s['single_item_id']?></td><td><?=$s['title']?></td><td><?=$s['price']?></td><td><?=$s['quantity']?></td><td><?=$s['quantity']*$s['price']?></td><td><img src='<?=$s['image_path']?>' width='100' height='100'/></td></tr>
    <?php
    }
    ?>
    <tr><td></td><td></td><td></td><td>Total:<?=$sum?></td><td></td><td></td></tr>
    </table>    
  </body>
</html>
