<!-- resources/views/components/sidebar.blade.php -->
<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4">
        <h2 class="text-2xl font-semibold">AUTOCARS</h2>
    </div>
    <nav class="mt-6">
        <ul>
            <li class="px-4 py-2 hover:bg-gray-700">
                <a href="{{ route('dashboard') }}" class="block">Dashboard</a>
            </li>

            <!-- Admin-Only Sections -->
            @if(auth()->user()->role === 'admin')
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('admin.users') }}" class="block">Manage Users</a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('admin.societes.index') }}" class="block">Manage Societes</a>
                </li>
            @endif

            <!-- Societe-Only Sections -->
            @if(auth()->user()->role === 'societe')
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('societes.navettes.create') }}" class="block">Create Navette</a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('societes.navettes.index') }}" class="block">View Navettes</a>
                </li>
            @endif

            @if(auth()->user()->role === 'user')
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('navettes.index') }}" class="block">View Navettes</a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('abonnements.all') }}" class="block">My Abonnements</a>
                </li>
            @endif
        </ul>
    </nav>
</aside>
