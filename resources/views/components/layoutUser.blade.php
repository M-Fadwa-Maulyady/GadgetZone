<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GadgetZone — Demo</title>
  <link rel="stylesheet" href="{{ asset('tema/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('tema/product.css') }}" />
  
</head>
<body>
  
    <x-navbarUser></x-navbarUser>
        <main>
         {{ $slot }}
        </main>

    <x-footerUser></x-footerUser>

  <script src="{{ asset('tema/script.js') }}"></script>
  <script src="{{ asset('tema/product.js') }}"></script>
</body>
</html>
