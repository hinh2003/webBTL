document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#rep').addEventListener('click', function (event) {
        let isValid = checkvalidate();
        if (!isValid) {
            event.preventDefault();
        }
    });
   
});
document.querySelector("#formdangky").addEventListener("submit", function (event) {
    event.preventDefault();
    const selectedAccount = document.querySelector("#ten").value;
    fetch(`/fages/moudles/xuly.php?ten=${selectedAccount}&email=${document.querySelector("#email").value}&password=${document.querySelector("#password").value}`)
        .then(response => response.text())
        .then(data => {
            document.querySelector("#result").innerHTML = data;
            document.querySelector("#ten").value = "";
            document.querySelector("#email").value = "";
            document.querySelector("#password").value = "";
            document.querySelector("#r-password").value = "";
        })
        .catch(error => {
            console.error('Error:', error);
        });
});



function checkvalidate() {
    let isCheck = true;
    let username = document.querySelector('#ten').value;
    let password = document.querySelector('#password').value;
    let rpassword = document.querySelector('#r-password').value;

    if (username === "") {
        document.querySelector('#result').innerHTML = "Tên đăng nhập không để trống";
        document.querySelector('#ten').focus();
        return false;
    } else if (username.length <= 6) {
        document.querySelector('#result').innerHTML = "Tên đăng nhập phải hơn 6 ký tự";
        document.querySelector('#ten').focus();
        return false;
    }else if(username.includes(' ')){
        document.querySelector('#result').innerHTML = "Tên đăng nhập không được chứa khoảng trắng";
        document.querySelector('#ten').focus();
        return false;
    }else if (document.querySelector('#email').value === "") {
        document.querySelector('#result').innerHTML = "Nhập email";
        document.querySelector('#email').focus();
        return false;
    } else {
        var email = document.querySelector("#email").value;
        var regExp = /\S+@\S+\.\S+/;
        if (!regExp.test(email)) {
            document.querySelector('#result').innerHTML = "Email không hợp lệ!";
            document.querySelector('#email').focus();
            return false;
        }
    }
    if (password === "") {
        // Kiểm tra mật khẩu không để trống
        document.querySelector('#result').innerHTML = "Password không để trống";
        document.querySelector('#password').focus();
        return false;
    } else if (password.length < 6) {
        // Kiểm tra độ dài mật khẩu (hơn 6 ký tự)
        document.querySelector('#result').innerHTML = "Mật khẩu phải có ít nhất 6 ký tự";
        document.querySelector('#password').focus();
        return false;
    } else if (!/[A-Z]/.test(password)) {
        // Kiểm tra xem mật khẩu có chứa ít nhất một chữ in hoa hay không
        document.querySelector('#result').innerHTML = "Mật khẩu phải chứa ít nhất một chữ in hoa";
        document.querySelector('#password').focus();
        return false;
    } else if (rpassword === "") {
        // Kiểm tra xác nhận mật khẩu không để trống
        document.querySelector('#result').innerHTML = "Nhập lại mật khẩu";
        document.querySelector('#r-password').focus();
        return false;
    } else if (password !== rpassword) {
        // Kiểm tra xem mật khẩu và xác nhận mật khẩu có trùng khớp không
        document.querySelector('#result').innerHTML = "Mật khẩu không trùng nhau";
        return false;
    }    
    return isCheck;

}

