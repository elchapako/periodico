<?php

use App\Note;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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

        $reporter = $this->defaultUser([
            'name' => 'Jesus Vargas'
        ])->assign('reporter');

        $this->actingAs($ji);

        $note = factory(App\Note::class)->create([
            'area_id' => $area->id,
            'reporter_id' => $reporter->id
        ]);

        $this->actingAs($reporter);
        $this->visit('assigned-notes')
            ->see($note->title)
            ->see('Local');
    }
}
