<?php

use App\Note;

class AssignedNoteTest extends FeatureTestCase
{
    public function test_list_of_notes_assigned_to_reporter()
    {
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

        $note = factory(App\Note::class)->create([
            'title' => 'titulo uno',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id
        ]);
        $note2 = factory(App\Note::class)->create([
            'title' => 'titulo dos',
            'area_id' => $area->id,
            'reporter_id' => $reporter2->id
        ]);

        $this->actingAs($reporter);
        $this->visit(route('assigned-notes.index'))
            ->see($note->title)
            ->see('Local')
            ->dontSee($note2->title);
    }
}
