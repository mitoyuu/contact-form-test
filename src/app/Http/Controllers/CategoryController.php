<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $options = [
            'option1' => '1. 商品のお届けについて',
            'option2' => '2. 商品の交換について',
            'option3' => '3. 商品トラブル',
            'option4' => '4. ショップへのお問い合わせ',
            'option5' => '5. その他',
        ];

        return view('contact.index', compact('categories', 'options'));
    }
}

