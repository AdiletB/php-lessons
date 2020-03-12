<?php
/**
 * Created by PhpStorm.
 * User: БалабековАд
 * Date: 12.03.2020
 * Time: 21:41
 */

namespace HTMLHelpers\Tag\Traits;


trait HasName
{
    protected $name;
    protected function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }

}