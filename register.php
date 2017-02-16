<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
<form method="post" action="<?php echo base_url(); ?>users/register">
		<div class="form group">
			<label>First name*</label>
			<input type="text" class="form-control" name="first_name" placeholder="Enter your First Name">
			</div>
			
			<div class="form group">
			<label>Last name*</label>
			<input type="text" class="form-control" name="last_name" placeholder="Enter your Last Name">
			</div>
			
			<div class="form group">
			<label>Email Address*</label>
			<input type="email" class="form-control" name="email" placeholder="Enter your Email">
			</div>
			
			<div class="form group">
			<label>Choose Username*</label>
			<input type="text" class="form-control" name="username" placeholder="Create A Username">
			</div>
			
			<div class="form group">
			<label>Password*</label>
			<input type="password" class="form-control" name="password" placeholder="Enter A Password">
			</div>
			
			<div class="form group">
			<label>Confirm Password*</label>
			<input type="password" class="form-control" name="password2" placeholder="Enter  Password">
			</div>
			<button name="submit" type="submit" class="btn btn-primary">Resgister</button>
			</form>
			