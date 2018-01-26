<!DOCTYPE html>
<html lang="Fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../favicon.ico">

	<title><?= $app->getTitle(); ?></title>

	<!-- Bootstrap core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php?p=home">Blog</a>
	</nav>

	<div class="container">
		<?= $content; ?>
	</div>
</body>
</html>
