<?php

namespace App;

class PageStatus
{
    const UNREALIZED = 1;
    const ASSIGNING_NOTES = 2;
    const WAITING_FOR_PHOTOGRAPHY = 3;
    const DESIGNING = 4;
    const REVISED = 5;
    const PRINTED = 6;

    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::UNREALIZED => trans('validation.attributes.unrealized'),
            self::ASSIGNING_NOTES => trans('validation.attributes.assignin_notes'),
            self::WAITING_FOR_PHOTOGRAPHY => trans('validation.attributes.waiting_for_photo'),
            self::DESIGNING => trans('validation.attributes.designing'),
            self::REVISED => trans('validation.attributes.revised'),
            self::PRINTED => trans('validation.attributes.printed')
        ];
    }

    public function lists()
    {
        return $this->statuses;
    }
}
