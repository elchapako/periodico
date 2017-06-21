<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    public function run()
    {
        $area = factory(App\Area::class)->create([
           'name' => 'local'
        ]);

        $reporter = factory(App\User::class)->create([
            'email' => 'jesus@example.com',
        ]);
        $reporter->assign('reporter');

        factory(App\Note::class)->create([
            'title'         => 'Aqui va el titulo',
            'note'          => 'Aqui va la noticia',
            'area_id'       => $area->id,
            'reporter_id'   => $reporter->id,
            'status'        => 1
        ]);
    }
}
