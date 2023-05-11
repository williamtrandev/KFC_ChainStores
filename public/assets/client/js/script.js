const body = $("body"),
    sidebar = $(".my-sidebar"),
    toggle = $(".toggle"),
    searchBox = $(".search-box"),
    modeSwitch = $(".toggle-switch"),
    modeText = $(".mode-text");
$(window).scroll(() => {
    if (!sidebar.hasClass("close")) sidebar.toggleClass("close");
});
toggle.click(() => sidebar.toggleClass("close"));
modeSwitch.click(() => {
    const theme = body.hasClass("dark") ? "light" : "dark";
    localStorage.setItem("theme", theme);
    body.toggleClass("dark");
    if (body.hasClass("dark")) {
        modeText.text("Light Mode");
    } else {
        modeText.text("Dark Mode");
    }
});

$("input").attr("spellcheck", false);
const trig = $(".my-nav-bottom-link").toArray(); // Lay tat ca the nav
let lastClickElement = trig[0]; // Biến lưu lại phần tử vừa click, mặc định là trang home. Tối ưu thay vì dùng loop để duyệt và tìm
let preClickElement = trig[0]; // Biến lưu lại phần tử vừa click, mặc định là trang home. Tối ưu thay vì dùng loop để duyệt và tìm
// Gan su kien click cho cac the
trig.forEach((element) => {
    $(element).on("click", () => {
        // Xử lý trường hợp khi đang ở setting nhưng click vào setting một lần nữa thì mặc định trả lại trạng thái active ở trang hiện tại
        if (
            element === lastClickElement &&
            $(element).hasClass("has-sub-menu")
        ) {
            $(preClickElement).addClass("active");
            $(element).toggleClass("active");
            lastClickElement = preClickElement;
            return;
        }
        $(lastClickElement).removeClass("active"); // Xóa trạng thái active của thẻ đã click trước đó
        console.log("last", $(lastClickElement));
        if ($(element).hasClass("has-sub-menu")) {
            $(element).addClass("active");
        } else {
            if (!$(element).hasClass("active")) {
                $(element).addClass("active");
            }
        }
        preClickElement = lastClickElement;
        lastClickElement = element; // Ghi lại thẻ vừa click để xóa
    });
});



let numProduct = $(".num-product");
let addBtns = $(".add-product");
let minusBtns = $(".minus-product");
let productInfo = $("#product-buying");


addBtns.click((event) => {
    let tds = $(event.target).closest("tr").find("td");
    let price = parseInt(tds.last().text().replaceAll(".", ""));
    let targetInput = $(event.target).siblings('.num-product');	// Tìm ô input tương ứng
    let numProduct = parseInt(targetInput.val()) + 1;	// Tăng số lượng
    targetInput.val(numProduct); 	// Gán lại giá trị cho ô input
    let minusTarget = $(event.target).siblings('.minus-product');	// Tìm nút giảm số lượng
    $(minusTarget).removeClass("disabled");	// Xóa class disabled
    total += price;
    let tdFirst = $(event.target).closest("tr").find("td")[0]; // Lấy thẻ td đầu tiên để lấy tên sản phẩm
    let nameProduct = $(tdFirst).find(".name-product").text(); // Lấy tên của sản phẩm
    let idProduct = $(tdFirst).find(".name-product").attr("id"); // Lấy id của sản phẩm
    nameProduct = nameProduct + ` (${numProduct})`;
    // Nếu đã tồn tại thì chỉ cần đổi tên
    if (checkExist(`.${idProduct}`)) {
        $(`.${idProduct}`).text(nameProduct);
    } else {
        // Nếu không, insert vào
        let pInsert = `<p class="${idProduct}">${nameProduct}</p>`;
        productInfo.append(pInsert);
    }
    $(".price-total-ticket").text(total.toLocaleString('vi-VN') + " VND");
})
minusBtns.click((event) => {
    let minusTarget = $(event.target);	// Tìm nút giảm số lượng
    let tds = $(event.target).closest("tr").find("td");
    let price = parseInt(tds.last().text().replaceAll(".", ""));
    let targetInput = minusTarget.siblings('.num-product');	// Tìm ô input tương ứng
    let numProduct = parseInt(targetInput.val());	// Lấy giá trị ô input
    let tdFirst = $(event.target).closest("tr").find("td")[0]; // Lấy thẻ td đầu tiên để lấy tên sản phẩm
    let nameProduct = $(tdFirst).find(".name-product").text(); // Lấy tên của sản phẩm
    let idProduct = $(tdFirst).find(".name-product").attr("id"); // Lấy id của sản phẩm
    if (numProduct > 0) {	// Nếu số lượng hiện tại lớn hơn 0 thì mới làm tiếp
        numProduct = parseInt(targetInput.val()) - 1;	// Giảm giá trị số lượng
        targetInput.val(numProduct); 	// Gán lại giá trị
        total -= price;
        if (numProduct == 0) {	// Nếu số lượng là 0 thì disabled nút giảm
            minusTarget.addClass("disabled");
            $(`.${idProduct}`).remove();
        } else {
            nameProduct = nameProduct + ` (${numProduct})`;
            // Đổi tên số lượng
            $(`.${idProduct}`).text(nameProduct);
        }
        if (productInfo.find("p").length == 0) {
            productInfo.append("<p class='msg-has-no'>Chưa chọn sản phẩm nào</p>");
        }
        $(".price-total-ticket").text(total.toLocaleString('vi-VN') + " VND");
    }

})