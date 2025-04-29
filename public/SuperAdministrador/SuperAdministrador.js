window.onload = function () {
    showBienvenida(); // Mostrar la vista de bienvenida al cargar la página
};
// para la bienvenida de la pagina
function showBienvenida() {
    // Ocultar todas las secciones
    document.querySelectorAll('.section').forEach(section => {
        section.style.display = 'none';
    });

    // Mostrar la sección de bienvenida
    document.getElementById('bienvenida').style.display = 'block';
}



// Mostrar la sección seleccionada
function showSection(id) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => section.style.display = 'none');

    document.getElementById(id).style.display = 'block';
}

//mostrar la informacion que esta ne el icono de usuario
function showUserInfo() {
    const userInfo = document.getElementById('user-info');
    userInfo.innerHTML = `
        <h3>Información del Usuario</h3>
        <p><strong>Nombre:</strong> Juan Pérez</p>
        <p><strong>Email:</strong> juan.perez@example.com</p>
        <p><strong>Rol:</strong> Superadministrador</p>
    `;
    userInfo.style.display = 'block'; // Mostrar el contenedor

    // Detener la propagación del evento para que no se cierre al hacer clic en el ícono
    userInfo.addEventListener('click', (e) => e.stopPropagation());
}

// Ocultar la información al hacer clic fuera del ícono o del contenedor
document.addEventListener('click', (e) => {
    const userInfo = document.getElementById('user-info');
    const iconLink = document.querySelector('.icon-link');

    // Verificar si el clic no ocurrió en el ícono o en el contenedor
    if (!userInfo.contains(e.target) && !iconLink.contains(e.target)) {
        userInfo.style.display = 'none'; // Ocultar el contenedor
    }
});

//los datos de las estadisticas se actulicen automaticamente cada 5 segundos
function updateStats() {
    const stats = {
        plantas: 50,
        usuarios: 10,
        movimientos: 120
    };

    document.querySelector('#analisis .stats').innerHTML = `
        <div class="stat">
            <h3>${stats.plantas}</h3>
            <p>Plantas Registradas</p>
        </div>
        <div class="stat">
            <h3>${stats.usuarios}</h3>
            <p>Usuarios Activos</p>
        </div>
        <div class="stat">
            <h3>${stats.movimientos}</h3>
            <p>Movimientos Recientes</p>
        </div>
    `;
}

// Llamar a la función al cargar la página o al mostrar la sección
document.addEventListener('DOMContentLoaded', updateStats);

// ---------------------------------------------__-----------------------------------------------------
// logica paraeliminar una planta
function openDeletePlantaModal() {
    openModal('modal-eliminar-planta'); // Asegúrate de que el ID coincida con el modal en el HTML

    const confirmButton = document.getElementById('modal-confirm');
    confirmButton.onclick = () => {
        // Lógica para eliminar la planta
        console.log('Planta eliminada');

        // Mostrar el mensaje de confirmación
        const confirmationMessage = document.getElementById('confirmation-message');
        if (confirmationMessage) {
            confirmationMessage.style.display = 'block';

            // Ocultar el mensaje después de unos segundos
            setTimeout(() => {
                confirmationMessage.style.display = 'none';
            }, 3000);
        }

        // Cerrar el modal
        closeModal('modal-eliminar-planta');
    };
}

function openModal(action, message, confirmCallback) {
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modal-title');
    const modalMessage = document.getElementById('modal-message');
    const confirmButton = document.getElementById('modal-confirm');

    // Configurar el contenido del modal
    modalTitle.textContent = action;
    modalMessage.textContent = message;

    // Asignar la función de confirmación al botón
    confirmButton.onclick = () => {
        confirmCallback(); // Ejecutar la función de confirmación
    };

    // Mostrar el modal
    modal.style.display = 'flex';
}

function closeModal() {
    const modal = document.getElementById('modal');
    if (modal) {
        modal.style.display = 'none';
    }
    
}
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'flex';
    } else {
        console.error(`No se encontró un modal con el ID: ${modalId}`);
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    } else {
        console.error(`No se encontró un modal con el ID: ${modalId}`);
    }
}


