<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ad extends Model
{
    protected $fillable = ['name', 'color', 'section_id', 'size_id', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
