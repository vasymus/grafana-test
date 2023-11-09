<script setup lang="ts">
const serverResponse = ref<string|null>(null)

onMounted(async () => {
    let response = await fetch('http://localhost:9000')

    serverResponse.value = await response.text()
})
</script>

<template>
    <div>
        <h1>Nuxt js</h1>
        <p>Response from php server:</p>
        <pre>{{serverResponse}}</pre>
    </div>
</template>
