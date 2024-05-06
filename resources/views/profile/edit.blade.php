<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <h2>自己紹介を編集する</h2>
  <form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <div>
      <label>自己紹介文</label></br>
        <textarea id="introduction" name="introduction" rows="6" cols="40">{{ old('introduction', $user->introduction) }}</textarea>
    </div>
    <div>
        <label>アバター画像</label></br>
        <button>画像ファイルを添付する</button>
    </div>
    <button>自己紹介を確定する</button>
  </form>




{{--  <a href="{{ route('profile.show')}}">

</a>  --}}



</body>
</html>