<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;


class DashboardController extends Controller
{
    public function index()
    {
        // قائمة التصنيفات
        $categories = Category::all();

        // قائمة الكتب
        $books = Book::all();

        return view('admin.dashboard', compact('categories', 'books'));
    }
}
