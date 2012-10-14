<html>
<body>
<form>  
    <h2>Withdraw Balance</h2>
    <label for="currentbalance">Current Balance</label><input type="text" name="balance" readonly="readonly"/>
    <label for="withdraw">Withdraw</label><input type="text" name="withdraw" />
    <label for="deposit">Deposit</label><input type="text" name="deposit"/>
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