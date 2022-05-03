<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsControllers extends Controller
{
    public function index() {
        //$news = $this->getNews();
        return view('news.index', [
            'newsList' => News::paginate(3)
        ]);
    }

    public function show(News $news) {
        return view('news.show', [
            //'news' => $this->getNews($id)
            'news' => $news
        ]);
    }
}
