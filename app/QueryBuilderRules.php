<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class QueryBuilderRules
{
    public $rules;

    public function __construct()
    {
        $this->rules = [];
    }

    public static function make()
    {
        return new self();
    }

    public function addRule($id, $rule)
    {
        Arr::set($this->rules, Str::after($id, '.'), $rule);
    }

    public function addGroup($id, $group)
    {
        Arr::set($this->rules, Str::after($id . '.0', '.'), $group);
    }

    public function format($query)
    {
        $condition = array_shift($query);

        return collect($query)->map(function ($rule) {
            return collect($rule)->has('field')
                ? implode(' ', [$rule['field'] ?? '', $rule['operand'] ?? '', $rule['value'] ?? ''])
                : '(' . $this->format($rule) . ')';
        })->join(" $condition ");
        ;
    }

    public function formatted()
    {
        return $this->format($this->rules);
    }
}
