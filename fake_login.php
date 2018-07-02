	<?php
	// Handle AJAX request (start)
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	// validate passwords/usernames
	$username_verification = [];
	$password_verification = [];
	$username_verification[0] = 'hello@sam.com';
	$password_verification[0] = 'hello';
	$validator = false;
	$index = 0;   
	for ($index; $index<sizeof($username_verification); $index++) {
		if ($username == $username_verification[$index] && $password == $password_verification[$index]) {
			$validator = true;
		}
	}
	echo $validator;
	// Handle AJAX request (end)
	?>

	<!DOCTYPE html>
	<html>
		<head>
		    <meta charset='UTF-8'>
		    <title>Log-in Page</title>
		    <!-- Kind reminder: we can use bootstrap here to make page more attractive and with less code, however, as required, I'm not including any Bootstrap classes in this page-->
		    <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'> -->

		    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		    <style>
		    	@import url('https://fonts.googleapis.com/css?family=Markazi+Text');

				body {
					overflow: hidden;
					color: white;
					font-family: 'Markazi Text', serif;
				}

				.error {
					color: red;
					font-weight: bold;
					font-size: 1.1rem;
					animation: flash 3s infinite;
				 	-webkit-animation: flash 3s infinite;
				}

				.dark {
					color: black;
					color:rgba(0,0,0,0.8);
					cursor: pointer;
				}

				.valid {
					color: green;
					font-weight: bold;
					font-size: 1.1rem;
				}

				.warn {
					color: yellow;
				}


				.icons {
					position: relative;
					top: -32px;
					left: 250px;
				}

				#login_area {
				  	animation: rotate-form  .5s linear 1;
				 	-webkit-animation: rotate-form .5s linear 1;
				}

				@keyframes rotate-form {
				  0% {
				  	opacity: 0;
				    transform: rotate(0);
				  }
				  100% {
				  	opacity: 1;
				    transform: rotate(-360deg);
				  }
				}

				@keyframes flash {
				  0% {
				  	opacity: 0;
				  }
				  10% {
				  	opacity: 1;
				  }
				  20% {
				  	opacity: 0;
				  }
				  30% {
				  	opacity: 1;
				  }
				  40% {
				  	opacity: 0;
				  }
				  50% {
				  	opacity: 1;
				  }
				  60% {
				  	opacity: 0;
				  }
				  70% {
				  	opacity: 1;
				  }
				  80% {
				  	opacity: 0;
				  }
				  90% {
				  	opacity: 1;
				  }
				}

				.login_item {
					display: block;
					margin-bottom: 5px;
					width: 280px;
					height: 20px;
				}

				form {
					background: #fff;
					width: 300px;
  					padding: 50px;
  					box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
  				}

				.nav {
				  	position: fixed;
				  	z-index: 2;
				  	top: 50%;
				}

				._nav {
				  	width: 10px;
				  	height: 10px;
				  	display: block;
				  	margin: 10px;
				  	border: solid 2px white;
				  	border-radius: 50%;
				  	cursor: pointer;
				}

				._nav:hover {
				  	background-color: white;
				}

				#submit {
					margin-left: 100px;
				}

				.btn {
					display: inline-block;
					padding: 5px 15px;
					background-color: #7fb1bf;
					text-align: center;
					text-shadow: 0 5px 0 rgba(0,0,0,0.05);
					box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
					cursor: pointer;
				}

				.btn:hover   {background-color: #699DD1;}

				.btn_disabled {
					display: inline-block;
					padding: 5px 15px;
					background-color: #7fb1bf;
					text-align: center;
					text-shadow: 0 5px 0 rgba(0,0,0,0.05);
					box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
					cursor: not-allowed;
				}

				section {
				  	height: 100%;
				  	position: absolute;
				  	top: 100%;
				  	right: 0;
				  	left: 0;
				  	bottom: 0;
				  	transition: top 0.5s ease-in-out 0.5s;
				}

				/*login page*/
				#login {
				 	background: #2193b0; 
					background: -webkit-linear-gradient(to right, #2193b0, #6dd5ed); 
					background: linear-gradient(to right, #2193b0, #6dd5ed); 
					display: flex;
				  	align-items: center;
				  	justify-content: center;
				}

				input[type='radio']#login_page:checked ~ nav > label[for='login_page'] {
				  	background-color: white;
				}

				input[type='radio']#login_page:checked ~ section:nth-of-type(1) {
				  	z-index: 1;
				  	top: 0;
				  	transition-delay: 0s;
				}

				/*introduction page*/
				#introduction {
				  	background: #59c173; 
  					background: -webkit-linear-gradient(to right, #59c173, #a17fe0, #5d26c1); 
  					background: linear-gradient(to right, #59c173, #a17fe0, #5d26c1);
					display: flex;
				  	justify-content: center;
				}

				input[type='radio']#introduction_page:checked ~ nav > label[for='introduction_page'] {
				  	background-color: white;
				}

				input[type='radio']#introduction_page:checked ~ section:nth-of-type(2) {
				  	z-index: 1;
				  	top: 0;
				  	transition-delay: 0s;
				}

				/*responsive*/
				@media only screen and (max-width: 600px) {
				    .nav {
				        top: 90%;
				        left: 45%;
				    }

				    ._nav {
				    	display: inline-block;
				    }

				    form {
				    	width: 260px;
				    }
				}
		    </style>

		    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
			<script>
				$( document ).ready(function() {
				   	$('#submit').prop('disabled', true);
				   	$('.warn').hide();
				   	$('.valid').hide();
				   	$('.error').hide();
				   	var password = "";
				   	var username = "";
				   	var back_user = getCookie('has_authorize');
				   	if (back_user == 1) {
				   		$('.loginbox').hide();
				   		$('.login_infomation').show();
				   	} else {
				   		$('.loginbox').show();
				   		$('.login_infomation').hide();
				   	}

				   	$('#introduction_page').click(function(e) {
				   		var has_authorize = getCookie('has_authorize');
				   		if (has_authorize != 1) {
					   		e.preventDefault();
					   		alert('Please login first before you could view this page!');
				   		}
				   	});	

				   	$('#logout').click(function() {
				   		delete_cookie('has_authorize');
				   		location.reload();
				   	});

				   	$('#sign_up').click(function(e) {
				   		e.preventDefault();
				   	});		

				   	$('#username').keyup(function() {
				   		$('#submit').prop('disabled', !isValidEmailAddress($(this).val()));
				   		if (isValidEmailAddress($(this).val())) {
							$('#submit').removeClass('btn_disabled');
							$('#submit').addClass('btn');
							$('.warn').hide();
						} else {
							$('#submit').removeClass('btn');
							$('#submit').addClass('btn_disabled');
							$('.warn').show();
						}
						username = $( '#username' ).val();
					});

					$('#password').keyup(function() {
						password = $( '#password' ).val();
					});	

					$('#submit').click(function(e){
						e.preventDefault();
          				$.ajax({
					        type: "post",
					        data: {password: password, username: username},
					        success: function (info) {
					        	var status = info.split(/\r?\n/)[0];
					        	if (status == true) {
					        		$('.valid').show();
					        		$('.error').hide();
					        		setCookie('has_authorize', 1);
					        		$('.loginbox').hide();
					        		$('.login_infomation').show();
					        	} else {
					        		$('.valid').hide();
					        		$('.error').show();
					        		setCookie('has_authorize', 0);
					        		$('.loginbox').show();
					        		$('.login_infomation').hide();
					        	}
					        }
					    });
	        		});

				});
				function show_password() {
				    if ($('#password').attr('type') == 'password') {
				        $('#password').attr('type', 'text');
				    } else {
				        $('#password').attr('type', 'password')
				    }
				    $('#icon_awesome').toggleClass('fa-eye fa-eye-slash');
				}

				function isValidEmailAddress(emailAddress) {
				    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|'((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?')@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
				    return pattern.test(emailAddress);
				}

				function setCookie(name,value) {
				    var date = new Date();
				    //set cookie for 7 days
				    date.setTime(date.getTime() + (7*24*60*60*1000));
				    var expires = "expires=" + date.toGMTString();
				    document.cookie = name + "=" + value + ";" + expires + ";path=/";
				}

				function getCookie(cname) {
				    var name = cname + "=";
				    var decodedCookie = decodeURIComponent(document.cookie);
				    var ca = decodedCookie.split(';');
				    for(var i = 0; i < ca.length; i++) {
				        var c = ca[i];
				        while (c.charAt(0) == ' ') {
				            c = c.substring(1);
				        }
				        if (c.indexOf(name) == 0) {
				            return c.substring(name.length, c.length);
				        }
				    }
				    return "";
				}

				function delete_cookie(name) {
				  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
				}
			</script>

			
		</head>
	  	<body>
			<input type='radio' name='item' checked='checked' id='login_page'/>
			<input type='radio' name='item' id='introduction_page'/>

			<nav class='nav'>
			  <label class='_nav' for='login_page'></label>
			  <label class='_nav' for='introduction_page'></label>
			</nav>


			<!-- Actual pages -->
			<section id='login' title='As required, username is "hr@auphansoftware.com" and password is "hello" by default.'>
				<div id='login_area'>
				    <h2>Login To Your Account</h2>
				    <div class='message'>
						<p class='valid'>Login Successful.</p>
						<p class='error'>Incorrect Username/Password</p>
						<p class='warn'>Username has to be an email!</p>
					</div>
					<form class='loginbox' autocomplete='off'>
					    <input placeholder='Username' name='username' type='text' id='username' class='login_item'></input>
					    <input placeholder='Password' name='password' type='password' id='password' class='login_item'></input>
					    <span class='icons'><i id='icon_awesome' class='fa fa-eye dark' onclick='show_password()'></i></span>
						<button id='submit' class='btn_disabled'>Login</button>
					</form>
					<div class='login_infomation'>
						<p>Hi Dear user, Welcome! You may now go to the <b>NEXT PAGE</b> by clicking the navigator on the side.</p>
						<hr>
						<button id='logout' class='btn'>Logout</button>
					</div>
				</div>
			</section>
			<!-- section available only after login successfully -->
			<section id='introduction'>
			<div>
			  <h1>Thank you very much!</h1>
			  <p>Developer: Sam</p>
			  <p>A fast learner who loves programming and new technologies. Has great problem-solving, time-management skills.</p>
			  <p>Familiar with PHP/Laravel, SQL, Angularjs, Jquery/Ajax, MVC, Git methods and Jira and so on</p>
			  <p>Looking for somewhere to work for a long period.</p>
			  <p>Please feel free to contact me at any time for any questions, I would love to discuss more.</p>
			  <p><a href="tel:+16048661378">+1 604 866 1378</a></p>
			  <p><a href="mailto:developersamxu@gmail.com">developersamxu@gmail.com</a></p>
			  
			</div>
			</section>
	  	</body>
	</html>