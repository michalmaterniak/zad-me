<?php

namespace MichalM3;

class ArrayCollection extends \ArrayObject
{
    public function getFirstKey(): mixed
    {
        return array_key_first((array)$this);
    }

    public function shift(): mixed
    {
        $key = $this->getFirstKey();
        $item = $this->offsetGet($key);
        $this->offsetUnset($key);

        return $item;
    }
}