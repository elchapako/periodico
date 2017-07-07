<?php

class PhotosTest extends FeatureTestCase
{
    public function test_photographer_can_see_list_of_photos()
    {
        $photographer = $this->defaultUser([
            'name' => 'Gonzalo Cruz'
        ])->assign('photographer');

        $this->actingAs($photographer)
            ->visit(route('albums.index'))
            ->see('Álbumes');
    }

    public function test_photographer_can_see_list_of_pages_with_notes_that_need_photos()
    {
        $photographer = $this->defaultUser([
            'name' => 'Gonzalo Cruz'
        ])->assign('photographer');

        $this->actingAs($photographer)
            ->visit(route('photo-pages.index'))
            ->see('Lista de páginas que necesitan fotos');
    }

    public function test_photographer_can_see_notes_of_page_that_need_photos()
    {
        $reporter = $this->defaultUser([
            'name' => 'arturo fernandez'
        ])->assign('reporter');

        $section = factory(\App\Section::class)->create([
            'name' => 'Edicion Central'
        ]);

        $edition = factory(\App\Edition::class)->create([
            'date' => \Carbon\Carbon::today(),
            'status' => 'active'
        ]);

        $editionsection = factory(\App\Editionsection::class)->create([
            'edition_id' => $edition->id,
            'section_id' => $section->id
        ]);

        $area = factory(\App\Area::class)->create([
            'name' => 'Local'
        ]);

        $page = factory(\App\Page::class)->create([
            'status' => 3,
            'area_id' => $area->id,
            'editionsection_id' => $editionsection->id
        ]);

        $note = factory(\App\Note::class)->create([
            'title'     => 'Este es el título',
            'note'      => 'Aqui va la noticia',
            'area_id'   => $area->id,
            'reporter_id'   => $reporter->id,
            'page_id'       => $page->id,
            'status'        => 4,
            'photo'         => 1
        ]);

        $photographer = $this->defaultUser([
            'name' => 'Gonzalo Cruz'
        ])->assign('photographer');

        $this->actingAs($photographer)
            ->visit(route('photo-pages.index'))
            ->see('Edicion Central')
            ->click('Mostrar Noticias')
            ->see('Este es el título');
    }
}
