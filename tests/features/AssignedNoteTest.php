<?php

use App\Note;

class AssignedNoteTest extends FeatureTestCase
{
    public function test_list_of_notes_assigned_to_reporter()
    {
        $ji = $this->defaultUser([
            'name' => 'Edwin Ibañez'
        ])->assign('info-manager');

        $area= factory(App\Area::class)->create([
            'name' => 'Local'
        ]);

        $reporter = factory(App\User::class)->create([
            'name' => 'Jesus Vargas',
            'email' => 'jesus@gmail.com'
        ])->assign('reporter');

        $reporter2 = factory(App\User::class)->create([
           'name' => 'Danitza Montaño',
            'email' => 'danitza@gmail.com'
        ])->assign('reporter');

        $this->actingAs($ji);

        $note = factory(App\Note::class)->create([
            'area_id' => $area->id,
            'reporter_id' => $reporter->id
        ]);
        $note2 = factory(App\Note::class)->create([
            'area_id' => $area->id,
            'reporter_id' => $reporter2->id
        ]);

        $this->actingAs($reporter);
        $this->visit('assigned-notes')
            ->see($note->title)
            ->see('Local')
            ->dontSee($note2->title);
    }
}
