<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create to model
        $data = [
            [
                'name' => 'Paracetamol',
                'description' => 'Paracetamol adalah obat-obatan yang digunakan untuk menghentikan penyakit dan mengurangi rasa sakit.',
                'composition' => 'paracetamol 500mg',
                'quantity' => '1 Dos isi 10 Strip x 10 Tablet',
                'price' => '10000',
                'image' => 'paracetamol.jpg',
            ],
            [
                'name' => 'Ibuprofen',
                'description' => 'Ibuprofen adalah obat-obatan yang digunakan untuk menghentikan penyakit dan mengurangi rasa sakit.',
                'composition' => 'ibuprofen 400mg',
                'quantity' => '1 Dos isi 10 Strip x 10 Tablet',
                'price' => '15000',
                'image' => 'ibuprofen.png',
            ],
        ];
        // add to model
        foreach ($data as $key => $value) {
            Medicine::create($value);
        }
    }
}
