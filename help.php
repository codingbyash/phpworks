<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Calculator</title>  
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>  
<body class="bg-gray-100 flex items-center justify-center min-h-screen">  
    <form method="post" action="" class="bg-white p-8 rounded-lg shadow-lg w-80">  
        <div class="mb-4">
            <label for="first" class="block text-gray-700 font-bold mb-2">Enter the first number:</label>  
            <input type="number" id="first" name="num1" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">  
        </div>
        <div class="mb-4">
            <label for="second" class="block text-gray-700 font-bold mb-2">Enter the second number:</label>  
            <input type="number" id="second" name="num2" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">  
        </div>  
        <div class="flex space-x-2">
            <input type="submit" name="operation" value="Add" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">
            <input type="submit" name="operation" value="Subtract" class="w-full bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition">
        </div>
        <div class="flex space-x-2 mt-2">
            <input type="submit" name="operation" value="Multiply" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition">
            <input type="submit" name="operation" value="Divide" class="w-full bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition">
        </div>
    </form>  
      
    <?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $n1 = $_POST["num1"]; 
        $n2 = $_POST["num2"]; 
        $op = $_POST["operation"];

        switch ($op) {  
            case "Add":  
                $result = $n1 + $n2;  
                echo "<h1 class='text-center text-2xl mt-4'>Result: $result</h1>";  
                break;  
            case "Subtract":  
                $result = $n1 - $n2;  
                echo "<h1 class='text-center text-2xl mt-4'>Result: $result</h1>";  
                break;
            case "Multiply":  
                $result = $n1 * $n2;  
                echo "<h1 class='text-center text-2xl mt-4'>Result: $result</h1>";  
                break;  
                
            case "Divide":  
                if ($n2 != 0) {  
                    $result = $n1 / $n2;  
                    echo "<h1 class='text-center text-2xl mt-4'>Result: $result</h1>";  
                } else {  
                    echo "<h1 class='text-center text-2xl mt-4 text-red-500'>Error: Division by zero is not allowed.</h1>"; 
                }  
                break;  
            default:  
                echo "<h1 class='text-center text-2xl mt-4 text-red-500'>Error: Invalid operation.</h1>";
                break;  
        }  
    }  
    ?>  
</body>  
</html>
