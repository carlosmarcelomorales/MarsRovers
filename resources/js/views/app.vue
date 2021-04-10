<template>
    <div>
        <Board :rovers="roversInitialPosition" />
    </div>
</template>
<script>
import Board from "./Board";
const default_layout = "default";

export default {
    components: {Board},
    computed: {},
    data() {
        return {
            roversInitialPosition: 131,
        }
    }
};
</script>
