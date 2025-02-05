// Función para obtener los estudiantes
function getStudents() {
    fetch('http://localhost:8000/api/students')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#students-table tbody');
            tableBody.innerHTML = ''; // Limpia la tabla antes de agregar nuevos datos

            data.data.forEach(student => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${student.id}</td>
                    <td>${student.name}</td>
                    <td>${student.email}</td>
                    <td>
                        <button onclick="deleteStudent(${student.id})">Eliminar</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error al cargar los estudiantes:', error));
}

// Función para eliminar un estudiante
function deleteStudent(id) {
    fetch(`http://localhost:8000/api/students/${id}`, {
        method: 'DELETE',
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        getStudents(); // Recarga los estudiantes
    })
    .catch(error => console.error('Error al eliminar el estudiante:', error));
}

// Función para agregar un nuevo estudiante
document.getElementById('add-student-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;

    fetch('http://localhost:8000/api/students', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            name: name,
            email: email,
            phone: '',
            age: 0,
            password: '',
            sex: ''
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        getStudents(); // Recarga los estudiantes
    })
    .catch(error => console.error('Error al agregar el estudiante:', error));
});

// Carga los estudiantes al cargar la página
window.onload = getStudents;
