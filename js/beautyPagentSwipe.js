//封裝的對象接受所有圖片的盒元素與觸發切換的最小滑動距離作為參數
var ImageSwiper = function(beautyRankingimgs, minRange) {
    this.imgBox = beautyRankingimgs
    this.beautyRankingimgs = beautyRankingimgs.children
    this.cur_img = 1 //起始圖片設為1 ,而非0,將在圖片顯示方法中作-1處理
    this.ready_moved = true //判斷每次滑動開始的標記變量
    this.imgs_count = this.beautyRankingimgs.length
    this.touchX //觸控開始的手指最初落點
    this.minRange = Number(minRange)
    this.fadeIn //圖片切換的方式,這裡使用淡入淡出
    this.fadeOut
    this.bindTouchEvn() //初始化綁定滑動事件
    this.showPic(this.cur_img) //顯示圖片方法,注意其中圖片編號的-1處理
  }
  ImageSwiper.prototype.bindTouchEvn = function() {
    this.imgBox.addEventListener('touchstart', this.touchstart.bind(this), false)
    this.imgBox.addEventListener('touchmove', this.touchmove.bind(this), false)
    this.imgBox.addEventListener('touchend', this.touchend.bind(this), false)
         
  }
  ImageSwiper.prototype.touchstart = function(e) {
    if (this.ready_moved) {
      var touch = e.touches[0];
      this.touchX = touch.pageX;
      this.ready_moved = false;
  
    }
  
  }
  
  ImageSwiper.prototype.touchmove = function(e) {
    e.preventDefault();
    
    var minRange = this.minRange
    var touchX = this.touchX
    var imgs_count = this.imgs_count
  
    if (!this.ready_moved) {
  
      var release = e.changedTouches[0];
      var releasedAt = release.pageX;
      if (releasedAt + minRange < touchX) {
        this.ready_moved = true;
        if (this.cur_img > (imgs_count - 1)) {
          this.cur_img = 0;
        }
        this.cur_img++;
        this.showPic(this.cur_img);
  
      } else if (releasedAt - minRange > touchX) {
        if (this.cur_img <= 1) {
          this.cur_img = imgs_count + 1
        }
        this.cur_img--;
        this.showPic(this.cur_img);
        this.ready_moved = true;
      }
    }
  
  }
  
  ImageSwiper.prototype.touchend = function(e) {
      e.preventDefault();
      var minRange = this.minRange
      var touchX = this.touchX
      var imgs_count = this.imgs_count
      if (!this.ready_moved) {
        var release = e.changedTouches[0];
        var releasedAt = release.pageX;
        if (releasedAt + minRange < touchX) {
          this.ready_moved = true;
          if (this.cur_img > (imgs_count - 1)) {
            this.cur_img = 0;
          }
          this.cur_img++;
          showPic(this.cur_img);
  
        } else if (releasedAt - minRange > touchX) {
          if (this.cur_img <= 1) {
            this.cur_img = imgs_count + 1
          }
          this.cur_img--;
          showPic(this.cur_img);
          this.ready_moved = true;
        }
      }
  
    }
    //在樣式表中設置好 .fadeIn 的透明度為0
  ImageSwiper.prototype.fadeIn = function(e) {
    e.classList.add("fadeIn")
  }
  
  ImageSwiper.prototype.fadeOut = function(e) {
    Array.prototype.forEach.call(e, function(e) {
      e.className = "beautyRankingbg"
    })
  }
  
  ImageSwiper.prototype.showPic = function(cur_img) {
    this.hidePics(this.beautyRankingimgs)
      //得到圖片元素的真實索引
    var index = cur_img - 1
  
    if (document.getElementsByClassName("active")[0]) {
      var active = document.getElementsByClassName("active")[0];
      active.classList.remove("active")
    }
    console.log(this.cur_img)
    document.getElementById("dot" + index).classList.add("active");
  
    this.fadeIn(this.beautyRankingimgs[index]);
  
  }
  ImageSwiper.prototype.hidePics = function(e) {
      this.fadeOut(e)
  
    }
    //傳參
  var beautyRankingimgs = new ImageSwiper(document.getElementById('beautyRankingimgs'), 200)