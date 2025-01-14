<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyProfile::Create([
            'abbreviation' => 'AG',
            'name' => 'Angkutan Agung',
            'address' => 'Jl. Kp. Kelapa PLN No. 33, Cikokol, Tangerang',
            'email' => 'angkutan.agung@company.co.id',
            'phone' => '(021) 5529010, 55745753, 5529998',
            'about' => 'CV Angkutan Agung merupakan perusahaan yang bergerak di bidang jasa ekspedisi pengiriman paket barang yang bertempat di kota Tangerang. melayani tujuan dengan menggunakan angkutan darat. Dalam era globalisasi dan persaingan yang semakin sengit, setiap perusahaan dituntut untuk bisa mencermati segala situasi dan langkah-langkah efektif untuk menghadapinya. Ekspedisi ataupun Cargo adalah salah satu cara yang efektif untuk mentransportasikan produk/ barang suatu perusahaan kepada pelanggan maupun investornya. Untuk itu kami CV Angkutan Agung terlahir untuk membantu Perusahaan tersebut dalam mengirimkan barang atau produknya ke luar Kota maupun keluar Pulau yang telah kami tentukan.',
        ]);
    }
}
