<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    //     $product = Products::all();
    //     $categories = Category::all();
    //     return view('products.index', [
    //         'categories' => $categories,
    //         'product'    => $product
    //     ]);
    // }
    $product = Products::with('category');

        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $product->where('category_id', $request->category);
        }

        // Pencarian berdasarkan nama produk atau deskripsi
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $product->where(function($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
            });
        }

        // Ambil hasil produk yang difilter
        $product = $product->get();

        // Ambil semua kategori untuk dropdown filter
        $categories = Category::all();

        return view('products.index',[
            'categories' => $categories,
            'product'    => $product
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'foto' => 'required',
        ]);

        // Products::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'stock' => $request->stock,
        //     'category_id' => $request->category_id,
        //     'foto' => $request->foto,

        // ]);
        $fotoName = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->storeAs('public/images', $fotoName);

        // Simpan data produk ke database
        $product = new Products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->foto = $fotoName; // Simpan nama file ke dalam kolom 'foto'
        $product->save();


        return redirect()->route('products.index')->with('success', 'products created successfully.');
    }

    // public function show($id)
    // {
    //     $categories = Category::all();
    //     $product = Products::all();
    //     return view('products.show',[
    //         'categories' => $categories,
    //         'product'    => $product
    //     ]);
    // }
    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(Products $product)
    {
        $categories = Category::all();
        return view('products.edit', [
            'categories' => $categories,
            'product'    => $product
        ]);
        // dd($product);
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'foto' => 'required',

        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        // Mengupdate file foto jika ada yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            Storage::delete('public/images/' . $product->foto);

            // Simpan foto baru ke dalam folder public/images
            $fotoName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('public/images', $fotoName);

            // Update nama file foto di database
            $product->foto = $fotoName;
        }

        // Simpan perubahan
        $product->save();


        return redirect()->route('products.index')->with('success', 'products updated successfully.');
    }

    public function destroy(Products $product)
    {

        $product->delete();

        return redirect()->route('products.index')->with('success', 'products deleted successfully.');
    }
}
