<?php

namespace App\Http\Controllers;

use App\Models\Message;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
	public function index()
	{

		$chats = Auth::user()->chats()->orderBy('id', 'asc')->get();

		return Inertia::render('Chat/Chats', [
			'chats' => $chats
		]);
	}

	public function show($id)
	{
		$chat = Auth::user()->chats()->with(['messages.user:id,role', 'users:id,role'])->findOrFail($id);

		if (!$chat->users->contains(Auth::id())) {
			return back()->with('alert', [
				'type' => 'error',
				'message' => 'У вас нет доступа к этому чату'
			]);
		}

		return Inertia::render('Chat/Chat', [
			'chat' => $chat
		]);
	}

	public function storeMessage(Request $request, $id) 
	{
		$request->validate([
			'text' => ['required', 'string']
		]);

		Message::create([
			'chat_id' => $id,
			'user_id' => auth()->id(),
			'text' => $request->text,
		]);

		return back();
	}
}
