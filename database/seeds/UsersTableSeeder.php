<?php

use App\Area;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = factory(App\User::class)->create([
           'name' => 'Edwin',
           'email' => 'el.chapako@gmail.com',
           'password' => bcrypt('admin')
        ]);
        $useradmin->assign('admin');

        $userinfo = factory(App\User::class)->create([
            'email' => 'info-manager@example.com',
        ]);
        $userinfo->assign('info-manager');

        $userreporter = factory(App\User::class)->create([
            'email' => 'reporter@example.com',
        ]);
        $userreporter->assign('reporter');

        $userreview = factory(App\User::class)->create([
            'email' => 'review-manager@example.com',
        ]);
        $userreview->assign('review-manager');

        $usereditor = factory(App\User::class)->create([
            'email' => 'editor@example.com',
        ]);
        $usereditor->assign('editor');

        Bouncer::allow($usereditor)->toManage(Area::class);

        $userphoto = factory(App\User::class)->create([
            'email' => 'photographer@example.com',
        ]);
        $userphoto->assign('photographer');

        $userdesigner = factory(App\User::class)->create([
            'email' => 'designer@example.com',
        ]);
        $userdesigner->assign('designer');

        $usersecretary = factory(App\User::class)->create([
            'email' => 'secretary@example.com',
        ]);
        $usersecretary->assign('secretary');

        $userowner = factory(App\User::class)->create([
            'email' => 'owner@example.com',
        ]);
        $userowner->assign('owner');
    }
}
