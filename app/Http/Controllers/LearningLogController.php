<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LearningLog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class LearningLogController extends Controller
{
    public function edit(Request $request): view
    {

        $user = $request->user();
        $learningLogs = $user->learningLogs()->get();

        // プルダウンで選択された月を取得
        $selectedMonth = $request->input('selected_month', Carbon::now()->format('Y-m'));

        // 選択された月の開始日と終了日を取得
        $startOfMonth = Carbon::parse($selectedMonth)->startOfMonth();
        $endOfMonth = Carbon::parse($selectedMonth)->endOfMonth();

        // プルダウンの選択肢を生成するために、直近3ヶ月分の月を取得
        $months = collect();
        for ($i = 0; $i < 3; $i++) {
            $month = Carbon::now()->subMonths($i)->format('Y-m');
            $months->put($month, Carbon::parse($month)->format('n月'));
        }

        // 選択された月のデータを取得
        $backend = $learningLogs->where('category_id', 1)
                                ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        $frontend = $learningLogs->where('category_id', 2)
                                ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        $infra = $learningLogs->where('category_id', 3)
                                ->whereBetween('created_at', [$startOfMonth, $endOfMonth]);

        return view('learninglog.edit', compact( 'backend','frontend','infra','learningLogs','months', 'selectedMonth'));
    }

    public function update(Request $request, $id){
        $learningLog = LearningLog::find($id);
        
        if($learningLog){
            $learningLog->learning_time = $request->learning_time;
            $learningLog->save();
            return back()->with('success', "{$learningLog->contents_name}の学習時間を保存しました");
        }
    }

    public function delete(Request $request, $id){
        $learningLog = LearningLog::find($id);

        if($learningLog){
            $learningLog->delete();
            return back()->with('success',  "{$learningLog->contents_name}を削除しました");
        }
    }

    public function create($category_id, Request $request): view 
    {
        $selectedMonth = $request->input('selected_month', Carbon::now()->format('Y-m'));
        $category= Category::find($category_id);

        return view('learninglog.create', ['selectedMonth'=>$selectedMonth, 'category'=> $category]);
    }

    public function store(Request $request){
        $categoryName = Category::find($request->input('category_id'))->name;

        $learningLog = new LearningLog;
        $learningLog->user_id = auth()->id();
        $learningLog->category_id = $request->input('category_id');
        $learningLog->contents_name = $request->input('contents_name');
        $learningLog->learning_time = $request->input('learning_time');
        $learningLog->created_at = $request->input('selectedMonth');
        $learningLog->updated_at = $request->input('selectedMonth');
        // $learningLog ->save();
        
        if($learningLog ->save()){
            return back()->with('success', "{$categoryName}に{$learningLog->contents_name}を{$learningLog->learning_time}分で追加しました");
        }
       

        // return redirect()->route('learninglog.edit');
    }



}
