
<h3>Вход</h3>
<form action = "/account/login" method = "POST">
    <p>Логин</p>
    <p><input type="text" name = "user_name"></p>
    <p>Пароль</p>
    <p><input type="password" name = "password"></p>
    <button type = "submit" >Вход</button>
</form>

<p><?php if(isset($message)){
    echo($message);} ?></p>
