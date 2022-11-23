<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen bg-stone-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mt-8 bg-stone-700 overflow-hidden shadow sm:rounded-lg divide-y-2 rounded-lg">
                    
                    <div class="p-6 border-l-4 stroke-neutral-500">
                        <div class="flex items-center justify-center">
                            <i class="fa-solid fa-wallet text-4xl text-gray-400"></i>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-300">
                                Registra tus finanzas personales.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-l-4 stroke-neutral-500">
                        <div class="flex items-center justify-center">
                            <i class="fa-solid fa-coins text-4xl text-gray-400"></i>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-300">
                                Archiva Ingresos y Egresos 
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-l-4 stroke-neutral-500">
                        <div class="flex items-center justify-center">
                            <i class="fa-solid fa-money-bill-trend-up text-4xl text-gray-400"></i>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-300">
                                Aumenta tus ingresos 
                            </div>
                        </div>
                    </div> 
            </div>
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="mt-8 bg-stone-700 overflow-hidden shadow sm:rounded-lg divide-y-2 rounded-lg">
                            <div class="p-6 border-l-4 stroke-neutral-500">
                        <div class="flex items-center justify-between">
                            <i class="fa-solid fa-user text-2xl text-gray-400"></i>
                            <i class="fa-solid fa-address-card text-2xl text-gray-400"></i>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-300 text-left flex justify-between">
                                <Link :href="route('login')" class="text-lg text-gray-300 underline">Entrar</Link> 
                                 <Link v-if="canRegister" :href="route('register')" class="ml-4 text-lg text-gray-300 underline">Registrar</Link>
                            </div>
                        </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</template>
