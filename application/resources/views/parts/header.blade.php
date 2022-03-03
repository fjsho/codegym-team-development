@guest
<!-- ログインしていない時 -->
<header class="page-header wrapper">
  <h1>ロゴ</h1>
  <nav>
    <ul class="main-nav">
      <li>ログイン</li>
      <li><button class="">会員登録</button></li>
    </ul>
  </nav>
</header>
@endguest
<!-- ログインしている時 -->
@auth
<header class="page-header wrapper">
  <h1>ロゴ</h1>
  <nav>
    <ul class="main-nav">
      <li>プロフィール</li>
      <li><button class="">投稿する</button></li>
    </ul>
  </nav>
</header>
@endauth

<style>

  .wrapper {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 4%;
  }

  button {
    background: #0bd;
    color: #fff;
    border-radius: 5px;
    padding: 4px 8px;
  }

  html {
    font-family: sans-serif;
    line-height: 1.15;
  }

  body {
    font-weight: 400;
  }

  .main-nav {
    display: flex;
  }

  .main-nav li {
    margin-left: 36px;
    color: black;
  }

  .page-header {
    display: flex;
    justify-content: space-between;
    margin-top: 34px;
  }
</style>
