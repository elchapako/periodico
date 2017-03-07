<?php

use App\Note;
use App\Notifications\NoteAssigned;
use Illuminate\Support\Facades\Notification;

class NotifyUsersTest extends FeatureTestCase
{
    function test_the_reporter_receive_a_notification_when_is_asigned_a_note()
    {
        Notification::fake();

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

        $note = Note::create([
            'title' => 'Lino condori y su cama',
            'area_id' => $area->id,
            'reporter_id' => $reporter->id,
            'status' => \App\NoteStatus::assigned
        ]);

    }
}
