<header class="grid wide header">
  <link rel="stylesheet" href="./assets/css/header.css" />
  <nav class="row">
    <a href="dash-board.php" target="page" class="col l-2 m-2 c-6 header__logo"
      >PIZZA</a
    >

    <input type="checkbox" hidden id="header__search-group-checkbox" />
    <div class="col l-8 m-8 header__search-group">
      <i class="fa-solid fa-magnifying-glass header__search-icon"></i>
      <input
        type="search"
        placeholder="Nhập từ khóa bạn muốn tìm ..."
        class="header__search-box"
      />
    </div>

    <div class="col l-2 m-2 c-6 header__option-group">
      <label for="header__search-group-checkbox">
        <i class="fa-solid fa-magnifying-glass header__option-icon"></i>
      </label>
      <i class="fa-solid fa-gear header__setting-icon header__option-icon"></i>
      <i class="fa-solid fa-bell header__bell-icon header__option-icon"></i>
      <img
        src="./assets/images/avatar.jpg"
        alt="avatar"
        class="header__avatar"
      />
    </div>
  </nav>
</header>
