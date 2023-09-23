<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.news.create')
            ->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->flash();

        $data = $request->only(
            'title',
            'description',
            'category_id',
            'author',
            'status'
        );

        $news = new News($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно создана');
        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
