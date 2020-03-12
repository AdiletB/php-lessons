<?php
namespace HTMLHelpers\Tag\Traits;
trait HasAttributes
{
    protected $attributes = [];
    protected function getAttributes() {
        return $this->attributes;
    }
    public function setAttribute($key, $value = null) {

        if (is_array($key))
        {
            foreach ($key as $k => $v)
                $this->setAttribute($k, $v);
        }
        else
        {
            $this->attributes[$key] = $value;
        }
        return $this;
    }
    public function offsetExists($offset)
    {
        return isset($this->getAttributes()[$offset]);
    }
    public function offsetGet($offset)
    {
        return $this->getAttributes()[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        $this->setAttribute($offset, $value);
    }
    public function offsetUnset($offset)
    {
        unset($offset);
    }
    protected function isAttrValueExists($key, $delimeter = " ", $value = null)
    {
        $currentAttr = $this->getAttributes()[$key];
        $arrayValues = explode($delimeter, $currentAttr);

        return $currentAttr ? in_array($value, $arrayValues) : false;
    }
    public function appendAttribute($key, $value)
    {
        if($value != null && $this->attributes[$key])
        {
            $this->attributes[$key] .= " {$value}";
        }
        return $this;
    }
    public function prependAttribute($key, $value)
    {
        if($value != null && $this->attributes[$key])
        {
            $currentValue = $this->attributes[$key];
            $this->attributes[$key] = "{$value} ".$currentValue;
        }
        return $this;
    }
}