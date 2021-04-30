<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$user  = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$mail  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$phone = filter_var($_POST['mobNumber'], FILTER_SANITIZE_NUMBER_INT);
		$msg   = filter_var($_POST['messege'], FILTER_SANITIZE_STRING);

		$formErrors = array();
		if (strlen($user) < 3) {
			$formErrors[] = 'Username must be larger than <strong>2</strong> characters !';
		}
		if (strlen($msg) < 10) {
			$formErrors[] = 'Messege can\'t be less than <strong>10</strong> characters !';
		}

		$headers = 'From : ' . $mail . "\r\n";
		if(empty($formErrors)){
			// mail(send to , subject , messege , headers(send from))
			mail('yousefhagag179@gmail.com', 'Contact Form', $msg, $headers);
			$user ='';$mail ='';$phone ='';$msg = '';
			$success = 
			'<div class ="alert alert-success alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
				</button>
				We Have Recieved Your Messege
			</div>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Responsive meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Contact Form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css?v=errrr">
	<!-- google font => raleway -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,900&display=swap">
</head>
<body>
<!-- start form -->
<div class="container">
	<h1 class="text-center">Contact Me</h1>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<?php if (!empty($formErrors)) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
				</button>
				<?php foreach ($formErrors as $err) {echo $err.'<br/>';} ?>
			</div>
		<?php } ?>
		<?php if(isset($success)){echo $success;}?>
		<div class="form-group">
			<input class="form-control username" type="text" name="username" placeholder="Type your Username" 
			value="<?php if(isset($user)){echo $user;}?>">
			<i class="fa fa-user fa-fw"></i>
			<span class="asterisx">*</span>
			<div class="alert alert-danger">
				Username must be larger than <strong>2</strong> characters !
			</div>
		</div>
		<div class="form-group">
			<input class="form-control email" type="email" name="email" placeholder="Please type a valid E-mail" 
			value="<?php if(isset($mail)){echo $mail;}?>">
			<i class="fa fa-envelope fa-fw"></i> <!--fw => fixed width-->
			<span class="asterisx">*</span>
			<div class="alert alert-danger">
				Email Can't Be <strong>Empty !</strong>
			</div>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="mobNumber" placeholder="Type your Mobile Number" 
			value="<?php if(isset($phone)){echo $phone;}?>">
			<i class="fa fa-phone fa-fw"></i>
		</div>
		<div class="form-group">
			<textarea class="form-control messege" name="messege" placeholder="Your Messege . . ."><?php 
			if(isset($msg)){echo $msg;}?></textarea>
			<span class="asterisx">*</span>
			<div class="alert alert-danger">
				Messege can't be less than <strong>10</strong> characters !
			</div>
		</div>
		<div class="d-flex justify-content-around">
			<div><input class="btn btn-success" type="submit" value="Send Messege">  <!-- btn-block -->
			<i class="fa fa-paper-plane fa-fw sendIcon"></i></div>
		</div>
	</form>
</div>
<!-- end form -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/contact.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>