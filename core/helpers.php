<?php
function asset($path)
{
    return "/assets/" . ltrim($path, '/');
}

function view_path($path) {
    return __DIR__ . '/../app/Views/' . $path;
}
