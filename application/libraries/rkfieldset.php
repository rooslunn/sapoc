<?php

//use Laravel\Log;
//use Laravel\Database as DB;
//use Laravel\Config;
//use Laravel\View;
//use Forms\Field;

class RKFieldSet {

    private $fields = array();
    
    public static function from_model($name) {
        $fields = Config::get($name);
        $set = new self();
        foreach ($fields as $fname => $fprops) {
            $field = new RKField($fname);
            $field_prop = json_decode($fprops, true);
            foreach ($field_prop as $prop => $value) {
                $field->$prop($value);
            }
            $set->add($field);
        }
        return $set;
    }
    
    public function add(RKField $field) {
        $name = $field->name;
        $this->fields[$name] = $field;
        return $this->fields[$name];
    }
    
    public function get($name=null) {
        if ($name) {
            if (array_key_exists($name, $this->fields)) {
                return $this->fields[$name];
            } else {
                trigger_error(
                    sprintf("Undefined field '%s' in %s", $name, __CLASS__)
                );
            }
        } else {
            return $this->fields;
        }
    }
    
    public function only(array $list) {
        $new_set = new self();
        foreach($list as $field_name) {
            if (array_key_exists($field_name, $this->fields)) {
                $new_set->add($this->fields[$field_name]);
            }
        }
        return $new_set;
    }
    
    public function rules() {
        $rules = array();
        foreach ($this->fields as $field_name => $field_obj) {
            if (!empty($field_obj->rule)) {
                $rules[$field_name] = $field_obj->rule;
            }
        }
        return $rules;
    }
    
    private function is_input($field) {
        return $field->type !== 'legend';
    }
    
    public function inputs() {
        $inputs = array();
        foreach ($this->fields as $field_name => $field_obj) {
            if ($this->is_input($field_obj)) {
                $inputs[$field_name] = Input::get($field_name);
            }
        }
        return $inputs;
    }
    
}