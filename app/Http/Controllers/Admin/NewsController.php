<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->status()
            ->with('category')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.news.index')
            ->with(['newsList' => $news]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.news.create')
            ->with(['categories' => $categories]);
    }

    public function store(Create $request)
    {
        $request->flash();

        $data = $request->only(
            'title',
            'description',
            'category_id',
            'author',
            'status'
        );

        $path = null;
        if ($request->file('image')) {
            $name = Storage::putFile('public/images/news', $request->file('image'));
            $path = Storage::url($name);
        }

        $data['image'] = $path;
        $news = new News($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно создана');
        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): view
    {
        $categories = Category::all();
        return view('admin.news.edit')
            ->with([
                'categories' => $categories,
                'news' => $news
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, News $news)
    {

        $data = $request->only(
            'title',
            'description',
            'category_id',
            'author',
            'status',
        );

        if($request->file('image')) {
            $request->validate([
                'image' => ['sometimes', 'image', 'max:1500']
            ]);
            $name = Storage::putFile('public/images/news', $request->file('image'));
            $path = Storage::url($name);
            $data['image'] = $path;
        }

        $news->fill($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно изменена');
        }
        return back()->with('error', 'Не удалось изменить запись');

    }

    public function destroy(News $news)
    {
        // $news->delete();
        if($news->delete()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно удалена');
        }
        return redirect()->route('admin.news.index')->with('error', 'Не удалось удалить запись');
    }
}
