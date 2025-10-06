@extends('base')

@section('title', $news_item['title'] . ' - Navigation Systems')

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
<div class="news-detail">
  <div class="news-detail-header">
    <div class="breadcrumb">
      <a href="{{ url('/') }}">Home</a> > 
      <a href="{{ url('news') }}">News</a> > 
      <span>{{ $news_item['title'] }}</span>
    </div>
    
    <div class="news-meta">
      <span class="news-category">{{ $news_item['category'] }}</span>
      <span class="news-date">{{ $news_item['date'] }}</span>
    </div>
    
    <h1 class="news-title">{{ $news_item['title'] }}</h1>
  </div>
  
  <div class="news-detail-content">
    <div class="news-image">
      <img src="{{ asset('img/' . $news_item['image']) }}" alt="{{ $news_item['title'] }}">
    </div>
    
    <div class="news-body">
      {!! $news_item['content'] !!}
    </div>
  </div>
  
  <div class="news-navigation">
    <a href="{{ url('news') }}" class="btn btn-secondary">Back to News</a>
  </div>
</div>
@endsection
