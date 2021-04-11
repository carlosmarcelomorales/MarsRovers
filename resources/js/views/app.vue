<template>
    <fragment>
        <BaseInput
            @keydown.enter="sendInstructions"
            v-model="instructions"
        />
        <span v-show="error" class="error">{{ errorMessage }}</span>
        <Board :rovers="roversInitialPosition" ref="board"/>
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
            error: false,
            currentPosition: ''
        }
    },
    mounted() {
        this.currentPosition = this.roversInitialPosition
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

                axios.post('/instructions', {
                    instructions: this.instructions,
                    cells: this.$refs.board.cells,
                    currentPosition: this.currentPosition
                })
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
    .body {
        width : 1680px;
    }
</style>
