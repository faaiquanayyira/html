<html>
<body>

<?php

$students = array("Nayyira", "Faariha", "Sinu", "Sahva", "Nafla");

echo "Original Array:<br>";
print_r($students);

asort($students);
echo "<br><br>Ascending Order (asort):<br>";
print_r($students);

arsort($students);
echo "<br><br>Descending Order (arsort):<br>";
print_r($students);

?>


</body>
</html>
