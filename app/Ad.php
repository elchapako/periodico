<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;


class Ad extends Models
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

    public function dates()
    {
        return $this->belongsToMany(Date::class)
            ->withPivot('assigned')
            ->withTimestamps();
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class)
            ->withTimestamps();
    }
}
