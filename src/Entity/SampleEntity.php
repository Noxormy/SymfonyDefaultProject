<?php
/**
 * Created by PhpStorm.
 * User: Yur
 * Date: 17.12.2018
 * Time: 1:45
 */

namespace App\Entity;

use ReflectionClass;

class SampleEntity
{
    public function getFields() {
        $reflection = new ReflectionClass($this);
        $vars = $reflection->getProperties(\ReflectionProperty::IS_PRIVATE);
        return $vars;
    }

    public function show() {
        $object = new \stdClass();

        foreach ($this->getFields() as $field) {
            $fieldName = $field->name;
            $funcName = "get" . ucfirst($fieldName);
            $object->$fieldName = $this->$funcName();
        }

        return $object;
    }
}