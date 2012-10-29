<html>
<body>
    <?php echo form_open_multipart('transaction/withdrawbalance')?>
    
     <?php if (validation_errors()): ?>
		<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading">Error!</h4>
		<?php echo validation_errors(); ?>
		</div>
    <?php endif ?>
    <?php 
    echo $error;
    ?>
    <h2>Withdraw Balance</h2>
    <label for="currentbalance">Current Balance</label>
    $<input value="<?=$customer['balance']?>" type="text" size="3" name="balance" readonly="readonly"/>
    <label for="deposit">Enter a value</label><input type="text" name="money"/>
    <br/>
    <input type="submit" name="withdraw" value="Withdraw"/> <input type="submit" name="deposit" value="Deposit"/>
    <br/>
    <br/>
    <table border='1'>    
      <thead><th>Transaction ID</th><th>Date</th><th>Credit/Debit</th><th>Remarks</th></thead>
       <tbody>
        <?php
        for ($i = 0; $i < sizeof($transactions); $i++) {
         if(isset($transactions[$i])){  //temporal fixed.
            $transaction = $transactions[$i];
        ?>
            <td class="transaction"><?=$transaction['transaction_id']?></td>
            <td class="dateCell "><?=date('Y-m-d',strtotime($transaction['timestamp']))?></td>
            <td class="color1 "><?=$transaction['trans_amt']?></td>
            <td class="tdwidth "><?=$transaction['remarks']?></td>
            </tr>
         <?php
         }
        }
        ?>
     </tbody></table>
</form> 
</body>
</html>