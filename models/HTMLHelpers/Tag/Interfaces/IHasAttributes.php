<?php
namespace HTMLHelpers\Tag\Interfaces;

use ArrayAccess;
interface IHasAttributes extends ArrayAccess
{
    public function setAttribute($key, $value = null);
    public function appendAttribute($key, $value);
    public function prependAttribute($key, $value);
}