<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Jobs\SendEmail;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Processes a contact form
     *
     * @param MessageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(MessageRequest $request) {

        $data = ['user_id' => Auth::id()];

        if (Message::getLastWithinDay(Auth::id())) {
            return redirect()->route('home')->with('timeError', 'Можно отправлять сообщения раз в сутки');
        }

        if ($request->hasFile('file')) {
            $data['filename'] = uploadFile($request->file('file'));
        }

        $data = array_merge($data, $request->all('subject', 'text'));
        $message = Message::create($data);

        SendEmail::dispatch($message->getDetails());

        return redirect()->route('home')->with('success', 'Ваше сообщение было отправлено успешно. Спасибо');
    }

    /**
     * Toggles read field by message id
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function toggleRead($id)
    {
        $message = Message::find($id);
        $message->toggleRead();
        return redirect()->back();
    }

}
