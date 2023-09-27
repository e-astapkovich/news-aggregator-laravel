<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Create;
use App\Http\Requests\Admin\Categories\Edit;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.categories.index')
            ->with(['categoriesList' => $categories]);
    }

    public function create()
    {
        return view ('admin.categories.create');
    }

    public function store(Create $request)
    {
        $request->flash();
        $data = $request->only([
            'name',
            'description'
        ]);
        $category = new Category($data);
        if ($category->save()) {
            return redirect(route('admin.categories.index'))->with('success', 'Категория успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить категорию');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')
            ->with(['category' => $category]);
    }

    public function update(Edit $request, Category $category)
    {
        $request->flash();

        $data = $request->only([
            'name',
            'description'
        ]);

        $category->fill($data);

        if ($category->save()) {
            return redirect(route('admin.categories.index'))->with('success', 'Категория успешно обновлена');
        }
        return back()->with('error', 'Не удалось изменить категорию');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
