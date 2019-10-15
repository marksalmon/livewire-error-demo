<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QueryBuilderGroup extends Component
{
    public $id;
    public $condition;
    public $children = [];
    public $fields;


    public function mount($index, $key, $fields)
    {
        $this->index = $index;
        $this->key = $key;
        $this->id = (isset($index) ? $index . '.' : '') . $key;
        $this->fields = $fields;
    }

    public function setCondition($condition)
    {
        $this->condition = $condition;
        $this->emitCondition();
    }

    public function emitCondition()
    {
        $this->emit('groupUpdated', $this->id, $this->condition);
    }

    public function setDefaultCondition()
    {
        if (! $this->condition) {
            $this->setCondition('and');
        }
    }

    public function addRule()
    {
        $this->children[] = [
            'type' => 'rule',
        ];
        $this->setDefaultCondition();
    }

    public function addGroup()
    {
        $this->children[] = [
            'type' => 'group',
        ];
        $this->setDefaultCondition();
    }

    public function render()
    {
        return view('livewire.query-builder-group');
    }
}
