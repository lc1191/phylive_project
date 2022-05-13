<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Producto::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        for ($i=1; $i < 25 ; $i++) {
            $p = Producto::inRandomOrder()->first();

            $randomStr = Str::random(12);
            $randomNumber = random_int(10, 999);

            Producto::create(
                [
                    'title' => $randomStr,
                    'price' => 1 + $i * $i,
                    'description' => "Descripcion " .$i. " del articulo " .$i,
                    'quantity' => $randomNumber,
                ]);
            }
    }
}
