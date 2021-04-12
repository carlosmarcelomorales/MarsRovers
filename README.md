

## How to start

Simply execute the command: 

```
make init
```

and this will build the docker images and start running containers. After this, go to 

[http://localhost::8080](http://localhost::8080)


## How to use it

The Rovers will always start at the position 131, by default. Obstacles are generated randomly. If you introduce a
sequence that it's not correct, the program will abort it.

For introducing sequences, you need to use the input on the top of the page. Valid sequences:

- F (Forward): The Rovers will move to the North.
- B (Back): The Rovers will move to the South.
- L (Left): The Rovers will move to the West.
- R (Right): The Rovers will move to the East.

