<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Page extends Models
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

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class)
            ->withTimestamps();
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function getStatusTextAttribute()
    {
        return $this->arrayStatus($this->status);
    }

    public function arrayStatus($number_status)
    {
        $status = [];
        $status [1] = trans('validation.attributes.created');
        $status [2] = trans('validation.attributes.adding_notes');
        $status [3] = trans('validation.attributes.added_notes');
        $status [4] = trans('validation.attributes.added_photos');
        $status [5] = trans('validation.attributes.designed');
        $status [6] = trans('validation.attributes.revised');
        $status [7] = trans('validation.attributes.printed');

        return $status[$number_status];
    }

    public function scopeStatusAddedNotes($query)
    {
        return $query->where('status', 3);
    }

    public function scopeStatusAddedPhotos($query)
    {
        return $query->where('status', 4);
    }

    public function scopeStatusDesigned($query)
    {
        return $query->where('status', 5);
    }

    public function scopeStatusReviewed($query)
    {
        return $query->where('status', 6);
    }

    public function changeStatusAddingNotes()
    {
        $this->update(['status' => 2]);
    }

    public function hasModelAndArea()
    {
        return $this->model_id && $this->area_id;
    }

    public function hasNotes()
    {
        return $this->notes()->count() > 0;
    }
}
