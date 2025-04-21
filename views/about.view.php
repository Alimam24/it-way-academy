<?php view('partials/head.php'); ?>
<link rel="stylesheet" href=<?= style('main.css') ?>>
<link rel="stylesheet" href=<?= style('headFN.css') ?>>


<?php view('partials/nav.php') ?>

<main class="content" style="padding:0px ;">
    <div class="bg-gray-100 font-poppins">

        <!-- Hero Section -->
        <section class="relative h-screen bg-cover bg-center flex items-center justify-center text-white text-center"
            style="background-image: url('img/img.jpg');">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            <div class="relative z-10 max-w-2xl px-6">
                <h1 class="text-5xl font-bold">About Us</h1>
                <p class="mt-4 text-lg">Empowering learners with expert-led IT courses since 2003.</p>
            </div>
        </section>

        <!-- Who We Are -->
        <section class="container mx-auto py-16 px-6 text-gray-800">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-blue-600 mb-4">Who We Are</h2>
                    <p class="text-lg">Welcome to IT Way Academy, your ultimate destination for mastering IT skills. We are
                        a team of industry experts and educators committed to delivering high-quality online courses.</p>
                    <p class="mt-4 text-lg">Our mission is to equip learners of all levels with the knowledge they need to
                        excel in the tech-driven world.</p>
                </div>
                <img src="img\it.jpg" alt="Who We Are"
                    class="rounded-lg shadow-lg">
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="bg-blue-50 py-16 px-6">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-600 mb-6">Why Choose Us</h2>
                <div class="grid md:grid-cols-3 gap-10">
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                        <h3 class="text-xl font-semibold text-gray-800">🚀 Expert Instructors</h3>
                        <p class="mt-2 text-gray-600">Courses designed by industry-leading professionals.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                        <h3 class="text-xl font-semibold text-gray-800">📚 Comprehensive Curriculum</h3>
                        <p class="mt-2 text-gray-600">Stay updated with the latest IT trends and technologies.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                        <h3 class="text-xl font-semibold text-gray-800">🌍 Flexible Learning</h3>
                        <p class="mt-2 text-gray-600">Learn at your own pace, anytime, anywhere.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- What We Do -->
        <section class="container mx-auto py-16 px-6 text-gray-800">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold text-blue-600">What We Do</h2>
                <p class="mt-4 text-lg">At IT Way Academy, we provide accessible, engaging, and high-quality IT education.
                    Our platform features interactive courses, hands-on projects, and a vibrant community to support your
                    learning journey.</p>
            </div>
        </section>

    </div>

</main>
<?php view('partials/footer.php') ?>