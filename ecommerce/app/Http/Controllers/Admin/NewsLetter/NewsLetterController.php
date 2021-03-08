<?php

namespace App\Http\Controllers\Admin\NewsLetter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsLetterController extends Controller
{


    public function NewsLetters()
    {
        $news = DB::table('newsletters')->get();

        return view('admin.newsLetter.news', compact('news'));
    }
}
