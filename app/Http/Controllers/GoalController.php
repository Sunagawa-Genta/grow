<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Goal;
use Auth;
use App\Models\User;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Goal::getAllOrderByUpdated_at();
        return response()->view('goal.index',compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('goal.create');
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
        'goal' => 'required | max:191',
        'reality' => 'required',
        'option' => 'required',
        'will' => 'required',
      ]);
      // バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('goal.create')
          ->withInput()
          ->withErrors($validator);
      }
     $data = $request->merge(['user_id' => Auth::user()->id])->all();
     $result = Goal::create($data);
      return redirect()->route('goal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $goal = Goal::find($id);
        return response()->view('goal.show', compact('goal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = Goal::find($id);
        return response()->view('goal.edit', compact('goal'));
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
        'goal' => 'required | max:191',
        'reality' => 'required',
        'option' => 'required',
        'will' => 'required',
      ]);
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('goal.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
      //データ更新処理
      $result = Goal::find($id)->update($request->all());
      return redirect()->route('goal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Goal::find($id)->delete();
        return redirect()->route('goal.index');
    }
    public function mydata()
      {
        // Userモデルに定義したリレーションを使用してデータを取得する．
        $goals = User::query()
          ->find(Auth::user()->id)
          ->userGoals()
          ->orderBy('created_at','desc')
          ->get();
        return response()->view('goal.index', compact('goals'));
      }
}
