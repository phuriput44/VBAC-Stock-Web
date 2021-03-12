<template>
    <modal name="example">This is an example</modal>
</template>

<script>
export default {
    name: 'modal',
    mounted () {
        this.$modal.show('example')
    }
}
</script>