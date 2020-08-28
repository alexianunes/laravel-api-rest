<?php

use Illuminate\Database\Seeder;

class EspecialidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidades = [
            [
                'nome' => 'ALERGOLOGIA'
            ],
            [
                'nome' => 'ANGIOLOGIA'
            ],
            [
                'nome' => 'BUCO MAXILO'
            ],
            [
                'nome' => 'CARDIOLOGIA CLÍNICA'
            ],
            [
                'nome' => 'CARDIOLOGIA INFANTIL'
            ],
            [
                'nome' => 'CIRURGIA CABEÇA E PESCOÇO'
            ],
            [
                'nome' => 'CIRURGIA CARDÍACA'
            ],
            [
                'nome' => 'CIRURGIA DE CABEÇA/PESCOÇO'
            ],
            [
                'nome' => 'CIRURGIA DE TÓRAX'
            ],
            [
                'nome' => 'CIRURGIA GERAL'
            ],
            [
                'nome' => 'CIRURGIA PEDIÁTRICA'
            ],
            [
                'nome' => 'CIRURGIA PLÁSTICA'
            ],
            [
                'nome' => 'CIRURGIA TORÁCICA'
            ],
            [
                'nome' => 'CIRURGIA VASCULAR',
            ],
            [
                'nome' => 'CLÍNICA MÉDICA'
            ],
        ];

        DB::table('especialidades')->insert($especialidades);
    }
}
