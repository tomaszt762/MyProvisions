//


import { assign, createMachine, interpret } from "xstate";



const elevatorMachine = createMachine(
{
  id: 'elevator',
  initial: 'idle',
  context: {
    totalFloors: 30,
    currentFloor: 0,
    destination: 0,
    direction: 0, //-1, 0, 1
    queueUp: [],
    queueDown: []
  },
  states: {
    idle: {
      on: {
        FLOORCHOSEN: 'moving'
      }
    },
    moving: {
      initial: 'nextStopChecking',
      states: {
        nextStopChecking: {
          on: {
           '': [
          { target: '.movingUp', cond: elevatorIsBelow },
          { target: '.movingDown', cond: elevatorIsAbove }
          { target: 'idle'}
        ]
             }
        },
        movingUp: {
          on: {
            //* elevatorCloseToDestonation: 'stopping'
          }
        },
        movingDown: {
          on: {
            //* elevatorCloseToDestonation: 'stopping'
          }
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
            target: 'atFloor'
          }
        }
      },
      atFloor: {
/*on 
FLOORCHOSEN: 'moving'
ISLOADED
ISMAXIMUM
ISEMPTY

*/
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
            target: 'moving'
          }
        }
      },

    }
  }
,
{
    actions: {
      
    },
    activities: {
      /* ... */
    },
    delays: {
      /* ... */
    },
    guards: {
     
    elevatorIsBelow: (context, event) => {
        return context.currentFloor < context.chosenFloor;
      },
    elevatorIsAbove: (context, event) => {
        return context.currentFloor > context.chosenFloor;
      },
    /*searchValid: (context, event) => {
        return context.canSearch && event.query && event.query.length > 0;
      }*/
    },
    services: {
      /* ... */
    }
  }
);

const service = interpret(machine).onTransition((state) => {
console.log(state.value, state.context);
});

service.start();

//service.send("TOGGLE");
