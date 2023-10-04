<?php

declare(strict_types=1);

namespace CommentSold\Resources;

abstract class AbstractResource
{
    public function toArray(): array
    {
        $array = [];

        $this->__objectToArray($this, $array);

        return $array;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }

    private function __objectToArray($obj, &$arr)
    {
        if (! is_object($obj) && ! is_array($obj)) {
            $arr = $obj;

            return $arr;
        }
        foreach ($obj as $key => $value) {
            if (! empty($value)) {
                $arr[$key] = [];
                $this->__objectToArray($value, $arr[$key]);
            } else {
                $arr[$key] = $value;
            }
        }

        return $arr;
    }
}
