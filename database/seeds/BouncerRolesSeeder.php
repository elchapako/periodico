<?php

use Illuminate\Database\Seeder;


class BouncerRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::role()->create([
            'name' => 'admin',
            'title' => 'Administrador',
        ]);
        Bouncer::role()->create([
            'name' => 'info-manager',
            'title' => 'Jefe de Información',
        ]);
        Bouncer::role()->create([
            'name' => 'reporter',
            'title' => 'Periodista',
        ]);
        Bouncer::role()->create([
            'name' => 'review-manager',
            'title' => 'Jefe de Corrección',
        ]);
        Bouncer::role()->create([
            'name' => 'editor',
            'title' => 'Jefe de Redacción',
        ]);
        Bouncer::role()->create([
            'name' => 'photographer',
            'title' => 'Fotógrafo',
        ]);
        Bouncer::role()->create([
            'name' => 'designer',
            'title' => 'Diagramador',
        ]);
        Bouncer::role()->create([
            'name' => 'secretary',
            'title' => 'Secretaría',
        ]);
        Bouncer::role()->create([
            'name' => 'owner',
            'title' => 'Dueño',
        ]);
    }
}
