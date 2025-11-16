<x-dashboard-layout :title="'Profil Pengguna'">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Profile</h1>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
            <p class="text-gray-700 dark:text-gray-200 mb-2">
                <strong>Username:</strong> {{ $user->username }}
            </p>
            <p class="text-gray-700 dark:text-gray-200 mb-2">
                <strong>Email:</strong> {{ $user->email }}
            </p>
            <p class="text-gray-700 dark:text-gray-200">
                <strong>Role:</strong> {{ $user->role ?? 'User' }}
            </p>
        </div>
    </div>
</x-dashboard-layout>