<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\MessageRequest;
use App\Models\Message;
use App\Jobs\NotifyAdminMessageJob;


class MessageController extends Controller
{
    // PUBLIC
    public function store(MessageRequest $request)
    {
        $message = Message::create($request->validated());

        NotifyAdminMessageJob::dispatch($message); 

        return response()->json(['message' => 'Message sent'], 201);
    }

    // ADMIN
    public function index()
    {
        $this->middleware('admin');

        return Message::latest()->get();
    }
}