// --------------------------------------------__-----------------------------------------------------
//logica para eliminar una receta
function openDeleteRecetaModal() {
    openModal('modal-eliminar-receta'); // Asegúrate de que el ID coincida con el modal en el HTML

    const confirmButton = document.getElementById('modal-confirm-receta');
    confirmButton.onclick = () => {
        // Lógica para eliminar la receta
        console.log('Receta eliminada');

        // Mostrar el mensaje de confirmación
        const confirmationMessage = document.getElementById('confirmation-message-receta');
        if (confirmationMessage) {
            confirmationMessage.style.display = 'block';

            // Ocultar el mensaje después de unos segundos
            setTimeout(() => {
                confirmationMessage.style.display = 'none';
            }, 3000);
        }

        // Cerrar el modal
        closeModal('modal-eliminar-receta');
    };
}
// ---------------------------------------------------------------------------------------------------
// Manejar el envío del formulario paar agragar informacion de las plantas
document.getElementById('form-subir-planta').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío por defecto

    // Obtener los valores del formulario
    const nombre = document.getElementById('nombre-planta').value;
    const nombreCientifico = document.getElementById('nombre-cientifico').value;
    const descripcion = document.getElementById('descripcion-planta').value;
    const beneficios = document.getElementById('beneficios-planta').value;
    const urlImagen = document.getElementById('imagen-planta').value;

    // Aquí puedes enviar los datos al servidor o procesarlos
    console.log({
        nombre,
        nombreCientifico,
        descripcion,
        beneficios,
        urlImagen
    });

    document.getElementById('imagen-planta').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Obtiene el archivo seleccionado
        if (file) {
            console.log('Archivo seleccionado:', file.name);
            console.log('Tamaño del archivo:', file.size, 'bytes');
        }
    });
    

    // Mostrar mensaje de confirmación
    alert('Planta subida correctamente');

    // Cerrar el modal
    closeModal('modal-subir-planta');

    // Opcional: Limpiar el formulario
    document.getElementById('form-subir-planta').reset();
});


// function openModal(modalId) {
//     const modal = document.getElementById(modalId);
//     if (modal) {
//         modal.style.display = 'flex';
//     } else {
//         console.error(`No se encontró un modal con el ID: ${modalId}`);
//     }
// }

// function closeModal(modalId) {
//     const modal = document.getElementById(modalId);
//     if (modal) {
//         modal.style.display = 'none';
//     } else {
//         console.error(`No se encontró un modal con el ID: ${modalId}`);
//     }
// }
// ---------------------------------------------__-----------------------------------------------------

// logica paar actualizar plantas

document.getElementById('form-actualizar-planta').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío por defecto

    // Obtener los valores del formulario
    const nombre = document.getElementById('nombre-planta-actualizar').value;
    const nombreCientifico = document.getElementById('nombre-cientifico-actualizar').value;
    const descripcion = document.getElementById('descripcion-planta-actualizar').value;
    const beneficios = document.getElementById('beneficios-planta-actualizar').value;
    const imagen = document.getElementById('imagen-planta-actualizar').files[0]; // Archivo de imagen

    // Aquí puedes enviar los datos al servidor o procesarlos
    console.log({
        nombre,
        nombreCientifico,
        descripcion,
        beneficios,
        imagen
    });

    // Mostrar alerta de confirmación
    alert('La planta ha sido actualizada correctamente.');

    // Cerrar el modal
    closeModal('modal-actualizar-planta');

    // Opcional: Limpiar el formulario
    document.getElementById('form-actualizar-planta').reset();
});

function openModalActualizarPlanta() {
    const modal = document.getElementById('modal-actualizar-planta');
    if (modal) {
        modal.style.display = 'flex'; // Cambia el estilo para mostrar el modal
    } else {
        console.error('No se encontró el modal con el ID: modal-actualizar-planta');
    }
}

// ----------------------------------------------__-----------------------------------------------------
// logica para eliminar vuna planta

// Lista de plantas (puedes reemplazar esto con datos reales de tu base de datos)
const plantas = [
    { id: 1, nombre: 'Aloe Vera' },
    { id: 2, nombre: 'Lavanda' },
    { id: 3, nombre: 'Menta' }
];

