<div id="search_area" class="col_12 column">
			<form class="horizontal" method="post" action="<?php echo $this->webroot; ?>jobs/browse">
			<input name="keywords" id="keywords" type="text" placeholder="Enter Keywords..."/>
			<select name="state" id="state_select">
			   <option>Select State</option>
			   <option value="DJ">Dolj</option>
			   <option value="OT">Olt</option>
			   <option value="GJ">Golj</option>
			   <option value="MH">Mehedinti</option>
			   <option value="TM">Timisoara</option>
			   <option value="IS">Iasi</option>
			   <option value="CJ">Cluj</option>
			   <option value="CT">Constanta</option>
			   <option value="B">Bucuresti</option>
			</select>   
			
			
			<select id="category_select" name="category">
			<option>Select Category</option>
			<?php foreach($categories as $category) : ?>
			    <option value="<?php echo $category['Category']['id']; ?>"><?php echo $category['Category']['name']; ?></option>
			<?php endforeach; ?>	
			</select>
			<button type="submit">Submit</button>
			</form>	
		</div>	