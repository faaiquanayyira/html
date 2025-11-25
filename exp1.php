<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  $u=trim($_POST["user"]);
  $e=trim($_POST["email"]);
  $p=$_POST["pass"];
  $c=$_POST["confirm"];
  if($u && $e && $p && $c && $p===$c)
    echo "<p style='color:green;text-align:center;'>Registered!</p>";
  else
    echo "<p style='color:red;text-align:center;'>Fill all fields correctly</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body{font-family:Arial;text-align:center;padding:50px;}
form{display:inline-block;padding:20px;border:1px solid #ccc;border-radius:8px;}
input{display:block;margin:10px auto;padding:8px;width:200px;}
input[type=submit]{background:#4CAF50;color:#fff;border:none;cursor:pointer;}
input[type=submit]:hover{background:#388E3C;}
.error{color:red;font-size:12px;height:12px;}
</style>
<script>
function check(f){
  let v=f.value.trim(),e=document.getElementById(f.name+"Err"); e.textContent="";
  if(f.name=="user"&&v.length<3)e.textContent="Min 3 chars";
  if(f.name=="email"&&!/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(v))e.textContent="Invalid email";
  if(f.name=="pass"&&v.length<6)e.textContent="Min 6 chars";
  if(f.name=="confirm"&&v!==document.querySelector("[name=pass]").value)e.textContent="Not matching";
}
</script>
</head>
<body>
<h2>Register</h2>
<form method="post">
  <input type="text" name="user" placeholder="Username" oninput="check(this)"><div id="userErr" class="error"></div>
  <input type="email" name="email" placeholder="Email" oninput="check(this)"><div id="emailErr" class="error"></div>
  <input type="password" name="pass" placeholder="Password" oninput="check(this)"><div id="passErr" class="error"></div>
  <input type="password" name="confirm" placeholder="Confirm Password" oninput="check(this)"><div id="confirmErr" class="error"></div>
  <input type="submit" value="Register">
</form>
</body>
</html>

