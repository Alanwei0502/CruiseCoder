<?php

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台 | 題庫管理</title>
  <link rel="stylesheet" href="./../css/main2.css">
</head>

<body>
  <div class="backEndWrap quiz">
    <?php
    include('layout/sideBar.php'); //aside
    ?>

    <main>
      <!-- 在這裡面codeing -->
      <h2>題庫管理</h2>
      <section class="searchbar">
        <div>
          <label>領域<br>
            <select>
              <option value="1">html</option>
              <option value="2">css</option>
              <option value="3">Javascript</option>
            </select>
          </label>

          <label>難易度<br>
            <select>
              <option value="0">初級</option>
              <option value="1">中級</option>
              <option value="2">高級</option>
            </select>
          </label>
        </div>

        <button>搜尋</button>

      </section>

      <section class="table">
        <div class="btns">
          <button class="off">下架試題</button>
          <button class="add">新增試題</button>
        </div>

        <table>
          <thead>
            <tr>
              <th><label><input type="checkbox" class="checkAll"><span></span></label></th>
              <th>領域</th>
              <th>難易度</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>html</td>
              <td>初級</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>html</td>
              <td>中級</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>html</td>
              <td>高級</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>css</td>
              <td>初級</td>
              <td><button>編輯</button></td>
            </tr>
            <tr>
              <td><label><input type="checkbox"><span></span></label></td>
              <td>css</td>
              <td>中級</td>
              <td><button>編輯</button></td>
            </tr>
          </tbody>
        </table>
      </section>

      <section class="quizModalBg">
        <section class="quizModal">
          <h2>新增試題</h2>
          <img src="../images/backEnd/blackCancel.png" alt="" class="closeModal">
          <section class="overflowArea">
            <form action="quiz.php" method="get">
              <div>
                <span>領域</span>
                <select name="" class="quizField">
                  <option value="">html</option>
                  <option value="">css</option>
                  <option value="">javascript</option>
                </select>
                <input type="text" class="newField" placeholder="請輸入新增的領域名稱">
              </div>

              <div>
                <span>難易度</span>
                <select name="" class="quizLevel">
                  <option value="">初級</option>
                  <option value="">中級</option>
                  <option value="">高級</option>
                  <option value="">星系</option>
                </select>
              </div>

              <div>
                <span>徽章圖案</span>
                <input type="file" accept="image/*">
              </div>

              <div>
                <div class="topFunction">
                  <label>全選<input type="checkbox"><span></span></label>
                  <div>
                    <button class="deleteQ">刪除題目</button>
                    <button class="createQ">新增題目</button>
                  </div>
                </div>
                <div class="downQuestion">
                  <label><input type="checkbox"><span></span></label>
                  <div class="contentQ">
                    <textarea name="" id="" placeholder="請輸入題目內容"></textarea>
                    <ul>
                      <li>
                        <span>A:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>B:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>C:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>D:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                    </ul>
                  </div>
                  <div class="ansAndSta">
                    <select name="" id="">
                      <option value="">A</option>
                      <option value="">B</option>
                      <option value="">C</option>
                      <option value="">D</option>
                    </select>
                    <select name="" id="">
                      <option value="">on</option>
                      <option value="">off</option>
                    </select>
                  </div>
                </div>
                <div class="downQuestion">
                  <label><input type="checkbox"><span></span></label>
                  <div class="contentQ">
                    <textarea name="" id="" placeholder="請輸入題目內容"></textarea>
                    <ul>
                      <li>
                        <span>A:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>B:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>C:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>D:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                    </ul>
                  </div>
                  <div class="ansAndSta">
                    <select name="" id="">
                      <option value="">A</option>
                      <option value="">B</option>
                      <option value="">C</option>
                      <option value="">D</option>
                    </select>
                    <select name="" id="">
                      <option value="">on</option>
                      <option value="">off</option>
                    </select>
                  </div>
                </div>
                <div class="downQuestion">
                  <label><input type="checkbox"><span></span></label>
                  <div class="contentQ">
                    <textarea name="" id="" placeholder="請輸入題目內容"></textarea>
                    <ul>
                      <li>
                        <span>A:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>B:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>C:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>D:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                    </ul>
                  </div>
                  <div class="ansAndSta">
                    <select name="" id="">
                      <option value="">A</option>
                      <option value="">B</option>
                      <option value="">C</option>
                      <option value="">D</option>
                    </select>
                    <select name="" id="">
                      <option value="">on</option>
                      <option value="">off</option>
                    </select>
                  </div>
                </div>
                <div class="downQuestion">
                  <label><input type="checkbox"><span></span></label>
                  <div class="contentQ">
                    <textarea name="" id="" placeholder="請輸入題目內容"></textarea>
                    <ul>
                      <li>
                        <span>A:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>B:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>C:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                      <li>
                        <span>D:</span>
                        <textarea name="" id="" placeholder="請輸入選項內容"></textarea>
                      </li>
                    </ul>
                  </div>
                  <div class="ansAndSta">
                    <select name="" id="">
                      <option value="">A</option>
                      <option value="">B</option>
                      <option value="">C</option>
                      <option value="">D</option>
                    </select>
                    <select name="" id="">
                      <option value="">on</option>
                      <option value="">off</option>
                    </select>
                  </div>
                </div>
              </div>


              <button type="submit">新增試題</button>
            </form>
          </section>
        </section>
      </section>
      <section class="question"></section>
    </main><!-- 在這裡面codeing -->
  </div>
  <script src="../js/quizB.js"></script>
</body>

</html>