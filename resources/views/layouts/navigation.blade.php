<div class="flex items-center">
    <nav x-data="{ open: false }">
    <!-- Settings Dropdown -->
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center leading-4 text-white hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                    <x-fas-bars class="w-6 h-6"/>                
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('questionnaire')">
                    Questionnaire
                </x-dropdown-link>
 
                <x-dropdown-link :href="route('dashboard')">
                    Submissions
                </x-dropdown-link>

            @if(auth()->user()->is_admin)
                <x-dropdown-link :href="route('consultants.index')">
                    Consultants
                </x-dropdown-link>

                <x-dropdown-link :href="route('users.index')">
                    Users
                </x-dropdown-link>                
            @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </nav>
</div>