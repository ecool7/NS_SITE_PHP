@extends('base')

@section('title', 'Accelerometers | Navigation Systems')

@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="main">
  <div class="product-category">
    <h1>Accelerometers</h1>
    <p>Measure linear acceleration for motion tracking and stabilization.</p>

    <div class="features">
      <ul>
        <li>Multi-axis digital sensors</li>
        <li>Ideal for inertial navigation and vibration analysis</li>
        <li>High sensitivity and low noise</li>
      </ul>
    </div>
  </div>

  <div class="products-grid">
    @if(isset($accelerometer) && count($accelerometer) > 0)
      @foreach($accelerometer as $acc)
      <div class="product-card">
        <img src="{{ asset('img/' . $acc['image']) }}" alt="{{ $acc['name'] }}" class="product-image">
        <h3>{{ $acc['name'] }}</h3>
        <p><strong>Bias:</strong> {{ $acc['Bias'] ?? 'N/A' }}</p>
        <p><strong>Application:</strong> {{ $acc['application'] }}</p>
        <a href="{{ url('ACCEL/accelerometer/' . $acc['id']) }}" class="view-btn">View details</a>
      </div>
      @endforeach
    @else
      <p>No accelerometer products available at the moment.</p>
    @endif
  </div>
</div>
@endsection