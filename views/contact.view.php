<?php view('partials/head.php'); ?>
<link rel="stylesheet" href=<?= style('main.css') ?>>
<link rel="stylesheet" href=<?= style('headFN.css') ?>>


<?php view('partials/nav.php') ?>
<main class="content">

    <div class="bg-aliceblue min-h-screen flex items-center justify-center p-6">
        <div class="max-w-6xl w-full grid lg:grid-cols-2 gap-10 bg-white p-8 rounded-2xl shadow-lg">
            <!-- Left Section -->
            <div>
                <h1 class="text-4xl font-bold text-[#000016]">Con<span class="text-[#3a6cf4]">nect</span> with Our Team of Experts</h1>
                <p class="text-gray-600 mt-4">Empowering Your IT Journey with Comprehensive Online Learning Resources.</p>

                <div class="mt-6 space-y-4">
                    <a href="tel:+9639-877-392" class="flex items-center text-[#3a6cf4] font-semibold space-x-2">
                        <span>📞</span> <span>+9639-877-392</span>
                    </a>
                    <a href="mailto:way@way.com" class="flex items-center text-[#3a6cf4] font-semibold space-x-2">
                        <span>✉</span> <span>way@way.com</span>
                    </a>
                    <a href="#" class="flex items-center text-[#3a6cf4] font-semibold space-x-2">
                        <span>📍</span> <span>See Our Locations</span>
                    </a>
                </div>

                <div class="mt-8">
                    <h2 class="text-2xl font-semibold">Want to Join Our Family?</h2>
                    <a href="#" class="inline-block mt-3 bg-[#3a6cf4] text-white py-2 px-5 rounded-lg font-medium shadow-md hover:bg-blue-700">TELL US ABOUT YOU →</a>
                </div>

                <img src="img/contact.jpg" class="w-full mt-6 rounded-xl shadow-md">
            </div>

            <!-- Right Section (Form) -->
            <div class="bg-[#000016] text-white p-8 rounded-xl">
                <form method='post' action='/contact' class="space-y-5">
                    <div>

                        <label
                            for="firstn"
                            class="block text-sm font-medium">First Name</label>

                        <input
                            type="text"
                            name='firstn'
                            placeholder="First Name"
                            value='<?= $_POST['firstn'] ?? '' ?>'
                            class="w-full mt-1 p-3 rounded-lg border border-gray-300 text-black focus:ring-2 focus:ring-[#3a6cf4]">

                    </div>

                    <div>
                        <label
                            for="lastn"
                            class="block text-sm font-medium">Last Name</label>

                        <input
                            type="text"
                            name="lastn"
                            placeholder="Last Name"
                            value='<?= $_POST['lastn'] ?? '' ?>'
                            class="w-full mt-1 p-3 rounded-lg border border-gray-300 text-black focus:ring-2 focus:ring-[#3a6cf4]">

                    </div>

                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium">Email Address</label>

                        <input
                            type="email"
                            name="email"
                            placeholder="Email Address"
                            value='<?= $_POST['email'] ?? '' ?>'
                            class="w-full mt-1 p-3 rounded-lg border border-gray-300 text-black focus:ring-2 focus:ring-[#3a6cf4]">

                    </div>

                    <div>
                        <label
                            for="phone"
                            class="block text-sm font-medium">Phone Number</label>

                        <input
                            type="tel"
                            name="phone"
                            placeholder="Phone Number"
                            value='<?= $_POST['phone'] ?? '' ?>'
                            class="w-full mt-1 p-3 rounded-lg border border-gray-300 text-black focus:ring-2 focus:ring-[#3a6cf4]">

                    </div>

                    <div>
                        <label
                            for="country"
                            class="block text-sm font-medium">Country</label>

                        <input
                            type="text"
                            name="country"
                            placeholder="where do you live?"
                            value='<?= $_POST['country'] ?? '' ?>'
                            class="w-full mt-1 p-3 rounded-lg border border-gray-300 text-black focus:ring-2 focus:ring-[#3a6cf4]">

                    </div>

                    <div>
                        <label
                            for="expertise"
                            class="block text-sm font-medium">What expertise are you asking for?</label>

                        <select
                            name="expertise"
                            value='<?= $_POST['expertise'] ?? '' ?>'
                            class="w-full mt-1 p-3 rounded-lg border border-gray-300 text-black focus:ring-2 focus:ring-[#3a6cf4]">

                            <option value="">Select</option>
                            <option value="programming">Programming</option>
                            <option value="AI">AI</option>
                            <option value="networks">Networks</option>
                        </select>
                    </div>

                    <div>
                        <label
                            for="content"
                            class="block text-sm font-medium">Message</label>

                        <textarea
                            name="content"
                            placeholder="Leave your message here"
                            class="w-full mt-1 p-3 rounded-lg border border-gray-300 text-black h-32 resize-none focus:ring-2 focus:ring-[#3a6cf4]"><?= $_POST['content'] ?? '' ?>
                    </textarea>
                    </div>

                    <?php if (isset($errors)) : ?>
                        <div class="text-red-500 text-xs mt-0 mb-0">
                            <?php foreach ($errors as $error): ?>
                                <p>* <?= htmlspecialchars($error) ?></p>
                            <?Php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <button
                        type="submit"
                        class="w-full bg-[#3a6cf4] hover:bg-blue-600 text-white py-3 rounded-lg font-semibold flex justify-center items-center gap-2">SUBMIT →
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php view('partials/footer.php') ?>