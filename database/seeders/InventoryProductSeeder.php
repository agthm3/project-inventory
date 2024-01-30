<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('input_data')->insert(
          [  [
            'name' => 'Semen Tiga Roda',
            'verificationdate' => '2024-01-02',
            'ponumber' => 13635,
            'deskripsi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.' ,
            'quantity' => 50,
            'receivedby' => "PT. Mencari Cinta Sejati",
            'user' => 'admin',
            'storagelocation' => 'Gudang A',
            'vehiclenumber' => 'DD 121693 AB',
            'supplier' => 'PT. Galau Bersama Selamanya',
            'remark' => 'Mantap Mentong',
            'image' => '1705902716_Semen Tiga roda.jpg'
            ],
            [
            'name' => 'Tripleks Super',
            'verificationdate' => '2024-01-02',
            'ponumber' => 534534,
            'deskripsi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.' ,
            'quantity' => 30,
            'receivedby' => "PT. Mencari Cinta Sejati",
            'user' => 'admin',
            'storagelocation' => 'Gudang A',
            'vehiclenumber' => 'DD 121693 AB',
            'supplier' => 'PT. Galau Bersama Selamanya',
            'remark' => 'Mantap Mentong',
            'image' => '1705902716_Semen Tiga roda.jpg'
            ],
            [
            'name' => 'Batu Kali ekspor',
            'verificationdate' => '2024-01-02',
            'ponumber' => 5654,
            'deskripsi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.' ,
            'quantity' => 99,
            'receivedby' => "PT. Mencari Cinta Sejati",
            'user' => 'admin',
            'storagelocation' => 'Gudang A',
            'vehiclenumber' => 'DD 121693 AB',
            'supplier' => 'PT. Galau Bersama Selamanya',
            'remark' => 'Mantap Mentong',
            'image' => '1705902716_Semen Tiga roda.jpg'
            ],
            [
            'name' => 'Batu Kali ekspor',
            'verificationdate' => '2024-01-02',
            'ponumber' => 92639,
            'deskripsi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.' ,
            'quantity' => 22,
            'receivedby' => "PT. Mencari Cinta Sejati",
            'user' => 'admin',
            'storagelocation' => 'Gudang A',
            'vehiclenumber' => 'DD 121693 AB',
            'supplier' => 'PT. Galau Bersama Selamanya',
            'remark' => 'Mantap Mentong',
            'image' => '1705902716_Semen Tiga roda.jpg'
            ],
            ]
        );
    }
}
