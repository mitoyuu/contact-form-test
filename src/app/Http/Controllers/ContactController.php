<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // categoriesテーブルの全データを取得
        $categories = Category::all();

        // View に渡す
        return view('contact.index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        // 送信されたデータから必要なフィールドを取得
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id','detail']);

        // 電話番号の結合
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

        // ★ カテゴリ名を取得する処理を追加 ★
        $category = Category::find($contact['category_id']);

        return view('contact.confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail'
        ]);

        // 電話番号の結合
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

        // データベース保存処理
        Contact::create($contact);

        return redirect('contact.thanks');
    }
    /**
     * 完了ページを表示するメソッド
     */
    public function thanks()
    {
        return view('contact.thanks');
    }
}
