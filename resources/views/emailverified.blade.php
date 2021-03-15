<!DOCTYPE html>
<style>
.center {
    text-align: center;
}
body {
    background-color: whitesmoke;
    font-family: "Arial"
}
</style>
<script>
    function changeToLogin() {
        window.location.href = "http://127.0.0.1:8080";
    }
</script>
<body>
    <div class="center">
        <h1>E-mail verificado com sucesso!</h1><br>
        <button onclick="changeToLogin()">Realizar login</button>
    </div>
</body>
</html>