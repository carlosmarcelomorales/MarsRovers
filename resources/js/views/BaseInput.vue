<template>
    <fragment>
        <label>
            Insert instructions and press Enter
        </label>
        <input type="text"
               class="input"
               name="instructions"
               v-on="listeners"
        >
    </fragment>

</template>

<script>
    export default {
        computed: {
            listeners () {
                return {
                    // Pass all component listeners directly to input
                    ...this.$listeners,
                    // Override input listener to work with v-model
                    input: event => this.$emit('input', event.target.value)
                }
            }
        }
    }

</script>

<style scoped>
    .input {
        margin: 20px 0;
        display: block;
        width: 30%
    }
</style>
