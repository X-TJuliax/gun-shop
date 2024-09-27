<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Include your Vue and Axios scripts here -->
</head>
<body>

<div id="app">
    <h2>Search Results for "{{ $query }}"</h2>
    <search-component :products="{{ $results }}"></search-component>
</div>

</body>
</html>
