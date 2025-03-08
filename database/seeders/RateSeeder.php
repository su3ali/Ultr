<?php
namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    public function run()
    {
        $ratings = [
            'ممتاز'    => 'Excellent',
            'جيد جدًا' => 'Very Good',
            'جيد'      => 'Good',
            'ضعيف'     => 'Bad',
        ];

        foreach ($ratings as $ar => $en) {
            Rate::updateOrCreate(
                [
                    'name_ar' => $ar,
                    'name_en' => $en,
                ],
                [
                    'name_ar' => $ar,
                    'name_en' => $en,
                ]
            );
        }
    }
}
