<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukü | Panel Superadministrador</title>
    <link rel="stylesheet" href="{{ asset('css/SuperAdministrador.css') }}">
    <script src="{{ asset('js/SuperAdministrador.js') }}"></script>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    </head>
    
</head>
<body>

    <div class="sidebar">
        <h2  onclick="showBienvenida()">Sukü</h2>
        <ul>
            <li onclick="showSection('plantas')">Plantas</li>
            <li onclick="showSection('recetas')">Recetas</li>
            <li onclick="showSection('usuarios')">Usuarios</li>
            <li onclick="showSection('backup')">Copias de Seguridad</li>
            <li onclick="showSection('analisis')">Análisis de Datos</li>
        </ul>

             <!-- Ícono de persona -->
    <div class="icon-container">
        <a href="#" class="icon-link" onclick="showUserInfo()">
            <i class="fas fa-user"></i>
        </a>
    </div>
    <!-- Contenedor para la información del usuario -->
    <div id="user-info" class="user-info" style="display: none;">
        <!-- Aquí se mostrará la información del usuario -->
    </div>

    </div>

    <div class="main">
        <div class="navbar">
            <h1>Panel Principal de Gestión Sukü</h1>
        </div>
        <!-- Vista de la bienvenida al super administrador -->
        <div id="bienvenida" class="section bienvenida-section" style="display: none;">
            <h2>Bienvenido al área de gestión de Sukü</h2>
            <p>Administrando el presente, sembrando el futuro.</p>
            <img src="PagianP.jpg" alt="Bienvenida" class="section-image">
            <p>¡Hola, Superadministrador! Desde aquí puedes administrar plantas, recetas, usuarios y mantener el sistema Sukü siempre actualizado.</p>
        </div>

        <div class="content">
            <div id="plantas" class="section plantas-section">
                <h2><i class="fas fa-leaf"></i>  Gestión de Plantas</h2>
                <img src="{{ asset('image_Super/planta.jpg') }}" alt="Plantas" class="section-image">
                 <p>Sube, actualiza o elimina plantas del sistema.</p>
                <div class="button-container"> 
                    <button title="Sube una nueva planta al sistema" onclick="openModal('modal-subir-planta')"><i class="fas fa-upload"></i> Subir Planta</button>
                    <button onclick="openModalActualizarPlanta()"><i class="fas fa-edit"></i> Actualizar Planta</button>
                    <button onclick="openDeletePlantaModal()"><i class="fas fa-trash"></i> Eliminar Planta</button>
                </div>
            </div>

            <!-- para que aparzac las casillas para subir la planta -->
                            <!-- Modal para subir planta -->
                <div id="modal-subir-planta" class="modal modal-subir-planta" style="display: none;">
                    <div class="modal-content">
                        <h3>Subir Nueva Planta</h3>
                        <form id="form-subir-planta">
                            <label for="nombre-planta">Nombre de la Planta:</label>
                            <input type="text" id="nombre-planta" name="nombre-planta" required>

                            <label for="nombre-cientifico">Nombre Científico (opcional):</label>
                            <input type="text" id="nombre-cientifico" name="nombre-cientifico">

                            <label for="descripcion-planta">Descripción:</label>
                            <textarea id="descripcion-planta" name="descripcion-planta" rows="4" required></textarea>

                            <label for="beneficios-planta">Beneficios:</label>
                            <textarea id="beneficios-planta" name="beneficios-planta" rows="4" required></textarea>

                            <label for="imagen-planta">Seleccionar imagen:</label>
                            <input type="file" id="imagen-planta" name="imagen-planta" accept="image/*" required>

                            <div class="button-container">
                                <button type="submit">Subir</button>
                                <button type="button" onclick="closeModal('modal-subir-planta')">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
                   <!-- Mensaje que aparece después de subir una planta -->
                   <div id="confirmation-message-subir" style="display: none; text-align: center; margin-top: 20px; color: #27ae60; font-weight: bold;">
                    La planta ha sido subida correctamente.
                </div>
                  
                     
