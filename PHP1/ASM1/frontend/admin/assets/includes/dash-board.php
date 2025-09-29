<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/grid.css" />
    <link rel="stylesheet" href="../css/dash-board.css" />
  </head>

  <body>
    <main class="grid wide main">
      <div class="row">
        <!-- slide bar -->
        <?php 
          include ('slide-bar.php');
        ?>

        <!-- dashboard -->
        <div class="col l-10 m-12 c-12 content">
          <div class="row content-container">
            <div class="col l-6 m-6 c-12 content-item">
              <i
                class="fa-solid fa-money-check-dollar icon-item money-icon"
              ></i>
              <h4 class="desc-item">Đã bán</h4>
              <h1 class="quantity-item">3612</h1>
              <p class="status-item">Tăng 17%</p>
              <i class="fa-solid fa-circle-up icon-item"></i>
            </div>

            <div class="col l-6 m-6 c-12 content-item">
              <i class="fa-solid fa-user-group icon-item user-icon"></i>
              <h4 class="desc-item">Khách hàng</h4>
              <h1 class="quantity-item">3612</h1>
              <p class="status-item">Tăng 17%</p>
              <i class="fa-solid fa-circle-up icon-item"></i>
            </div>

            <div class="col l-12 m-12 c-12 diagram">
              <div class="show">
                Hiển thị:
                <select class="show-select">
                  <option value="tuần">tuần</option>
                  <option value="tháng">tháng</option>
                  <option value="năm">năm</option>
                </select>
              </div>

              <div class="vertical">$500</div>
              <div class="vertical">$400</div>
              <div class="vertical">$300</div>
              <div class="vertical">$200</div>
              <div class="vertical">$100</div>
              <div class="vertical">0</div>

              <ul class="dates">
                <li class="date">
                  Oct <br class="hide-on-pc-tablet" />
                  21
                </li>
                <li class="date">
                  Oct <br class="hide-on-pc-tablet" />
                  22
                </li>
                <li class="date">
                  Oct <br class="hide-on-pc-tablet" />
                  23
                </li>
                <li class="date">
                  Oct <br class="hide-on-pc-tablet" />
                  24
                </li>
                <li class="date">
                  Oct <br class="hide-on-pc-tablet" />
                  25
                </li>
                <li class="date">
                  Oct <br class="hide-on-pc-tablet" />
                  26
                </li>
                <li class="date">
                  Oct <br class="hide-on-pc-tablet" />
                  27
                </li>

                <div class="columns">
                  <div class="column">
                    <div class="sold-column" style="--value: 2"></div>
                    <div class="custom-column" style="--value: 5"></div>
                  </div>
                  <div class="column">
                    <div class="sold-column" style="--value: 3"></div>
                    <div class="custom-column" style="--value: 7"></div>
                  </div>
                  <div class="column">
                    <div class="sold-column" style="--value: 4"></div>
                    <div class="custom-column" style="--value: 9"></div>
                  </div>
                  <div class="column">
                    <div class="sold-column" style="--value: 7"></div>
                    <div class="custom-column" style="--value: 5"></div>
                  </div>
                  <div class="column">
                    <div class="sold-column" style="--value: 3"></div>
                    <div class="custom-column" style="--value: 10"></div>
                  </div>
                  <div class="column">
                    <div class="sold-column" style="--value: 8"></div>
                    <div class="custom-column" style="--value: 9"></div>
                  </div>
                  <div class="column">
                    <div class="sold-column" style="--value: 4"></div>
                    <div class="custom-column" style="--value: 1"></div>
                  </div>
                </div>
              </ul>

              <div class="notes">
                <div class="sold-note note">
                  <i class="fa-solid fa-square sold-note-icon note-icon"></i>
                  <span class="note-text">Đã bán</span>
                </div>
                <div class="custom-note note">
                  <i class="fa-solid fa-square custom-note-icon note-icon"></i>
                  <span class="note-text">Số lượng khách hàng</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script>
      document
        .querySelector('.category-link[href="dash-board.php"]')
        .classList.add("active");
    </script>
  </body>
</html>
