import { Machine, assign } from "xstate";

// Elevator State Machine
const elevatorStateMachine = Machine(
  {
    id: "elevator",
    initial: "stopped",
    context: {
      floor: 1, // Hold floor number
      minFloor: -2, // Min floor a lift can go
      maxFloor: 10, // Max floor a lift can go
      // If want to go on particular floor
      // We can update here or can pass DECIDE_UP_OR_DOWN event in machine like  { "type": "DECIDE_UP_OR_DOWN", "destination": 5 } )
      destination: null,
      notification: {
        // Show appropriate notification
        type: "", // Can be info/success/error
        message: ""
      }
    },
    // The elevator can be in either of the three states (stopped/up/down)
    states: {
      stopped: {
        entry: ["stopElevator", "resetDestination"], // Execute immediately after entering on stopped state (Defined in 'actions' block down)
        exit: "stopExitLog", // Execute when leaving the state (Defined in 'actions' block down)
        on: {
          UP: {
            // Transition to 'up' state if UP event is passed
            target: "up"
          },
          DOWN: {
            // Transition to 'down' state if DOWN event is passed
            target: "down"
          },
          DECIDE_UP_OR_DOWN: [
            // Decide to go up or down by the passed event destination
            {
              // Return alert message if the passed and current floors are same
              cond: (context, event) =>
                Number(event.destination) === context.floor,
              actions: assign((context) => {
                return (context.notification = {
                  type: "info",
                  message: `You are already on floor ${context.floor}`
                });
              })
            },
            {
              // Transition to 'up' state id passed floor is greater than current floor
              cond: (context, event) => event.destination > context.floor,
              target: "up",
              actions: assign(
                (context, event) =>
                  (context.destination = Number(event.destination))
              )
            },
            {
              // Else go to 'down' state
              target: "down",
              actions: assign(
                (context, event) =>
                  (context.destination = Number(event.destination))
              )
            }
          ]
        }
      },
      up: {
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
          UP: [
            {
              // Transition to 'stopped' state if current floor is either the passed destination or the top floor
              target: "stopped",
              cond: (context) =>
                context.destination === context.floor ||
                context.maxFloor === context.floor
            },
            {
              // Else Go to 'up' state
              target: "up",
              actions: "goUp"
            }
          ],
          DOWN: {
            // If we are are 'up' state and try to pass DOWN event, show a error message to stop the elevator first
            actions: assign((context) => {
              return (context.notification = {
                type: "error",
                message: "First stop the elevator"
              });
            })
          }
        }
      },
      down: {
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
          UP: {
            // If we are are 'down' state and try to pass UP event, show a error message to stop the elevator first
            actions: assign((context) => {
              return (context.notification = {
                type: "error",
                message: "First stop the elevator"
              });
            })
          },
          DOWN: [
            {
              // Transition to 'stopped' state if current floor is either the passed destination or the bottom floor
              target: "stopped",
              cond: (context) =>
                context.destination === context.floor ||
                context.minFloor === context.floor
            },
            {
              target: "down",
              actions: "goDown"
            }
          ]
        }
      }
    }
  },
  {
    actions: {
      goUp: assign((context) => {
        context.floor += 1;
      }),
      goDown: assign((context) => {
        context.floor -= 1;
      }),
      stopElevator: assign((context, event) => {
        // Don't add any notification when machine initialize (Page reloads)
        if (event.type === "xstate.init") return;
        // Update noification according to conditions
        let type = "success",
          message;
        if (context.floor === context.destination) {
          message = "Destination Arrived";
        } else if (context.floor === context.maxFloor) {
          message = "You reached on the top floor";
        } else if (context.floor === context.minFloor) {
          message = "You reached on the bottom floor";
        } else {
          type = "info";
          message = "Elevator stopped";
        }
        return (context.notification = {
          type,
          message
        });
      }),
      resetDestination: assign((context) => {
        context.destination = null;
      }),
      stopExitLog: assign((context, event) => {
        let type = "info",
          message;
        if (event.type === "UP") {
          message = "Going Up";
        } else if (event.type === "DOWN") {
          message = "Going Down";
        }
        return (context.notification = {
          type,
          message
        });
      })
    }
  }
);

export default elevatorStateMachine;
