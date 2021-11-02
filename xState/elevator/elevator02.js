//


import { assign, createMachine, interpret } from "xstate";
const elevatorMachine = Machine({
    id: 'elevator',
    initial: 'idle',
    context: {
        totalFloors: 5,
        currentFloor: 0,
        destonation: null,
        queue = []
    },
    states: {
        idle: {
            entry: assign((context) => {
                context.destination = null;
            }),
            on: {
                FLOORCHOSEN: 'nextStopChecking'
            }
        },
        nextStopChecking: [{
                cond: (context, event) => event.destination > context.currentFloor,
                target: "movingUp",
                actions: assign(
                    (context, event) => (context.destination = Number(event.destination)))

            }, {
                cond: (context, event) => event.destination < context.currentFloor,
                target: "movingDown",
                actions: assign(
                    (context, event) =>
                    (context.destination = Number(event.destination)))
            }, {
                target: 'idle'
            }
        ],
        movingUp: {
            invoke: {
                // Invoke a service when we enter in 'up' state, it will pass 'UP' event to the machine every second
                id: "upService",
                src: (context) => (callback) => {
                    context.inc.current = setInterval(() => {
                        callback("UP");
                    }, 1000);
                }
            },
            on: {
                STOP: {
                    target: "stopped"
                },
                UP: [{
                        // Transition to 'stopped' state if current floor is either the passed destination or the top floor
                        target: "stopped",
                        cond: (context) =>
                        context.destination === context.currentFloor ||
                        context.totalFloors === context.currentFloor
                    }, {
                        // Else Go to 'up' state
                        target: "movingUp",
                        actions: assign((context) => {
                            context.currentFloor += 1;
                        })
                    }
                ]
            }
        },
        movingDown: {
            invoke: {
                // Invoke a service when we enter in 'down' state, it will pass 'DOWN' event to the machine every second
                id: "downService",
                src: (context, event) => (callback, onRecive) => {
                    context.inc.current = setInterval(() => {
                        callback("DOWN");
                    }, 1000);
                }
            },
            on: {
                STOP: {
                    target: "stopped"
                },
                DOWN: [{
                        // Transition to 'stopped' state if current floor is either the passed destination or the bottom floor
                        target: "stopped",
                        cond: (context) =>
                        context.destination === context.currentFloor ||
                        context.totalFloors === context.currentFloor
                    }, {
                        target: "movingDown",
                        actions: assign((context) => {
                            context.floor -= 1;
                        }),
                    }
                ]
            }
        },
        stopping: {
            after: {
                // after  5 second,
                5000: {
                    target: 'doorOppening'
                }
            }
        },
        doorOppening: {
            after: {
                // after  5 second,
                5000: {
                    target: 'stopped'
                }
            }
        },
        stopped: {
            
         //   exit: set next destonation from a queue
    
            after: {
                // after 60 second
                60000: {
                    target: 'doorClosing'
                }
            }

        },
        doorClosing: {
            after: {
                // after  5 second,
                5000: {
                    target: 'nextStopChecking'
                }
            }
        }
    }
});

const service = interpret(machine).onTransition((state) => {
console.log(state.value, state.context);
});

service.start();

//service.send("TOGGLE");
