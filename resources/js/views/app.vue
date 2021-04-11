<template>
    <fragment>
        <BaseInput
            v-model="instructions"
            @keydown.enter="sendInstructions"
            :disabled="disabled"
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
            currentPosition: '',
            disabled: false
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
                this.disabled = true;
                axios.post('/instructions', {
                    instructions: this.instructions,
                    cells: this.$refs.board.cells,
                    currentPosition: this.currentPosition
                })
                .then(response => {
                    if (!response.data.success) {
                        this.error = true;
                        this.errorMessage = response.data.errorMessage;
                    } else {
                        this.moveRover(response.data.newPath)

                        this.instructions = '';
                        this.disabled = false;
                    }

                });
            }

        },
        async moveRover(newPath) {
            let self = this;

            newPath.map(function (newPosition,index) {
                window.setTimeout(function(){
                    document.querySelector("[data-cell='" + self.currentPosition + "']").classList.remove('rovers')
                    self.currentPosition = newPosition;
                    document.querySelector("[data-cell='" + self.currentPosition + "']").classList.add('rovers')
                }, index * 1500);
            });
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
