<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert(
            [
                [
                    'description'=>'Başlık',
                    'key'=>'title',
                    'value'=>'Laravel CMS',
                    'type'=>'text',
                    'sort'=>0,
                     'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'Açıklama',
                    'key'=>'description',
                    'value'=>'Laravel Content Management System',
                    'type'=>'text',
                    'sort'=>1,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'Logo',
                    'key'=>'logo',
                    'value'=>'logo.png',
                    'type'=>'file',
                    'sort'=>2,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'Icon',
                    'key'=>'icon',
                    'value'=>'icon.ico',
                    'type'=>'file',
                    'sort'=>3,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'Anahtar Kelimeler',
                    'key'=>'keywords',
                    'value'=>'laravel,cms,halil,akarsu',
                    'type'=>'text',
                    'sort'=>4,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'Telefon',
                    'key'=>'phone_sabit',
                    'value'=>'0850...',
                    'type'=>'text',
                    'sort'=>5,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'Gsm',
                    'key'=>'phone_cep',
                    'value'=>'0850...',
                    'type'=>'text',
                    'sort'=>6,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'Mail',
                    'key'=>'email',
                    'value'=>'sea63@hotmail.com',
                    'type'=>'text',
                    'sort'=>7,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'İl',
                    'key'=>'il',
                    'value'=>'İstanbul',
                    'type'=>'text',
                    'sort'=>7,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'İlçe',
                    'key'=>'ilce',
                    'value'=>'Beyoğlu',
                    'type'=>'text',
                    'sort'=>8,
                    'delete'=>'0',
                    'status'=>'1'

                ],
                [
                    'description'=>'Açık Adres',
                    'key'=>'adres',
                    'value'=>'Topkapi sarayi istanbul',
                    'type'=>'text',
                    'sort'=>9,
                    'delete'=>'0',
                    'status'=>'1'

                ],

            ]
        );
    }
}
