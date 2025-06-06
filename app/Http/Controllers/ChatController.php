<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\Chat;
use App\Models\Message;
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

	public function storeMessage(Chat $chat, Request $request)
	{
		
		$chat->messages()->create([
			'text' => $request->text,
			'user_id' => auth()->id(),
		]);

		return redirect()->back();
	}
}
