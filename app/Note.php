<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;
use Spatie\Activitylog\Traits\LogsActivity;

class Note extends Models
{
    use LogsActivity;

    protected static $ignoreChangedAttributes = ['note', 'updated_at'];

    protected $fillable = ['title', 'note', 'area_id', 'reporter_id', 'status', 'page_id', 'titular', 'photo'];

    protected static $logAttributes = ['status', 'note'];

    public function reporter()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getStatusTextAttribute()
    {
        return $this->arrayStatus($this->status);
    }

    public function arrayStatus($number_status)
    {
        $status = [];
        $status [1] = trans('validation.attributes.assigned');
        $status [2] = trans('validation.attributes.presented');
        $status [3] = trans('validation.attributes.corrected');
        $status [4] = trans('validation.attributes.selected');
        $status [5] = trans('validation.attributes.published');

        return $status[$number_status];
    }

    public function scopeCorrected($query)
    {
        return $query->where('status', 3)->where('page_id', null);
    }

    public function scopeDiscard($query)
    {
        return $query->update(['discarded' => true]);
    }

    public function changeStatusSelected()
    {
        $this->update(['status' => 4]);
    }

    public function changeStatusPublished()
    {
        $this->update(['status' => 5]);
    }
}
