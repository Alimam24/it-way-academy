<div class="bg-white shadow-2xl rounded-3xl p-10 w-full max-w-2xl">

    <div class="text-center mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800">Update Your Profile</h2>
        <p class="text-sm text-gray-500">Keep your info fresh & relevant!</p>
    </div>

    <form method="POST" enctype="multipart/form-data" class="space-y-6">


        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $_POST['id'] ?? '' ?>">

        <!-- Avatar Upload -->
        <div class="flex flex-col items-center">
            <div class="relative w-28 h-28 mb-3">
                <!-- Image element that will show the selected image or the existing one -->
                <img
                    id="avatarPreview"
                    src="/img/avatars/<?= $infos['avatar'] ?>"
                    alt="Avatar"
                    class="w-full h-full object-cover rounded-full border-4 border-blue-200 shadow">

                <!-- File input for avatar selection -->
                <input
                    type="file"
                    name="avatar"
                    accept="image/*"
                    class="absolute inset-0 opacity-0 cursor-pointer"
                    onchange="previewAvatar(event)">
            </div>
            <p class="text-sm text-gray-500">Click the photo to change avatar</p>
            <input type="hidden" name="existing_avatar" value="<?= $infos['avatar'] ?>">
        </div>

        <!-- First Name -->
        <div>
            <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
            <input
                type="text"
                name="firstname"
                value="<?= old('firstname') ?: $infos['firstname'] ?>"
                class="mt-1 block w-full rounded-xl border border-gray-300 p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Last Name -->
        <div>
            <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input
                type="text"
                name="lastname"
                value="<?= old('lastname') ?: $infos['lastname'] ?>"
                class="mt-1 block w-full rounded-xl border border-gray-300 p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
                type="email"
                name="email"
                value="<?= old('email') ?: $infos['email']  ?>"
                class="mt-1 block w-full rounded-xl border border-gray-300 p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Password -->
        <!-- <div>
            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input
                type="password"
                name="password"
                value=""
                class="mt-1 block w-full rounded-xl border border-gray-300 p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div> -->

        <!-- Birthday -->
        <div>
            <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthday</label>
            <input
                type="date"
                name="birthdate"
                value="<?= old('birthdate') ?: $infos['birthdate'] ?>"
                class="mt-1 block w-full rounded-xl border border-gray-300 p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Phone Number -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input
                type="tel"
                name="phone"
                value="<?= old('phone') ?: $infos['phone'] ?>"
                class="mt-1 block w-full rounded-xl border border-gray-300 p-3 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Error Messages -->
        <?php if (isset($errors)) : ?>
            <div class="text-red-500 text-sm">
                <?php foreach ($errors as $error): ?>
                    <p>* <?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Submit -->
        <div>
            <button type="submit" class="w-full bg-[#3a6cf4] hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition-all">
                Save Changes
            </button>
        </div>
    </form>
</div>


<script>
    // Function to preview the selected avatar image
    function previewAvatar(event) {
        const file = event.target.files[0];
        if (file) {
            // Create a FileReader to read the selected image
            const reader = new FileReader();

            // When the file is loaded, update the image source
            reader.onload = function(e) {
                // Get the img element and set its src attribute to the loaded file
                document.getElementById('avatarPreview').src = e.target.result;
            };

            // Read the selected file as a data URL (base64 encoded)
            reader.readAsDataURL(file);
        }
    }
</script>