<!-- ------------------------------------------------___--------------------------------------------------- -->
                           <!-- Para actualizar la planta -->
                           <div id="modal-actualizar-planta" class="modal modal-actualizar-planta" style="display: none;">
                            <div class="modal-content">
                                <h3>Actualizar Planta</h3>
                                <form id="form-actualizar-planta">
                                    <label for="nombre-planta-actualizar">Nombre de la Planta:</label>
                                    <input type="text" id="nombre-planta-actualizar" name="nombre-planta-actualizar" required>
                        
                                    <label for="nombre-cientifico-actualizar">Nombre Científico (opcional):</label>
                                    <input type="text" id="nombre-cientifico-actualizar" name="nombre-cientifico-actualizar">
                        
                                    <label for="descripcion-planta-actualizar">Descripción:</label>
                                    <textarea id="descripcion-planta-actualizar" name="descripcion-planta-actualizar" rows="4" required></textarea>
                        
                                    <label for="beneficios-planta-actualizar">Beneficios:</label>
                                    <textarea id="beneficios-planta-actualizar" name="beneficios-planta-actualizar" rows="4" required></textarea>
                        
                                    <label for="imagen-planta-actualizar">Seleccionar nueva imagen (opcional):</label>
                                    <input type="file" id="imagen-planta-actualizar" name="imagen-planta-actualizar" accept="image/*">
                        
                                    <div class="button-container">
                                        <button type="submit">Actualizar</button>
                                        <button type="button" onclick="closeModal('modal-actualizar-planta')">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                         <!-- Mensaje que aparece después de actualizar una planta -->
                        <div id="confirmation-message-actualizar" style="display: none; text-align: center; margin-top: 20px; color: #27ae60; font-weight: bold;">
                            La planta ha sido actualizada correctamente.
                        </div>
                            
<!-- -----------------------Para eliminar una planta ----------------------------------------- -->
                        <!-- Modal para eliminar planta -->
                            <div id="modal-eliminar-planta" class="modal modal-eliminar-planta" style="display: none;">
                                <div class="modal-content">
                                    <h3>Eliminar Planta</h3>
                                    <p>Selecciona la planta que deseas eliminar:</p>
                                    <form id="form-eliminar-planta">
                                        <label for="planta-a-eliminar">Planta:</label>
                                        <select id="planta-a-eliminar" name="planta-a-eliminar" required>
                                            <!-- Opciones dinámicas generadas con JavaScript -->
                                        </select>
                                        <div class="button-container">
                                            <button type="submit">Confirmar</button>
                                            <button type="button" onclick="closeModal('modal-eliminar-planta')">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                     <!-- Mensaje que aparece después de eliminar una planta -->
                     <div id="confirmation-message" style="display: none; text-align: center; margin-top: 20px; color: #e74c3c; font-weight: bold;">
                        La planta ha sido eliminada correctamente.
                    </div>  
                            
                            
            <div id="recetas" class="section" style="display: none;">
                <h2><i class="fas fa-seedling"></i>  Gestión de Recetas</h2>
                <img src="receta2.jpg" alt="Recetas" class="section-image">
                <p>Sube, actualiza o elimina recetas del sistema.</p>
                <div class="button-container"> 
                <button title="Sube una nueva receta al sistema" onclick="openModal('modal-subir-receta')"><i class="fas fa-upload"></i> Subir Receta</button>
                <button onclick="openModalActualizarReceta()"> <i class="fas fa-edit"></i>Actualizar Receta</button>
                <button onclick="openDeleteRecetaModal()"><i class="fas fa-trash"></i>Eliminar Receta</button>
            </div>
            </div>
