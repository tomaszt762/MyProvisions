const menuElement = document.getElementById("menu");

API_CONFIG.ENTITIES.forEach((entity) => {
  const menuItem = document.createElement("a");
  menuItem.href = "#";
  menuItem.textContent = `Manage ${entity}`;
  menuItem.onclick = () => loadEntity(entity);
  menuElement.appendChild(menuItem);
});
