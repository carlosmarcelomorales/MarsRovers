<template>
    <fragment>
        <BaseInput
            @keydown.enter="sendInstructions"
            v-model="instructions"
        />
        <span v-show="error" class="error">{{ errorMessage }}</span>
        <Board :rovers="roversInitialPosition" />
    </fragment>
</template>
<script>
import Board from "./Board";
import BaseInput from "./BaseInput";
import axios from "axios";

const default_layout = "default";

export default {
    components: {BaseInput, Board},
    computed: {},
    data() {
        return {
            roversInitialPosition: 131,
            instructions: '',
            errorMessage: '',
            error: false
        }
    },
    watch: {
        instructions() {
            this.error = false;
        }
    },
    methods: {
        sendInstructions() {
            const trimmedText = this.instructions.trim()
            if (trimmedText) {
                axios.post('/instructions', {instructions: this.instructions})
                    .then(response => {
                        if (!response.data.success) {
                            this.error = true;
                            this.errorMessage = response.data.errorMessage;

                        }
                    });
            }

        }
    }
};
</script>
<style>
    .error {
        color: red;
    }
</style>
