const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

// SHOW SIDEBAR
menuBtn.addEventListener("click", () => {
    sideMenu.style.display = "block";
});

// CLOSE SIDEBAR
closeBtn.addEventListener("click", () => {
    sideMenu.style.display = "none";
});

// const openEdit = () => {
//     document.getElementById("button-edit").click();
// };
$("li").click(function () {
    $(this).addClass("active").siblings().removeClass("active");
});