<!-- ------------------------------- para subir recetas al sistemas --------------------------------------------- -->
            <div id="modal-subir-receta" class="modal modal-subir-receta" style="display: none;">
                <div class="modal-content">
                    <h3>Subir Nueva Receta</h3>
                    <form id="form-subir-receta">
                        <label for="nombre-receta">Nombre de la Receta:</label>
                        <input type="text" id="nombre-receta" name="nombre-receta" required>
            
                        <label for="descripcion-receta">Descripción:</label>
                        <textarea id="descripcion-receta" name="descripcion-receta" rows="4" required></textarea>
            
                        <label for="ingredientes-receta">Ingredientes:</label>
                        <textarea id="ingredientes-receta" name="ingredientes-receta" rows="4" required></textarea>
            
                        <label for="instrucciones-receta">Instrucciones:</label>
                        <textarea id="instrucciones-receta" name="instrucciones-receta" rows="4" required></textarea>
            
                        <label for="tiempo-preparacion">Tiempo de Preparación (en minutos):</label>
                        <input type="number" id="tiempo-preparacion" name="tiempo-preparacion" required>
            
                        <div class="button-container">
                            <button type="submit">Subir</button>
                            <button type="button" onclick="closeModal('modal-subir-receta')">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
              <!-- Mensaje que aparece después de subir una receta -->
              <div id="confirmation-message-subir-receta" style="display: none; text-align: center; margin-top: 20px; color: #27ae60; font-weight: bold;">
                La receta ha sido subida correctamente.
            </div>

            <!-- -------------------------------------------------------__------------------------------------------------- -->
            <!-- ----------------------------- Para actualizar la receta -------------------------------------- -->
            <!-- Modal para actualizar recetas -->
        <div id="modal-actualizar-receta" class="modal modal-actualizar-receta" style="display: none;">
            <div class="modal-content">
                <h3>Actualizar Receta</h3>
                <form id="form-actualizar-receta">
                    <label for="nombre-receta-actualizar">Nombre de la Receta:</label>
                    <input type="text" id="nombre-receta-actualizar" name="nombre-receta-actualizar" required>

                    <label for="descripcion-receta-actualizar">Descripción:</label>
                    <textarea id="descripcion-receta-actualizar" name="descripcion-receta-actualizar" rows="4" required></textarea>

                    <label for="ingredientes-receta-actualizar">Ingredientes:</label>
                    <textarea id="ingredientes-receta-actualizar" name="ingredientes-receta-actualizar" rows="4" required></textarea>

                    <label for="instrucciones-receta-actualizar">Instrucciones:</label>
                    <textarea id="instrucciones-receta-actualizar" name="instrucciones-receta-actualizar" rows="4" required></textarea>

                    <label for="tiempo-preparacion-actualizar">Tiempo de Preparación (en minutos):</label>
                    <input type="number" id="tiempo-preparacion-actualizar" name="tiempo-preparacion-actualizar" required>

                    <div class="button-container">
                        <button type="submit">Actualizar</button>
                        <button type="button" onclick="closeModal('modal-actualizar-receta')">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
                          
             <!-- Mensaje que aparece después de actualizar una receta -->
             <div id="confirmation-message-actualizar-receta" style="display: none; text-align: center; margin-top: 20px; color: #27ae60; font-weight: bold;">
                La receta ha sido actualizada correctamente.
            </div> 

            <!-- -------------------------------------------------___---------------------------------------------------------  -->
            <!-- ----------------------------------- para eliminar una receta-------------------------------- -->
            <!-- Modal para eliminar receta -->
                <div id="modal-eliminar-receta" class="modal modal-eliminar-receta" style="display: none;">
                    <div class="modal-content">
                        <h3>Eliminar Receta</h3>
                        <p>Selecciona la receta que deseas eliminar:</p>
                        <form id="form-eliminar-receta">
                            <label for="receta-a-eliminar">Receta:</label>
                            <select id="receta-a-eliminar" name="receta-a-eliminar" required>
                                <!-- Opciones dinámicas generadas con JavaScript -->
                            </select>
                            <div class="button-container">
                                <button type="submit">Confirmar</button>
                                <button type="button" onclick="closeModal('modal-eliminar-receta')">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>

            <!-- Mensaje de confirmación para recetas -->
            <div id="confirmation-message-receta" style="display: none; text-align: center; margin-top: 20px; color: #e74c3c; font-weight: bold;">
                La receta ha sido eliminada correctamente.
            </div>
          
           <!-- ------------------------------------------------------------------------------------------------------ -->
            
           <!-- Botón para abrir el modal -->
           <div id="usuarios" class="section" style="display: none;">
            <h2><i class="fas fa-users-cog"></i>  Gestión de Usuarios y Permisos</h2>
            <img src="manosindigenas.jpg" alt="Plantas" class="section-image">
            <p> Aquí puedes gestionar los permisos de los usuarios para garantizar un acceso adecuado al sistema.</p>
            <button class="centrar-boton" onclick="openGestionarPermisosModal()"><i class="fas fa-user-cog"></i>  Gestionar Permisos</button>
        </div>

            <!-- Modal para gestionar permisos -->
                <div id="modal-gestionar-permisos" class="modal modal-gestionar-permisos" style="display: none;">
                    <div class="modal-content">
                        <h3>Gestionar Permisos</h3>
                        <p>Selecciona un usuario para modificar sus permisos:</p>
                        <form id="form-gestionar-permisos">
                            <label for="usuario-a-modificar">Usuario:</label>
                            <select id="usuario-a-modificar" name="usuario-a-modificar" required>
                                <!-- Opciones dinámicas generadas con JavaScript -->
                            </select>

                            <label for="nuevo-permiso">Permiso:</label>
                            <select id="nuevo-permiso" name="nuevo-permiso" required>
                                <option value="admin">Administrador</option>
                                <option value="editor">Editor</option>
                                <option value="viewer">Visualizador</option>
                            </select>

                            <div class="button-container">
                                <button type="submit">Guardar Cambios</button>
                                <button type="button" onclick="closeModal('modal-gestionar-permisos')">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div id="loading-spinner" style="display: none; text-align: center;">
                    <i class="fas fa-spinner fa-spin"></i> Procesando...
                </div> -->

         <!-- ---------------------------------------------------------------------------------------- -->

            <div id="backup" class="section" style="display: none;">
                <h2><i class="fas fa-hdd"></i>  Copias de Seguridad</h2>
                <img src="indigenaTejiendo.jpg" alt="Plantas" class="section-image">
                <button onclick="openModal('modal-backup')">Realizar Backup</button>
            </div>
                <!-- Modal para realizar backup -->
                    <div id="modal-backup" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Realizar Backup</h3>
                            <p>Último backup realizado: <span id="last-backup-date">No disponible</span></p>
                            <div class="icon-container">
                                <i class="fas fa-seedling" style="font-size: 40px; color: #27ae60;"></i>
                            </div>
                            <p>Haz clic en el botón para realizar una copia de seguridad de la base de datos y archivos importantes.</p>
                            <div class="button-container">
                                <button id="backup-button" onclick="realizarBackup()">Realizar Backup</button>
                                <button id="download-backup" style="display: none;">Descargar Backup</button>
                                <button type="button" onclick="closeModal('modal-backup')">Cerrar</button>
                            </div>
                            <div id="backup-notification" class="notification" style="display: none; margin-top: 20px;">
                                <span>¡Backup completado exitosamente! ✅</span>
                                <div class="icon-container">
                                    <i class="fas fa-seedling" style="font-size: 40px; color: #27ae60;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- -------------------------------------------------------------------------------------------- -->
                    <div id="analisis" class="section" style="display: none;">
                        <h2><i class="fas fa-chart-bar"></i>  Análisis de Datos</h2>
                        <div class="stats">
                            <div class="stat" data-status="success">
                                <i class="fas fa-leaf"></i> <!-- Ícono de planta -->
                                <h3>10</h3>
                                <p>Plantas Registradas</p>
                            </div>
                            <div class="stat" data-status="warning">
                                <i class="fas fa-users"></i> <!-- Ícono de usuarios -->
                                <h3>50</h3>
                                <p>Usuarios Activos</p>
                            </div>
                            <div class="stat" data-status="error">
                                <i class="fas fa-history" ></i> <!-- Ícono de historial -->
                                <h3>120</h3>
                                <p>Movimientos Recientes</p>
                            </div>
                        </div>
                        <button onclick="openReportesModal()">Ver Reportes</button>
                    </div>
                                            <!-- Modal para Ver Reportes -->
                        <div id="modal-reportes" class="modal" style="display: none;">
                            <div class="modal-content">
                                <h3>Reportes de Análisis de Datos</h3>
                                <div class="report-section">
                                    <h4>Usuarios Registrados en los Últimos 25 Días</h4>
                                    <ul id="usuarios-registrados">
                                        <!-- Lista dinámica generada con JavaScript -->
                                    </ul>
                                </div>
                                <div class="report-section">
                                    <h4>Usuarios Más Activos</h4>
                                    <ul id="usuarios-activos">
                                        <!-- Lista dinámica generada con JavaScript -->
                                    </ul>
                                </div>
                                <div class="report-section">
                                    <h4>Movimientos por Minuto</h4>
                                    <p id="movimientos-por-minuto">Cargando...</p>
                                </div>
                                <div class="button-container">
                                    <button type="button" onclick="closeModal('modal-reportes')">Cerrar</button>
                                </div>
                            </div>
                        </div>
            
        </div>
    </div>

 
</div>

</body>
</html>
