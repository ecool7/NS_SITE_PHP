
@extends('base')

@section('title', 'Gyroscopes | Navigation Systems')

@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="main">
  <div class="product-category">
    <h1>Gyroscopes</h1>
    <p>High-precision sensors for measuring angular velocity in navigation systems.</p>

    <div class="features">
      <ul>
        <li> Rotary and fiber optic types</li>
        <li>Used in aviation, robotics, and spacecraft</li>
        <li>High accuracy down to micro-degrees</li>
      </ul>
    </div>
  </div>

  <!-- Сетка моделей -->
  <div class="products-grid">
    @if(isset($gyroscope) && count($gyroscope) > 0)
      @foreach($gyroscope as $gyro)
      <div class="product-card">
        <img src="{{ asset('img/' . $gyro['image']) }}" alt="{{ $gyro['name'] }}" class="product-image">
        <h3>{{ $gyro['name'] }}</h3>
        <p><strong>Application:</strong> {{ $gyro['application'] }}</p>
        <p><strong>Technology:</strong> {{ $gyro['technology'] }}</p>
        <a href="{{ url('GYROS/gyroscope/' . $gyro['name']) }}" class="view-btn">View details</a>
      </div>
      @endforeach
    @else
      <p>No gyroscope products available at the moment.</p>
    @endif
  </div>
</div>
@endsection