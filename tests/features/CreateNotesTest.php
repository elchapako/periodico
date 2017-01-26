<?php

class CreateNotesTest extends FeatureTestCase
{
    function test_a_boss_can_add_a_note_to_reporter()
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

        $this->visit('notes')
            ->click('Agregar Noticia')
            ->seePageIs('notes/create')
            ->see('Agregar Noticia')
            ->type('Lino Condori y la cama en el despacho', 'title')
            ->select($area->id, 'area_id')
            ->select($reporter->id, 'reporter_id')
            ->press('Crear Noticia')
            ->seePageIs('notes')
            ->see('Lino Condori y la cama en el despacho')
            ->see($area->name)
            ->see($reporter->name)

            ->seeInDatabase('notes', [
                'title' => 'Lino Condori y la cama en el despacho',
                'area_id' => $area->id,
                'reporter_id' => $reporter->id
            ]);
    }

    function test_creating_a_note_requires_authentication()
    {
        $this->visit(route('notes/create'))
            ->seePageIs(route('login'));
    }

    function test_create_note_form_validation()
    {
        $useradmin = $this->adminUser();

        $this->actingAs($useradmin)
            ->visit(route('notes/create'))
            ->press('Crear Noticia')
            ->seePageIs(route('notes/create'))
            ->see('El campo título es obligatorio')
            ->see('El campo area id es obligatorio')
            ->see('El campo reporter id es obligatorio');
    }
}