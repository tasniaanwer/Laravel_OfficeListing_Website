<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Internship Office Portal</title>

  @vite('resources/css/app.css')
</head>
<body class="text-center px-8 py-12">
  <h1>Welcome to the Internship Office Portal</h1>
  <p>Discover exciting internship opportunities at leading companies and organizations.</p>

  <a href="/internships" class="btn mt-4 inline-block">
    View Available Internships!
  </a>
</body>
</html>