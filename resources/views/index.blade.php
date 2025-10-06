@extends('base')

@section('title', 'Home - Navigation Systems')

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
<div class="hero">
  <h1>Advanced Navigation Solutions</h1>
  <p>We provide cutting-edge navigation systems for vehicles, aviation, and smart cities.</p>
  <a href="{{ url('products') }}" class="btn">Explore Products</a>
</div>


<section class="news-section">
  <div class="news-header">
    <h2>Latest News</h2>
    <p>Stay updated with the latest developments in navigation technology</p>
  </div>
  
  <div class="news-grid">
    @if(isset($news) && count($news) > 0)
      @foreach($news as $item)
      <article class="news-card">
        <div class="news-image">
          <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['title'] }}">
          <div class="news-category">{{ $item['category'] }}</div>
        </div>
        <div class="news-content">
          <div class="news-meta">
            <span class="news-date">{{ $item['date'] }}</span>
          </div>
          <h3 class="news-title">
            <a href="{{ url('news/' . $item['id']) }}">{{ $item['title'] }}</a>
          </h3>
          <p class="news-summary">{{ $item['summary'] }}</p>
          <a href="{{ url('news/' . $item['id']) }}" class="read-more">Read More</a>
        </div>
      </article>
      @endforeach
    @else
      <p>No news available at the moment.</p>
    @endif
  </div>
</section>
@endsection