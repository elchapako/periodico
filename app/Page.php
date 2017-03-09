<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['group', 'section_id', 'status'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public static function newGroup($group)
    {
        $pages = [];
        for ($i=0; $i < 4; $i++) {
            $pages[] = new Page([
                'group' => $group,
                'status' => PageStatus::UNREALIZED,
            ]);
        }
        return $pages;
    }
}
