import {
    assign,
    createMachine,
    interpret
}
from "xstate";
const smartCat = Machine(
{
  /***************************
   * Main machine definition * 
   ***************************/
  id: 'smartCat',
  context: {
    belly: 0 // Belly state, 100 means full, 0 means empty
  },
  initial: 'sleep',
  states: {
    sleep: {
      on: {
        'wake up': 'meow',
      }
    },
    meow: {
      invoke: {
        src: 'digest'
      },
      on: {
        'given toy': {
          target: 'play',
          cond: 'belly not empty'
        },
        'given food': 'eat',
        'digested': {
          actions: 'updateBelly'
        }
      },
      activities: ['meow']
    },
    play: {
      invoke: {
        src: 'digest'
      },
      on: {
        tired: 'sleep',
        bored: 'sleep',
        'digested': {
          actions: 'updateBelly'
        },
        '': {
          target: 'meow',
          cond: 'belly empty'
        }
      },
      after: {
        5000: 'sleep',
      }
    },
    eat: {
      invoke: {
        src: 'eat'
      },
      on: {
        '': {
          target: 'sleep',
          cond: 'belly full'
        },
        'no more food': {
          target: 'meow'
        },
        'eaten': {
          actions: 'updateBelly'
        }
      }
    }

  },
  // Configuration containing guards, actions, activities, ...
  // see above
  {
    guards: {
      "belly full": bellyFull,
      "belly not empty": bellyNotEmpty,
      "belly empty": bellyEmpty
    },
    activities: {
      meow
    },
    actions: {
      updateBelly
    },
    services: {
      eat,
      digest
    }
  }
}
);
/**
 * Guards
 */
const bellyFull = (context, event) => {
  return context.belly >= 100;
};

const bellyEmpty = (context, event) => {
    return context.belly <= 0;
}

const bellyNotEmpty = (context, event) => {
    return context.belly > 0;
}

/**
 * Actions
 */
const updateBelly = assign({
    belly: (context, ev) => Math.max(
        Math.min(
            context.belly+ev.value,100
        ), 0)
});

/**
 * Activities
 */
const meow = () => {
  const interval = setInterval(() => node.send({payload: "MEOW!"}), 2000);
  return () => clearInterval(interval);
};

/**
 * Services
 * see https://xstate.js.org/docs/guides/communication.html#invoking-callbacks
 */
const eat = (ctx, ev) => (cb) => {
    const id = setInterval(() => cb({
      type: 'eaten',
      value: 5
    }),500);
    return () => clearInterval(id);
};

const digest = (ctx, ev) => (cb) => {
    const id = setInterval(() => cb({
      type: 'digested',
      value: -5
    }),500);
    return () => clearInterval(id);
}

