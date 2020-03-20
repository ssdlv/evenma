<?php

namespace App\Http\Controllers;

use App\Dao\OptionDao;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function get($id, $event)
    {
        $oDao = new OptionDao();
        if ($id != null)
            $option = $oDao->get($id);
        else
            $option = $oDao->get($event);
        return $option;
    }
}
