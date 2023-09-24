<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index')
            ->with(['categoriesList' => $categories]);
    }

    public function create()
    {
        return view ('admin.categories.create');
    }

    public function store(Request $request)
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
        // dump($request->all());
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
