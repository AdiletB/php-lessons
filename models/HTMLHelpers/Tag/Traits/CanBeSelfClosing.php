<?php
/**
 * Created by PhpStorm.
 * User: БалабековАд
 * Date: 12.03.2020
 * Time: 21:39
 */

namespace HTMLHelpers\Tag\Traits;


trait CanBeSelfClosing
{
    use HasName;
    protected static $selfClosing = [
        'area', 'base', 'br', 'embed', 'hr', 'iframe', 'img',
        'input', 'link', 'meta', 'param', 'source', 'track'
    ];

    public function isSelfClosing() {
        return in_array($this->getName(), self::$selfClosing);
    }

}