<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {



        return view('admin.categories.index',
        [

            'categories' => Category::query()->active()->with('news')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'description']);
        $category = Category::create($data);
        if($category){
            return redirect()->route('admin.categories.index')
                ->with('success', 'Все сделано правильно! Запись добавлена!');
        }
        return back()->with('error', 'Что-то пошло не так!');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.categories.edit',
        ['category'=>$category]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->only(['title', 'description']));
//        $category->title = $request->input('title');
//        $category->description = $request->input('description');

        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Все сделано правильно! Запись обновлена!');


        }
        return back()->with('error', 'Что-то пошло не так!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return response()->json(['status'=>'ok']);

        }catch (\Exception $e) {
            Log::error("News was't delete" );
            return response()->json(['status'=>'error'], 400);
        }
    }
}