// Abrir el modal de eliminar planta
function openDeletePlantaModal() {
    const modal = document.getElementById('modal-eliminar-planta');
    const select = document.getElementById('planta-a-eliminar');

    // Limpiar opciones anteriores
    select.innerHTML = '';

    // Generar opciones dinámicamente
    plantas.forEach(planta => {
        const option = document.createElement('option');
        option.value = planta.id; // Usar el ID como valor
        option.textContent = `${planta.nombre} (ID: ${planta.id})`; // Mostrar nombre e ID
        select.appendChild(option);
    });

    // Mostrar el modal
    modal.style.display = 'flex';
}
// Manejar el envío del formulario de eliminación
document.getElementById('form-eliminar-planta').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío por defecto

    // Mostrar mensaje de confirmación
    const confirmacion = confirm("¿Estás seguro de que deseas eliminar esta planta? Esta acción no se puede deshacer.");

    if (confirmacion) {
        // Obtener el ID de la planta seleccionada
        const plantaId = document.getElementById('planta-a-eliminar').value;

        // Buscar la planta seleccionada
        const plantaSeleccionada = plantas.find(planta => planta.id == plantaId);

        if (plantaSeleccionada) {
            // Aquí puedes enviar una solicitud al servidor para eliminar la planta
            console.log(`Planta eliminada: ${plantaSeleccionada.nombre} (ID: ${plantaSeleccionada.id})`);

            // Mostrar mensaje de confirmación
            alert(`La planta "${plantaSeleccionada.nombre}" ha sido eliminada correctamente.`);

            // Cerrar el modal
            closeModal('modal-eliminar-planta');
        } else {
            alert('Error: No se pudo encontrar la planta seleccionada.');
        }
    } else {
        // Si el usuario cancela, no se realiza ninguna acción
        console.log("Eliminación cancelada por el usuario.");
    }
});


// Función para cerrar el modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}
// ----------------------------------------------___-----------------------------------------------------
// Mostrar el modal para agregar información de las recetas

// Manejar el envío del formulario para agregar información de las recetas
document.getElementById('form-subir-receta').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío por defecto

    // Obtener los valores del formulario
    const nombreReceta = document.getElementById('nombre-receta').value;
    const descripcion = document.getElementById('descripcion-receta').value;
    const ingredientes = document.getElementById('ingredientes-receta').value;
    const instrucciones = document.getElementById('instrucciones-receta').value;
    const tiempoPreparacion = document.getElementById('tiempo-preparacion').value;

    // Aquí puedes enviar los datos al servidor o procesarlos
    console.log({
        nombreReceta,
        descripcion,
        ingredientes,
        instrucciones,
        tiempoPreparacion
    });

    // Mostrar mensaje de confirmación
    alert('Receta subida correctamente');

    // Cerrar el modal
    closeModal('modal-subir-receta');

    // Opcional: Limpiar el formulario
    document.getElementById('form-subir-receta').reset();
});

//------------------------------------------------------------------------------------------------------

// -----------------------------------------------___-----------------------------------------------------
// Manejar el envío del formulario para actualizar información de las recetas
// Abrir el modal de actualizar receta
function openModalActualizarReceta() {
    const modal = document.getElementById('modal-actualizar-receta');
    if (modal) {
        modal.style.display = 'flex'; // Mostrar el modal
    } else {
        console.error('No se encontró el modal con el ID: modal-actualizar-receta');
    }
}

// Manejar el envío del formulario de actualizar receta
document.getElementById('form-actualizar-receta').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío por defecto

    // Obtener los valores del formulario
    const nombre = document.getElementById('nombre-receta-actualizar').value;
    const descripcion = document.getElementById('descripcion-receta-actualizar').value;
    const ingredientes = document.getElementById('ingredientes-receta-actualizar').value;
    const instrucciones = document.getElementById('instrucciones-receta-actualizar').value;
    const tiempoPreparacion = document.getElementById('tiempo-preparacion-actualizar').value;

    // Aquí puedes enviar los datos al servidor o procesarlos
    console.log({
        nombre,
        descripcion,
        ingredientes,
        instrucciones,
        tiempoPreparacion
    });

    // Mostrar alerta de confirmación
    alert('La receta ha sido actualizada correctamente.');

    // Cerrar el modal
    closeModal('modal-actualizar-receta');

    // Opcional: Limpiar el formulario
    document.getElementById('form-actualizar-receta').reset();
});

// ------------------------------------------------------------------------------------------------------
// Función para abrir el modal de eliminar receta
// Lista de recetas (puedes reemplazar esto con datos reales de tu base de datos)
const recetas = [
    { id: 1, nombre: 'Ensalada César' },
    { id: 2, nombre: 'Sopa de Tomate' },
    { id: 3, nombre: 'Tacos de Pollo' }
];

