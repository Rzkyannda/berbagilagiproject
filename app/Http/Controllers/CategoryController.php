<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() // method index untuk menampilkan data
    {
        $categories = Category::latest()->get();
        return view('backend.categories.index', compact('categories'));
    }

    public function create() // untuk tampilan form create
    {
        return view('backend.categories.create');
    }

    public function store(Request $request) // untuk menyimpan data / submit ke DB
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('backend.categories.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('backend.categories.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('backend.categories.index')->with('success', 'Kategori berhasil dihapus');
    }
}
