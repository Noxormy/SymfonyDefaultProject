<?php
/**
 * Created by PhpStorm.
 * User: Nnox
 */

namespace App\Normalizator;


class Normalizator
{
    static function Normalize($object, $data) {
        foreach($object->getFields() as $field) {
            $funcName = "set" . ucfirst($field->name);
            $object->$funcName($data->get($field->name));
        }

        return $object;
    }
}