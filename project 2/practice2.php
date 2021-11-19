<html>
<body>
    <form action = "project2handelPOST.php" method = "GET">
        <label>Username: </label>
        <input type = "text" name = "username">

        <br>

        <label>Password: </label>
        <input type = "password" name = "password">

        <br>

        <label>Email: </label>
        <input type = "email" name = "email">

        <br>

        <label>Job: </label>
        <select name = "job">
            <option value = "driver">Driver</option>
            <option value = "teacher">Teacher</option>
            <option value = "engineer">Engineer</option>
        </select>

        <br>

        <label>Gender: </label>
        <input type = "radio" name = "Gender" id = "Male" value = "Male">
        <label for = "Male">Male</label>
        <input type = "radio" name = "Gender" id = "Female" value = "Female">
        <label for = "Female">Female</label>
        
        <br>

        <label>Operating Systems: </label>
        <input type = "checkbox" id = "Windows" name = "system[]" value = "Windows">
        <label for = "Windows">Windows</label>
        <input type = "checkbox" id = "Mac" name = "system[]" value = "Mac">
        <label for = "Mac">Mac</label>
        <input type = "checkbox" id = "Linux" name = "system[]" value = "Linux">
        <label for = "Linux">Linux</label>

        <br>

        <label>Terms and Agreement</label>
        <input type = "checkbox" name = "termCheck" required>

        <br>

        <input type = "submit" value = "submit">

    </form>
</body>
</html>