<?php view('partials/head.php') ?>
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body class="bg-[#000016] text-white">

    <!-- logo -->
    <nav class="fixed top-0 flex justify-start px-8 w-full h-24 items-center ">
        <?php view('partials/logo.php') ?>
    </nav>

    <!-- Login Form -->
    <div class="flex justify-center items-center min-h-screen bg-opacity-60 bg-[#000016]">
        <div class="bg-[#1E1E2D] p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-semibold text-center mb-6">Create Your Account</h2>
            <form method="post" action="/register">
                <div class="mb-4">
                    <label class="block text-sm mb-1" for="first-name">First Name</label>
                    <input 
                    type="text" 
                    name="firstn"
                    value='<?=$_POST['firstn']?? ''?>' 
                    class="w-full p-2 rounded bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[#60A5FA]" >
                </div>
                <div class="mb-4">
                    <label class="block text-sm mb-1" for="last-name">Last Name</label>
                    <input 
                    type="text" 
                    name="lastn"
                    value='<?=$_POST['lastn']?? ''?>' 
                    class="w-full p-2 rounded bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[#60A5FA]" >
                </div>
                <div class="mb-4">
                    <label class="block text-sm mb-1" for="email">Email</label>
                    <input 
                    type="email" 
                    name="email" 
                    value='<?=$_POST['email']?? ''?>'
                    class="w-full p-2 rounded bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[#60A5FA]" >
                </div>
                <div class="mb-4">
                    <label class="block text-sm mb-1" for="password">Password</label>
                    <input 
                    type="password" 
                    id="password"
                    name="password"
                    value='<?=$_POST['password']?? ''?>'
                    class="w-full p-2 rounded bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[#60A5FA]" >
                </div>
                <?php if (isset($errors)) : ?>
                    <div class="text-red-500 text-xs mt-0 mb-2">
                        <?php foreach ($errors as $error): ?>
                            <p>* <?= htmlspecialchars($error) ?></p>
                        <?Php endforeach; ?>
                    </div>
                <?php endif; ?>
                <button type="submit" class="w-full bg-[#60A5FA] hover:bg-[#60A5FA]/80 text-white font-semibold py-2 rounded">Register</button>
            </form>
            <p class="text-sm text-center mt-4">Already have an account? <a href="/login" class="text-[#60A5FA] hover:underline">Login</a></p>
        </div>
    </div>
</body>

</html>