const contentElement = document.getElementById("content");

async function loadEntity(entity) {
  contentElement.innerHTML = `<h2>Loading ${entity}...</h2>`;

  const { initCRUD } = await import("./crud.js");
  initCRUD(entity);
}
