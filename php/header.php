<input type="checkbox" id=menu_control>
<header>    
    <!-- 放bar選單 -->
    <label for="menu_control" class="menubtn" >
        <div id="nav-icon2">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </label>
    <nav class="mainNav">
        <li class="mainNavCell"><a href="customized.php">電子花車客製</a></li>
        <li class="mainNavCell"><a href="flyer.php">客製化宣傳單</a></li>
        <h1 class="navLogo"><a href="index2.php"><img src="images/logo.png" alt="台灣大舞台"></a></h1>
        <li class="mainNavCell"><a href="beautyPageant.php">花車選美</a></li>
        <li class="mainNavCell"><a href="intro.php">大舞台的故事</a></li>
        <div class="navMemBtn"> 
            <img  class="fas fa-user fa-1x" src="images/icon/loginIcon.png" alt="">
            <!-- <i class="fas fa-user"></i> -->
            <p onclick="LoginOut()" <?php if(!isset($_SESSION['member'])){ echo "style='display:none;'"; } ?>>登出</p>
        </div>
    </nav>       
</header>