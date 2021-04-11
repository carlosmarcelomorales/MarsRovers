<template>
    <fragment>
        <label>
            Insert instructions and press Enter
        </label>
        <input type="text"
               class="input"
               :value="value"
               v-on="listeners"
               :disabled="disabled"
        >
    </fragment>

</template>

<script>
    export default {
        props: {
            disabled: {
                type: Boolean,
                required: true
            },
            value: {
                type: String,
                default: '',
            }
        },
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
