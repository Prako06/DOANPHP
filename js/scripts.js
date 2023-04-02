//------------------------------------Menu-item-------------------
const toP = document.querySelector(".top")
window.addEventListener("scroll", function () {
    const X = this.scrollY;
    if (X > 1) { toP.classList.add("active") }
    else {
        toP.classList.remove("active")
    }
})
//------------------------------------Menu-SLIDEBAR-CARTEGORY-------------------
const itemSlidebar = document.querySelectorAll(".cartegory-left-li")
itemSlidebar.forEach(function (menu, index) {
    menu.addEventListener("click", function () {
        menu.classList.toggle("block")
    })
})

//------------------------------------PRODUCT-------------------
const bigImg = document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img")

smallImg.forEach(function (imgItem, X) {
    imgItem.addEventListener("click", function () {
        //console.log(imgItem)
        bigImg.src = imgItem.src
    })
})

const cauHinh = document.querySelector(".cauhinh")
const chiTiet = document.querySelector(".chitiet")
if (cauHinh) {
    cauHinh.addEventListener("click", function () {
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
        document.querySelector(".product-content-right-bottom-content-cauhinh").style.display = "block"
    })
}
if (chiTiet) {
    chiTiet.addEventListener("click", function () {
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block"
        document.querySelector(".product-content-right-bottom-content-cauhinh").style.display = "none"
    })
}


const buTton = document.querySelector(".product-content-right-bottom-top")
if (buTton) {
    buTton.addEventListener("click", function () {
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("active")
    })
}