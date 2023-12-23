<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src = "/js/js.js"></script>
<div class="login-page">
    <div class="form">
        <h3>Đăng Nhập</h3>
        <form id="formdangnhap" action="fages/moudles/xulydangnhap.php">
            <input type="text" id="tendangnhap" name="tendangnhap" placeholder="Tên đăng nhập"/>
            <input type="password" id="paswworddangnhap" name="paswworddangnhap" placeholder="password"/>
            <input type="submit" name="dangnhap" id="dangnhap">
            <p id="resultketqua"></p>
            <p class="message">Not registered? <a href="index.php?quanly=dangki&query=trangchu">Create an account</a></p>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded",function(){
        document.querySelector("#dangnhap").addEventListener('click',function(event){
            let check =checkvalidateLogin();
            if(!check){
                event.preventDefault();
            }
        })
    });
    function checkvalidateLogin() {
    let username = document.querySelector('#tendangnhap').value;
    let password = document.querySelector('#paswworddangnhap').value;
    if (username === "") {
        document.querySelector('#resultketqua').innerHTML = "Tên đăng nhập không để trống";
        document.querySelector('#tendangnhap').focus();
        return false;
    }
    if (password === "") {
        document.querySelector('#resultketqua').innerHTML = "Password không để trống";
        document.querySelector('#paswworddangnhap').focus();
        return false;
    }
    return true;
}
document.querySelector("#formdangnhap").addEventListener("submit", function (event) {
        event.preventDefault();
        const selectedAccount = document.querySelector("#tendangnhap").value;
        fetch(`/fages/moudles/xulydangnhap.php?tendangnhap=${selectedAccount}&paswworddangnhap=${document.querySelector("#paswworddangnhap").value}`)
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "Sai tên đăng nhập" || data.trim() === "Sai Mật khẩu") {
        document.querySelector("#resultketqua").innerHTML = data;
    } else {
        window.location.href = "/index.php?quanly=trangchu&query=trangchu";
    }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
