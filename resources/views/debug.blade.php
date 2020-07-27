<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<form method="POST" action="{{ route('debug') }}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<input type="submit" value="submit" name="">
</form>
</body>
</html>