<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets_admin/img/favicon.png')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets_admin/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="{{asset('assets/images/cart/15.png') }}" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">Access to our dashboard</p>
							<form action="{{('/dashboard')}}" method="post">
								{{csrf_field()}}
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Email" name="userEmail" value="{{old('userEmail')}}" required> </div>
								<div class="form-group">
									<input class="form-control" type="password" placeholder="Password" name="userPassword" required> </div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit">Login</button>
								</div>
                            <?php 
							$error = Session::get('error');
							if($error)
							echo $error;
						    Session::put('error', null);
							?>
						    </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('assets_admin/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('assets_admin/js/popper.min.js')}}"></script>
	<script src="{{asset('assets_admin/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets_admin/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets_admin/js/script.js')}}"></script>
</body>

</html>