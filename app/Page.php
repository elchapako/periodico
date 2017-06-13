<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['page_number', 'editionsection_id', 'status'];

    public function editionsection()
    {
        return $this->belongsTo(Editionsection::class);
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
