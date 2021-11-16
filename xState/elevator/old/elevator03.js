const elevatorMachine = Machine({
    id: 'elevator',
    initial: 'idle',
    context: {
        totalFloors: 5,
        currentFloor: 0,
        destination: null,
        queue: []
    },
    states: {
        idle: {
            entry: assign((context) => {
                context.destination = null
            }),
            after: {
                // after  5 second,
                5000: {
                    target: 'nextStopChecking'
                }
            }
        },
        nextStopChecking: {
            entry: assign((context) => {
                if (context.queue[0] !== undefined) {
                    context.destination = context.queue.shift();
                } else {
                    context.destination = null;
                }
            }),
            on: {
                '': [{
                        target: 'idle',
                        cond: (context) => context.destination === null
                    }, {
                        target: 'movingUp',
                        cond: (context) => context.destination > context.currentFloor
                    }, {
                        target: 'movingDown',
                        cond: (context) => context.destination < context.currentFloor
                    }, {
                        target: 'idle'
                    }
                ]
            }
        },
        movingUp: {
            invoke: {
                // Invoke a service when we enter in 'up' state, it will pass 'UP' event to the machine every second
                id: 'upService',
                src: (context) => (callback) => {
                    context.inc.current = setInterval(() => {
                        callback('UP');
                    }, 1000);
                }
            },
            on: {
                STOP: {
                    target: 'stopped'
                },
                UP: [{
                        // Transition to 'stopped' state if current floor is either the passed destination or the top floor
                        target: 'stopped',
                        cond: (context) => (context.destination === context.currentFloor || context.totalFloors === context.currentFloor)
                    }, {
                        // Else Go to 'up' state
                        target: 'movingUp',
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
                id: 'downService',
                src: (context, event) => (callback, onRecive) => {
                    context.inc.current = setInterval(() => {
                        callback('DOWN');
                    }, 1000);
                }
            },
            on: {
                STOP: {
                    target: 'stopped'
                },
                DOWN: [{
                        // Transition to 'stopped' state if current floor is either the passed destination or the bottom floor
                        target: 'stopped',
                        cond: (context) => (context.destination === context.currentFloor || context.totalFloors === context.currentFloor)
                    }, {
                        target: 'movingDown',
                        actions: assign((context) => {
                            context.currentFloor -= 1;
                        }),
                    }
                ]
            }
        },
        stopped: {
            //let destination = context.queue.sort(function(a, b){return a - b})[0];
            after: {
                // after 6 second
                6000: {
                    target: 'nextStopChecking'
                }
            }
        },
        newCall: {
            cond: (context, event) => (Number(event.destination) !== (context.queue[queue.length - 1] && Number(event.destination) !== context.currentFloor)),
            // target: 'nextStopChecking',
            actions: assign((context, event) => context.queue.push(Number(event.destination)))
        }
    },

});
