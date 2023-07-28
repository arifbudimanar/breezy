<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button
            class="inline-flex items-center text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400  hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
            </svg>
        </button>
    </x-slot>

    <x-slot name="content">
        @unless (request()->routeIs('admin.users.edit'))
        <x-dropdown-link :href="route('admin.users.edit', $user)">
            {{ __('Edit') }}
        </x-dropdown-link>
        @endunless
        @if ($user->is_admin == true)
        <form action="{{ route('admin.users.removeadmin', $user) }}" method="Post">
            @csrf
            @method('PATCH')
            <x-dropdown-link :href="route('admin.users.removeadmin', $user)"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Remove Admin') }}
            </x-dropdown-link>
        </form>
        @else
        <form action="{{ route('admin.users.makeadmin', $user) }}" method="Post">
            @csrf
            @method('PATCH')
            <x-dropdown-link :href="route('admin.users.makeadmin', $user)"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Make Admin') }}
            </x-dropdown-link>
        </form>
        @endif
        @if ($user->is_verified)
        <form action="{{ route('admin.users.unverify', $user) }}" method="Post">
            @csrf
            @method('PATCH')
            <x-dropdown-link :href="route('admin.users.unverify', $user)"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Unverify Account') }}
            </x-dropdown-link>
        </form>
        @else
        <form action="{{ route('admin.users.verify', $user) }}" method="Post">
            @csrf
            @method('PATCH')
            <x-dropdown-link :href="route('admin.users.verify', $user)"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Verify Account') }}
            </x-dropdown-link>
        </form>
        @endif
        <form action="{{ route('admin.users.resetpassword', $user) }}" method="Post">
            @csrf
            @method('PATCH')
            <x-dropdown-link :href="route('admin.users.resetpassword', $user)"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Reset Password') }}
            </x-dropdown-link>
        </form>
        <form action="{{ route('admin.users.destroy', $user) }}" method="Post">
            @csrf
            @method('DELETE')
            <x-dropdown-link :href="route('admin.users.destroy', $user)"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Delete Account') }}
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>