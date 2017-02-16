<?php if($this->cart->contents()): ?>
     <form method="post" action="cart/process">
	       <table class="table table-striped">
				<table cellpadding="6" cellspacing="1"style="width:100%" border="0">
					<tr>
						<th>QTY</th>
						<th>Item Descreption</th>
						<th style="text-align:right">Item Price</th>
					</tr> 
					<?php $i = 0; ?>
					<?php foreach ($this->cart->contents() as $items) :?>
					  
					    <tr>
                               <td><?php echo $items['qty']; ?></td>
							   <td><?php echo $items['name']; ?></td>
						   <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?> </td>
					  </tr>
					    <?php echo'<input type="hidden" name="<item_name['.$i.']"value="'.$items['name'].'" />'; ?>
						<?php echo'<input type="hidden" name="<item_code['.$i.']"value="'.$items['id'].'" />'; ?>
						<?php echo'<input type="hidden" name="<item_qty['.$i.']"value="'.$items['qty'].'" />'; ?>
					  
					<?php $i++; ?>
						<?php endforeach; ?>
					<tr>	
						<td></td>
						<td class="right"><strong></strong></td>
						<td class="right" style="text-align:right"><?php echo $this->config->item('shipping'); ?> </td>
					</tr>	
						  <tr>	
						<td></td>
						<td class="right"><strong></strong></td>
						<td class="right" style="text-align:right"><?php echo $this->config->item('tax'); ?> </td>
						  </tr>
					  
					
				
	<br>
	                  
					  <h3>Shipping Info</h3>
					  <div class="form-group">
					  <label>Address</label>
					  <input type="text" class="form-control" name="address2">
					  </div>
					  
					  
					   <div class="form-group">
					  <label>Address2</label>
					  <input type="text" class="form-control" name="address2">
					  </div>
					  
					   <div class="form-group">
					  <label>City</label>
					  <input type="text" class="form-control" name="city">
					  </div>
					  
					   <div class="form-group">
					  <label>State</label>
					  <input type="text" class="form-control" name="state">
					  </div>
					  
					   <div class="form-group">
					  <label>Zipcode</label>
					  <input type="text" class="form-control" name="zipcode">
					  </div>
					  
					  
	<p><button class="btn btn-primary" type="submit" name="submit">Chechout</button>
	<?php endif; ?>
	
	
	</form>	
	
	  
    


