-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cruisecoder
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article` (
  `aNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'A0001',
  `aTitle` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '三大編輯器介紹',
  `aContent` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '很多字的文章',
  `aStatus` int NOT NULL COMMENT '0: 下架、1: 上架',
  `aDate` datetime DEFAULT NULL,
  `aImage` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'url',
  PRIMARY KEY (`aNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES ('A0001','十大好書推薦','<div class=\"original\"><h3>十大好書推薦</h3><p>學網站製作、做網站、網站切版、網站架設、前端編程⋯⋯等很多不同的名稱。總之一切的一切都要從最基本的 HTML、CSS學習開始，基本上網站前端切版是用：HTML + CSS + Javascript，而他們其實各自都是不同的「語言」。看到這邊先別擔心，除了 javascript 之外，另外兩個都是比較「簡單」的程式語言。</p><img src=\"./../images/article/topBook1.jpeg\" alt=\"圖片無法顯示\"><h4>學好跨平台網頁設計：HTML5、CSS3、JavaScript、jQuery與Bootstrap 4超完美特訓班</h4><p>網頁的入門書常常都是這樣，一次包了一堆教學在裡面，會從最基礎的 HTML、CSS 開始教你，後面開始越教越深。這本書是文淵閣工作室編輯的，通常這個工作室會比較注重實戰、實際案例應用，而這種學習方式也是我認為比較有用的，因此推薦。</p><img src=\"./../images/article/topBook2.jpeg\" alt=\"圖片無法顯示\"><h4>最新 HTML5+CSS3 網頁程式設計</h4><p>這本書鎖定的重點是基礎中的重中之重，就是 HTML + CSS，我自己是比較偏好教學書不要包山包海，而是重點教學，其實學好 HTML +CSS 你就可以製作網站了，不蓋你大概所有網頁畫面你都可以製作了，但是要有程式互動的效果、以及更有效率的做網站就需要 javascript、boostrap 等，但重點還是在於先把 HTML5 + CSS3 學好。施威銘研究室也是注重實際應用的團隊，我自己也看過好幾本他們的書，瀏覽了一下這本也是會將各個技巧獨立出來讓讀者練習，這樣會是有效的學習方式。</p><img src=\"./../images/article/topBook3.jpeg\" alt=\"圖片無法顯示\"><h4>HTML&CSS：網站設計建置優化之道</h4><p>這本滿有名的，評價也不錯。作者是外國人，有時感覺外國人在「寫書」教學這塊真的很厲害，總能把各個篇章分得很好，系統性的讓你學會網站程式。</p><img src=\"./../images/article/topBook4.jpeg\" alt=\"圖片無法顯示\"><h4>設計師一定要學的 HTML5‧CSS3 網頁設計手冊：零基礎也能看得懂、學得會</h4><p>這本是 2020 出版的新書，在網頁程式界、學習資源通常是越新越好，雖然做為網頁的基底的 HTML 和 CSS 只要是 HTML5 和 CSS3 版本之後的就沒問題。從書名就可以看出，作者感覺在編排上花了很多功夫，想讓門外漢也能輕易的入門。建議購買前可以先預覽一下排版，可能有些人會喜歡，有些人也許不太喜歡這樣太多圖樣的編排，這全看每個人看書的習慣，我自己其實也有點不太習慣這樣的編排方式。可能我喜歡都是程式和文字，扎實的硬嗑吧。</p><img src=\"./../images/article/topBook5.jpeg\" alt=\"圖片無法顯示\"><h4>正確學會 Dreamweaver CC 的16堂課</h4><p>這本算是我的「啟蒙」書，當然我看的時候不是這個版本，但「施威銘研究室」的這系列書其實已經出了好幾版，這是最新版的。將網頁製作分成 16 課讓你藉著實作，一步一步就學會網頁製作了，當時的我真的很讚嘆這本書的編排，也讓我確實學會了網站製作。因此看到這本書還有在更新，我當然是要推薦的。</p><img src=\"./../images/article/topBook6.jpeg\" alt=\"圖片無法顯示\"><h4>響應式網頁設計驚嘆號：Dreamweaver CC*╳Bootstrap 4╳JavaScript 範例大全</h4><p>這本也是 Dreamweaver 的教學書，2019 年底才出版的，感覺也是編排得不錯，有將各種技巧獨立出來解釋，對於教學也是有它自己的一套方式，如果比較喜歡新書的可以考慮這本。</p><img src=\"./../images/article/topBook7.jpeg\" alt=\"圖片無法顯示\"><h4>JavaScript & JQuery：網站互動設計程式進化之道</h4><p>跟上面 Html5 + CSS3 的優化之道為同作者的姊妹作，延續優良的編排和內容。</p><img src=\"./../images/article/topBook8.jpeg\" alt=\"圖片無法顯示\"><h4>JavaScript & jQuery：The Missing Manual國際中文版</h4><p>這本是我自己讀過的，我讀的時候應該是初版，現在已經改版到第三版了。剛學完 Html + Css 的我就是靠這本書來掌握 jQuery 的，只要照著他的進度，輕鬆自然的，你也能學好 JQuery。</p><img src=\"./../images/article/topBook9.jpeg\" alt=\"圖片無法顯示\"><h4>最潮 HTML5+CSS3 網頁版型設計：Standard Layout‧Grid Layout‧Single Page Layout</h4><p>雖然標題也是寫 HTML5 CSS3 但這本並不是普通的入門教學，而是以接案為目的實戰教學，直接舉各種現在線上常用的實際排版案例，來做切版的練習和說明，很適合剛學完的人需要找案例練手以及與業界接軌。</p><img src=\"./../images/article/topBook10.jpeg\" alt=\"圖片無法顯示\"><h4>最完整跨平台網頁設計：HTML + CSS + JavaScript + jQuery + Bootstrap + Google Maps</h4><p>這本書也是 2020 七月的新書！雖然也可歸類在入門書的選擇，但王者歸來系列向來都是以最完整、案例最多而著名，對於還沒基礎的新手來說，對於網頁全局應用還不熟悉的情況下，把每一個局部都學得太細再學下一個，很多時候效果並不好、且容易覺得太困難而半途而廢。反而是建議給已經對網頁有一定知識和大局觀後，再回頭把觀念補的更扎實。見博客來下方兩則 5 星的評論，也都是已經有基礎的人所給的好評。</p></div>',1,'2020-12-12 10:53:54','topBook.jpg'),('A0002','編輯器推薦','<div class=\"original\"><h3>編輯器推薦</h3>\r <h4>Sublime Text</h4>\r <img src=\"./../images/article/editor1.jpg\" alt=\"圖片未顯示\">\r <p>Sublime Text是一款快速輕量可定製的代碼編輯器，適用於Windows和Mac，你可以免費從官方下載並且使用，直到你滿意這款軟體再進行購買Sublime Text3提供了基礎的自動補全、語法高亮、代碼摺疊、快捷鍵等功能，而且你可以通過命令安裝非常多的擴展，支持大部分的程式語言，可以說是一款萬能編輯器，簡單且強大國內還有人專門錄製了視頻教程，介紹了很多Sublime的隱藏技巧，快樂的sublime編輯器</p>\r <h4>VS Code</h4>\r <img src=\"./../images/article/editor2.jpg\" alt=\"圖片未顯示\">\r <p>VS Code是微軟製作的一款免費、開源、跨平台的代碼編輯器，非常流行的萬能編輯工具它有自己的一套代碼編輯和調試工具，可以很好的和其他第三方的服務集成，並且具有極強的擴展性你可以用VS Code打開一個單獨的文件，或者在裡面創建一個項目，這些都是非常方便的，VS Code對代碼的高亮做了很大的改善，支持大部分的語言，就算沒有符合自己的功能，還可以用擴展來增強編輯器，而且因為免費開源，VS Code的插件市場也越來越完善VS Code是一款用途很廣的代碼編輯器，編輯單個文件啟動速度快，複雜項目也足夠使用，如果你想要一個萬能的編輯器，VS Code很適合，另外推薦一個適合新手看的VS Code教程</p>\r <h4>Atom</h4>\r <img src=\"./../images/article/editor3.jpg\" alt=\"圖片未顯示\">\r <p>Atom是GitHub開發的一款開源、免費的編輯器，支持代碼高亮、自動補全、代碼摺疊等功能，兼容大部分的語言，它還提供了對GitHub的原生支持，並且有一個內置的包管理器，你可以使用它來搜索，安裝或創建自己的包以擴展它</p>\r <h4>Notepad++</h4>\r <img src=\"./../images/article/editor4.png\" alt=\"圖片未顯示\">\r <p>Notepad++是一款2003年發布的代碼編輯器，非常經典的編輯器，即使在2017年，它在StackOverflow仍然是第二受歡迎的編輯器，有30%的開發者選擇Notepad++作為自己的開發工具，很多人覺得自己已經習慣了這款軟體，它非常的輕量，打開文件的速度和Windows自帶的文本工具一樣快，最重要的是它完全免費使用</p>\r <h4>Jetbrains系列</h4>\r <img src=\"./../images/article/editor5.jpg\" alt=\"圖片未顯示\">\r <p>Jetbrains家的產品是人們討論最多的付費編輯器，IntelliJ IDEA、PyCharm、WebStorm、PhpStorm等，每一款產品都有很多人推薦，和其他的一些編輯器相比，更加高級，很多操作都可以自動化，使用起來也確實省心，由於語言的細分，每個編輯器都能對語法高亮、自動補全等完美支持，還有非常多的插件可用，都是程式設計師強大的工具這些編輯器都是有非常多人使用的，而且大部分為通用編輯器，支持各種代碼語言，並且都可以免費使用，你可以根據隨時自己的喜歡選擇適合的軟體</p></div>',1,'2020-12-12 10:53:54','editor.jpg'),('A0003','自學力網站','<div class=\"original\"><h3>自學力網站</h3>\n <h4>Michael Chen 的技術文件</h4>\n <a href=\"https://michaelchen.tech/web-programming/html-primer/\" target=\"_blank\">https://reurl.cc/EzEMg0</a>\n <p>Michael Chen 是資訊相關領域碩士。Michael 認為開發軟體的目的是服務人類、改善大眾生活、為社會帶來價值。如果在這個過程中同時能夠獲益，那就是開發者和使用者雙羸的局面。Michael 喜歡用開放原始碼技術來解決各式各樣的問題，但必要時對專有技術也不排斥。在閒暇之餘，他將所學到的東西寫成文章，放在這個網站上和大家分享。是適合剛進入前端的初心者，能夠多花點時間來更了解前端技術</p>\n <h4>良葛格學習筆記</h4>\n <a href=\"https://openhome.cc/Gossip/\" target=\"_blank\">https://openhome.cc/Gossip/</a>\n <p>前端的許多語言，這網站內都有大概幫忙分類並整理好了，有任何問題，可以從網站上找尋，內容鰻完整的，而且是中文，對於英文不是那麼好又想學習程式語言的人，相當友善，也避免了翻譯器翻譯網站而用詞怪異的情況。</p>\n <h4>MDN web docs</h4>\n <a href=\"https://developer.mozilla.org/zh-TW/docs/Web\" target=\"_blank\">https://reurl.cc/Mdqx2k</a>\n <p>MDN Web Docs 是個針對網路技術和基於網路的軟體，持續發展的學習平台，提供開發者在開放網站上輕鬆地建立各種專案所需的資訊。有初學者教學，也有進階部分可以針對自己的短版，尋找內容增進自己的程式語言能力。</p>\n <h4>菜鳥教程</h4>\n <a href=\"https://www.runoob.com/\" target=\"_blank\">https://www.runoob.com/</a>\n <p>菜鳥教程提供了基礎編程技術教程。菜鳥教程的 Slogan 為；學的不僅是技術，更是夢想！記住：再牛逼的夢想也抵不住傻逼似的堅持！本站域名为 runoob.com, runoob 为 Running Noob 的縮寫，意為：奔跑吧！菜鳥。本站包括了HTML、CSS、Javascript、PHP、C、Python等各种基礎編程教程。同时本站中也提供了大量的在線實例，通過實例，您可以更好地學習如何建網站。本站致力于推廣各種編程語言技術，所有資源是完全免费的，并且會根據當前互聯網的變化實时更新本站内容。同时本站内容如果有不足的地方，也歡迎廣大編程愛好者在本站留言提供意見。</p>\n <h4>Stackoverflow</h4>\n <a href=\"https://stackoverflow.com/\" target=\"_blank\">https://stackoverflow.com/</a>\n <p>Stack Overflow 是一個程式設計領域最熱門的工程師技術問答論壇網站。無論程式新手還是老手，都可在論壇內提出和回答問題，進而獲得一些在 Stack Overflow 上的聲望值，工程師遇到程式問題，也常依賴Stack Overflow工程師社區找答案。另外，你也可以藉由瀏覽各個語言、關鍵字標籤，從他人的回答和分享學習一些新知。若你想要找工作，這邊也成為眾多公司和使用者自由媒合的平台。</p>\n <h4>iT幫幫忙</h4>\n <a href=\"https://ithelp.ithome.com.tw/\" target=\"_blank\">https://ithelp.ithome.com.tw/</a>\n <p>iT邦幫忙是iT領域的技術問答與分享社群，透過iT人互相幫忙，學程式的人大多數都蠻熱心的，遇到問題可以上去提問，會有人幫你解決困難。也有些前端技術相關文章，可以多去上面看看，自己也能學習前端語言。</p>\n <h4>w3school</h4>\n <a href=\"https://www.w3schools.com/\" target=\"_blank\">https://www.w3schools.com/</a>\n <p>W3School是網際網路上最大的WEB開發者資源，是完全免費的，是非營利性的，一直在升級和更新。在 w3school，你可以找到你所需要的所有的網站建設教程。從基礎的 HTML 到 CSS，乃至進階的XML、SQL、JS、PHP 和 ASP.NET。</p></div>',1,'2020-12-12 10:53:54','study.jpg'),('A0004','軟體推薦','<div class=\"original\"><h3>軟體推薦</h3>\r <h4>StarUML</h4>\r <img src=\"./../images/article/software1.png\" alt=\"圖片無法顯示\">\r <p>是一種建立UML類圖，生成類圖和其他型別的統一建模語言(UML)圖表的工具。StarUML是一個開源專案之一發展快、靈活、可擴充套件性強</p>\r <h4>Drawio 流程圖工具</h4>\r <img src=\"./../images/article/software2.jpg\" alt=\"圖片無法顯示\">\r <p>Draw.io是個跨平台的網頁圖表工具支援Chrome、IE、Safari及FireFox等等瀏覽器，也可以設定將檔案儲存至硬碟、Google Drive或是OneDrive。圖庫量也相當豐富，不管是畫商用圖表、工程製圖、流程圖或是UML等等都非常適合，同時還提供許多模板。</p>\r <h4>Adobe Xd  簡單易學的UX/UI設計工具</h4>\r <img src=\"./../images/article/software3.png\" alt=\"圖片無法顯示\">\r <p>Adobe XD全名叫做 Adobe Experience Design，主要用來設計行動裝置、網頁畫面以及 Prototype 呈現。在2018年中旬Adobe宣布推出Adobe XD CC免費版的方案，可以讓初學者容易取得並且學習。Adobe XD結合設計、建立原型功能與提供專業級效能的設計平台，且能夠整合設計師的現有工作流程及Photoshop 和Illustrator 等工具。</p>\r <h4>Adobr Photoshop cc  圖片處理工具</h4>\r <img src=\"./../images/article/software4.jpg\" alt=\"圖片無法顯示\">\r <p>它可以用於創建和增強照片、插圖和3D圖稿，設計網站和移動應用程式，編輯視頻，模擬真實的繪畫等等。</p>\r <h4>Adobe Illustrator CC  矢量圖製作軟體</h4>\r <img src=\"./../images/article/software5.jpg\" alt=\"圖片無法顯示\">\r <p>它可以為印刷、網絡、視頻和移動設備創建logos、圖標、繪圖、排版和插圖。數以百萬計的設計師和藝術家使用Illustrator CC創作，從網頁圖標和產品包裝到書籍插圖和廣告牌。</p>\r <h4>Sketch  設計軟體</h4>\r <img src=\"./../images/article/software6.png\" alt=\"圖片無法顯示\">\r <p>Sketch是優秀的輕量級矢量繪圖設計應用，對於網頁設計和移動設計者來說，比PhotoShop好用N倍！尤其是在移動應用設計方面。</p>\r <h4>Axure RP  原型設計工具</h4>\r <img src=\"./../images/article/software7.png\" alt=\"圖片無法顯示\">\r <p>它能讓負責定義需求和規格、設計功能和介面的專家能夠快速創建應用軟體或Web網站的線框圖、流程圖、原型和規格說明文檔。</p>\r <h4>MindNode 思維導圖軟體</h4>\r <img src=\"./../images/article/software8.jpg\" alt=\"圖片無法顯示\">\r <p>MindNode是風格簡約和輕量的思維導圖應用，通過友好的可視化介面將你的頭腦風暴更科學的組織起來。</p></div>',1,'2020-12-12 10:53:54','software.jpg'),('A0005','好用套件推薦','<div class=\"original\"><h3>好用套件推薦</h3>\n <h4>1.cdnjs</h4>\n <a href=\"https://cdnjs.com/\" target=\"_blank\">https://cdnjs.com/</a>\n <img src=\"./../images/article/tools1.jpg\" alt=\"圖片無法顯示\">\n <p>cdnjs.com 提供更多、更完整的 JavaScript 程式庫，無論是熱門或是冷門的一應俱全。若你覺得它們缺少哪些好用的函式庫，也可以自行提交到網站裡，通過審核後就 CDNJS 就會為你分流 js 檔案囉！這項服務是結合 CloudFlare、Pingdom 與 S3Stat，穩定性與速度自然不在話下，如果你在網站裡使用了不少 JavaScript 程式庫，可以找找有無被托管到 cdnjs.com ，它具備 CDN（Content Delivery Network, 內容傳遞網路）的特色，不但能節省你的網站流量，也可以加速網站載入速度。</p>\n <h4>2.greensock</h4>\n <a href=\"https://greensock.com/\" target=\"_blank\">https://greensock.com/</a>\n <img src=\"./../images/article/tools2.png\" alt=\"圖片無法顯示\">\n <p>Greensock，一個簡單、效能強的javascript animation library，GreenSock是一款功能強大的ＪＳ動畫庫，官網中有完整的文檔說明</p>\n <h4>3.fullpage</h4>\n <a href=\"https://alvarotrigo.com/fullPage/\" target=\"_blank\">https://reurl.cc/GrWRDD</a>\n <img src=\"./../images/article/tools3.jpg\" alt=\"圖片無法顯示\">\n <p>我們經常看過一些整屏翻頁的網站，看上去很高大上對於一些同學來說如果要原生的去開發可能還是有很大難度的。如今我們經常能見到全屏網站,尤其是國外網站。這些網站用幾幅很大的圖片或色塊做背景,再新增一些簡單的內容,顯得格外的高階大氣上檔次。比如 iPhone 5C 的介紹頁面(檢視),QQ瀏覽器的官網站。如果你也希望你的網站能設計成全屏的,顯得更上檔次,你可以試試 fullPage.js</p>\n <h4>4.is.js</h4>\n <a href=\"http://is.js.org/#method-list\" target=\"_blank\">https://reurl.cc/9X2Yy8</a>\n <img src=\"./../images/article/tools4.jpg\" alt=\"圖片無法顯示\">\n <p>這款套件上面有許多正規格式的設定，可以幫助你解決像是需要填寫一定格式的資料</p>\n <h4>5.scrollmagic.io</h4>\n <a href=\"https://scrollmagic.io/examples/basic/section_wipes_natural.html\" target=\"_blank\">https://reurl.cc/ldGjXE</a>\n <img src=\"./../images/article/tools5.jpg\" alt=\"圖片無法顯示\">\n <p>ScrollMagic 是一款 jQuery 套件，它能幫助你處理用戶當前滾動的位置。現在網路上看到的滾動的動畫效果，許多是來自 ScrollMagic 的運用。它讓你可以像使用進度條一樣使用滾動條。如果你想在特定的滾動位置開始一個動畫，並且讓動畫同步滾動條的動作，或者把元素粘在一個特定的滾動位置，那麼這款套件正是你需要的。使用 ScrollMagic，您可以很容易地把視差效果添加到您的網站中。當用戶到達某個滾動位置時，你可以調用函數，或以任何其他方式來和當前的滾動位置進行交互。</p>\n <h4>6.Bootstrap</h4>\n <a href=\"https://getbootstrap.com/\" target=\"_blank\">https://getbootstrap.com/</a>\n <img src=\"./../images/article/tools6.png\" alt=\"圖片無法顯示\">\n <p>BootStrap是基於HTML、CSS和JavaScript的框架，使你只需要寫簡單的代碼就可以很快的搭建一個還不錯的前端框架，它可以開發全響應式網頁——不論你使用手機、平板電腦、普通個人電腦瀏覽網站內容，所有的元素都可以很優雅的呈現。所以，可以用他來開發適合各種設備瀏覽的頁面，避免了大量的因為兼容性而導致的重複勞動。</p>\n <h4>7.threejs</h4>\n <a href=\"https://threejs.org/\" target=\"_blank\">https://threejs.org/</a>\n <img src=\"./../images/article/tools7.jpg\" alt=\"圖片無法顯示\">\n <p>Three.js 是一個非常方便的 JavaScript 函數庫，用於開發 WebGL，它將大量功能封裝成物件導向的方法和屬性，可以非常方便的使用物件導向的開發模式繪製 3D 空間。</p></div>',1,'2020-12-12 10:53:54','tools.jpg');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badge`
--

DROP TABLE IF EXISTS `badge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badge` (
  `bNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'B0001',
  `bGalaxy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'G0001',
  `bName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bInfo` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bLevel` int NOT NULL COMMENT '(0: ''easy'', 1: ''medium'', 2: ''hard'', 3: ''all'')',
  `bIcon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'URL',
  `bBadge` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL',
  `bBackground` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badge`
--

LOCK TABLES `badge` WRITE;
/*!40000 ALTER TABLE `badge` DISABLE KEYS */;
INSERT INTO `badge` VALUES ('B0001','HTML星系','HTML初級星球','適合剛學習HTML的新手，達到標準後，可以獲得此顆星球認證喔！',1,'html1.png','html1.png','1.svg'),('B0002','HTML星系','HTML中級星球','若你已經學習HTML一段時間可以挑戰看看這顆星球，達到標準後，可以獲得此顆星球認證喔！',2,'html2.png','html2.png','2.svg'),('B0003','HTML星系','HTML高級星球','若你自詡為HTML大師，那就來挑戰這顆星球吧！達到標準後，可以獲得此顆星球認證喔！',3,'html3.png','html3.png','3.svg'),('B0004','CSS星系','CSS初級星球','適合剛學習CSS的新手，達到標準後，可以獲得此顆星球認證喔！',1,'css1.png','css1.png','4.svg'),('B0005','CSS星系','CSS中級星球','若你已經學習CSS一段時間可以挑戰看看這顆星球，達到標準後，可以獲得此顆星球認證喔！',2,'css2.png','css2.png','5.svg'),('B0006','CSS星系','CSS高級星球','若你自詡為CSS大師，那就來挑戰這顆星球吧！達到標準後，可以獲得此顆星球認證喔！',3,'css3.png','css3.png','6.svg'),('B0007','Javascript星系','Javascript初級星球','適合剛學習Javascript的新手，達到標準後，可以獲得此顆星球認證喔！',1,'js1.png','js1.png','7.svg'),('B0008','Javascript星系','Javascript中級星球','若你已經學習Javascript一段時間可以挑戰看看這顆星球，達到標準後，可以獲得此顆星球認證喔！',2,'js2.png','js2.png','8.svg'),('B0009','Javascript星系','Javascript高級星球','若你自詡為Javascript大師，那就來挑戰這顆星球吧！達到標準後，可以獲得此顆星球認證喔！',3,'js3.png','js3.png','9.svg'),('B0010','jQuery星系','jQuery初級星球','適合剛學習jQuery的新手，達到標準後，可以獲得此顆星球認證喔！',1,'jq1.png','jq1.png','10.svg'),('B0011','jQuery星系','jQuery中級星球','若你已經學習jQuery一段時間可以挑戰看看這顆星球，達到標準後，可以獲得此顆星球認證喔！',2,'jq2.png','jq2.png','11.svg'),('B0012','jQuery星系','jQuery高級星球','若你自詡為jQuery大師，那就來挑戰這顆星球吧！達到標準後，可以獲得此顆星球認證喔！',3,'jq3.png','jq3.png','12.svg'),('B0013','SASS星系','SASS初級星球','適合剛學習SASS的新手，達到標準後，可以獲得此顆星球認證喔！',1,'sass1.png','sass1.png','13.svg'),('B0014','SASS星系','SASS中級星球','若你已經學習SASS一段時間可以挑戰看看這顆星球，達到標準後，可以獲得此顆星球認證喔！',2,'sass2.png','sass2.png','14.svg'),('B0015','SASS星系','SASS高級星球','若你自詡為SASS大師，那就來挑戰這顆星球吧！達到標準後，可以獲得此顆星球認證喔！',3,'sass3.png','sass3.png','15.svg'),('B0016','PHP星系','PHP初級星球','適合剛學習PHP的新手，達到標準後，可以獲得此顆星球認證喔！',1,'php1.png','php1.png','16.svg'),('B0017','PHP星系','PHP中級星球','若你已經學習PHP一段時間可以挑戰看看這顆星球，達到標準後，可以獲得此顆星球認證喔！',2,'php2.png','php2.png','17.svg'),('B0018','PHP星系','PHP高級星球','若你自詡為PHP大師，那就來挑戰這顆星球吧！達到標準後，可以獲得此顆星球認證喔！',3,'php3.png','php3.png','18.png'),('B0019','HTML星系','HTML星系徽章','當你成功挑戰完所有HTML的星球關卡，即可獲得HTML星系徽章！',0,'','html.png',''),('B0020','CSS星系','CSS星系徽章','當你成功挑戰完所有CSS的星球關卡，即可獲得CSS星系徽章！',0,'','css.png',''),('B0021','Javascript星系','Javascript星系徽章','當你成功挑戰完所有Javascript的星球關卡，即可獲得Javascript星系徽章！',0,'','js.png',''),('B0022','jQuery星系','jQuery星系徽章','當你成功挑戰完所有jQuery的星球關卡，即可獲得jQuery星系徽章！',0,'','jq.png',''),('B0023','SASS星系','SASS星系徽章','當你成功挑戰完所有SASS的星球關卡，即可獲得SASS星系徽章！',0,'','sass.png',''),('B0024','PHP星系','PHP星系徽章','當你成功挑戰完所有PHP的星球關卡，即可獲得PHP星系徽章！',0,'','php.png','');
/*!40000 ALTER TABLE `badge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `countpeople`
--

DROP TABLE IF EXISTS `countpeople`;
/*!50001 DROP VIEW IF EXISTS `countpeople`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `countpeople` AS SELECT 
 1 AS `reTutorial`,
 1 AS `countPeople`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course` (
  `cNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'C0001',
  `cTitle` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '超強HTML教學，讓張老闆帶你飛',
  `cInfo` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'HTML不僅是前端工程師必備的基礎，也是......',
  `cLecturer` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `cTime` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cPrice` decimal(10,0) unsigned NOT NULL,
  `cStatus` int NOT NULL DEFAULT '2' COMMENT '0: 刪除\\n1: 上架\\n2: 下架(預設值)\\n3: 募資',
  `cType` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'html、css、javascript...',
  `cImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '(url的檔名+副檔名)',
  `cVideo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'youtube <iframe>',
  `cDate` datetime DEFAULT NULL,
  PRIMARY KEY (`cNumber`),
  KEY `FK_C_LECTURER_idx` (`cLecturer`),
  CONSTRAINT `FK_C_LECTURER` FOREIGN KEY (`cLecturer`) REFERENCES `lecturer` (`lNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('C0001','為初學者準備的：HTML 速成','這是一個為初學者準備的 HTML 速成教程，教程中只會涉及 HTML5 的內容，以及很少部分 CSS，更多詳細的 CSS 內容會在下一個視頻中介紹，別錯過。如果你已經在使用 HTML 製作網頁，那這個視頻並不會給你帶來更多新的知識，當然你也可以把它當做回顧使用。','M0007','1 小時 02 分鐘',3188,1,'html','../images/allCourse/html.jpg','https://www.youtube.com/embed/uhLg6nVVTzY','2020-11-01 11:04:08'),('C0002','為初學者準備的：CSS 速成','這是一個為初學者準備的 CSS 速成教程，視頻中會介紹使用 CSS 為 HTML 添加樣式，使用 CSS 佈局網頁。在學習 CSS 之前必須學過 HTML。如果你已經在使用 CSS 製作網頁，那這個視頻並不會給你帶來更多新的知識，當然你也可以把它當做回顧使用。JavaScript 的內容在下一期。','M0007','1 小時 22 分鐘',2600,2,'css','../images/allCourse/css.jpg','https://www.youtube.com/embed/KN6oBEOz2ZI','2020-11-03 09:08:10'),('C0003','基本JS教學 | Javascript是什麼| 可以做什麼','這是一個為初學者準備的 JavaScript 速成教程，視頻中會介紹使用 JavaScript 的類型，變數，運算子，控制結構，物件，陣列，函數和閉包。JavaScript DOM 的內容在下一期。','M0007','1 小時 47 分鐘',1500,1,'js','../images/allCourse/js.jpg','https://www.youtube.com/embed/W6NZfCO5SIk','2020-11-03 12:29:01'),('C0004','JQuery入門','講到網頁當然不能略過JQuery 這個元件庫了，因為易懂易用的優點，加上開發快速，當初全世界的網頁開發都因為JQuery而大幅的改變了開發的速度跟模式，今天就跟著 Amos 一起來踏入 JQuery 的世界吧。','M0010','0 小時 29 分鐘',1790,2,'jquery','../images/allCourse/jquery.jpg','https://www.youtube.com/embed/y2MK4mE1RkM','2020-11-04 16:23:23'),('C0005','從 CSS 到 SASS (SCSS) 超入門觀念引導','可能很多人聽過預處理器，也可能常常聽到 SASS 這個詞，最近甚至有聽到 PostCSS 的名稱，到底這些跟 CSS 有什麼關係呢？就讓我們一起來一探究竟吧。','M0008','2 小時 47 分鐘',2790,1,'sass','../images/allCourse/sass.jpg','https://www.youtube.com/embed/mzuKtTuimEE','2020-11-04 19:32:23'),('C0006','PHP初學章節介紹','PHP 基本語法、MySQL 資料庫的規劃、使用 PHP 操作 MySQL 資料庫、實作一個簡易的會員系統，以及一個與會員系統整合的個人留言版','M0012','0 小時 06 分鐘',1800,1,'php','../images/allCourse/php.jpg','https://www.youtube.com/embed/jhUjk4bhmOA','2020-11-05 12:23:32'),('C0007','MySQL教程零基礎從入門到精通','當今是資料的時代！各種資料庫技術是在資料處理環節不可或缺的核心技術。MySQL作為資料庫技術裡最受歡迎的開源免費產品，被各大科技公司所用。作為IT從業人員，不管您是開發者還是其他職位，掌握MySQL技術將讓您能對公司業務的瞭解更清晰.通過本課程，您將學到SQL的基本語法、通過聚合Aggregate來分析處理資料、通過函數和邏輯操作符實現複雜的資料查詢、學會通過SQL JOIN來處理多個表的資料、And more!','M0011','0 小時 04 分鐘',2500,1,'mysql','../images/allCourse/mysql.jpg','https://www.youtube.com/embed/0G8hPvphecw','2020-11-06 09:12:23'),('C0008','Vue.js 教學 - 幼幼班入門篇','這門課讓您：能夠獨立建構 Vue.js 開發環境、能夠開發獨自的元件庫、具備 Ajax 基礎介接能力、能撰寫出內容管理網站後台之介面','M0010','1 小時 40 分鐘',2500,1,'vue','../images/allCourse/Vue.jpg','https://www.youtube.com/embed/4deVCNJq3qc','2020-11-07 10:02:12'),('C0009','GitHub 使用超入門','本課程將以實戰為主，將會從簡單的終端機指令和圖形化介面工具理解 Git 版本控制的運作，之後會在進一步了解如何使用以Git的邏輯開發的軟體代碼管理與存放服務 Github，以及以 Github 為中心而發展出來的軟體團隊開發流程 Github Flow','M0008','0 小時 25 分鐘',2500,1,'github','../images/allCourse/github.jpg','https://www.youtube.com/embed/QqwCgEovim0','2020-11-08 14:24:23'),('C0010','Gulp 基本運用與 Bower 之間整合','gulp的簡單介紹：gulp是一個即grunt後出現的一個前端構建工具，跟grunt相比，gulp的API很少並且很簡單，使用nodejs中stream來讀取和運算元據，其速度比grunt更快，下面讓我們來學習一下如何使用gulp快速構建你的專案。本文主要介紹：gulp的安裝和使用、gulp的API、gulp的常用外掛程式','M0008','0 小時 51 分鐘',1980,1,'gulp','../images/allCourse/gulp.jpg','https://www.youtube.com/embed/RoEg3j9qGCU','2020-11-09 13:30:09'),('C0011','JavaScript AJAX 教學','動態的、不切換頁面的條件下，利用 JavaScript AJAX 技術，與伺服器進行連線互動的基本教學。','M0012','0 小時 15 分鐘',1800,1,'ajax','../images/allCourse/ajax.jpg','https://www.youtube.com/embed/OkphAk_cWPM','2020-11-10 14:14:12'),('C0012','產品設計實戰：用Figma打造絕佳UI/UX','認真學習完這堂課程所有單元，並且完成作業之後，你將會學習到：瞭解基礎介面設計 (UI Design) 與使用者體驗設計 (UX Design) 的知識。瞭解業界產品開發流程、團隊合作流程以及 UI/UX 設計師的工作細節。熟悉 Figma 核心操作技巧與常用快捷鍵，有能力依據團隊需求快速且有效率的製作介面。熟悉 Figma 進階技巧，像是管理元件、共用樣式等等，不只能提高工作溝通效率，並且做出可擴展、一致性高且好維護的設計系統。利用 Figma 做出可供使用者及團隊測試的原型，並且能夠根據反饋隨時調整設計。瞭解如何建立基礎設計美感與原則，有能力做出符合規範、直覺、美觀好閱讀的介面。從概念發想到實際操作，從 0 到 1 完成兩個產品 (App＆Web) 的核心功能設計與原型製作。建立正確的學習心態與工作觀念，在未來的設計路上都能掌握學習原則，持續自我精進成長。瞭解如何準備與設計面試與求職作品集，讓自己在其他競爭者中脫穎而出。','M0014','1小時 02 分鐘 ',1600,1,'ui/ux','../images/allCourse/uiux.png','https://www.youtube.com/embed/3q3FV65ZrUs','2020-11-10 15:31:18'),('C0013','Adobe XD : 基礎篇','上完這堂課，你將可以同時擁有網頁以及 App 的作品，並了解業界的流程與即戰力。','M0014','0 小時 48 分鐘',2600,1,'xd','../images/allCourse/xd.jpg','https://www.youtube.com/embed/QwhOcq-GF38','2020-11-12 11:12:20'),('C0014','Photoshop 基礎教學','在創作時，知道怎麼快速處理一些前期作業，例如去背、調色，並能夠反應在甚麼情況下要用甚麼工具去達成預想的效果。看到學習資源，能快速清楚知道在說甚麼，因而自我精進，甚至看到喜歡的作品，慢慢的可以大概分析怎麼做出來的。','M0014','0 小時 07 分鐘',2790,1,'photoshop','../images/allCourse/photoshop.jpg','https://www.youtube.com/embed/b-0HekkbdJM','2020-11-13 10:36:16');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discuss`
--

DROP TABLE IF EXISTS `discuss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discuss` (
  `dNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'D0001',
  `dCourse` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'C0001',
  `dMember` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `dContent` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '請問這門課適合完全沒有程式語言基礎的人學習嗎?',
  `dDate` datetime DEFAULT NULL,
  `p_dNumber` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`dNumber`),
  KEY `FK_D_COURSE_idx` (`dCourse`),
  KEY `FK_D_MEMBER_idx` (`dMember`),
  CONSTRAINT `FK_D_COURSE` FOREIGN KEY (`dCourse`) REFERENCES `course` (`cNumber`),
  CONSTRAINT `FK_D_MEMBER` FOREIGN KEY (`dMember`) REFERENCES `member` (`mNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discuss`
--

LOCK TABLES `discuss` WRITE;
/*!40000 ALTER TABLE `discuss` DISABLE KEYS */;
INSERT INTO `discuss` VALUES ('D0001','C0001','M0024','互賓老師教學認真。\r\n脈絡清晰。\r\n大推賓哥！！！！','2020-12-22 15:58:08','0'),('D0002','C0001','M0025','自從學了賓哥的HTML之後，長高了很多，人也變壯了，自信心又重新回到了我的身上...呀～～～','2020-12-22 16:00:48','0'),('D0003','C0002','M0025','自從學了賓哥的CSS之後，長高了很多，人也變壯了，自信心又重新回到了我的身上...呀～～～','2020-12-22 16:02:41','0'),('D0004','C0009','M0028','請問這門課會教如何使用sourcetree嗎？','2020-12-27 12:41:02','0'),('D0005','C0008','M0023','請問這門課會教到vue的生命週期嗎？','2020-12-27 13:11:28','0'),('D0006','C0005','M0023','請問沒有css基礎的人適合上這門課嗎','2020-12-27 13:12:31','0'),('D0007','C0001','M0023','超期待!','2020-12-27 13:15:55','0'),('D0008','C0002','M0002','請問這門課適合新手嗎','2020-12-27 15:27:17','0'),('D0009','C0002','M0020','請問要先有html基礎嗎\r\n','2020-12-27 15:30:14','0'),('D0010','C0004','M0020','請問要有js基礎嗎','2020-12-27 15:30:27','0');
/*!40000 ALTER TABLE `discuss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorite_a`
--

DROP TABLE IF EXISTS `favorite_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favorite_a` (
  `faNumber` bigint NOT NULL COMMENT '時間戳記字串化',
  `faArticle` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'A0001',
  `faMember` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `faDate` datetime DEFAULT NULL,
  PRIMARY KEY (`faNumber`),
  KEY `FK_FA_MEMBER_idx` (`faMember`),
  KEY `FK_FA_ARTICLE_idx` (`faArticle`),
  CONSTRAINT `FK_FA_ARTICLE` FOREIGN KEY (`faArticle`) REFERENCES `article` (`aNumber`),
  CONSTRAINT `FK_FA_MEMBER` FOREIGN KEY (`faMember`) REFERENCES `member` (`mNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite_a`
--

LOCK TABLES `favorite_a` WRITE;
/*!40000 ALTER TABLE `favorite_a` DISABLE KEYS */;
INSERT INTO `favorite_a` VALUES (20201221231558,'A0001','M0003','2020-12-21 23:15:58'),(20201221231619,'A0005','M0003','2020-12-21 23:16:19'),(20201221231623,'A0004','M0003','2020-12-21 23:16:23'),(20201223213922,'A0005','M0001','2020-12-23 21:39:22'),(20201226151536,'A0005','M0005','2020-12-26 15:15:36'),(20201226151539,'A0003','M0005','2020-12-26 15:15:39'),(20201227121220,'A0004','M0002','2020-12-27 12:12:20'),(20201228122055,'A0004','M0029','2020-12-28 12:20:55'),(20201228122057,'A0002','M0029','2020-12-28 12:20:57');
/*!40000 ALTER TABLE `favorite_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorite_c`
--

DROP TABLE IF EXISTS `favorite_c`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favorite_c` (
  `fcNumber` bigint NOT NULL COMMENT '時間戳記字串化',
  `fcCourse` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'C0001',
  `fcMember` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `fcDate` datetime DEFAULT NULL,
  PRIMARY KEY (`fcNumber`),
  KEY `FK_FC_MEMBER_idx` (`fcMember`),
  KEY `FK_FC_COURSE_idx` (`fcCourse`),
  CONSTRAINT `FK_FC_COURSE` FOREIGN KEY (`fcCourse`) REFERENCES `course` (`cNumber`),
  CONSTRAINT `FK_FC_MEMBER` FOREIGN KEY (`fcMember`) REFERENCES `member` (`mNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite_c`
--

LOCK TABLES `favorite_c` WRITE;
/*!40000 ALTER TABLE `favorite_c` DISABLE KEYS */;
INSERT INTO `favorite_c` VALUES (20201214160752,'C0007','M0008','2020-12-14 16:07:52'),(20201214161448,'C0006','M0006','2020-12-14 16:14:48'),(20201214161641,'C0005','M0006','2020-12-14 16:16:41'),(20201214161949,'C0007','M0006','2020-12-14 16:19:49'),(20201214161957,'C0002','M0006','2020-12-14 16:19:57'),(20201222121049,'C0002','M0005','2020-12-22 17:10:49'),(20201223212438,'C0012','M0020','2020-12-23 21:24:38'),(20201223212440,'C0009','M0020','2020-12-23 21:24:40'),(20201223213844,'C0001','M0001','2020-12-23 21:38:44'),(20201223213855,'C0002','M0001','2020-12-23 21:38:55'),(20201224150229,'C0007','M0002','2020-12-24 15:02:29'),(20201224150230,'C0008','M0002','2020-12-24 15:02:30'),(20201226150831,'C0006','M0004','2020-12-26 15:08:31'),(20201226150832,'C0009','M0004','2020-12-26 15:08:32'),(20201226150834,'C0014','M0004','2020-12-26 15:08:34'),(20201226152000,'C0011','M0005','2020-12-26 15:20:00'),(20201226152001,'C0010','M0005','2020-12-26 15:20:01'),(20201227125343,'C0004','M0028','2020-12-27 12:53:43'),(20201227125344,'C0006','M0028','2020-12-27 12:53:44'),(20201227125345,'C0007','M0028','2020-12-27 12:53:45'),(20201227125346,'C0010','M0028','2020-12-27 12:53:46'),(20201227125744,'C0004','M0007','2020-12-27 11:57:44');
/*!40000 ALTER TABLE `favorite_c` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fundraising`
--

DROP TABLE IF EXISTS `fundraising`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fundraising` (
  `fCourse` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'C0001',
  `fPrice` decimal(10,0) unsigned NOT NULL,
  `fStartdate` datetime DEFAULT NULL,
  PRIMARY KEY (`fCourse`),
  CONSTRAINT `FK_FR_COURSE` FOREIGN KEY (`fCourse`) REFERENCES `course` (`cNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fundraising`
--

LOCK TABLES `fundraising` WRITE;
/*!40000 ALTER TABLE `fundraising` DISABLE KEYS */;
INSERT INTO `fundraising` VALUES ('C0002',1800,'2021-01-31 00:00:00'),('C0004',1600,'2021-02-01 00:00:00');
/*!40000 ALTER TABLE `fundraising` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galaxy`
--

DROP TABLE IF EXISTS `galaxy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galaxy` (
  `gNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gImage` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gStatus` int DEFAULT NULL COMMENT '0:下架\n1:上架\n',
  PRIMARY KEY (`gNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galaxy`
--

LOCK TABLES `galaxy` WRITE;
/*!40000 ALTER TABLE `galaxy` DISABLE KEYS */;
INSERT INTO `galaxy` VALUES ('G0001','HTML星系','g1.png',1),('G0002','CSS星系','g2.png',1),('G0003','Javascript星系','g3.png',1),('G0004','jQuery星系','g4.png',1),('G0005','SASS星系','g5.png',1),('G0006','PHP星系','g6.png',1);
/*!40000 ALTER TABLE `galaxy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `iNumber` bigint unsigned NOT NULL COMMENT '時間戳記字串化',
  `iCourse` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'C0001',
  PRIMARY KEY (`iNumber`,`iCourse`),
  KEY `FK_I_NUMBER_idx` (`iNumber`),
  KEY `FK_I_COURSE_idx` (`iCourse`),
  CONSTRAINT `FK_I_COURSE` FOREIGN KEY (`iCourse`) REFERENCES `course` (`cNumber`),
  CONSTRAINT `FK_I_NUMBER` FOREIGN KEY (`iNumber`) REFERENCES `myorder` (`oNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (20201227123946,'C0009'),(20201227123946,'C0011'),(20201227123946,'C0013'),(20201227125626,'C0005'),(20201227125626,'C0006'),(20201227125626,'C0010'),(20201227125948,'C0003'),(20201227125948,'C0007'),(20201227125948,'C0012'),(20201227130513,'C0001'),(20201227130513,'C0005'),(20201227130513,'C0008'),(20201227150707,'C0001'),(20201227150707,'C0003'),(20201227150707,'C0005'),(20201227152014,'C0001'),(20201227152014,'C0006'),(20201227152014,'C0007');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lecturer` (
  `lNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `lInfo` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '鬼才張老闆，總是鼓勵學生試試看的精神，大幅提升學員自學的能力...',
  PRIMARY KEY (`lNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecturer`
--

LOCK TABLES `lecturer` WRITE;
/*!40000 ALTER TABLE `lecturer` DISABLE KEYS */;
INSERT INTO `lecturer` VALUES ('M0007','互賓老師，人稱鬼才張老闆，迷之微笑總是讓人猜不透到底在想什麼，專攻於html、css、js教學，神之講義助你寫code一臂之力，趕快跟著張老闆的步伐，一步一步帶你上天堂！'),('M0008','翰霆老師，除了喜歡教你Github、SASS、GULP、Webpack、NodeJS、GSAP等等常用套件之外，更是專精使用者體驗(UX)和商業邏輯的名師，擅長用白話口語的方式教大家怎麼和CODE做朋友。'),('M0010','語昕老師，精通所有前端語法架構，從html5、css、javascript、jquery到vue...等等，任何問題都能幫你解決，擁有自己獨創的脈絡統整教學，讓你寫code不再霧裡看花，不只教你寫code還會買好料給你吃，堪稱地表最暖老師！'),('M0011','偉銘老師，是大家人人尊敬的DBA大哥，據說可以同時在腦海中出現10個table串接在一起的情況，思考邏輯以excel表格方式呈現，MySQL語法對他來說是跟中文一樣流利，上他的資料庫課程是穩賺不賠的投資。'),('M0012','景鴻老師，南京復興後端PHP扛霸子，人要比code兇，口頭禪是\"try and error不用錢\"，教大家如何試誤學習，以達到簡簡單單串後端的境界。'),('M0014','尚媛老師，如果對寫CODE不是很有興趣，讓尚媛老師指導後，沒藝術細胞的學員也可以成為頂尖的UI設計師，手把手帶你學會Photoshop、Illustrator和UI介面設計。');
/*!40000 ALTER TABLE `lecturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `mNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `mLevel` int unsigned NOT NULL DEFAULT '1' COMMENT '0: 停權\\n1: 會員(預設值)\\n2: 老師\\n3: 管理員',
  `mName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mPhoto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mPhone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mEmail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mAccount` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mPassword` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mCC` decimal(10,0) unsigned DEFAULT NULL,
  `mSignIn` int unsigned DEFAULT NULL,
  `mJoindate` datetime DEFAULT NULL,
  `mLogindate` date DEFAULT NULL,
  PRIMARY KEY (`mNumber`),
  UNIQUE KEY `mAccount_UNIQUE` (`mAccount`),
  UNIQUE KEY `mEmail_UNIQUE` (`mEmail`) /*!80000 INVISIBLE */
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('M0001',3,'沈奇奇','../images/info/aaa.png','0911111222','aaa@gmail.com','aaaaaa','aaa11',12000,1,'2020-12-05 10:24:36','2020-12-26'),('M0002',1,'黃家偉','../images/info/家偉裸上身.jpg','0922222222','bbb@gmail.com','bbbbbb','bbb22',1590,6,'2020-12-05 10:24:36','2020-12-27'),('M0003',1,'徐嬿婷','../images/info/chi_shin.jpg','0933333333','ccc@gmail.com','cccccc','ccc322',4100,2,'2020-12-05 10:24:36','2020-12-27'),('M0004',1,'郭子瑄','../images/info/ddd.png','0944444444','ddd@gmail.com','dddddd','ddd44',4965,1,'2020-12-05 10:24:36','2020-12-26'),('M0005',1,'洪宏祥','../images/info/eee.png','0955555555','eee@gmail.com','eeeeee','eee55',6695,1,'2020-12-05 10:24:36','2020-12-26'),('M0006',1,'江佩芹','../images/info/fff.png','0966666666','fff@gmail.com','ffffff','fff66',9950,2,'2020-12-05 10:24:36','2020-12-24'),('M0007',2,'張互賓','../images/info/trytry.png','0977777777','trytry@gmail.com','trytry','trytry77',7640,1,'2020-12-05 10:24:36','2020-12-27'),('M0008',2,'SexFat','../images/info/sexsex.png','0988888888','sexsex@gmail.com','sexsex','sexsex88',8705,0,'2020-12-05 10:24:36',NULL),('M0009',0,'太田田','../images/info/sweet.png','0999999999','sweet@gmail.com','sweet','sweet99',9155,0,'2020-12-05 10:24:36',NULL),('M0010',2,'黃語昕','../images/info/silvia.png','0900000000','silvia@mgail.com','silvia','silvia00',2000,0,'2020-12-07 11:23:22',NULL),('M0011',2,'李偉銘','../images/info/sqlgod.png','0987654321','sqlgod@mgail.com','sqlgod','sqlgod21',2040,0,'2020-12-07 11:23:43',NULL),('M0012',2,'曾景鴻','../images/info/computerman.png','0912345678','computerman@mgail.com','computerman','computerman78',1575,1,'2020-12-07 11:26:49','2020-12-24'),('M0013',0,'展哥想逃','../images/info/runningman.jpg','0966557483','runningman@gmail.com','runningman','runningman83',2540,1,'2020-12-20 00:41:13','2020-12-21'),('M0014',2,'許尚媛','../images/info/smallpony.png','0934343434','smallpony@mgail.com','smallpony','smallpony3434',3410,0,'2020-12-07 11:26:50',NULL),('M0015',1,'張作霖','../images/info/noodleking.png','0919283746','noodleking@gmail.com','noodleking','noodleking46',2215,0,'2020-12-12 11:34:16',NULL),('M0016',1,'傑夫姊夫','../images/info/jeff.png','0956765455','jeff@gmail.com','jeffjeff','jeff55',10000,0,'2020-12-12 11:35:14',NULL),('M0017',1,'國超先不要','../images/info/josephhehehe.png','0952052052','josephhehehe@gmail.com','josephhehehe','josephhehehe52',8325,0,'2020-12-12 11:38:21',NULL),('M0018',1,'鋼筆碩哥','../images/info/dennispen.png','0979285930','dennispen@gmail.com','dennispen','dennispen30',6585,0,'2020-12-12 11:40:43',NULL),('M0019',1,'陳昱榕','../images/info/street_girl.jpeg','0919123456','eso@gmail.com','esoeso','eso666',5278,0,'2020-12-12 12:02:07',NULL),('M0020',1,'雨錡姬','../images/info/jessie.png','0939584759','jessie@gmail.com','jessie','jessie59',66840,1,'2020-12-12 12:04:38','2020-12-27'),('M0021',1,'黃小雞','../images/info/Jane.png','0988808080','Jane@gmail.com','JaneHuang','Jane1234',2040,1,'2020-12-12 12:07:29','2020-12-27'),('M0022',1,'周到飛','../images/info/choufly.png','','choufly@gmail.com','choufly','choufly76',4500,1,'2020-12-12 14:18:50','2020-12-27'),('M0023',1,'群群','../images/info/breakfastking.png','','breakfastking@gmail.com','breakfastking','breakfastking87',3850,1,'2020-12-12 14:25:22','2020-12-27'),('M0024',1,'黃家偉廢廢','../images/info/IMG_20201222_155937.jpg','','kkk@gmail.com','AlanFake','alanalan',6850,1,'2020-12-22 15:55:28','2020-12-22'),('M0025',1,'八兩金','../images/info/88888.jpeg','','ddddd@gmail.com','sexfat','sexfat',5500,1,'2020-12-22 15:57:06','2020-12-27'),('M0026',1,'文婷play',NULL,'0945848394','tingting94@gmail.com','tingting','tingting94',2300,0,'2020-12-23 16:29:24',NULL),('M0027',1,'sexfater',NULL,'','bryant6831@gmail.com','sexfater','qweasdzxc123',2300,1,'2020-12-22 16:08:37','2020-12-27'),('M0028',1,'Silvia Huang',NULL,'','silvia.huang@gmail.com','silviahuang','123456',7670,1,'2020-12-22 16:24:44','2020-12-27'),('M0029',1,'Alanweiwei','../images/info/家偉裸上身.jpg','0983876588','alans40609@gmail.com','alans40609','1qaz2wsx',7630,4,'2020-12-24 16:29:24','2020-12-27');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `myorder`
--

DROP TABLE IF EXISTS `myorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `myorder` (
  `oNumber` bigint unsigned NOT NULL COMMENT '時間戳記字串化',
  `oMember` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `oCard` int unsigned NOT NULL COMMENT '只取卡號末四碼',
  `oTotal` decimal(10,0) unsigned NOT NULL,
  `oCC` decimal(10,0) unsigned NOT NULL,
  `oDate` datetime DEFAULT NULL,
  PRIMARY KEY (`oNumber`),
  KEY `FK_O_BUYER_idx` (`oMember`),
  CONSTRAINT `FK_O_BUYER` FOREIGN KEY (`oMember`) REFERENCES `member` (`mNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `myorder`
--

LOCK TABLES `myorder` WRITE;
/*!40000 ALTER TABLE `myorder` DISABLE KEYS */;
INSERT INTO `myorder` VALUES (20201227123946,'M0028',1111,6900,0,'2020-12-27 12:39:46'),(20201227125626,'M0027',1111,6570,0,'2020-12-27 12:56:26'),(20201227125948,'M0025',1111,5600,0,'2020-12-27 12:59:48'),(20201227130513,'M0023',1111,8478,0,'2020-12-27 13:05:13'),(20201227150707,'M0022',1111,7477,1,'2020-12-27 15:07:07'),(20201227152014,'M0021',1111,7488,0,'2020-12-27 15:20:14'),(20201227152953,'M0020',1111,4390,0,'2020-12-27 15:29:53');
/*!40000 ALTER TABLE `myorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz` (
  `qNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Q0001\\n\\n',
  `qSubject` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'html\\njavascript\\ncss',
  `qLevel` int NOT NULL COMMENT '1: 初級\\n2: 中級\\n3: 高級',
  `qContent` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `qAnswer` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'A、B、C、D',
  `qState` int NOT NULL DEFAULT '2' COMMENT '2: 下架(預設值)\\n1: 上架\\n0: 刪除',
  `qBackground` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`qNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES ('Q0001','HTML星系',1,'下列何者是無序列表的標籤？','A',1,'1.svg'),('Q0002','HTML星系',1,'下列何者可以產生下拉選單？','A',1,'1.svg'),('Q0003','HTML星系',2,'下列何者是正確插入圖檔的方式？','B',1,'2.svg'),('Q0004','HTML星系',2,'如何點擊a連結時，會產生新的視窗？','B',1,'2.svg'),('Q0005','HTML星系',3,'在HTML中,<form action=?>，action表示？','C',1,'3.svg'),('Q0006','HTML星系',3,'在HTML中,<form method=?>，method表示？','C',1,'3.svg'),('Q0007','CSS星系',1,'如何顯示沒有底線的超連結？','A',1,'4.svg'),('Q0008','CSS星系',1,'以下的CSS中，可使所有<p>元素變為粗體的正確語法是?','A',1,'4.svg'),('Q0009','CSS星系',2,'如何產生帶有正方形的列表？','B',1,'5.svg'),('Q0010','CSS星系',2,'下列哪個css屬性能夠設置盒模型的內距為上10、右20、下30、左40？','B',1,'5.svg'),('Q0011','CSS星系',3,'哪個是行內(inline)標籤？','C',1,'6.svg'),('Q0012','CSS星系',3,'哪個是區塊(block)標籤？','C',1,'6.svg'),('Q0013','Javascript星系',1,'下列何者不是JS的資料型態？','A',1,'7.svg'),('Q0014','Javascript星系',1,'下列何者是常常用來檢查程式碼的方法？','A',1,'7.svg'),('Q0015','Javascript星系',2,'下列何者是產生當前日期的方法？','B',1,'8.svg'),('Q0016','Javascript星系',2,'綁定DOM的方法何者正確？','B',1,'8.svg'),('Q0017','Javascript星系',3,'下列何者是for迴圈的正確寫法？','C',1,'9.svg'),('Q0018','Javascript星系',3,'下列何者是window的確認消息框？','C',1,'9.svg'),('Q0019','SASS星系',1,'在SASS中，如何宣告變數？','A',1,'10.svg'),('Q0020','SASS星系',1,'下列何者不是SASS的優點？','A',1,'10.svg'),('Q0021','SASS星系',2,'如何引用@mixin？','B',1,'11.svg'),('Q0022','SASS星系',2,'加入@content的用意是什麼？','B',1,'11.svg'),('Q0023','SASS星系',3,'關於@extend，下列何者錯誤？','C',1,'12.svg'),('Q0024','SASS星系',3,'在SCSS中，關於迴圈的敘述何者正確？','C',1,'12.svg'),('Q0025','jQuery星系',1,'在jquery中，如果想要獲取當前窗口的寬度值，哪個是實現該功能的?','A',1,'13.svg'),('Q0026','jQuery星系',1,'以下關於jQuery的描述錯誤的是','A',1,'13.svg'),('Q0027','jQuery星系',2,'jquery中，下列何者屬於鼠標事件方法的選項','B',1,'14.svg'),('Q0028','jQuery星系',2,'jquery中，get()的方法是做什麼的？','B',1,'14.svg'),('Q0029','jQuery星系',3,'下面哪一個是用來追加到指定元素的末尾的?','C',1,'15.svg'),('Q0030','jQuery星系',3,'在jquey中，如果想要從DOM中刪除所有匹配的元素，下面哪一個是正確的?','C',1,'15.svg'),('Q0031','PHP星系',1,'在PHP程式設計中，Session與Cookie一樣是記住使用者，請問Session可以儲存在那裡？','A',1,'16.svg'),('Q0032','PHP星系',1,'PHP語法中提供比較運算子（Comparison Operators） ，若已宣告「$Var=4;」請問下列何者輸出不為真？','A',1,'16.svg'),('Q0033','PHP星系',2,'表單中使用兩個欄位，username 與 content 分別讓使用者填寫姓名與留言內容，method為POST，將設計好的表單 內容存入 write.html 檔案。然後使用程式 wirte.php來接收資料，請問下列那一項可以顯示username正確值？','B',1,'17.svg'),('Q0034','PHP星系',2,'由於PHP 是嵌入在 HTML語法 中，請問 PHP要寫在下列那種標記範圍內，如此網頁伺服器才知道此段為 PHP 程式？','B',1,'17.svg'),('Q0035','PHP星系',3,'所謂『陣列』即是將資料結構性儲存的空間。若我們已宣告一個陣列： $Arr = array(\"Apple\",\"Orange\",\"Banana\",\"Melon\");  「echo $Arr[2];」的輸出結果是？','C',1,'18.png'),('Q0036','PHP星系',3,'依據PHP語法，下列敘述何者為真？','C',1,'18.png');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `reNumber` bigint NOT NULL COMMENT '(時間戳記字串化)',
  `reTutorial` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'T0001',
  `reMember` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `reDate` datetime DEFAULT NULL,
  PRIMARY KEY (`reNumber`),
  UNIQUE KEY `UNIQUE` (`reTutorial`,`reMember`),
  KEY `FK_B_NUMBER_idx` (`reTutorial`),
  KEY `FK_RE_MEMBER_idx` (`reMember`),
  CONSTRAINT `FK_RE_MEMBER` FOREIGN KEY (`reMember`) REFERENCES `member` (`mNumber`),
  CONSTRAINT `FK_RE_NUMBER` FOREIGN KEY (`reTutorial`) REFERENCES `tutorial` (`tNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (20201212121855,'T0002','M0005','2020-12-12 12:18:55'),(20201212122057,'T0006','M0004','2020-12-12 12:20:57'),(20201212122059,'T0006','M0005','2020-12-12 12:20:59'),(20201212122100,'T0006','M0006','2020-12-12 12:21:00'),(20201212122124,'T0006','M0003','2020-12-12 12:21:24'),(20201212122138,'T0006','M0015','2020-12-12 12:21:38'),(20201212122140,'T0006','M0017','2020-12-12 12:21:40'),(20201212122146,'T0006','M0020','2020-12-12 12:21:46'),(20201212122148,'T0006','M0021','2020-12-12 12:21:48'),(20201212122239,'T0006','M0002','2020-12-12 12:22:39'),(20201212122251,'T0006','M0016','2020-12-12 12:22:51'),(20201212132258,'T0004','M0009','2020-12-12 13:22:58'),(20201222145957,'T0005','M0003','2020-12-22 14:59:57'),(20201222150043,'T0001','M0002','2020-12-22 15:00:43'),(20201222162135,'T0009','M0002','2020-12-22 16:21:35'),(20201222170301,'T0005','M0005','2020-12-22 17:03:01'),(20201227121508,'T0004','M0002','2020-12-27 12:15:08');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `rNumber` bigint NOT NULL COMMENT '(時間戳記字串化)',
  `rCourse` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'C0001',
  `rMmeber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'M0001',
  `rFeedback` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '上完這門課，受益良多啊',
  `rStar` int NOT NULL COMMENT '1、2、3、4、5',
  `rDate` datetime DEFAULT NULL,
  PRIMARY KEY (`rNumber`),
  UNIQUE KEY `UNIQUE` (`rCourse`,`rMmeber`) /*!80000 INVISIBLE */,
  KEY `FK_R_MEMBER_idx` (`rMmeber`),
  CONSTRAINT `FK_R_COURSE` FOREIGN KEY (`rCourse`) REFERENCES `course` (`cNumber`),
  CONSTRAINT `FK_R_MEMBER` FOREIGN KEY (`rMmeber`) REFERENCES `member` (`mNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (20201227120124,'C0003','M0025','上完後讓我重新愛上JS',5,'2020-12-27 13:01:24'),(20201227120153,'C0007','M0025','原來資料庫可以這麼好玩!',5,'2020-12-27 13:01:53'),(20201227120236,'C0012','M0025','講的有點籠統...',3,'2020-12-27 13:02:36'),(20201227120544,'C0001','M0023','真的是金魚都能懂，教的超好!',5,'2020-12-27 13:05:44'),(20201227120751,'C0005','M0023','教材做得好~老師教得不錯!',4,'2020-12-27 13:07:51'),(20201227120830,'C0001','M0022','老師很會教欸~大推~',4,'2020-12-27 15:08:30'),(20201227120913,'C0008','M0023','老師脈絡講得很好',5,'2020-12-27 13:09:13'),(20201227121239,'C0005','M0022','我喜歡老師的教學風格!',5,'2020-12-27 15:12:39'),(20201227122038,'C0001','M0021','喜歡老師的教學風格~',5,'2020-12-27 15:20:38'),(20201227122054,'C0006','M0021','聽不太懂老師的解釋',3,'2020-12-27 15:20:54'),(20201227122201,'C0007','M0021','喜歡老師的教學風格',4,'2020-12-27 15:22:01'),(20201227124013,'C0009','M0028','教的還不錯!',4,'2020-12-27 12:40:13'),(20201227125035,'C0011','M0028','教得還不錯，但適合有基礎的人',4,'2020-12-27 12:50:35'),(20201227125325,'C0013','M0028','教得不錯～很適合新手喔',5,'2020-12-27 12:53:25'),(20201227125647,'C0005','M0027','普普通通',3,'2020-12-27 12:56:47'),(20201227125745,'C0006','M0027','老師講解得很仔細!',4,'2020-12-27 12:57:45'),(20201227125818,'C0010','M0027','老師很會教，可以讓學員們融會貫通',4,'2020-12-27 12:58:18');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selection`
--

DROP TABLE IF EXISTS `selection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `selection` (
  `sNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'S0001',
  `sQuiz` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Q0001',
  `sOption` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'A、B、C、D',
  `sContent` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '選項敘述',
  PRIMARY KEY (`sNumber`),
  KEY `S_NUMBER_idx` (`sQuiz`),
  CONSTRAINT `S_NUMBER` FOREIGN KEY (`sQuiz`) REFERENCES `quiz` (`qNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selection`
--

LOCK TABLES `selection` WRITE;
/*!40000 ALTER TABLE `selection` DISABLE KEYS */;
INSERT INTO `selection` VALUES ('S0001','Q0001','A','<ul></ul>'),('S0002','Q0001','B','<ol></ol>'),('S0003','Q0001','C','<tr></tr>'),('S0004','Q0001','D','<td></td>'),('S0005','Q0002','A','<select><option></option></select>'),('S0006','Q0002','B','<input type=\"list\">'),('S0007','Q0002','C','<textarea>'),('S0008','Q0002','D','<input type=\"dropdown\">'),('S0009','Q0003','A','<img href=\"image.gif\">'),('S0010','Q0003','B','<img src=\"image.gif\">'),('S0011','Q0003','C','<image src=\"image.gif\">'),('S0012','Q0003','D','<img>image.gif</img>'),('S0013','Q0004','A','<a href=\"url\"></a>'),('S0014','Q0004','B','<a href=\"url\" target=\"_blank\"></a>'),('S0015','Q0004','C','<a href=\"url\" target=\"_self\"></a>'),('S0016','Q0004','D','<a href=\"url\" target=\"_new\"></a>'),('S0017','Q0005','A','提交的方式'),('S0018','Q0005','B','表單所用的腳本語言'),('S0019','Q0005','C','提交的URL地址'),('S0020','Q0005','D','表單的形式'),('S0021','Q0006','A','表單所用的腳本語言'),('S0022','Q0006','B','提交的URL地址'),('S0023','Q0006','C','提交的方式'),('S0024','Q0006','D','表單的形式'),('S0025','Q0007','A','a{ text-decoration: none; }'),('S0026','Q0007','B','a{ text-decoration: no-underline; }'),('S0027','Q0007','C','a{ underline: none; }'),('S0028','Q0007','D','a{ decoration: no-underline; }'),('S0029','Q0008','A','p{ font-weight: bold; }'),('S0030','Q0008','B','<p style=\"text-size:bold\">'),('S0031','Q0008','C','<p style=\"font-size:bold\">'),('S0032','Q0008','D','p{ text-size: bold; }'),('S0033','Q0009','A','list-type: square'),('S0034','Q0009','B','list-style-type: square'),('S0035','Q0009','C','type: square'),('S0036','Q0009','D','type: 2'),('S0037','Q0010','A','padding:40px 30px 10px 20px;'),('S0038','Q0010','B','padding:10px 20px 30px 40px;'),('S0039','Q0010','C','padding:30px 40px 10px 20px;'),('S0040','Q0010','D','padding:20px 40px;'),('S0041','Q0011','A','<h3></h3>'),('S0042','Q0011','B','<p></p>'),('S0043','Q0011','C','<span></span>'),('S0044','Q0011','D','<li></li>'),('S0045','Q0012','A','<em></em>'),('S0046','Q0012','B','<i></i>'),('S0047','Q0012','C','<div></div>'),('S0048','Q0012','D','<img>'),('S0049','Q0013','A','None'),('S0050','Q0013','B','Boolean'),('S0051','Q0013','C','Number'),('S0052','Q0013','D','String'),('S0053','Q0014','A','console.log();'),('S0054','Q0014','B','foreach();'),('S0055','Q0014','C','addEventListener();'),('S0056','Q0014','D','document.getElementById();'),('S0057','Q0015','A','Now();'),('S0058','Q0015','B','new Date();'),('S0059','Q0015','C','Date();'),('S0060','Q0015','D','new Now();'),('S0061','Q0016','A','window.getElementsByTag();'),('S0062','Q0016','B','document.getElementsByClassName()'),('S0063','Q0016','C','document.getElementsByIdName()'),('S0064','Q0016','D','document.getElementsById()'),('S0065','Q0017','A','for(i = 0)'),('S0066','Q0017','B','for(i = 0; i++)'),('S0067','Q0017','C','for(let i = 0; i < 3; i++)'),('S0068','Q0017','D','for (let i = 5; i < 5; i++)'),('S0069','Q0018','A','alert();'),('S0070','Q0018','B','prompt();'),('S0071','Q0018','C','confirm();'),('S0072','Q0018','D','window(\"confirm? yes : no\");'),('S0073','Q0019','A','$color'),('S0074','Q0019','B','#color'),('S0075','Q0019','C','let color'),('S0076','Q0019','D','var color'),('S0077','Q0020','A','使用的選擇器比css還要簡單'),('S0078','Q0020','B','巢狀寫法可以降低父元素重複性'),('S0079','Q0020','C','可以宣告變數方便重複利用'),('S0080','Q0020','D','@mixin可以建立 CSS 技巧資料庫，利於快速取用'),('S0081','Q0021','A','@extend'),('S0082','Q0021','B','@include'),('S0083','Q0021','C','@content'),('S0084','Q0021','D','@import'),('S0085','Q0022','A','方便使用者閱讀'),('S0086','Q0022','B','可以填寫擴充的內容'),('S0087','Q0022','C','增加引用的相容性'),('S0088','Q0022','D','將其他scss檔案匯入進去'),('S0089','Q0023','A','@extend能夠將重複的樣式整理再一起'),('S0090','Q0023','B','盡量少用，因為會造成產出的 CSS 檔案非常肥大'),('S0091','Q0023','C','用法和@mixin類似，皆可宣告變數'),('S0092','Q0023','D','通常會搭配站為符號使用'),('S0093','Q0024','A','SCSS和JS一樣，都有for...in和for...of的用法'),('S0094','Q0024','B','@for $var from 1 to 3 跑的迴圈數和 @for $var from 1 through 3 是一樣的'),('S0095','Q0024','C','SCSS 就只有提供像 @for、@each、@while 等基本迴圈處理方法'),('S0096','Q0024','D','使用from to會包含迴圈的結束值'),('S0097','Q0025','A','width()'),('S0098','Q0025','B','width(val)'),('S0099','Q0025','C','width'),('S0100','Q0025','D','innerWidth()'),('S0101','Q0026','A','jQuery的核心功能不是根據選擇器查找HTML元素，然後對這些元素執行相關的操作。'),('S0102','Q0026','B','jQuery是一個javascript函數庫'),('S0103','Q0026','C','jQuery極大地簡化了JavaScript編程'),('S0104','Q0026','D','jQuery的宗旨是“write less,do more”'),('S0105','Q0027','A','onclick( )'),('S0106','Q0027','B','mouseover( )'),('S0107','Q0027','C','onmouseout( )'),('S0108','Q0027','D','blur( )'),('S0109','Q0028','A','返回一個對象'),('S0110','Q0028','B','使用 HTTP GET 請求從服務器加載數據'),('S0111','Q0028','C','返回存在jQuery對象中的DOM元素'),('S0112','Q0028','D','觸發一個get AJAX請求'),('S0113','Q0029','A','insertAfter()'),('S0114','Q0029','B','append()'),('S0115','Q0029','C','appendTo()'),('S0116','Q0029','D','after()'),('S0117','Q0030','A','delete()'),('S0118','Q0030','B','empty()'),('S0119','Q0030','C','remove()'),('S0120','Q0030','D','removeAll()'),('S0121','Q0031','A','伺服端電腦'),('S0122','Q0031','B','客戶端電腦'),('S0123','Q0031','C','客戶端電腦或伺服端電腦'),('S0124','Q0031','D','客戶端電腦及伺服端電腦同時儲存'),('S0125','Q0032','A','echo ($Var!=4);'),('S0126','Q0032','B','echo ($Var==\"4\");'),('S0127','Q0032','C','echo ($Var<5);'),('S0128','Q0032','D','echo ($Var>=3);'),('S0129','Q0033','A','$POST[\'username\'];'),('S0130','Q0033','B','$_POST[\'username\'];'),('S0131','Q0033','C','$POST[\'content\'];'),('S0132','Q0033','D','$_POST[\'content\'];'),('S0133','Q0034','A','< % php 及 % >'),('S0134','Q0034','B','< ? php 及 ? >'),('S0135','Q0034','C','/*及*/'),('S0136','Q0034','D','< script > 及 < / script >'),('S0137','Q0035','A','Apple'),('S0138','Q0035','B','Orange'),('S0139','Q0035','C','Banana'),('S0140','Q0035','D','Melon'),('S0141','Q0036','A','$Arr[0][2] = array(\"Apple\") 是一維陣列'),('S0142','Q0036','B','$Arr = array(\"Apple\",\"Orange\",\"Banana\") 是三維陣列'),('S0143','Q0036','C','$Arr[0][1]=\"Apple\"; 是二維陣列'),('S0144','Q0036','D','$Arr[1][1] 只有一個陣列元素');
/*!40000 ALTER TABLE `selection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutorial`
--

DROP TABLE IF EXISTS `tutorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tutorial` (
  `tNumber` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'T0001',
  `tCourse` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'C0001',
  `tTeacher` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'L0001',
  `tStatus` int NOT NULL DEFAULT '2' COMMENT '0: 刪除\\n1:上架\\n2:下架',
  `tDate` date DEFAULT NULL,
  PRIMARY KEY (`tNumber`),
  UNIQUE KEY `tDate_UNIQUE` (`tDate`),
  KEY `FK_T_COURSE_idx` (`tCourse`),
  KEY `FK_T_TEACHER_idx` (`tTeacher`),
  CONSTRAINT `FK_T_COURSE` FOREIGN KEY (`tCourse`) REFERENCES `course` (`cNumber`),
  CONSTRAINT `FK_T_TEACHER` FOREIGN KEY (`tTeacher`) REFERENCES `lecturer` (`lNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutorial`
--

LOCK TABLES `tutorial` WRITE;
/*!40000 ALTER TABLE `tutorial` DISABLE KEYS */;
INSERT INTO `tutorial` VALUES ('T0001','C0001','M0007',1,'2020-12-29'),('T0002','C0003','M0007',1,'2021-01-02'),('T0003','C0004','M0010',1,'2021-01-03'),('T0004','C0011','M0012',1,'2021-01-06'),('T0005','C0014','M0014',1,'2021-01-10'),('T0006','C0008','M0010',1,'2021-01-22'),('T0007','C0004','M0010',1,'2021-01-18'),('T0008','C0006','M0012',1,'2021-01-13'),('T0009','C0001','M0007',1,'2020-12-23'),('T0010','C0007','M0011',1,'2021-01-27'),('T0011','C0007','M0010',1,'2020-12-31'),('T0012','C0002','M0007',1,'2021-01-01'),('T0013','C0008','M0010',1,'2020-12-27');
/*!40000 ALTER TABLE `tutorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unlock`
--

DROP TABLE IF EXISTS `unlock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unlock` (
  `uNumber` bigint NOT NULL COMMENT '時間戳記字串化',
  `uMember` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'C0001',
  `uBadge` char(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'B0001',
  `uDate` datetime DEFAULT NULL,
  PRIMARY KEY (`uNumber`),
  UNIQUE KEY `UNIQUE` (`uMember`,`uBadge`),
  KEY `FK_U_MEMBER_idx` (`uMember`),
  KEY `FK_U_BADGE` (`uBadge`),
  CONSTRAINT `FK_U_BADGE` FOREIGN KEY (`uBadge`) REFERENCES `badge` (`bNumber`),
  CONSTRAINT `FK_U_MEMBER` FOREIGN KEY (`uMember`) REFERENCES `member` (`mNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unlock`
--

LOCK TABLES `unlock` WRITE;
/*!40000 ALTER TABLE `unlock` DISABLE KEYS */;
INSERT INTO `unlock` VALUES (20201220010658,'M0002','B0001','2020-12-20 01:06:58'),(20201220010707,'M0003','B0001','2020-12-20 01:07:07'),(20201220010710,'M0004','B0001','2020-12-20 01:07:10'),(20201220010712,'M0005','B0003','2020-12-20 01:07:12'),(20201220010715,'M0006','B0002','2020-12-20 01:07:15'),(20201220010717,'M0007','B0004','2020-12-20 01:07:17'),(20201220010719,'M0008','B0005','2020-12-20 01:07:19'),(20201220010722,'M0009','B0006','2020-12-20 01:07:22'),(20201220010732,'M0010','B0007','2020-12-20 01:07:32'),(20201220010739,'M0002','B0008','2020-12-20 01:07:39'),(20201220010744,'M0003','B0009','2020-12-20 01:07:44'),(20201220010749,'M0004','B0002','2020-12-20 01:07:49'),(20201220010756,'M0005','B0001','2020-12-20 01:07:56'),(20201220010801,'M0006','B0003','2020-12-20 01:08:01'),(20201220010806,'M0007','B0005','2020-12-20 01:08:06'),(20201220010812,'M0008','B0006','2020-12-20 01:08:12'),(20201220235321,'M0011','B0004','2020-12-20 23:53:21'),(20201221195052,'M0002','B0018','2020-12-21 19:50:52'),(20201221195126,'M0002','B0013','2020-12-21 19:51:26'),(20201221200126,'M0003','B0015','2020-12-21 20:01:26'),(20201222004126,'M0001','B0018','2020-12-22 00:41:26'),(20201222122456,'M0002','B0015','2020-12-22 12:24:56'),(20201222160855,'M0025','B0002','2020-12-22 16:08:55'),(20201222161158,'M0002','B0010','2020-12-22 16:11:58'),(20201224120741,'M0002','B0002','2020-12-24 12:07:41'),(20201224120804,'M0002','B0003','2020-12-24 12:08:04'),(20201224161514,'M0002','B0014','2020-12-24 16:15:14'),(20201226151714,'M0005','B0002','2020-12-26 15:17:14'),(20201227122018,'M0002','B0016','2020-12-27 12:20:18'),(20201227122058,'M0002','B0017','2020-12-27 12:20:58'),(20201227153110,'M0029','B0001','2020-12-27 15:31:10'),(20201227153125,'M0029','B0005','2020-12-27 15:31:25'),(20201227153142,'M0029','B0009','2020-12-27 15:31:42'),(20201227153156,'M0029','B0014','2020-12-27 15:31:56'),(20201227165956,'M0029','B0002','2020-12-27 16:59:56'),(20201227170030,'M0029','B0003','2020-12-27 17:00:30');
/*!40000 ALTER TABLE `unlock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `countpeople`
--

/*!50001 DROP VIEW IF EXISTS `countpeople`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `countpeople` AS select `reservation`.`reTutorial` AS `reTutorial`,count(0) AS `countPeople` from `reservation` group by `reservation`.`reTutorial` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-28 14:33:07
