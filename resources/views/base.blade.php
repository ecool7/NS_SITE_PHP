<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Navigation Systems')</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@yield('page_css')

</head>
<body>
  <header class="header">
    <div class="logo-container">
      <a href="{{ url('/') }}">
      <img src="{{ asset('img/logo.png') }}" alt="NS Logo" class="logo">
      </a>
    </div>
    <div class = "title">Navigation Systems</div>
    <nav class="nav-menu">
      <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
      <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About Us</a>
      <a href="/products" class="{{ request()->is('products') ? 'active' : '' }}">Products</a>
      <a href="/contacts" class="{{ request()->is('contacts') ? 'active' : '' }}">Contacts</a>
    </nav>
  </header>

  <main class="main">
    @if(session('success'))
      <div class="container" style="margin-top: 20px;">
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      </div>
    @endif
    
    @if(session('error'))
      <div class="container" style="margin-top: 20px;">
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      </div>
    @endif
    
    @if($errors->any())
      <div class="container" style="margin-top: 20px;">
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            {{ $error }}
          </div>
        @endforeach
      </div>
    @endif
    
    @yield('content')
  </main>

  <footer class="footer">
    <p>&copy; 2025 Navigation Systems. All rights reserved.</p>
  </footer>
</body>
</html>