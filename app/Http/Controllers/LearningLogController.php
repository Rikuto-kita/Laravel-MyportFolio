<?php

namespace App\Http\Controllers;

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

}
