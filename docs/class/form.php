<?php
class Form
{
    public static $class = "form-control";

    public static function checkbox(string $name, string $value = null, array $date = []): string
    {
        $attributes = '';
        if (isset($date[$name]) && in_array($value, $date[$name])) {
            $attributes .= 'checked';
        }
        $attributes = ' class="' . self::$class . '"';
        $class = self::$class;
        return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $attributes >
HTML;
    }
}
