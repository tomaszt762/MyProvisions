const elevatorStateMachine = Machine(
    {
      id: "elevator",
      type: "parallel",
      context:
      {
        floor: 0, // Hold floor number
        minFloor: -2, // Min floor a lift can go
        maxFloor: 10, // Max floor a lift can go
        destination: null,
        queue: [],
      },
      states:
      {
        listening:
        {
          initial: "waitingForOrder",
          states:
          {
            waitingForOrder:
            {
              on:
              {
                GO_TO_LEVEL:
                {
                  cond: (context, event) => event.destination !== null && !isNaN(event.destination) && context.queue[context.queue.length - 1] !== Number(event.destination) && context.floor !== Number(event.destination),
                  actions: assign((context, event) =>
                  {
                    if (event.destination > context.maxFloor)
                    {
                      event.destination = context.maxFloor
                    };
                    if (event.destination < context.minFloor)
                    {
                      eventi.destination = context.minFloor
                    };
                    context.queue.push(Number(event.destination));
                  })
                }
              }
            }
          }},
          running:
          {
            initial: "stopped",
            states:
            {
              stopped:
              {
                entry: assign((context) =>
                {
                  if (context.queue.length > 0)
                  {
                    context.destination = context.queue.shift();
                  }
                  else
                  {
                    context.destination = null;
                  }
                }),
                always: [
                {
                  cond: (context) => context.destination !== null && context.destination > context.floor,
                  target: "up"
                },
                {
                  cond: (context) => context.destination !== null && context.destination < context.floor,
                  target: "down"
                },
                {
                  target: "running"
                }],
                on:
                {
                  UP:
                  {
                    target: "up"
                  },
                  DOWN:
                  {
                    target: "down"
                  }
                }
              },
              up:
              {
                invoke:
                {
                  id: "upService",
                  src: (context) => (callback) =>
                  {
                    context.inc.current = setInterval(() =>
                    {
                      callback("UP");
                    }, 1000);
                  }
                },
                on:
                {
                  STOP:
                  {
                    target: "stopped"
                  },
                  UP: [
                  {
                    target: "stopped",
                    cond: (context) =>
                      context.destination === context.floor ||
                      context.maxFloor === context.floor,
                    actions: assign((context) =>
                    {
                      for (var i = context.queue.length; i--;)
                      {
                        if (context.queue[i] === context.destination)
                        {
                          context.queue.splice(i, 1);
                        }
                      };
                      context.destination = null;
                    })
                  },
                  {
                    target: "up",
                    actions: assign((context) => context.floor += 1)
                  }]
                }
              },
              down:
              {
                invoke:
                {
                  id: "downService",
                  src: (context, event) => (callback, onRecive) =>
                  {
                    context.inc.current = setInterval(() =>
                    {
                      callback("DOWN");
                    }, 1000);
                  }
                },
                on:
                {
                  STOP:
                  {
                    target: "stopped"
                  },
                  DOWN: [
                  {
                    target: "stopped",
                    cond: (context) => context.destination === context.floor || context.minFloor === context.floor,
                    actions: assign((context) =>
                    {
                      for (var i = context.queue.length; i--;)
                      {
                        if (context.queue[i] === context.destination)
                        {
                          context.queue.splice(i, 1);
                        }
                      };
                      context.destination = null;
                    })
                  },
                  {
                    target: "down",
                    actions: assign((context) => context.floor -= 1)
                  }]
                }
              }
            }
          }
        }
      });