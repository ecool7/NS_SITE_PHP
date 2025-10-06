@extends('base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/contacts.css') }}">

<div class="contacts-container">
  <h2>Contact Us</h2>

  <div class="contact-grid">
    <!-- Карта -->
  <div class="map-container">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29480.025194110738!2d113.9578175328476!3d22.54155478339759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s715%20Kangtai%20Group%20Building%2C%20No.%20222%20Kefa%20Road%2C%20Science%20and%20Technology%20Park%20Community%2C%20Yuehai%20Street%2C%20Nanshan%20District%2C%20Shenzhen!5e0!3m2!1sru!2sru!4v1757594603102!5m2!1sru!2sru"
    
    width="100%"
    height="500"
    style="border:0;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"
  ></iframe>
</div>

    <!-- Форма -->
    <form class="contact-form" action="{{ url('contacts') }}" method="POST">
      <h3>CONTACT FORM</h3>
      <div class="form-group">
        <label for="name">Your name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Your email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="message">Your message (optional)</label>
        <textarea id="message" name="message"></textarea>
      </div>
      <button type="submit" class="submit-btn">SUBMIT</button>
    </form>
  </div>
</div>
@endsection