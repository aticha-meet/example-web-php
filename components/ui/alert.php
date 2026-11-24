<link rel="stylesheet" href="components/ui/alert.css">

<?php
enum Type: string
{
    case dng = 'danger';
    case wrn = 'warning';
    case scs = 'success';
}

function show_alert(string $message, Type $type = Type::dng)
{

    if (empty($message)) return;

    $classType = $type->value;


    $icon = match ($type) {
        Type::dng => '⛔',
        Type::wrn => '⚠️',
        Type::scs => '✅',
    };

    // $icon = "❤️";
    // if ($type === 'warning') $icon = '⚠️';
    // if ($type === 'success') $icon = '✅';

    return "
    <div class='alert-box alert-$classType'>
        <span>$icon</span>
        <span>$message</span>
    </div>
    ";
}
