<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QueryBuilderRule extends Component
{
    public $fields;
    public $operands;
    public $valueOptions;
    protected $valueFieldHidden;
    protected $isDate;
    protected $rule;
    protected $index;


    public function mount($parentIndex, $key, $fields)
    {
        $this->index = (isset($parentIndex) ? $parentIndex . '.' : '') . $key;
        $this->fields = $fields;
    }

    public function setField($field)
    {
        $this->rule['field'] = $field;
    }

    public function setOperand($operand)
    {
        $this->rule['operand'] = $operand;
        $this->emit('ruleUpdated', $this->index, $this->rule);
    }

    public function setValue($value)
    {
        if ($value === "true" || $value === "false") {
            $this->rule['value'] = 1;
            $operand = $value === "true" ? '=' : '<>';
            $this->setOperand($operand);
        } else {
            $this->rule['value'] = $value;
        }

        $this->emit('ruleUpdated', $this->index, $this->rule);
    }

    public function getOperands($key = null)
    {
        $operands = [
            'text' => ['equals','does not equal','contains','does not contain','is empty','is not empty','begins with','ends with'],
            'numeric' => ['=','<>','<','<=','>','>='],
            'date' => ['=','<>','<','<=','>','>='],
            'boolean' => [],
            'select' => ['equals','does not equal','is empty','is not empty'],
        ];

        return $key ? $operands[$key] : $operands;
    }

    public function selectedFieldGetParam($param)
    {
        return isset($this->rule['field']) ? collect($this->fields)->filter(function ($f) {
            return $f['id'] === $this->rule['field'];
        })->first()[$param] : null;
    }

    public function render()
    {
        $this->operands = isset($this->rule['field']) ? $this->getOperands(
            $this->selectedFieldGetParam('type')
        ) : [];

        $this->valueFieldHidden = $this->selectedFieldGetParam('type') === 'boolean';

        $this->valueOptions = $this->selectedFieldGetParam('type') === 'select'
            ? $this->selectedFieldGetParam('valueOptions')
            : null;

        $this->isDate = $this->selectedFieldGetParam('type') === 'date';

        return view('livewire.query-builder-rule')
            ->with([
                'valueFieldHidden' => $this->valueFieldHidden,
                'isDate' => $this->isDate,
            ]);
    }
}
