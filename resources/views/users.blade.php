<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto bg-white rounded overflow-hidden shadow-lg hover:bg-gray-100">
            <h1 class="py-4 px-6 text-xl font-bold">Users</h1>
            <table class="w-full text-center px-4 text-sm text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-4">Nom</th>
                        <th class="px-6 py-4">Date d'inscription</th>
                        <th class="px-6 py-4">Admin</th>
                        <th class="px-6 py-4">Bannir le compte</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap capitalize">
                                {{ $user->name }}</td>
                            <td class="px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">
                                <livewire:role-checkbox :user="$user" />
                            </td>
                            <td class="px-6 py-4">
                                {{-- <livewire:user-ban :key="$user->id" :user="$user" /> --}}

                                <form action="{{ route('ban', $user->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="status" id="status" value="{{ $user->status }}">
                                    <button type="submit"
                                        class="inline-flex items-center px-6 py-1 cursor-pointer disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            class="{{ $user->status ? 'fill-red-700' : 'fill-green-700' }}">
                                            <path fill="none" d="M0 0h24v24H0V0z" />
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11H7v-2h10v2z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        Aucun utilisateur
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
