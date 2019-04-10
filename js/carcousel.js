// Slow scrolling
function slowScrolling() {
  let anchors = document.querySelectorAll('a[href*="#"]')

  for (let anchor of anchors) {
    anchor.addEventListener('click', function (e) {
      e.preventDefault()

      let blockID = anchor.getAttribute('href')

      document.querySelector('' + blockID).scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    });
  };
};
slowScrolling();

// Init LGallery
let x = initLG();
function clickCard(){
  let newGoods = document.getElementsByClassName('newGood');
  for (let newGood in newGoods) {
      newGoods[newGood].addEventListener('click',function(e){
      console.log(e.currentTarget.querySelector('.imgCard'));
      e.currentTarget.querySelector('.imgCard').classList.toggle("clickleaveCard")
      e.currentTarget.querySelector('.imgCard').classList.toggle("clickCard");
    })
  }
}
clickCard();