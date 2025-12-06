<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Contact::class;

    public function definition()
    {
        // 電話番号の3つのパーツを生成
        $tel1 = $this->faker->numberBetween(100, 999);
        $tel2 = $this->faker->numberBetween(1000, 9999);
        $tel3 = $this->faker->numberBetween(1000, 9999);

        return [
            'last_name' => $this->faker->lastName,   // 姓
            'first_name' => $this->faker->firstName, // 名

            'gender' => $this->faker->numberBetween(1, 3),    // 1:男性, 2:女性, 3:その他
            'email' => $this->faker->unique()->safeEmail,     // メールアドレス

            // 3つのパーツを結合して保存
            'tel' => $tel1 . $tel2 . $tel3,                 // 電話番号

            'address' => $this->faker->prefecture . $this->faker->city . '1-1-1', // 住所
            'building' => $this->faker->secondaryAddress,   // 建物名

            // ★ CategoryモデルのIDを参照 (既存のカテゴリからランダムにIDを選択)
            'category_id' => Category::all()->random()->id,

            'detail' => $this->faker->realText(120),          // お問い合わせ内容
        ];
    }
}
