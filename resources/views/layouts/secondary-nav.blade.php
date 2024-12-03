<nav class="border-b">        
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
    <x-nav-link :href="route('hips.index')" :active="request()->routeIs('hips.index')">Hip</x-nav-link>
    <x-nav-link :href="route('knees.index')" :active="request()->routeIs('knees.index')">Knee</x-nav-link>
    <x-nav-link :href="route('shoulders.index')" :active="request()->routeIs('shoulders.index')">Shoulder</x-nav-link>
</nav>