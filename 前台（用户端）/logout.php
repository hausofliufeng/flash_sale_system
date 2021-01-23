<?php
session_start();
session_destroy();

echo "已成功退出<br>";
echo '<a href="../index.php">返回</a>';