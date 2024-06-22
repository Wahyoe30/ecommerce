<?php

namespace App\Http\Controllers;

use App\Models\MyFavorite;
use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;

class MyFavoriteController extends Controller
{
    public function index()
    {
        $favorites = MyFavorite::with(['product', 'user'])->get();

        $mostFavoritedProduct = Products::withCount('favorites')
            ->orderBy('favorites_count', 'desc')
            ->first();

        return view('favorites.index', compact('favorites', 'mostFavoritedProduct'));
    }
    // public function create()
    // {
    //     $users = User::all();
    //     $products = Products::all();
    //     return view('favorites.create', compact('users', 'products'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'id_user' => 'required|integer',
    //         'id_product' => 'required|integer',
    //     ]);

    //     MyFavorite::create($request->all());

    //     return redirect()->route('favorites.index')->with('success', 'Favorite added successfully.');
    // }

    // public function show(MyFavorite $favorite)
    // {
    //     $favorite->load(['user', 'product']);
    //     return view('favorites.show', compact('favorite'));
    // }

    // public function edit(MyFavorite $favorite)
    // {
    //     $users = User::all();
    //     $products = Products::all();
    //     return view('favorites.edit', compact('favorite', 'users', 'products'));
    // }

    // public function update(Request $request, MyFavorite $favorite)
    // {
    //     $request->validate([
    //         'id_user' => 'required|integer',
    //         'id_product' => 'required|integer',
    //     ]);

    //     $favorite->update($request->all());

    //     return redirect()->route('favorites.index')->with('success', 'Favorite updated successfully.');
    // }

    // public function destroy(MyFavorite $favorite)
    // {
    //     $favorite->delete();

    //     return redirect()->route('favorites.index')->with('success', 'Favorite deleted successfully.');
    // }
}
