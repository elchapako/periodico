<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['page_number', 'editionsection_id', 'status', 'area_id', 'model_id'];

    public function editionsection()
    {
        return $this->belongsTo(Editionsection::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class)
            ->withTimestamps();
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

    public function getStatusTextAttribute()
    {
        return $this->arrayStatus($this->status);
    }

    public function arrayStatus($number_status)
    {
        $status = [];
        $status [1] = trans('validation.attributes.unrealized');
        $status [2] = trans('validation.attributes.assigning_notes');
        $status [3] = trans('validation.attributes.waiting_for_photo');
        $status [4] = trans('validation.attributes.designing');
        $status [5] = trans('validation.attributes.revised');
        $status [6] = trans('validation.attributes.printed');

        return $status[$number_status];
    }
}
