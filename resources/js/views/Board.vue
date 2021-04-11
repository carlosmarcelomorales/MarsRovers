<template>
    <div id="game">
    </div>
</template>

<script>
    export default {
        props: {
            rovers: {
                type: Number,
                required: true
            }
        },
        data () {
            return {
                totalCells : 400,
                cells: []
            }
        },
        mounted: function () {
            let cell;
            let h;
            let game = document.getElementById('game');

            for(let i = 1; i <= this.totalCells; i ++)
            {

                let isRover = false;
                cell = document.createElement("div")
                cell.classList.add("cell");
                cell.setAttribute('data-cell', i);
                cell.textContent += i;

                game.append(cell);

                if (i == this.rovers) {
                    cell.classList.add("rovers");
                    isRover = true;
                }

                let randNumber = Math.floor(Math.random() * 20) + 1;
                let isObstacle = (randNumber > 18) ? true: false;

                if (isRover)
                    isObstacle = false;

                if (isObstacle) {
                    cell.classList.add("obstacle");
                }

                this.cells.push({
                    id: i,
                    isObstacle : isObstacle
                })

            }

            h = document.getElementsByClassName("cell")[0].offsetWidth;

            var cells = document.getElementsByClassName('cell')
            for (var i = 0; i < cells.length; i++) {
                cells.item(i).style.height = h;
                cells.item(i).style.lineHeight = h + 'px';

            }

        },
        methods: {
        }
    }
</script>

<style>
    .cell{
        width:4.8%;
        float:left;
        text-align:center;
        border: 1px solid #000;
    }
    .obstacle {
        background: black;
    }
    .rovers {
        background: green;
    }
</style>
