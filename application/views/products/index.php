<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<a href="<?php echo base_url().'products/buy/10'; ?>"><img src="<?php echo base_url(); ?>assets/images/x-click-but01.gif" style="width: 70px;"></a>


<form  action="<?php echo base_url()?>products/buy"  method="post" >

	<select name="pricing" >
    	<option value="">Select</option>
        <?php foreach($pricing as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
        <?php }?>
    </select>
    
    
     <input type="hidden" name="business" value="">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="super">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="10">
    <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="<?php echo $cancelURL = base_url().'paypal/cancel';?>">
    <input type="hidden" name="return" value="<?php echo $returnURL = base_url().'paypal/success'; ?>">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    
    
    <input type="submit" value="Submit"  />
</form>