@extends('base')

@section('title', $sensor['name'] . ' | Navigation Systems')

@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/cardpr.css') }}">
@endsection

@section('content')
<div class="main">
  <div class="product-detail">
    <h1>{{ $sensor['name'] }}</h1>

    <!-- Описание -->
    @if(isset($sensor['description']) && $sensor['description'])
      <p class="description">{{ $sensor['description'] }}</p>
    @endif

    <!-- Сетка: изображение слева, таблица справа -->
   <div class="product-layout">
  <div class="image-column">
    <img src="{{ asset('img/' . $sensor['image']) }}" alt="{{ $sensor['name'] }}" class="product-image">
    
    <!-- 👇 Кнопка теперь сразу под картинкой -->
    @if(isset($sensor['datasheet']) && $sensor['datasheet'])
      <a href="{{ asset($sensor['datasheet']) }}" download class="download-btn">Download Datasheet</a>
    @endif
  </div>
  <div class="specs-column">
    <h3>Specifications</h3>
    <table class="specs-table">
      @if(isset($sensor['specs']) && is_array($sensor['specs']))
        @foreach($sensor['specs'] as $key => $value)
        <tr>
          <th>{{ $key }}</th>
          <td>{{ $value }}</td>
        </tr>
        @endforeach
      @endif
    </table>
  </div>
</div>

    <!-- Форма обратной связи и контактная информация -->
    <div class="contact-section">
      <h3>Contact Us</h3>
      <div class="contact-content">
  <div class="contact-form">
    <form action="#" method="POST">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" rows="8" required></textarea>
      <button type="submit" class="view-btn">Send Message</button>
    </form>
  </div>
  <div class="company-info">
    <h4>Navigation Systems Inc.</h4>
    <p>📍 715 Kangtai Group Building, No. 222 Kefa Road,Science and Technology Park Community,Yuehai Street,Nanshan District,Shenzhen</p>

    <p>✉️ info@navsystems.com</p>
  </div>
</div>
      </div>
    </div>
  </div>
</div>
@endsection