<?php

function nav_item(string $lien, string $titre, string $linkClass = ''): string
{
  $classe = 'nav-item';
  if ($_SERVER['SCRIPT_NAME'] === $lien) {
    $classe .= ' active';
  }
  return '<li class="' . $classe . '">
    <a class="' . $linkClass . '" href="' . $lien . '">' . $titre  .
    '</a>
    </li>';
}


function checkbox(string $name, string $value, array $data): string
{
  $attributes = '';
  if (isset($data[$name]) && in_array($value, $data[$name])) {
    $attributes .= 'checked';
  }
  return <<<HTML
   <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
}

function radio(string $name, string $value, array $data): string
{
  $attributes = '';
  if (isset($data[$name]) && $value === $data[$name]) {
    $attributes .= 'checked';
  }
  return <<<HTML
   <input type="radio" name="{$name}" value="$value" $attributes>
HTML;
}

function select(string $name, $value, array $options): string
{
  $html_options = [];
  foreach ($options as $k => $option) {
    $attributes = $k == $value ? 'selected' : '';
    $html_options[] = "<option value='$k' $attributes>$option</option>";
  }
  return "<select class='form-control' name='$name'>" . implode($html_options) . '</select>';
}

function dump($variable)
{
  echo '<pre>';
  var_dump($variable);
  echo "</pre>";
}

function creneaux_html(array $creneaux)
{
  if (empty($creneaux)) {
    return 'Fermé';
  }
  $phrase = [];
  foreach ($creneaux as $creneau) {
    $phrase[] = "<strong>{$creneau[0]} h</strong> / <strong>{$creneau[1]} h</strong>";
  }
  return 'Ouvert ' . implode(' & ', $phrase);
}



function in_creneaux(int $heure, array $creneaux): bool
{
  foreach ($creneaux as $creneau) {
    $debut = $creneau[0];
    $fin = $creneau[1];
    if ($heure >= $debut && $heure <= $fin) {
      return true;
    }
  }
  return false;
}
