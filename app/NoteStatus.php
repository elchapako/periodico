<?php

namespace App;

class NoteStatus
{
    const assigned = 1;
    const presented = 2;
    const corrected = 3;
    const published = 4;

    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::assigned => trans('validation.attributes.assigned'),
            self::presented => trans('validation.attributes.presented'),
            self::corrected => trans('validation.attributes.corrected'),
            self::published => trans('validation.attributes.published')
        ];
    }

    public function lists()
    {
        return $this->statuses;
    }

}