// Abrir el modal de eliminar receta
function openDeleteRecetaModal() {
    const modal = document.getElementById('modal-eliminar-receta');
    const select = document.getElementById('receta-a-eliminar');

    // Limpiar opciones anteriores
    select.innerHTML = '';

    // Generar opciones dinámicamente
    recetas.forEach(receta => {
        const option = document.createElement('option');
        option.value = receta.id; // Usar el ID como valor
        option.textContent = `${receta.nombre} (ID: ${receta.id})`; // Mostrar nombre e ID
        select.appendChild(option);
    });

    // Mostrar el modal
    modal.style.display = 'flex';
}

// Manejar el envío del formulario de eliminación
document.getElementById('form-eliminar-receta').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío por defecto

    // Mostrar mensaje de confirmación
    const confirmacion = confirm("¿Estás seguro de que deseas eliminar esta receta? Esta acción no se puede deshacer.");

    if (confirmacion) {
        // Obtener el ID de la receta seleccionada
        const recetaId = document.getElementById('receta-a-eliminar').value;

        // Buscar la receta seleccionada
        const recetaSeleccionada = recetas.find(receta => receta.id == recetaId);

        if (recetaSeleccionada) {
            // Aquí puedes enviar una solicitud al servidor para eliminar la receta
            console.log(`Receta eliminada: ${recetaSeleccionada.nombre} (ID: ${recetaSeleccionada.id})`);

            // Mostrar mensaje de confirmación
            alert(`La receta "${recetaSeleccionada.nombre}" ha sido eliminada correctamente.`);

            // Cerrar el modal
            closeModal('modal-eliminar-receta');
        } else {
            alert('Error: No se pudo encontrar la receta seleccionada.');
        }
    } else {
        // Si el usuario cancela, no se realiza ninguna acción
        console.log("Eliminación cancelada por el usuario.");
    }
});
// ------------------------------------------------------------------------------------------------------
// logica para gestionar los permisos a los usuarios
// Lista de usuarios (puedes reemplazar esto con datos reales de tu base de datos)
const usuarios = [
    { id: 1, nombre: 'Juan Pérez', permiso: 'admin' },
    { id: 2, nombre: 'María López', permiso: 'editor' },
    { id: 3, nombre: 'Carlos Gómez', permiso: 'viewer' }
];

// Abrir el modal de gestionar permisos
function openGestionarPermisosModal() {
    const modal = document.getElementById('modal-gestionar-permisos');
    const selectUsuario = document.getElementById('usuario-a-modificar');

    // Limpiar opciones anteriores
    selectUsuario.innerHTML = '';

    // Generar opciones dinámicamente
    usuarios.forEach(usuario => {
        const option = document.createElement('option');
        option.value = usuario.id; // Usar el ID como valor
        option.textContent = `${usuario.nombre} (Permiso actual: ${usuario.permiso})`;
        selectUsuario.appendChild(option);
    });

    // Mostrar el modal
    modal.style.display = 'flex';
}

// Manejar el envío del formulario de gestión de permisos
document.getElementById('form-gestionar-permisos').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío por defecto

    // Obtener el ID del usuario seleccionado y el nuevo permiso
    const usuarioId = document.getElementById('usuario-a-modificar').value;
    const nuevoPermiso = document.getElementById('nuevo-permiso').value;

    // Buscar el usuario seleccionado
    const usuarioSeleccionado = usuarios.find(usuario => usuario.id == usuarioId);

    if (usuarioSeleccionado) {
        // Mostrar mensaje de confirmación
        const confirmacion = confirm(`¿Seguro que quieres darle el permiso "${nuevoPermiso}" al usuario "${usuarioSeleccionado.nombre}"?`);

        if (confirmacion) {
            // Actualizar el permiso del usuario
            usuarioSeleccionado.permiso = nuevoPermiso;

            // Aquí puedes enviar una solicitud al servidor para guardar los cambios
            console.log(`Permiso actualizado: ${usuarioSeleccionado.nombre} ahora tiene el permiso "${nuevoPermiso}".`);

            // Mostrar mensaje de confirmación
            alert(`El permiso del usuario "${usuarioSeleccionado.nombre}" ha sido actualizado a "${nuevoPermiso}".`);

            // Cerrar el modal
            closeModal('modal-gestionar-permisos');
        } else {
            // Si el usuario cancela, no se realiza ninguna acción
            console.log("Cambio de permiso cancelado por el usuario.");
        }
    } else {
        alert('Error: No se pudo encontrar el usuario seleccionado.');
    }
});
// ------------------------------------------------------------------------------------------------------
// logica paar descragar el backup
// Función para abrir el modal
function openModal(modalId) {
    document.getElementById(modalId).style.display = "flex";
}

