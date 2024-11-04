<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form with Dropdown</title>
</head>
<body>
    <h1>Input Form</h1>
    <form action="2.php" method="GET">
        <label for="userInput">Enter something:</label>
        <input type="text" id="userInput" name="userInput" required>
        
        <label for="options">Choose an option:</label>
        <select id="options" name="options" required>
            <option value="">--Select an option--</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>
        
        <button type="button" onclick="alert('Button clicked!')">Click Me</button>
        <input type="submit" value="Submit">
    </form>
</body>
</html>