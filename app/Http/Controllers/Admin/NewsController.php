<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //$newsList = app(News::class);


        return view('admin.news.index',
        ['news'=>News::with('category')->paginate(5)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::select("id", "title")->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required', 'string']
        ]);

        $news = News::create($request->only(['category_id', 'title', 'status',
            'author', 'img', 'description']));
        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Все сделано правильно! Запись добавлена!');
        }
        return back()->with('error', 'Что-то пошло не так!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit',[
            'news' => $news,
            'categories' => Category::select("id", "title")->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $status = $news->fill($request->only(['category_id', 'title', 'status',
            'author', 'img', 'description']))->save();
        if($status) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Все сделано правильно! Запись обновлена!');
        }
        return back()->with('error', 'Что-то пошло не так!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
