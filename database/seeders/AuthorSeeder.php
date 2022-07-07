<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name' => 'Assoc. Prof. Dr. Murniati Mukhlisin, M.Acc.',
            'email' => 'author@example.com',
            'keahlian' => 'Pengembangan Aplikasi',
            'peminatan' => 'Pengembangan Aplikasi',
            'deskripsi' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'password' => Hash::make('1234'),
            'sertifikasi' => serialize(['Dicoding Web Developer Expert', 'Dicoding Flutter Developer Expert', 'Google Android Developer Associate', 'TensorFlow Developer Advocate']),
        ]);
    }
}
