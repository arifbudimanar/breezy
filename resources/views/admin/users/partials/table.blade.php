<div class="relative overflow-x-visible overflow-y-visible mt-6 rounded-md hidden md:block">
    <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Name') }}
                </th>
                <th scope="col" class="hidden px-6 py-3 xl:table-cell">
                    {{ __('Email') }}
                </th>
                <th scope="col" class="hidden px-6 py-3 lg:table-cell">
                    {{ __('Role') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Option') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-100 even:dark:bg-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        <div class="flex">
                            <a href="{{ route('admin.users.show', $user) }}" class="hover:underline whitespace-nowrap">
                                {{ $user->name }}
                            </a>
                            <div class="ml-1 flex items-center">
                                @if ($user->isUserVerified())
                                    <x-badge.verified-account />
                                @else
                                    <x-badge.unverified-account />
                                @endif
                            </div>

                            {{-- <p class="lg:hidden text-base font-light">{{ $user->email }}</p> --}}
                        </div>
                        <div class="flex text-base xl:hidden text-gray-500 dark:text-gray-400 ">
                            <p>
                                {{ $user->email }}
                            </p>
                            <div class="ml-1 flex items-center">
                                @if ($user->isEmailVerified())
                                    <x-badge.verified-email />
                                @else
                                    <x-badge.unverified-account />
                                @endif
                            </div>
                        </div>
                        <div class="lg:hidden">
                            @if ($user->is_admin)
                                <x-badge.admin />
                            @else
                                <x-badge.user />
                            @endif
                        </div>
                    </td>
                    <td scope="row"
                        class="px-6 py-4 font-medium text-gray-500 dark:text-gray-400 hidden xl:table-cell">
                        <div class="flex">
                            <p>
                                {{ $user->email }}
                            </p>
                            <div class="ml-1 flex items-center">
                                @if ($user->isEmailVerified())
                                    <x-badge.verified-email />
                                @else
                                    <x-badge.unverified-account />
                                @endif
                            </div>
                        </div>

                    </td>
                    <td class="hidden px-6 py-4 lg:table-cell">
                        @if ($user->is_admin)
                            <x-badge.admin />
                        @else
                            <x-badge.user />
                        @endif
                    </td>
                    <td class="pl-6 py-4">
                        <div class="flex justify-items-start">
                            {{-- <a href="{{ route('admin.users.edit', $user) }}"
                            class="hover:underline">Edit</a> --}}
                            @include('admin.users.partials.action')
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="bg-white dark:bg-gray-800">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200">
                        Empty
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
