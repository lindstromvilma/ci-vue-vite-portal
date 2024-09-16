<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    <title>CodeIgniter & Vue</title>
    <!-- Development -->
    <?php if (getenv('CI_ENVIRONMENT') === 'development'): ?>
        <script type="module" src="http://localhost:3000/resources/js/app.js"></script>
        <link rel="stylesheet" href="http://localhost:3000/resources/css/app.css">
    <?php else: ?>
        <!-- Production -->
        <link rel="stylesheet" href="<?= base_url('build/assets/app.css'); ?>">
        <script type="module" src="<?= base_url('build/assets/app.js'); ?>"></script>
    <?php endif; ?>
</head>
<body>
    <div id="app" data-page="<?= $page ?>" data-props='<?= $data ?>'></div>
</body>
</html>