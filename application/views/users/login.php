<html>
<head>
	<title>Login to Administrator Area</title>
</head>
<body>

<h1>Login to Administrator Area</h1>
<?=display_flash('message')?>
<p><?=form_open('users/authenticate')?></p>
Username : <input type="text" name="username" /><br/>
Password : <input type="password" name="password" /><br/>
<input type="submit" name="submit" value="Login"/>
<?=form_close()?>
</body>
</html>