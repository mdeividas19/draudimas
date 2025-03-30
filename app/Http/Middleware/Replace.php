<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\ShortcodeController;


class Replace
{
    protected $controller;

    public function __construct(ShortcodeController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Start before system
        $shortcodes = $this->controller->load();
        $response=$next($request);
        $html=$response->getContent();
        foreach ($shortcodes as $shortcode)
        {
            $html=str_replace('['.$shortcode['shortcode'].']',$shortcode['replace'],$html);
        }
        $response->setContent($html);
        // Starts after system loads
        return $response;
    }
}
