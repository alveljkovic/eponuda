<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
    @routes
</head>
<body>
    <div class="container mx-auto p-4">
      @inertia
    </div>
</body>
</html>