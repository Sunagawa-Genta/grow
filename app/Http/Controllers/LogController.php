<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Log;
use Auth;
use App\Models\User;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::getAllOrderByUpdated_at();
        return response()->view('log.index',compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('log.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
      $validator = Validator::make($request->all(), [
        'log' => 'required | max:191',
        'description' => 'required',
      ]);
      // バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('log.create')
          ->withInput()
          ->withErrors($validator);
      }
      // create()は最初から用意されている関数
      // 戻り値は挿入されたレコードの情報
      $data = $request->merge(['user_id' => Auth::user()->id])->all();
      $result = Log::create($data);
      // ルーティング「tweet.index」にリクエスト送信（一覧ページに移動）
      return redirect()->route('log.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = Log::find($id);
        $replies = $log->replies()->with('user')->latest()->get();
        return response()->view('log.show', compact('log','replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $log = Log::find($id);
        return response()->view('log.edit', compact('log'));
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
        'log' => 'required | max:191',
        'description' => 'required',
      ]);
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('log.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
      //データ更新処理
      $result = Log::find($id)->update($request->all());
      return redirect()->route('log.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Log::find($id)->delete();
        return redirect()->route('log.index');
    }
    
     public function mydata()
      {
        // Userモデルに定義したリレーションを使用してデータを取得する．
        $logs = User::query()
          ->find(Auth::user()->id)
          ->userTweets()
          ->orderBy('created_at','desc')
          ->get();
        return response()->view('log.index', compact('log'));
      }
}
