

## How to start

Simply execute the command: 

```
make init
```

and this will download the Docker images and run composer and npm and will start the containers. After this, go to 

[http://localhost:8080/](http://localhost:8080/)

## Stop the program

Use the next command:
```
make stop
```

Using the next one, will stop the Docker and also will remove all the containers:

```
make remove
```

## How to use it

The Rovers will always start at the position 131, by default. Obstacles are generated randomly. If you introduce a
sequence that it's not correct, the program will abort it.

For introducing sequences, you need to use the input on the top of the page. Valid sequences:

- F (Forward): The Rovers will move to the North.
- B (Back): The Rovers will move to the South.
- L (Left): The Rovers will move to the West.
- R (Right): The Rovers will move to the East.


## Tests

For executing the tests, execute the command:

```
php artisan serve
```

Should appear: 9 tests in green. <br>
For this program, we tested 3 different classes. Rovers, Instructions, and the most important one: MoveRoversService.
This last one is the service in charge of moving our Rovers.

You can also execute this classs individualy with the next commands:

```
php artisan test --filter RoversTest
php artisan test --filter InstructionsTest
php artisan test --filter MoveRoversServiceTest
```
