<?php
/**
 * Created by PhpStorm.
 * User: БалабековАд
 * Date: 12.03.2020
 * Time: 21:31
 */
namespace HTMLHelpers\Tag\Traits;
trait HasBody
{
    protected $body;
    protected function setBody($body) {
        $this->body = is_array($body) ? $body : [$body];
        return $this;
    }
    protected function getBody() {
        $body = implode($this->body ?? []);
        if(!method_exists($this, "isSelfClosing") || !$this->isSelfClosing())
            return $body;
        return null;
    }
    public function appendBody($body)
    {
        if(is_array($body))
        {
            foreach ($body as $item)
                $this->appendBody($item);
        }
        else{
            $this->body[] = $body;
        }
        return $this;
    }
    public function prependBody($body) {
        if(is_array($body))
        {
            foreach (array_reverse($body) as $item)
                $this->prependBody($item);
        }
        else{
            array_unshift($this->body, $body);
        }
        return $this;
    }
    public function appendTo(BaseTag $tag)
    {
        $tag->appendBody($this);
        return $this;
    }
    public function prependTo(BaseTag $tag)
    {
        $tag->prependBody($this);
        return $this;
    }
}