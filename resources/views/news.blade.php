@extends('base')

@section('title', 'News - Navigation Systems')

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
<div class="news-header">
  <h1>Latest News</h1>
  <p>Stay updated with the latest developments in navigation technology</p>
</div>

<section class="news-grid">
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
        <h2 class="news-title">
          <a href="{{ url('news/' . $item['id']) }}">{{ $item['title'] }}</a>
        </h2>
        <p class="news-summary">{{ $item['summary'] }}</p>
        <a href="{{ url('news/' . $item['id']) }}" class="read-more">Read More</a>
      </div>
    </article>
    @endforeach
  @else
    <p>No news available at the moment.</p>
  @endif
</section>
@endsection
