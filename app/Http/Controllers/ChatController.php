<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Chat;
use Illuminate\Support\Str; 

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->session()->missing('user_identifier')){ session(['user_identifier' => Str::random(20)]); }
        
        // if($request->session()->missing('user_name')){ session(['user_name' => 'Name']); }
        
        // データーベースの件数を取得
        $length = Chat::all()->count();

        // 表示する件数を代入
        $display = 100;

        $chats = Chat::offset($length-$display)->limit($display)->get();
        return view('chat/index',compact('chats'));
        // //二月のカウント
        // $feb =Chat::whereMonth('created_at', '2')->get();
        // $num2 = (int)$feb;
        // ddd($num2);
        // return view('chatjs.chartjs';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session(['user_name' => $request->user_name]);
        // バリデーション
      $validator = Validator::make($request->all(), [
        'message' => 'required | max:200',
        'user_name' => 'required',
      ]);
      // バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('chat.create')
          ->withInput()
          ->withErrors($validator);
      }
      $result = Chat::create($request->all());
      return redirect()->route('chat.index');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chats = Chat::find($id);
        return response()->view('chat.edit', compact('chats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //バリデーション
      $validator = Validator::make($request->all(), [
        'message' => 'required | max:191',
        // 'user_name' => 'required',
      ]);
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('chat.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
      //データ更新処理
      $result = Chat::find($id)->update($request->all());
      return redirect()->route('chat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chats = Chat::find($id)->delete();
        return redirect()->route('chat.index');
    }
    
}
