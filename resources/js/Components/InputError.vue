<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="text-xs text-red-400 mt-px">
            {{ message }}
        </p>
    </div>
</template>
