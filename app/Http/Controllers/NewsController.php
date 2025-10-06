<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\NewsData;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewsData::getNews();
        return view('news', compact('news'));
    }

    public function detail($id)
    {
        $newsItem = NewsData::getNewsById($id);
        
        if (!$newsItem) {
            abort(404);
        }
        
        return view('news_detail', ['news_item' => $newsItem]);
    }
}