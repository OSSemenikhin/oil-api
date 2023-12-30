<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

trait HandlesHeaders
{
    private function addHeaders(Response $response, int $count): Response
    {
        return $response
            ->header('Access-Control-Expose-Headers', 'Content-Range')
            ->header('Content-Range', $count);
    }
}
