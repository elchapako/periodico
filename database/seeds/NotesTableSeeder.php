<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Note::class)->create([
            'area_id'       => 4,
            'reporter_id'   => 1,
            'status'        => 1
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 4,
            'reporter_id'   => 1,
            'status'        => 1
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 4,
            'reporter_id'   => 1,
            'status'        => 1
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 4,
            'reporter_id'   => 1,
            'status'        => 1
        ]);

        $reporter1 = factory(App\User::class)->create();
        $reporter1->assign('reporter');

        factory(App\Note::class)->create([
            'area_id'       => 4,
            'reporter_id'   => $reporter1->id,
            'status'        => 1
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 4,
            'reporter_id'   => $reporter1->id,
            'status'        => 1
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 4,
            'reporter_id'   => $reporter1->id,
            'status'        => 1
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 4,
            'reporter_id'   => $reporter1->id,
            'status'        => 1
        ]);

        $reporter2 = factory(App\User::class)->create();
        $reporter2->assign('reporter');

        factory(App\Note::class)->create([
            'area_id'       => 5,
            'reporter_id'   => $reporter2->id,
            'status'        => 2
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 5,
            'reporter_id'   => $reporter2->id,
            'status'        => 2
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 5,
            'reporter_id'   => $reporter2->id,
            'status'        => 2
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 5,
            'reporter_id'   => $reporter2->id,
            'status'        => 2
        ]);

        $reporter3 = factory(App\User::class)->create();
        $reporter3->assign('reporter');

        factory(App\Note::class)->create([
            'area_id'       => 6,
            'reporter_id'   => $reporter3->id,
            'status'        => 3
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 6,
            'reporter_id'   => $reporter3->id,
            'status'        => 3
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 6,
            'reporter_id'   => $reporter3->id,
            'status'        => 3
        ]);

        factory(App\Note::class)->create([
            'area_id'       => 6,
            'reporter_id'   => $reporter3->id,
            'status'        => 3
        ]);
    }
}
