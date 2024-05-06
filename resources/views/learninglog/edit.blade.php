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
  <a href="{{ route('learninglog.create', ['selected_month' => $selectedMonth, 'category_id' => 1])}}">
    <button>項目を追加する</button>
  </a>
  
  <div class="category-items">
      @foreach($backend as $log)
          <div class="category-item">
              {{ $log->contents_name }}
              <form action="{{ route('learninglog.update', $log->id) }}" method="POST">
                @csrf
                @method('PATCH')
                  <input type="number" name="learning_time"  value="{{$log->learning_time }}" >
                  <button>学習時間を保存する</button>
              </form>

              <form action="{{ route('learninglog.delete', $log->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button>削除する</button>
              </form>
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
          <form action="{{ route('learninglog.update', $log->id) }}" method="POST">
            @csrf
            @method('PATCH')
              <input type="number" name="learning_time"  value="{{$log->learning_time }}" >
              <button>学習時間を保存する</button>
          </form>

          <form action="{{ route('learninglog.delete', $log->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>削除する</button>
          </form>
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
          <form action="{{ route('learninglog.update', $log->id) }}" method="POST">
            @csrf
            @method('PATCH')
              <input type="number" name="learning_time"  value="{{$log->learning_time }}" >
              <button>学習時間を保存する</button>
          </form>

          <form action="{{ route('learninglog.delete', $log->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>削除する</button>
          </form>
        </div>
      @endforeach
  </div>
</div>


<div id="successModal" class="modal">
  <div class="modal-content">
    <p id="successMessage"></p>
    <button onclick="closeModal(event)">編集ページに戻る</button>
  </div>
</div>






<script>
  // モーダルを開く関数
  function openModal(message) {
    var modal = document.getElementById("successModal");
    var messageElement = document.getElementById("successMessage");
    messageElement.textContent = message;
    modal.style.display = "block";
  }

  // モーダルを閉じる関数
  function closeModal(event) {
    var modal = document.getElementById("successModal");
      modal.style.display = "none";
  }

  // 更新が成功した際にモーダルを表示
  @if(session('success'))
    openModal("{{ session('success') }}");
  @endif
</script>


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
      display: flex;
      margin-right: 10px;
      margin-bottom: 10px;
  }

  /* モーダルのスタイル */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
  
</body>
</html>


