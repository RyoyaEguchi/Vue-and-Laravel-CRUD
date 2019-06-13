<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memo;

class memoController extends Controller
{
    private $memo;

    function __construct(Memo $memo)
    {
        $this->memo = $memo;
    }

    function create(Request $request)
    {
        $this->memo->create($request->all());
    }

    function read()
    {
        $data = $this->memo->get()->toArray();
        $memo = response()->json($data);
        return $memo;
    }
}
