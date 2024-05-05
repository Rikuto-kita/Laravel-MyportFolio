<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>


  <form id="month_form" method="GET" action="{{ route('learninglog.edit') }}">
    <select name="selected_month" onchange="document.getElementById('month_form').submit()">
        @foreach($months as $value => $label)
            <option value="{{ $value }}" {{ $value == $selectedMonth ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</form>

<div class="category">
  <h2>バックエンド</h2>
  <button>項目を追加する</button>
  <div class="category-items">
      @foreach($backend as $log)
          <div class="category-item">
              {{ $log->contents_name }}
              <input type="number" value="{{ $log->learning_time }}">
              <button>学習時間を更新する</button>
              <button>削除する</button>
          </div>
      @endforeach
  </div>
</div>

<div class="category">
  <h2>フロントエンド</h2>
  <button>項目を追加する</button>
  <div class="category-items">
      @foreach($frontend as $log)
          <div class="category-item">
              {{ $log->contents_name }}
              <input type="number" value="{{ $log->learning_time }}">
              <button>学習時間を更新する</button>
              <button>削除する</button>
          </div>
      @endforeach
  </div>
</div>

<div class="category">
  <h2>インフラ</h2>
  <button>項目を追加する</button>
  <div class="category-items">
      @foreach($infra as $log)
          <div class="category-item">
              {{ $log->contents_name }}
              <input type="number" value="{{ $log->learning_time }}">
              <button>学習時間を更新する</button>
              <button>削除する</button>
          </div>
      @endforeach
  </div>
</div>


<style>
  .category {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 20px;
  }
  .category h2 {
      margin-top: 0;
  }
  .category-items {
      flex-wrap: wrap;
  }
  .category-item {
      margin-right: 10px;
      margin-bottom: 10px;
  }
</style>
  
</body>
</html>


