const elevatorStateMachine = Machine({
    id: "elevator",
    initial: "stopped",
    context: {
        floor: 1, // Hold floor number
        minFloor: -2, // Min floor a lift can go
        maxFloor: 10, // Max floor a lift can go
        destination: null,
        queue: [],
    },
    states: {
        stopped: {
            always: [{
                    actions: "getFromQueue"
                }, {
                    cond: (context) => context.destination !== undefined || context.destination > context.floor,
                    target: "up"
                }, {
                    cond: (context) => context.destination !== undefined || context.destination < context.floor,
                    target: "down"
                }, {
                    target: "stopped"
                }
            ],
            on: {
                GO_TO_LEVEL: {
                    cond: (context, event) => context.queue[context.queue.length - 1] !== Number(event.destination) && context.floor !== Number(event.destination),
                    target: "stopped",
                    actions: "addToQueue"
                },
                UP: {
                    target: "up"
                },
                DOWN: {
                    target: "down"
                }
            }
        },
        up: {
            invoke: {
                id: "upService",
                src: (context) => (callback) => {
                    context.inc.current = setInterval(() => {
                        callback("UP");
                    }, 1000);
                }
            },
            exit: "clearQueue",
            on: {
                STOP: {
                    target: "stopped"
                },
                UP: [{
                        target: "stopped",
                        cond: (context) =>
                        context.destination === context.floor ||
                        context.maxFloor === context.floor
                    }, {
                        target: "up",
                        actions: "goUp"
                    }
                ]
            }
        },
        down: {
            invoke: {
                id: "downService",
                src: (context, event) => (callback, onRecive) => {
                    context.inc.current = setInterval(() => {
                        callback("DOWN");
                    }, 1000);
                }
            },
            exit: "clearQueue",
            on: {
                STOP: {
                    target: "stopped"
                },
                DOWN: [{
                        target: "stopped",
                        cond: (context) => context.destination === context.floor || context.minFloor === context.floor
                    }, {
                        target: "down",
                        actions: "goDown"
                    }
                ]
            }
        }
    }
}, {
    actions: {
        getFromQueue: assign((context) => context.destination = context.queue.shift()),
        addToQueue: assign((context, event) => context.queue.push(Number(event.destination))),
        clearQueue: assign((context) => {
            for (var i = context.queue.length; i--; ) {
                if (context.queue[i] === context.destination) {
                    context.queue.splice(i, 1);
                }
            }
        }),
        goUp: assign((context) => context.floor += 1),
        goDown: assign((context) => context.floor -= 1)
    }
});
