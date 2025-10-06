<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get latest 3 news items for homepage
        $allNews = \App\Data\NewsData::getNews();
        $news = array_slice($allNews, 0, 3);

        // Debug: Check if news data exists
        if (empty($news)) {
            \Log::info('No news data found in HomeController');
        }

        return view('index', [
            'news' => $news
        ]);
    }
}