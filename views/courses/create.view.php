<?php view('partials/head.php'); ?>
<link rel="stylesheet" href=<?= style('main.css') ?>>
<link rel="stylesheet" href=<?= style('headFN.css') ?>>


<?php view('partials/nav.php') ?>

<main class="content">

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-[#000016] text-white p-6 text-center">
                <h2 class="text-3xl font-semibold">Create a New Course</h2>
                <p class="text-gray-300">Fill out the form below to add a new course.</p>
            </div>
            
            <div class="p-8">
                <form action="#" method="post" enctype="multipart/form-data" class="space-y-6">
                    <!-- Course Title -->
                    <div>
                        <label class="block font-semibold">Course Title</label>
                        <input type="text" name="title" class="w-full p-3 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <!-- Course Duration -->
                    <div>
                        <label class="block font-semibold">Duration (weeks)</label>
                        <input type="number" name="duration" class="w-full p-3 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <!-- Course Price -->
                    <div>
                        <label class="block font-semibold">Price ($)</label>
                        <input type="number" name="price" step="0.01" class="w-full p-3 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <!-- Course Description -->
                    <div>
                        <label class="block font-semibold">Course Description</label>
                        <textarea name="c_description" rows="4" class="w-full p-3 mt-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    
                    <!-- Image Upload -->
                    <div>
                        <label class="block font-semibold">Course Image</label>
                        <div class="w-full p-6 border-dashed border-2 border-gray-300 rounded-lg text-center cursor-pointer" id="drop-area">
                            <input type="file" name="image" accept="image/*" class="hidden" id="file-input" required>
                            <p class="text-gray-500">Drag & Drop an image or <span class="text-blue-500 underline cursor-pointer" id="file-label">Browse</span></p>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">Create Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
    const fileInput = document.getElementById('fileInput');
    const imagePreview = document.getElementById('imagePreview');
    const dropArea = document.querySelector('.file-drop-area');

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    dropArea.addEventListener('click', () => fileInput.click());
</script>
</body>

</main>
<?php view('partials/footer.php') ?>