<div>
{{ $user->icon }}
{{ $user->name }}
<h2>自己紹介文</h2>
{{ $user->introduction }}
</div>
<a href="{{ route('profile.edit')}}">
    <button>自己紹介を編集する</button>
</a>

<h2>学習チャート</h2>
<a href="{{ route('learninglog.edit')}}">
  <button>編集する</button>
</a>
