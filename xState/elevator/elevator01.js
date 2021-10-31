import { assign, createMachine, interpret } from "xstate";



const elevatorMachine = createMachine({
  // Machine identifier
  id: 'elevator',

  // Initial state
  initial: 'idle',

  // Local context for entire machine
  context: {
    levels: 0,
    direction: 'stopped'
  },

  // State definitions
  states: {
    idle: {
      /* ... */
    },
    moving: {
      /* ... */
    },
    stopping: {
      /* ... */
    },
    doorOppening: {
      /* ... */
    },
    atFloor: {
      /* ... */
    },
    doorClosing: {
      /* ... */
    },
    nextStopChecking: {
      /* ... */
    }
  }
},
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
      /* ... */
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
