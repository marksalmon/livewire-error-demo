<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\QueryBuilderRules;

class QueryBuilderWithout extends Component
{
    public $fields;
    protected $queryBuilderRules;

    protected $listeners = [
        'ruleUpdated' => 'receiveRule',
        'groupUpdated' => 'receiveGroup',
    ];

    public function mount($query)
    {
        $this->fields = $query;
        $this->queryBuilderRules = new QueryBuilderRules;
        $this->rules = $this->queryBuilderRules->rules;
    }

    public function doQuery()
    {
        $this->emit('doQuery', $this->queryBuilderRules->rules, $this->queryBuilderRules->formatted());
    }

    public function receiveRule($index, $rule)
    {
        $this->queryBuilderRules->addRule($index, $rule);
    }

    public function receiveGroup($index, $group)
    {
        $this->queryBuilderRules->addGroup($index, $group);
    }

    public function testRules()
    {
        $this->queryBuilderRules->rules = [
            0 => 'and',
            1 => [
                'field' => 'job_type',
                'operand' => '=',
                'value' => 'RTC',
            ],
            2 => [
                0 => 'or',
                1 => [
                    'field' => 'jobs.id',
                    'operand' => '<',
                    'value' => 100,
                ],
                2 => [
                    'field' => 'jobs.id',
                    'operand' => '>',
                    'value' => 400,
                ],
                3 => [
                    0 => 'and',
                    1 => [
                        'field' => 'jobs.id',
                        'operand' => '>',
                        'value' => 300,
                    ],
                    2 => [
                        'field' => 'jobs.id',
                        'operand' => '<',
                        'value' => 350,
                    ],
                ],
            ],
        ];
    }

    public function render()
    {
        return view('livewire.query-builder-without')
        ->with('formattedRules', $this->queryBuilderRules->formatted())
        ->with('rules', $this->queryBuilderRules->rules)
        ;
    }
}
