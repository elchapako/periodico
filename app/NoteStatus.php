<?php

namespace App;

class NoteStatus
{
    const ASSIGNED = 1;
    const PRESENTED = 2;
    const CORRECTED = 3;
    const PUBLISHED = 4;

    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::ASSIGNED => trans('validation.attributes.assigned'),
            self::PRESENTED => trans('validation.attributes.presented'),
            self::CORRECTED => trans('validation.attributes.corrected'),
            self::PUBLISHED => trans('validation.attributes.published')
        ];
    }

    public function lists()
    {
        return $this->statuses;
    }

}
