<form method="POST" action="?">
    <input type="text" name="name" placeholder="Benutzername" />
    <select name="class" id="class">
        <option value="D20">D20</option>
        <option value="D19">D19</option>
        <option value="D18">D18</option>
        <option value="D17">D17</option>
    </select>
    <input type="submit" value="Absenden" />
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['name'];
        $class = $_POST['class'];
        if ($username == ''){
            echo 'Bitte einen Namen angeben';
        }
        else{

            echo "Hallo {$username} aus der Klasse {$class}";
        }
        
    }
?>