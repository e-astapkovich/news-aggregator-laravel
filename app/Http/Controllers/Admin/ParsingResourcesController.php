<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParsingResource;
use App\Http\Requests\Admin\Parsing\Ressources\Create;
use App\Http\Requests\Admin\Parsing\Ressources\Edit;

class ParsingResourcesController extends Controller
{
    public function index()
    {
        $parsingResources = ParsingResource::query()->paginate(20);
        return view('admin.parsing.resources.index')
            ->with(['resourcesList' => $parsingResources]);
    }

    public function create()
    {
        return view('admin.parsing.resources.create');
    }

    public function store(Create $request)
    {
        $request->flash();
        $data = $request->only([
            'url',
            'description'
        ]);
        $resource = new ParsingResource($data);
        if ($resource->save()) {
            return redirect(route('admin.parsing-resources.index'))->with('siccess', 'Источник успешно добавлен');
        }
        return back()->with('error', 'Не удалось добавить источник');
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
