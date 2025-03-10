<div class="w-64 h-screen bg-gray-800 text-white p-4">
            <h2 class="text-4xl font-bold mb-10">Admin Panel</h2>
            <ul class="mt-4">
                <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 hover:bg-gray-700">Dashboard</a></li>
                <li><a href="{{ route('dashboard') }}" class="block py-2 px-3 hover:bg-gray-700">home</a></li>
                <li><a href="{{ route('profile.edit') }}" class="block py-2 px-3 hover:bg-gray-700">Profile</a></li>
                <li><a href="{{ route('admin.CategoryEdit') }}" class="block py-2 px-3 hover:bg-gray-700">Edit Category</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 hover:bg-gray-700">Edit User</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 hover:bg-gray-700">Show User</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 hover:bg-gray-700">About</a></li>

            </ul>
        </div>