@extends('base')

@section('title', 'Inertial Measurement Units | Navigation Systems')

@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="main">
  <div class="product-category">
    <h1>Inertial Measurement Units (IMU)</h1>
    <p>Integrated systems combining accelerometers, gyroscopes, and sometimes magnetometers for full motion tracking.</p>

    <div class="features">
      <ul>
        <li>6-axis and 9-axis models</li>
        <li>Used in drones, vehicles, marine, and aerospace</li>
        <li>High accuracy and reliability</li>
      </ul>
    </div>
  </div>

  <div class="products-grid">
    @if(isset($imus) && count($imus) > 0)
      @foreach($imus as $imu)
      <div class="product-card">
        <img src="{{ asset('img/' . $imu['image']) }}" alt="{{ $imu['name'] }}" class="product-image">
        <h3>{{ $imu['name'] }}</h3>
        <p><strong>Type:</strong> {{ $imu['type'] }}</p>
        <p><strong>Application:</strong> {{ $imu['application'] }}</p>
        <a href="{{ url('imu/' . $imu['id']) }}" class="view-btn">View details</a>
      </div>
      @endforeach
    @else
      <p>No IMU products available at the moment.</p>
    @endif
  </div>
</div>
@endsection