<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="color-scheme" content="dark" />
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>{{ $title }}</title>
</head>

<body class="bg-pixl-dark text-pixl-light flex gap-10 px-2 overflow-clip h-dvh">

{{ $slot }}

</body>

</html>