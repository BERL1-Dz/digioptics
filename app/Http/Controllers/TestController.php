<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpticienInfo;

class TestController extends Controller
{
    public function testOpticienInfo()
    {
        $opticienInfo = OpticienInfo::first();
        
        if (!$opticienInfo) {
            return response()->json(['message' => 'No OpticienInfo found'], 404);
        }
        
        return response()->json($opticienInfo);
    }
}
