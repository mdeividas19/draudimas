<?php

namespace App\Http\Controllers;

use App\Models\Shortcode;
use Illuminate\Http\Request;

class ShortcodeController extends Controller
{
    public function load()
    {
        $result = Shortcode::all()->toArray();
        return $result;
    }
}
