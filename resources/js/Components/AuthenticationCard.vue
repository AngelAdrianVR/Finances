<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-tr from-slate-900 to-stone-700">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gradient-to-tr from-stone-700 to-stone-900 shadow-lg shadow-stone-500/100 overflow-hidden rounded-lg">
            <slot />
        </div>
    </div>
</template>
