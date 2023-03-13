//------------------------------------Menu-item-------------------
const toP = document.querySelector(".top")
window.addEventListener("scroll",function(){
    const X = this.scrollY;
  if(X>1){toP.classList.add("active")}
  else {
      toP.classList.remove("active")
  }
})
//------------------------------------Menu-SLIDEBAR-CARTEGORY-------------------
const itemSlidebar = document.querySelectorAll(".cartegory-left-li")
itemSlidebar.forEach(function(menu,index){
    menu.addEventListener("click",function(){
        menu.classList.toggle("block")
    })
})