<?php
$mydb= new PDO("mysql:host=127.0.0.1;dbname=bucket;charset=utf8","root","");

$row = $mydb->query("SELECT * FROM salmon")->fetch();

//     [0] => 1
//     [1] => admin
//     [2] => 1234   
//     [id] => 1
//     [acc] => admin
//     [pw] => 1234

if($_GET['code']!=$_GET['chk']) {  //如果驗證碼不相同
    echo '
        <script>
            alert("驗證碼不一至請重新登入！");
            history.go(-1);
        </script>
    ';
}else if($_GET['acc']!=$row['acc']){ //如果帳號文字(使用者vs資料庫)不相同
    echo '
        <script>
            alert("帳號錯誤！");
            history.go(-1);
        </script>
    ';
}else if($_GET['pwd']!=$row['pw']){ //如果密碼文字(使用者vs資料庫)不相同
    echo '
        <script>
            alert("密碼錯誤！");
            history.go(-1);
        </script>
    ';
}else {
    echo "
        <script>
            alert('登入成功！');
            location.href='index.html';
        </script>
    ";
}



/*
if ($_GET['code'] != $_GET['chk']) echo '
    <script>
      alert("驗證碼不一至請重新登入！");
      history.go(-1);
    </script>
  ';
else if ($_GET['acc'] != $row['acc']) echo '
    <script>
      alert("帳號錯誤請重新登入！");
      history.go(-1);
    </script>
  ';
else if ($_GET['pwd'] != $row['pwd']) echo '
    <script>
      alert("密碼錯誤請重新登入！");
      history.go(-1);
    </script>
  ';
else echo '
  <script>
    alert("登入成功！");
    location.href="./";
  </script>
';

 */