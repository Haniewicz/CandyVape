<?php

namespace App\Services;

/**
 * Class ViewService.
 */
class ViewService
{
    public function view(string $view, array $details)
    {
        return view($view)->withNavbar($details[0])->withContent($details[1]);
    }
}
