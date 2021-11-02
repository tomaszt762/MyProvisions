var Elevator = (function Elevator() {

  var floors = 10,
  queue = [],
  current = 1, 
  isMoving = false,
  destination;

  // This gets the floor being clicked and adds it to the queue
  // if the elevator is stationary and the floor is not the current floor,
  // or if the elevator is in motion and the floor is not the most recently requested floor.
  // It also sets the elevator in motion if a floor was added to the queue.
  function getFloors(event) {
    event.preventDefault();
    destination = $(this).attr('href');
    console.log(destination);
    var repeatedFloor = isMoving ? queue[queue.length - 1] : current;
    if (destination !== repeatedFloor){
      queue.push(destination);
      if (!isMoving) {
        isMoving = true;
	      setTimeout(moveFloors, 3000);
      }
      console.log(queue);
    }
  }

  // This completes a move for the elevator (sets the current floor)
  // and either halts the elevator or continues its motion to the
  // next floor in the queue.
  function moveFloors() { 
    console.log(queue);
    current = queue.shift();
    console.log("moved to floor " + current);
    if (queue[0] !== undefined) {
      setTimeout(moveFloors, 3000);
    } else {
      isMoving = false;
    }
  }

  // this acts as a controller
  // for all events and how and what we bind them to
  function bindEvents() {
    $('.btn').on('click', getFloors);
  }
  // this runs the bind events
  // and only runs the bind events
  function init(){
    bindEvents();
  }
  // this makes the init method public for invoking
  return {
    init: init()
  };
})();

  console.log = function(message) {
    document.getElementById('log').innerHTML = message;
}

Elevator.init();