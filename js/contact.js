$(document).ready(function(){
	var userErrors = true, emailErrors = true, msgErrors = true;

	function validate(className , x) {
		$(className).blur(function(){                   //blur => kol ma atl3 bra el input mslan
			if ($(this).val().length < x ) {
				$(this).css('border','1px solid #f00').parent().find('.alert').fadeIn(200)
				.end().find('.asterisx').fadeIn(100);
				if (className === '.username')userErrors = true;
				else if(className === '.email')emailErrors = true;
				else if(className === '.messege')msgErrors = true;
			}else{
				$(this).css('border','1px solid #28a745').parent().find('.alert').fadeOut(200)
				.end().find('.asterisx').fadeOut(100);
				if (className === '.username')userErrors = false;
				else if(className === '.email')emailErrors = false;
				else if(className === '.messege')msgErrors = false;
			}
		});
	}
	validate('.username', 3);validate('.email', 1);validate('.messege', 10);

	$('form').submit(function(e){
		if (userErrors === true || emailErrors === true || msgErrors === true) {
			e.preventDefault();  //prevent form from submit  |  e => event
			$('.username , .email , .messege').blur();
		}
	});
});