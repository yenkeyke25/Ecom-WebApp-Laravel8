<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{



    public function AddNews(Request $request)
    {
        $Emailvalidation = $request->validate([
            'email' => 'required |unique:newsletters| max:55'
        ]);
        $data = array();

        $data['email'] = $request->email;

        DB::table('newsletters')->insert($data);
        $notification = array(
            'message' => 'You are Subscre to Our News Letter!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteSubscribers($id)
    {
        DB::table('newsletters')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Subscriber deleted successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}