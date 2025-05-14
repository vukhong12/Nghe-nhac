window.onload = function () {
    const navbar = document.getElementById('navbar');  // Lấy thẻ <nav> (hoặc <ul>)

    navbar.addEventListener('click', function (event) {
        // Tìm phần tử <li> gần nhất mà ta nhấn vào (bao gồm cả nhấn vào các phần tử con)
        const clickedItem = event.target.closest('li');

        if (clickedItem) {
            const menuItems = navbar.querySelectorAll('li');  // Lấy tất cả thẻ <li> trong navbar

            // Loại bỏ lớp 'active' khỏi tất cả các mục <li>
            menuItems.forEach(item => item.classList.remove('active'));

            // Thêm lớp 'active' vào <li> được nhấn
            clickedItem.classList.add('active');

            // Hiển thị thông tin vào bảng console
            console.log('Bạn đã nhấn vào mục: ' + clickedItem.innerText.trim());
        }
    });
};
