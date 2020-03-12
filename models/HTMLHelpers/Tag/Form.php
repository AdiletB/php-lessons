<?php
namespace HTMLHelpers\Tag;
/**
 * Class Form
 * @method self method($value)
 * @method self action($value)
 */
class Form extends NamedTag
{

    protected static function name(): string
    {
        return "form";
    }
    public static function input($name, $type = "text", $value = null)
    {
        $attrs = [
            "name" => $name,
            "type" => $type
        ];
        if($value)
            $attrs["value"] = $value;

        return Tag::input($attrs);
    }
    public static function label($for, $body = null)
    {
        $label = Tag::label(["for" => $for]);
        if($body)
            $label->appendBody($body);

        return $label;
    }
    public static function textarea($rows, $cols)
    {
        return Tag::textarea(["rows" => $rows, "cols" => $cols]);
    }
    public static function file($name, $value = null)
    {
        return Form::input($name,"file", $value);
    }
    public static function password($name)
    {
        return Form::input($name,"password", null);
    }
}