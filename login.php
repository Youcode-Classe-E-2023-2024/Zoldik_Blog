<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Link to Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <h2 class="text-2xl font-semibold text-center mb-4">Login</h2>
        <form>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full border rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                <div class="mt-2">
                    <a href="#" class="text-blue-500 text-sm hover:underline">Forgot Password?</a>
                </div>
            </div>
            <button type="submit" name="login" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
        </form>
        <div class="mt-4 text-center">
            <p class="text-gray-600 text-sm">Don't have an account? <a href="#" class="text-blue-500 hover:underline">Sign Up</a></p>
        </div>
    </div>
</body>

</html>