<?php

namespace HTMLHelpers\Tag;



use HTMLHelpers\Tag\Interfaces\IHasAttributes;
use HTMLHelpers\Tag\Traits\CanBeSelfClosing;
use HTMLHelpers\Tag\Traits\HasAttributes;
use HTMLHelpers\Tag\Traits\HasBody;

class BaseTag implements IHasAttributes
{
    use HasAttributes;
    use HasBody;
    use CanBeSelfClosing;

    public function __construct($name, array $attributes = []) {
        $this->setName($name);
        $this->setAttribute($attributes);
    }
    #region methods

    public function start() {
        $tag = "<{$this->getName()}";
        foreach ($this->getAttributes() as $key => $attribute) {
            $tag .= " $key";
            if ($attribute)
                $tag .= "=\"$attribute\"";
        }
        return $tag . ($this->isSelfClosing() ? " />" : ">");
    }
    public function end() {
        if (!$this->isSelfClosing())
            return "</{$this->getName()}>";
        return null;
    }
    public function removeClass($class)
    {
        if($this->isAttrValueExists("class", " ", $class)){
            $arrayValues = explode(" ", $this->getAttributes()["class"]);
            $arrayValues = array_diff($arrayValues, [$class]);
            $arrayValues = implode(" ", $arrayValues);
            $this->setAttribute("class", $arrayValues);
        }

        return $this;
    }
    public function addClass($class)
    {
        
        $attribute = $this->attributes["class"];
        $addValues = function($value)
        {
            $array = explode(" ", $value);
            foreach ($array as $value) {
                if(!$this->isAttrValueExists("class", " ", $value))
                {
                    $this->attributes["class"] .= " {$value}";
                }
            }
        };
        $attribute && $class ? 
                      $addValues($class) : $this->attributes["class"] = $class;
        return $this;
    }
    public function getAsString()
    {
        return $this->start() . $this->getBody() . $this->end();
    }
    public function __toString() {
        return $this->getAsString();
    }
    public function __call($name, $arguments)
    {
        return $this->setAttribute($name, $arguments[0] ?? null);
    }
    #endregion
}
