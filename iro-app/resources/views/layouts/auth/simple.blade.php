<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <div class="flex flex-col items-center justify-center mb-8 text-center">
                    <a href="/" wire:navigate class="flex flex-col items-center group">
                        <img src="{{ asset('images/IMG_0518.PNG') }}" alt="WMSU IRO Seal" class="w-20 h-20 object-contain mb-3 drop-shadow-sm group-hover:scale-105 transition-transform duration-300">
                        <span class="text-2xl font-extrabold text-red-900 tracking-tight leading-none">WMSU</span>
                    </a>
                </div>
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
