<html>
    <body>
    <table border="1">
    <tr><th>Title</th><th>Price</th><th>Quantity</th><th>Image</th><th>Status</th></tr>
    <?php
    foreach($sales as $s){
      ?>
     <tr><td><?=$s['title']?></td><td><?=$s['price']?></td><td><?=$s['quantity']?></td><td><img src='<?=$s['image_path']?>' width='100' height='100'/></td><td><?=$s['status']?></td></tr>
     <?
    }
    ?>
    </table>    
    </body>
</html>