// Función para cerrar el modal
function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

// Función para realizar el backup
function realizarBackup() {
    // Simular el proceso de backup
    setTimeout(() => {
        // Actualizar la fecha del último backup
        const now = new Date();
        const formattedDate = now.toLocaleString();
        document.getElementById("last-backup-date").textContent = formattedDate;

        // Mostrar notificación de éxito
        const notification = document.getElementById("backup-notification");
        notification.style.display = "block";

        // Mostrar botón de descarga
        const downloadButton = document.getElementById("download-backup");
        downloadButton.style.display = "inline-block";

        // Simular la creación de un archivo de backup
        const backupData = "Backup realizado el: " + formattedDate;
        const blob = new Blob([backupData], { type: "text/plain" });
        const url = URL.createObjectURL(blob);

        // Configurar el botón de descarga
        downloadButton.href = url;
        downloadButton.download = "backup_" + now.toISOString().slice(0, 19).replace(/:/g, "-") + ".txt";
    }, 2000); // Simular un retraso de 2 segundos
}
// marca los diferentes estados de las estadisticas
function actualizarEstadoMetricas() {
    const stats = document.querySelectorAll('.stat');

    stats.forEach(stat => {
        const valor = parseInt(stat.querySelector('h3').textContent);

        // Actualiza el estado según el valor
        if (valor >= 50) {
            stat.setAttribute('data-status', 'success'); // Verde
        } else if (valor >= 20) {
            stat.setAttribute('data-status', 'warning'); // Amarillo
        } else {
            stat.setAttribute('data-status', 'error'); // Rojo
        }
    });
}

// Llama a la función al cargar la página o cuando los datos cambien
document.addEventListener('DOMContentLoaded', actualizarEstadoMetricas);

// ------------------------------------------------------------------------------------------------------
// logica para ver los reportes

// Datos simulados
const usuariosRegistrados = [
    { nombre: "Juan Pérez", fecha: "2025-04-01" },
    { nombre: "Ana Gómez", fecha: "2025-04-05" },
    { nombre: "Carlos López", fecha: "2025-04-10" },
    { nombre: "María Fernández", fecha: "2025-04-15" },
    { nombre: "Luis Martínez", fecha: "2025-04-20" },
];

const usuariosActivos = [
    { nombre: "Juan Pérez", acciones: 120 },
    { nombre: "Ana Gómez", acciones: 95 },
    { nombre: "Carlos López", acciones: 80 },
];

const movimientosPorMinuto = 15;

// Función para abrir el modal de reportes
function openReportesModal() {
    // Llenar la lista de usuarios registrados
    const listaUsuariosRegistrados = document.getElementById("usuarios-registrados");
    listaUsuariosRegistrados.innerHTML = ""; // Limpiar contenido previo
    usuariosRegistrados.forEach(usuario => {
        const li = document.createElement("li");
        li.textContent = `${usuario.nombre} - Registrado el ${usuario.fecha}`;
        listaUsuariosRegistrados.appendChild(li);
    });

    // Llenar la lista de usuarios más activos
    const listaUsuariosActivos = document.getElementById("usuarios-activos");
    listaUsuariosActivos.innerHTML = ""; // Limpiar contenido previo
    usuariosActivos.forEach(usuario => {
        const li = document.createElement("li");
        li.textContent = `${usuario.nombre} - ${usuario.acciones} acciones`;
        listaUsuariosActivos.appendChild(li);
    });

    // Mostrar movimientos por minuto
    const movimientosElemento = document.getElementById("movimientos-por-minuto");
    movimientosElemento.textContent = `${movimientosPorMinuto} movimientos por minuto`;

    // Abrir el modal
    openModal("modal-reportes");
}

// Asignar la función al botón "Ver Reportes"
document.querySelector("button").addEventListener("click", openReportesModal);