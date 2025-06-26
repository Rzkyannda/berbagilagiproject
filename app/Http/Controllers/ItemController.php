<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ItemImage;
use Illuminate\Support\Str;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Models\ItemStatusLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['user', 'category', 'images', 'claims'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'condition' => 'nullable|string|max:255',
            'status' => 'required|in:tersedia,proses,didonasikan',
            'description' => 'nullable|string',
        ]);

        $fotoUrl = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $bucket = 'items-photo';
            $projectUrl = env('SUPABASE_PROJECT_URL');
            $serviceRole = env('SUPABASE_SERVICE_ROLE');

            $response = Http::withToken($serviceRole)
                ->attach('file', file_get_contents($file), $filename)
                ->post("$projectUrl/storage/v1/object/$bucket/$filename");

            if ($response->successful()) {
                $fotoUrl = "$projectUrl/storage/v1/object/public/$bucket/$filename";
            } else {
                return back()->with('error', 'Upload foto ke Supabase gagal: ' . $response->body());
            }
        }

        $validatedData['foto'] = $fotoUrl;
        $validatedData['user_id'] = auth()->id();
        $validatedData['status'] = 'tersedia';

        Item::create($validatedData);

        return redirect()->route('backend.items.index')->with('success', 'Item berhasil disimpan!');
    }

    public function show(Item $item)
    {
        $categories = Category::all();
        return view('backend.items.show', compact('item', 'categories'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('backend.items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'condition' => 'nullable|string|max:255',
            'status' => 'required|in:tersedia,proses,didonasikan',
            'description' => 'nullable|string',
        ]);

        $fotoUrl = $item->foto;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $bucket = 'items-photo';
            $projectUrl = env('SUPABASE_PROJECT_URL');
            $serviceRole = env('SUPABASE_SERVICE_ROLE');

            $response = Http::withToken($serviceRole)
                ->attach('file', file_get_contents($file), $filename)
                ->post("$projectUrl/storage/v1/object/$bucket/$filename");

            if ($response->successful()) {
                $fotoUrl = "$projectUrl/storage/v1/object/public/$bucket/$filename";
            } else {
                return back()->with('error', 'Upload foto ke Supabase gagal: ' . $response->body());
            }
        }

        $validatedData['foto'] = $fotoUrl;

        $item->update($validatedData);

        return redirect()->route('backend.items.index')->with('success', 'Item berhasil diperbarui!');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('backend.items.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function showLogStatus(Item $item)
    {
        $logs = ItemStatusLog::with('item')->latest('changed_at')->get();
        return view('backend.items.logStatus', compact('logs'));
    }
}
