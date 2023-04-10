<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Log;
use App\Models\Reply;


class ReplyController extends Controller
{
    public function store(Request $request, $logId)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $reply = new Reply();
        $reply->content = $request->content;
        $reply->user_id = $request->user()->id;
        $reply->log_id = $logId;
        $reply->save();

        return redirect()->back()->with('success', 'Reply successfully posted.');
    }

    public function destroy(Request $request, $id)
    {
        $reply = Reply::findOrFail($id);

        if ($request->user()->id != $reply->user_id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this reply.');
        }

        $reply->delete();

        return redirect()->back()->with('success', 'Reply successfully deleted.');
    }
}