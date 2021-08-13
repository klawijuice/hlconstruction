<template>
    <div v-if="errorForm">
        <p class="text-sm text-red-600">
            {{ errorForm[field][0] }}
        </p>
    </div>
</template>

<script>
    export default {
        props: {
            errorForm:Object,
            field:String,
        }
    }
</script>
