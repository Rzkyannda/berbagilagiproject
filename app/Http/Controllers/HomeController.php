<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function testFrom()
    {
        return view('testForm');
    }
    public function testSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'messages' => 'required|max:255|string',
        ]);

        $validatedData['sender_id'] = auth()->id();

        Message::create($validatedData);
        return redirect()->back()->with('success', 'Data Saved Successfully');
    }
}
