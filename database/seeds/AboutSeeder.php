<?php

use Illuminate\Database\Seeder;
use App\Tentang;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tentang::create([
        	'tentang' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip.',
			'kontak' => '0811-1311-1333',
			'alamat' => 'Green Lake City, Ciledug, Tangerang, Banten',
			'email' => 'ednews@ed.com',
			'status' => 'aktif'
        ]);
    }
}
