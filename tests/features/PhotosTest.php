<?php

class PhotosTest extends FeatureTestCase
{
    public function test_photographer_can_see_list_of_photos()
    {
        $photographer = $this->defaultUser([
            'name' => 'Gonzalo Cruz'
        ])->assign('photographer');

        $this->actingAs($photographer)
            ->visit(route('photos.index'))
            ->see('Lista de Fotografías');
    }
}
