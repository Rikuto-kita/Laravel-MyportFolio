<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <h2>{{ $category->name }}に項目を追加</h2>
  <form action="{{ route('learninglog.store') }}" method="POST">
    @csrf
    <input type="hidden" name="category_id" value="{{ $category->id}}">
    <input type="hidden" name="selectedMonth" value="{{ $selectedMonth }}">
    <div>
      <label>項目名</label>
      <input type="string" name="contents_name" >
    </div>
    <div>
      <label>学習時間</label>
      <input type="number" name="learning_time" >
    </div>
      <button>追加する</button>
  </form>


  <div id="successModal" class="modal">
    <div class="modal-content">
      <p id="successMessage"></p>
      <a href="{{ route('learninglog.edit',['selected_month' => $selectedMonth])}}">
        <button>編集ページに戻る</button>
      </a>
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
  
    // 編集ページに戻る
    function closeModal(event) {
      var modal = document.getElementById("successModal");
      action="{{ route('learninglog.edit') }}"
        modal.style.display = "none";
    }
  
    // 更新が成功した際にモーダルを表示
    @if(session('success'))
      openModal("{{ session('success') }}");
    @endif
  </script>

  <style>
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