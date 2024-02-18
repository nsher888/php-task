<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = Message::all()->sortByDesc('created_at');

        return view('index', compact('messages'));
    }

    public function store(StoreMessageRequest $request): RedirectResponse
    {
        $message = Message::create($request->validated());

        return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
    }
}
