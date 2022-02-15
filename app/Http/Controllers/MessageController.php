<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function create(MessageRequest $request) {
        $uploadedFile = $request->file('file');

        $data = ['user_id' => Auth::id()];

        $lastMessage = Message::getLastBetweenDay(Auth::id());
        if ($lastMessage) {
            return redirect()->route('home')->with('timeError', 'Можно отправлять сообщения раз в сутки');
        }

        if ($request->hasFile('file')) {
            $data['filename'] = uploadFile($uploadedFile);
        }


        $data = array_merge($data, $request->all('subject', 'text'));
        $message = Message::create($data);

        // Dispatch a mail job

        return redirect()->route('home')->with('success', 'Ваше сообщение было отправлено успешно. Спасибо');
    }
}
