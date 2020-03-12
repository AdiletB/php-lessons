<?php
namespace HTMLHelpers\Tag;
/**
 * Created by PhpStorm.
 * User: БалабековАд
 * Date: 11.03.2020
 * Time: 19:58
 */

abstract class NamedTag extends BaseTag
{
    public function __construct(array $attributes = [])
    {
        parent::__construct(static::name(), $attributes);
    }
    public static function make(array $attributes = [])
    {
        return new static($attributes);
    }
    abstract protected static function name(): string;
}