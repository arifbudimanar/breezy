<div class="gap-5 mt-6 grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 md:hidden">
    @forelse ($users as $user)
        <x-subcard.app>
            <x-subcard.title>
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <a href="{{ route('admin.users.show', $user) }}"
                            class="text-lg font-medium text-gray-900 dark:text-gray-100 hover:text-indigo-600 hover:dark:text-indigo-400">
                            {{ $user->name }}
                        </a>
                        @if ($user->is_verified)
                            <p class="ml-1 flex items-center">
                                <x-badge.verified-account />
                            </p>
                        @else
                            <p class="ml-1 flex items-center">
                                <x-badge.unverified-account />
                            </p>
                        @endif
                    </div>
                    <div class="ml-auto">
                        @include('admin.users.partials.action')
                    </div>
                </div>
            </x-subcard.title>
            <p class="mt-2 text-base text-gray-500 dark:text-gray-400 flex items-center">
                {{ $user->email }}
                @if ($user->email_verified_at)
                    <x-badge.verified-email />
                @endif
            </p>
            <p class="mt-2 text-base text-gray-500 dark:text-gray-400 flex items-center">
                @if ($user->is_admin)
                    <x-badge.admin />
                @else
                    <x-badge.user />
                @endif
            </p>
        </x-subcard.app>
    @empty
        <div>
            <p class="text-gray-500 dark:text-gray-400">
                {{ __('Data Not Found') }}
            </p>
        </div>
    @endforelse
</div>
