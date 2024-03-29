<?php
	//Message vars
	$msg = '';
	$msgClass = '';
	// Check the submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = $_POST['name'];	
		$email = htmlspecialchars($_POST['email']);	
		$message = htmlspecialchars($_POST['message']);		

		//Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			//Passed
			//Check email  comment echo passed
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				//Use a valid email
				$msg = 'Please use a valid Email';
				$msgClass = 'alert-danger';
			} else {
				//Email Sent
				$msg =  'Your Email has been sent';
				$msgClass = 'alert-success';
			}	
		} else {
			//Fill in all fields
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a  class="navbar-brand" href="contact.php">My Website</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<?php if($msg != ''): ?>
					<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
				<?php endif; ?>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
				</div>
				<div class="form-control">
					<label>Message</label>
					<textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
				</div>
				<br><br>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
</body>
</html>

