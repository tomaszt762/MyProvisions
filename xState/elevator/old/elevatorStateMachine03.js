const elevatorStateMachine = Machine({
  id: "elevator",
  initial: "stopped",
  context: {
    floor: 0, // Hold floor number
    minFloor: -2, // Min floor a lift can go
    maxFloor: 10, // Max floor a lift can go
    destination: null,
    queue: [],
  },
  states: {
    stopped: {

      on: {
        "": [{
          cond: (context) => context.destination !== null && context.destination !== undefined && context.destination > context.floor,
          target: "up",
          //acction: assign((context) => {if (context.destination > context.maxFloor) {context.destination = context.maxFloor}})
        }, {
          cond: (context) => context.destination !== null && context.destination !== undefined && context.destination < context.floor,
          target: "down",
          //acction: assign((context) => {if (context.destination < context.minFloor) {context.destination = context.minFloor}})
        }],
        GO_TO_LEVEL: {
          cond: (context, event) => event.destination !== null && context.queue[context.queue.length - 1] !== Number(event.destination) && context.floor !== Number(event.destination),
          target: "stopped",
          actions: assign((context, event) => {
            context.queue.push(Number(event.destination));
            context.destination = context.queue.shift()
          })
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
      exit: assign((context) => {
        for (var i = context.queue.length; i--;) {
          if (context.queue[i] === context.destination) {
            context.queue.splice(i, 1);
          }
        };
        //context.destination = null;
      }),
      on: {
        STOP: {
          target: "stopped"
        },
        UP: [{
          target: "stopped",
          cond: (context) =>
            context.destination === context.floor ||
            context.maxFloor <= context.floor
        }, {
          target: "up",
          actions: assign((context) => context.floor += 1)
        }]
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
      exit: assign((context) => {
        for (var i = context.queue.length; i--;) {
          if (context.queue[i] === context.destination) {
            context.queue.splice(i, 1);
          }
        };
        //context.destination = null;
      }),
      on: {
        STOP: {
          target: "stopped"
        },
        DOWN: [{
          target: "stopped",
          cond: (context) => context.destination === context.floor || context.minFloor >= context.floor
        }, {
          target: "down",
          actions: assign((context) => context.floor -= 1)
        }]
      }
    }
  }
});
