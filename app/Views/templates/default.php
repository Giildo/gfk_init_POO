<!DOCTYPE html>
<html lang="Fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../favicon.ico">

	<title><?= \App::getInstance()->getTitle(); ?></title>

	<!-- Bootstrap core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">Blog</a>
		<a class="navbar-brand" href="index.php?p=admin.posts.index">Admin Posts</a>
		<a class="navbar-brand" href="index.php?p=admin.categories.index">Admin Categories</a>
	</nav>

	<div class="container">
		<?= $content; ?>
	</div>
</body>
</html>
