<?php

use Illuminate\Database\Seeder;

class MedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicos = [
            [
                'nome' => 'Médico 1',
                'crm'  => '1234',
                'telefone' => '99999999'
            ],
            [
                'nome' => 'Médico 2',
                'crm'  => '4567',
                'telefone' => '77777777'
            ],
            [
                'nome' => 'Médico 3',
                'crm'  => '8910',
                'telefone' => '99999999'
            ],
        ];

        DB::table('medicos')->insert($medicos);
    }
}
