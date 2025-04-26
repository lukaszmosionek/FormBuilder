<?php

namespace App\Services;

class FormBuilder
{
    protected $action;
    protected $fields = [];

    public function __construct($action)
    {
        $this->action = $action;
    }

    public function addField($type, $name, $label, $required = false, $class = '')
    {
        $this->fields[] = compact('type', 'name', 'label', 'required', 'class');
        return $this;
    }

    public function render()
    {
        $html = "<form method='POST' action='{$this->action}'>";
        $html .= csrf_field();

        foreach ($this->fields as $field) {
            $required = $field['required'] ? 'required' : '';
            $class = $field['class'] ?? '';
            $html .= "<div class='mb-3'>";
            $html .= "<label>{$field['label']}</label>";
            if ($field['type'] === 'textarea') {
                $html .= "<textarea name='{$field['name']}' class='{$class}' {$required}></textarea>";
            } else {
                $html .= "<input type='{$field['type']}' name='{$field['name']}' class='{$class}' {$required}>";
            }
            $html .= "</div>";
        }

        $html .= "<input type='submit' value='Wyślij' class='btn btn-primary'>";
        $html .= "</form>";

        return $html;
    }
}
