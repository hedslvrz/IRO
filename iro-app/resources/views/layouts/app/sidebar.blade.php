<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky class="bg-gray-50 border-r border-gray-200 pb-4">
            <flux:sidebar.toggle class="lg:hidden text-gray-500 hover:text-gray-700" icon="bars-3" inset="left" />

            {{-- 1. IRO BRANDING & SEAL --}}

                {{-- IRO Seal Image --}}
                <img src="{{ asset('images/IMG_0518.PNG') }}" alt="WMSU IRO Seal" class="h-10 w-10 object-contain bg-white rounded-full p-0.5 shadow-sm border border-gray-200">

                <div class="flex flex-col">
                    <span class="text-xl font-extrabold text-red-900 leading-tight tracking-wide">WMSU IRO</span>
                    <span class="text-xs text-gray-500 font-semibold uppercase tracking-widest mt-0.5">Admin Portal</span>
                </div>


            {{-- 2. MAIN NAVIGATION --}}
            <flux:navlist variant="outline" class="px-3">

                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>

                <flux:navlist.group heading="Website Content" class="text-red-900/60 font-bold text-[11px] uppercase tracking-wider mt-6 mb-1 px-2">
                    <flux:navlist.item icon="globe-alt" :href="route('home-settings.edit')" :current="request()->routeIs('home-settings.*')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                        {{ __('Home Page') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="information-circle" :href="route('about.edit')" :current="request()->routeIs('about.*')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                        {{ __('About Us') }}
                    </flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="IRO Operations" class="text-red-900/60 font-bold text-[11px] uppercase tracking-wider mt-6 mb-1 px-2">
                    <flux:navlist.item icon="academic-cap" :href="route('izn-programs.index')" :current="request()->routeIs('izn-programs.*')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                        {{ __('IZN Programs') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="academic-cap" :href="route('colleges.index')" :current="request()->routeIs('colleges.*')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                        {{ __('Academics') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="academic-cap" :href="route('admin.sdgs.index')" :current="request()->routeIs('admin.sdgs.*')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                        {{ __('Sustainability') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="academic-cap" :href="route('admin.news.index')" :current="request()->routeIs('admin.news.*')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                        {{ __('News & Info') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="briefcase" :href="route('global-affairs.index')" :current="request()->routeIs('global-affairs.*')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                        {{ __('Global Affairs') }}
                    </flux:navlist.item>
                </flux:navlist.group>

            </flux:navlist>

            <flux:spacer />

            {{-- 3. USER & SETTINGS --}}
            <flux:navlist variant="outline" class="px-3 border-t border-gray-200 pt-4 mt-4 bg-gray-50/50">
                <flux:navlist.item icon="cog-6-tooth" href="{{ route('profile.edit') }}" :current="request()->routeIs('profile.*')" class="text-gray-600 hover:text-red-800 hover:bg-red-50 data-current:bg-red-800 data-current:text-white transition-all duration-200" wire:navigate>
                    {{ __('Settings') }}
                </flux:navlist.item>

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:navlist.item icon="arrow-right-start-on-rectangle" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-600 hover:text-red-800 hover:bg-red-50 transition-all duration-200">
                        {{ __('Log Out') }}
                    </flux:navlist.item>
                </form>
            </flux:navlist>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
