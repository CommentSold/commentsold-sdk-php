<?php

declare(strict_types=1);

namespace CommentSold\Resources;

abstract class AbstractResource
{
    public function toArray(): array
    {
        return $this->objectToArray($this);
    }

    public function toJson(): string
    {
        return json_encode($this);
    }

    private function objectToArray($object)
    {
        $array = [];
        foreach ($object as $key => $value) {
            $array[$key] = (is_array($value) || is_object($value)) ? $this->objectToArray($value) : $value;
        }

        return $array;
    }
}
