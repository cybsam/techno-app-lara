<?php

namespace App\Http\Controllers\Administrator\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function indexList(){
        return view('dashboard.download.index');
    }
}
