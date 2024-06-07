const navList = document.querySelector(".nav-list")
const hamburger = document.querySelector(".hamburger")

const changePosition = ()=>{
    navList.classList.toggle("active")
}

hamburger.addEventListener("click", ()=>{
    changePosition()
})
