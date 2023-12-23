document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#themphim').addEventListener('submit', function (event) {
        let isValid = checkvalidatethem();
        if (!isValid) {
            event.preventDefault(); // Ngăn form gửi đi
        }
    });
});
function checkvalidatethem() {
    let isCheck = true;
    if (document.querySelector('#tenphim').value === "") {
        document.querySelector('#result1').innerHTML = "Tên phim không để trống";
        document.querySelector('#tenphim').focus();
        return false;
    }
    else if (document.querySelector('#sotap').value === "") {
        document.querySelector('#result1').innerHTML = "Nhập Số Tập";
        document.querySelector('#sotap').focus();
        return false;
    }
    else if (document.querySelector('#mieuta').value === "") {
        document.querySelector('#result1').innerHTML = "Không được để trống";
        document.querySelector('#mieuta').focus();
        return false;
    }
    return isCheck;
}

function confirmDelete() {
    let deleteLinks = document.querySelectorAll('a.delete-link');

    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            let confirmed = confirm('Bạn chắc chắn muốn xóa không?');

            if (confirmed) {
                window.location.href = this.getAttribute('href');
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', function() {
    confirmDelete();
    showPass();
    document.querySelector("#suanguoidung").addEventListener('click',function(){
        let isValid = validatesua();
        if (!isValid) {
            event.preventDefault(); // Ngăn form gửi đi
        }
    });
});

function showPass(){
    const passwordField = document.querySelector('#passwordField');
    const showPassword = document.querySelector('#showPassword');

    showPassword.addEventListener('change', function () {
        if (showPassword.checked) {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    });
}
function validatesua() {
    let isChecksua = true;
    if (document.querySelector('#email').value === "") {
        document.querySelector('#resultsua').innerHTML = "Nhập email";
        document.querySelector('#email').focus();
        return false;
    } else {
        var email = document.querySelector("#email").value;
        var regExp = /\S+@\S+\.\S+/;
        if (!regExp.test(email)) {
            document.querySelector('#resultsua').innerHTML = "Email không hợp lệ!";
            document.querySelector('#email').focus();
            return false;
        }
    }
    return isChecksua;
}
