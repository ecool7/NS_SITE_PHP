@extends('base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">

<div class="products-container">
  <h2>Our Products</h2>

  <div class="product-list">
    <!-- Gyroscopes -->
    <div class="product-item">
      <div class="product-content">
        <h3>Gyroscopes</h3>
        <p>High-precision sensors for measuring angular velocity in navigation systems.</p>
        <ul>
          <li>Rotary and fiber optic types</li>
          <li>Used in aviation, robotics, and spacecraft</li>
        </ul>
        <a href="{{ url('gyroscope') }}" class="view-btn">View products</a>
      </div>
      <img src="{{ asset('img/gyroscope.png') }}" alt="Gyroscope" class="product-image">
    </div>

    <!-- Accelerometers -->
    <div class="product-item">
      <div class="product-content">
        <h3>Accelerometers</h3>
        <p>Measure linear acceleration for motion tracking and stabilization.</p>
        <ul>
          <li>Multi-axis digital sensors</li>
          <li>Ideal for inertial navigation and vibration analysis</li>
        </ul>
        <a href="{{ url('accelerometer') }}" class="view-btn">View products</a>
      </div>
      <img src="{{ asset('img/accel.png') }}" alt="Accelerometer" class="product-image">
    </div>

    <!-- Inertial Modules -->
    <div class="product-item">
      <div class="product-content">
        <h3>Inertial Modules</h3>
        <p>Integrated systems combining accelerometers and gyroscopes for full motion tracking.</p>
        <ul>
          <li>Compact, high-performance IMUs</li>
          <li>Used in drones, autonomous vehicles, and marine systems</li>
        </ul>
        <a href="{{ url('imu') }}" class="view-btn">View products</a>
      </div>
      <img src="{{ asset('img/IMU.png') }}" alt="Inertial Module" class="product-image">
    </div>

{{-- INS section commented out for future use --}}
{{-- 
<div class="product-item">
  <div class="product-content">
    <h3>Inertial Navigation System</h3>
    <p>Autonomous navigation solution combining inertial data with GNSS for high accuracy.</p>
    <ul>
      <li>Real-time position, velocity, and orientation</li>
      <li>Works in GPS-denied environments</li>
    </ul>
    <a href="#" class="view-btn">View products</a>
  </div>
  <img src="{{ asset('img/ins.png') }}" alt="INS" class="product-image">
</div>
--}}
@endsection