<?php

namespace App\Http\Controllers\Api;
use App\Api\Traits\Responder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use Responder, ValidatesRequests;


}