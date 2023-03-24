<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Первый контроллер
 * обрабатывает http-запросы
 */
class MyPlaceController extends Controller
{
    public function index()
    {
        return 'hello';
    }
}
