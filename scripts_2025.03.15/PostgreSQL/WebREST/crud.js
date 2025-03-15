export async function initCRUD(entity, skip = 0, limit = 10) {
  const apiUrl = `${API_CONFIG.BASE_URL}/${entity}?skip=${skip}&limit=${limit}`;

  let response = await fetch(apiUrl);
  if (!response.ok) {
    document.getElementById("content").innerHTML = `<p>Error loading data for ${entity}</p>`;
    return;
  }

  const data = await response.json();
  if (data.length === 0 && skip > 0) {
    return initCRUD(entity, skip - limit, limit);
  }

  const columns = Object.keys(data[0] || {}).map((key) => ({
    id: key,
    name: key.charAt(0).toUpperCase() + key.slice(1),
  }));

  // Pobranie ID encji z config.js
  const idField = API_CONFIG.ID_FIELDS[entity] || columns[0].id; // Domyślnie pierwsza kolumna, jeśli nie zdefiniowano

  document.getElementById("content").innerHTML = `
    <h2>${entity}</h2>
    <div class="search-container">
      <input type="text" id="${entity}-search-id" placeholder="Enter ID..." />
      <button onclick="searchById('${entity}', '${idField}')">🔍 Search by ID</button>
    </div>
    <div id="${entity}-grid"></div>
    <button id="${entity}-prev-button" ${skip === 0 ? "disabled" : ""}>⬅️ Previous</button>
    <button id="${entity}-next-button">Next ➡️</button>
    <button id="${entity}-add-button">➕ Add New ${entity}</button>
  `;

  const grid = new gridjs.Grid({
    columns: [
      ...columns.map((col) => ({
        name: col.name,
        formatter: (cell) => {
          if (typeof cell === "boolean") {
            return gridjs.html(`<span data-value="${cell}">${cell ? "✅ Yes" : "❌ No"}</span>`);
          }
          return cell;
        },
      })),
      {
        name: "Actions",
        formatter: (cell, row) => {
          const idIndex = columns.findIndex(col => col.id === idField);
          const id = row.cells[idIndex].data;
          return gridjs.html(`
            <button onclick="editEntity('${entity}', '${id}')">✏️ Edit</button>
            <button onclick="deleteEntity('${entity}', '${id}')">🗑️ Delete</button>
          `);
        },
      },
    ],
    data: data.map((item) => columns.map((col) => item[col.id])),
    pagination: false,
    search: true,
    sort: true,
  });


  grid.render(document.getElementById(`${entity}-grid`));

  document.getElementById(`${entity}-prev-button`).onclick = () => {
    if (skip > 0) initCRUD(entity, skip - limit, limit);
  };

  document.getElementById(`${entity}-next-button`).onclick = () => {
    initCRUD(entity, skip + limit, limit);
  };

  document.getElementById(`${entity}-add-button`).onclick = () => {
    showForm(entity, columns, `${API_CONFIG.BASE_URL}/${entity}`, null);
  };
}

window.deleteEntity = async function (entity, id) {

  if (!confirm(`Are you sure you want to delete ${entity} with ID ${id}?`)) return;

  await fetch(`${API_CONFIG.BASE_URL}/${entity}/${id}`, { method: "DELETE" });
  initCRUD(entity);
};

window.editEntity = async function (entity, id) {

  const response = await fetch(`${API_CONFIG.BASE_URL}/${entity}/${id}`);
  
  if (!response.ok) {
    alert(`Error fetching ${entity} with ID ${id}`);
    return;
  }
  const data = await response.json();
  if (data.length === 0) return;
  showForm(entity, Object.keys(data).map(key => ({ id: key, name: key })), `${API_CONFIG.BASE_URL}/${entity}/${id}`, data);
};

function showForm(entity, columns, apiUrl, existingData) {
  const idField = API_CONFIG.ID_FIELDS[entity]; // Pobranie pola identyfikatora

  const formHtml = columns
    .filter(col => col.id !== idField) // Pominięcie pola ID w formularzu
    .map(
      (col) => {
        const value = existingData ? existingData[col.id] || '' : '';
        const type = typeof value === 'number' ? 'number' : 'text'; // Rzutowanie na number jeśli to liczba
        return `<label>${col.name}: <input type="${type}" name="${col.id}" value="${value}" /></label><br>`;
      }
    )
    .join("");

  document.getElementById("content").innerHTML = `
    <h2>${existingData ? "Edit" : "Add"} ${entity}</h2>
    <form id="${entity}-form">
      ${formHtml}
      <button type="submit">${existingData ? "Update" : "Create"}</button>
    </form>
  `;

  document.getElementById(`${entity}-form`).onsubmit = async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const jsonData = {};

    formData.forEach((value, key) => {
      if (key === idField) return; // Pominięcie pola ID

      const column = columns.find(col => col.id === key);
      if (!column) return;

      const originalValue = existingData ? existingData[key] : null;

      // Rzutowanie wartości
      if (originalValue !== null) {
        if (typeof originalValue === "number") {
          jsonData[key] = Number(value);
        } else if (typeof originalValue === "boolean") {
          jsonData[key] = value.toLowerCase() === "true";
        } else {
          jsonData[key] = value; // Tekst
        }
      } else {
        jsonData[key] = isNaN(value) ? value : Number(value); // Jeśli liczba, to rzutuj
      }
    });

    await fetch(apiUrl, {
      method: existingData ? "PUT" : "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(jsonData),
    });

    initCRUD(entity);
  };

}

window.searchById = async function (entity, idField) {
  const id = document.getElementById(`${entity}-search-id`).value.trim();
  if (!id) {
    alert("Please enter an ID.");
    return;
  }

  const response = await fetch(`${API_CONFIG.BASE_URL}/${entity}/${id}`);
  const data = await response.json();

  if (data.length === 0) {
    alert("No record found with this ID.");
    return;
  }

  const detailsHtml = Object.entries(data)
    .map(([key, value]) => `<p><strong>${key}:</strong> ${value}</p>`)
    .join("");

  document.getElementById("content").innerHTML = `
    <h2>Record Details (ID: ${id})</h2>
    ${detailsHtml}
    <button id="back-button">⬅ Back</button>
    <button id="edit-button">✏️ Edit</button>
    <button id="delete-button">🗑️ Delete</button>
  `;

  document.getElementById("back-button").onclick = () => initCRUD(entity);
  document.getElementById("edit-button").onclick = () => editEntity(entity, id);
  document.getElementById("delete-button").onclick = () => deleteEntity(entity, id);
};
