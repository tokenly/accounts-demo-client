<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
	@import url(//fonts.googleapis.com/css?family=Lato:700);

	body {
		margin:0;
		font-family:'Arial', sans-serif;
	}

	.welcome {
		width: 800px;
		height: 200px;
		margin: 0px auto;
		margin-top: 96px;
	}

	a, a:visited {
		text-decoration: underline;
		color: blue;
	}

	h1 {
		text-align:center;
		font-family:'Lato', sans-serif;
		color: #999;
		font-size: 32px;
		margin: 16px 0 48px 0;
	}

	p {
		font-weight: 400;
		font-size: 0.9rem;
		line-height: 1.35rem;

	}

	.action {
		margin-top: 24px;
	}
	.not-logged-in {
		color: #900;
	}
	.logged-in {
		color: #070;
	}
	h4.logged-in {
		font-size: 1.4rem;
	}
	</style>
</head>
<body>
	<div class="welcome">
		<h1>Welcome to the Sample Tokenly Application</h1>

		<p>This is a sample application that will require authentication.  Let's pretend that this site a booking service like Token Time.  You will need to login to use it.</p>

		<p>You probaly already have a login for a site like the LetsTalkBitcoin.com forums and community platform.  You don't want to register with a new account on this site because you are the same person and should share one account with both services.</p>

		<p>The solution is to use a central account service which I'll call Tokenly Accounts.  This site is a demo of how that works.</p>

		<div>&nbsp;</div>
		<hr>

		@if ($currentUser)
		<!-- <div><img style="max-height: 100px;" src="{{$currentUser->avatar}}" alt="Avatar of {{$currentUser->username}}"></div> -->
		
		<div class="action" style="margin-top: 50px;">
			<h4 class="logged-in">
				<div style="font-size: 8rem; float: left; margin-top: -62px; margin-bottom: 16px; line-height: 8rem;">☺</div>
				Welcome, {{$currentUser->username}}!
			</h4>
			<p style="clear: both;">You did it.  You are now logged in.  If this was an actual site, you could now proceed to use this site's services.</p>
			<p>For this demo, all you can do is logout.</p>
			<p><a href="/logout">Logout</a></p>
		</div>
		@else
		<!-- <div><a href="/login">Login with Github</a></div> -->
		<div>&nbsp;</div>
		<div class="action">
			<h4 class="not-logged-in">Please Login</h4>
			<p>I see that you are not logged in yet.  You will need to login in order to use this site.</p>
			<p><a href="/login">Login Now with Your Tokenly Account</a></p>
		</div>
		@endif

	</div>
</body>
</html>
