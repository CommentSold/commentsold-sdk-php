<?php

declare(strict_types=1);

namespace CommentSold\Resources;

abstract class AbstractResource
{
    /** @return mixed[] */
    public function toArray(): array
    {
        return $this->objectToArray($this);
    }

    public function toJson(): string
    {
        return json_encode($this);
    }

    /** @return mixed[] */
    private function objectToArray(mixed $object): array
    {
        $array = [];
        foreach ($object as $key => $value) {
            $array[$key] = (is_array($value) || is_object($value)) ? $this->objectToArray($value) : $value;
        }

        return $array;
    }
}
