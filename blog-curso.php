<?php
require_once __DIR__ . '/includes/nav.php';

$titulo_pagina = 'Blog y Curso Interactivo';
$bodyClass = 'blog-page';
require_once __DIR__ . '/includes/header.php';
?>

<?php render_nav(null, 'div'); ?>

<!-- Imagen horizontal entre el menú y Blog/Curso -->
<div id="imgBlog" class="header-img" style="background-image: url('img/fondo2.PNG');"></div>

<!-- Imagen para CURSO -->
<div id="imgCurso" class="header-img hidden" style="background-image: url('img/fondo2.PNG');"></div>

<!-- Botones -->
<div class="tabs">
    <button id="btnBlog" class="tab active">Blog</button>
    <button id="btnCurso" class="tab">Curso</button>
</div>

<!-- CONTENIDO BLOG -->
<div id="blogContent">

    <div class="container">
        <div class="col">
            <details class="recommendation-details">
                <summary>Ver consejos</summary>
                <p>Comenzar un nuevo ciclo escolar es más fácil con los útiles correctos. En Librería Quin contamos con cuadernos, carpetas, mochilas y lapiceras de excelente calidad para acompañarte durante todo el año.</p>
            </details>
        </div>

        <div class="col">
            <details class="recommendation-details">
                <summary>Ver recomendación</summary>
                <p>Organizá tus materiales antes de empezar las clases y elegí productos duraderos para ahorrar dinero y mantener todo en buen estado.</p>
            </details>
            <details class="recommendation-details">
                <summary>¿Qué útiles son importantes?</summary>
                <ul>
                    <li>Cuadernos resistentes</li>
                    <li>Lapiceras y resaltadores</li>
                    <li>Mochilas cómodas</li>
                    <li>Carpetas organizadoras</li>
                </ul>
            </details>
        </div>

        <div class="col">
            <details class="recommendation-details">
                <summary>Ver novedades</summary>
                <p>Esta semana llegaron nuevos diseños de mochilas y cartucheras con promociones especiales.</p>
            </details>
        </div>
    </div>
</div>

<!-- CONTENIDO CURSO -->
<div id="cursoContent" class="hidden">

    <div class="container">
        <!-- Columna izquierda -->
        <div class="col">
            <h3>Curso de Dibujo Creativo</h3>
            <p>Desarrollá tu creatividad aprendiendo técnicas básicas de dibujo y coloreado.</p>
            <p><b>Incluye</b></p>
            <ul>
                <li>Uso de lápices y marcadores</li>
                <li>Sombras y proporciones</li>
                <li>Dibujos paso a paso</li>
            </ul>
            <p><b>Duración:</b> 6 clases prácticas.</p>
            <button id="inscribirseBtn" class="course-button">Inscribirse</button>
            <form id="inscripcionForm" action="" method="post" class="hidden course-form" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
                    <span class="error-message" id="nombreError"></span>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" placeholder="ejemplo@mail.com" required>
                    <span class="error-message" id="emailError"></span>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="4" placeholder="¿Por qué querés inscribirte?" required></textarea>
                    <span class="error-message" id="mensajeError"></span>
                </div>
                <div class="form-group">
                    <label>Edad</label>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="edad" value="6" required> 6
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="edad" value="7"> 7
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="edad" value="8"> 8
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="edad" value="9"> 9
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="edad" value="10"> 10
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="edad" value="11"> 11
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="edad" value="12"> 12
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="edad" value="13"> 13
                        </label>
                    </div>
                    <span class="error-message" id="edadError"></span>
                </div>
                <button type="submit" class="course-button">Enviar inscripción</button>
            </form>
            <div id="respuestaCurso1" class="enrollment-response hidden" aria-live="polite">
                <p>¿Querés aceptar o rechazar esta solicitud?</p>
                <button type="button" class="response-button accept-button">Aceptar</button>
                <button type="button" class="response-button reject-button">Rechazar</button>
                <p class="response-message"></p>
            </div>
        </div>

        <!-- Columna derecha -->
        <div class="col">
            <h3>Curso de Técnicas de Estudio</h3>
            <p>Aprendé métodos para organizar tu tiempo, tomar apuntes y mejorar tu rendimiento escolar.</p>
            <p><b>Contenido del curso</b></p>
            <ul>
                <li>Organización del tiempo</li>
                <li>Técnicas de resumen</li>
                <li>Mapas conceptuales</li>
                <li>Preparación para exámenes</li>
            </ul>
            <p><b>Duración:</b> 4 semanas</p>
            <p><b>Modalidad:</b> Presencial y virtual</p>
            <p><b>Materiales incluidos:</b> Cuaderno, resaltadores y guía de estudio.</p>
            <button id="inscribirseBtn2" class="course-button">Inscribirse</button>
            <form id="inscripcionForm2" action="" method="post" class="hidden course-form" novalidate>
                <div class="form-group">
                    <label for="nombre2">Nombre completo</label>
                    <input type="text" id="nombre2" name="nombre2" placeholder="Tu nombre" required>
                    <span class="error-message" id="nombre2Error"></span>
                </div>
                <div class="form-group">
                    <label for="email2">Correo electrónico</label>
                    <input type="email" id="email2" name="email2" placeholder="ejemplo@mail.com" required>
                    <span class="error-message" id="email2Error"></span>
                </div>
                <div class="form-group">
                    <label for="mensaje2">Mensaje</label>
                    <textarea id="mensaje2" name="mensaje2" rows="4" placeholder="¿Por qué querés inscribirte?" required></textarea>
                    <span class="error-message" id="mensaje2Error"></span>
                </div>
                <div class="form-group">
                    <label>Horario</label>
                    <div style="display: flex; gap: 15px;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="horario" value="mañana" required> Mañana
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="horario" value="tarde"> Tarde
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="horario" value="noche"> Noche
                        </label>
                    </div>
                    <span class="error-message" id="horarioError"></span>
                </div>
                <div class="form-group">
                    <label>Modalidad</label>
                    <div style="display: flex; gap: 15px;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="modalidad" value="presencial" required> Presencial
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="modalidad" value="virtual"> Virtual
                        </label>
                    </div>
                    <span class="error-message" id="modalidadError"></span>
                </div>
                <div class="form-group">
                    <label>Nivel</label>
                    <div style="display: flex; gap: 15px;">
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="nivel" value="principiante" required> Principiante
                        </label>
                        <label style="display: flex; align-items: center; gap: 5px;">
                            <input type="radio" name="nivel" value="intermedio"> Intermedio
                        </label>
                    </div>
                    <span class="error-message" id="nivelError"></span>
                </div>
                <div class="form-group">
                    <label for="edad2">Seleccionar edad</label>
                    <select id="edad2" name="edad2" required>
                        <option value="">Elige una edad</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                    </select>
                    <span class="error-message" id="edad2Error"></span>
                </div>
                <button type="submit" class="course-button">Enviar inscripción</button>
            </form>
            <div id="respuestaCurso2" class="enrollment-response hidden" aria-live="polite">
                <p>¿Querés aceptar o rechazar esta solicitud?</p>
                <button type="button" class="response-button accept-button">Aceptar</button>
                <button type="button" class="response-button reject-button">Rechazar</button>
                <p class="response-message"></p>
            </div>
        </div>
    </div>

</div>

<!-- SCRIPT -->
<?php ob_start(); ?>
<script>
    const btnBlog = document.getElementById("btnBlog");
    const btnCurso = document.getElementById("btnCurso");

    const blogContent = document.getElementById("blogContent");
    const cursoContent = document.getElementById("cursoContent");

    const imgBlog = document.getElementById("imgBlog");
    const imgCurso = document.getElementById("imgCurso");

    btnBlog.onclick = () => {
        btnBlog.classList.add("active");
        btnCurso.classList.remove("active");

        blogContent.classList.remove("hidden");
        cursoContent.classList.add("hidden");

        imgBlog.classList.remove("hidden");
        imgCurso.classList.add("hidden");
    };

    btnCurso.onclick = () => {
        btnCurso.classList.add("active");
        btnBlog.classList.remove("active");

        cursoContent.classList.remove("hidden");
        blogContent.classList.add("hidden");

        imgCurso.classList.remove("hidden");
        imgBlog.classList.add("hidden");
    };

    const inscribirseBtn = document.getElementById("inscribirseBtn");
    const inscripcionForm = document.getElementById("inscripcionForm");
    const inscribirseBtn2 = document.getElementById("inscribirseBtn2");
    const inscripcionForm2 = document.getElementById("inscripcionForm2");
    const respuestaCurso1 = document.getElementById("respuestaCurso1");
    const respuestaCurso2 = document.getElementById("respuestaCurso2");

    function setupInscripcion(btn, form) {
        if (!btn || !form) return;

        btn.onclick = () => {
            form.classList.toggle("hidden");
            btn.textContent = form.classList.contains("hidden") ? "Inscribirse" : "Ocultar formulario";
        };
    }

    function setupFormValidation(form, responsePanel) {
        if (!form) return;

        const summaryPanel = document.createElement("div");
        summaryPanel.className = "form-summary hidden";
        summaryPanel.innerHTML = `
            <h4>Resumen de tu inscripción</h4>
            <dl class="summary-list"></dl>
            <button type="button" class="course-button confirm-submit">Enviar solicitud</button>
            <button type="button" class="summary-edit">Modificar datos</button>
        `;
        form.parentNode.insertBefore(summaryPanel, responsePanel);
        const summaryList = summaryPanel.querySelector(".summary-list");
        const confirmSubmit = summaryPanel.querySelector(".confirm-submit");
        const summaryEdit = summaryPanel.querySelector(".summary-edit");

        const fields = form.querySelectorAll("input:not([type='radio']), textarea, select");
        const radioNames = [...form.querySelectorAll("input[type='radio'][required]")]
            .map((radio) => radio.name)
            .filter((name, index, names) => names.indexOf(name) === index);

        function showError(field, message) {
            const error = document.getElementById(`${field.id}Error`);
            field.classList.toggle("invalid", Boolean(message));
            field.setAttribute("aria-invalid", Boolean(message));
            if (error) error.textContent = message;
            return Boolean(message);
        }

        function validateField(field) {
            const value = field.value.trim();
            if (!value) return showError(field, "Este campo es obligatorio.");
            if (field.type === "email" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                return showError(field, "Ingresá un correo electrónico válido.");
            }
            return showError(field, "");
        }

        fields.forEach((field) => {
            field.addEventListener("input", () => validateField(field));
            field.addEventListener("change", () => validateField(field));
        });

        form.querySelectorAll("input[type='radio']").forEach((radio) => {
            radio.addEventListener("change", () => {
                const group = radio.closest(".form-group");
                const error = group.querySelector(".error-message");
                if (error) error.textContent = "";
            });
        });

        form.addEventListener("submit", (event) => {
            event.preventDefault();
            let firstInvalidField = null;
            let hasErrors = false;

            fields.forEach((field) => {
                if (validateField(field)) {
                    hasErrors = true;
                    if (!firstInvalidField) firstInvalidField = field;
                }
            });

            radioNames.forEach((name) => {
                const radios = form.querySelectorAll(`input[name="${name}"]`);
                const group = radios[0].closest(".form-group");
                const error = group.querySelector(".error-message");
                const isSelected = [...radios].some((radio) => radio.checked);
                if (error) error.textContent = isSelected ? "" : "Elegí una opción para continuar.";
                if (!isSelected) {
                    hasErrors = true;
                    if (!firstInvalidField) firstInvalidField = radios[0];
                }
            });

            if (hasErrors) {
                firstInvalidField.focus();
                return;
            }

            const formData = new FormData(form);
            summaryList.replaceChildren();
            [...formData.entries()].forEach(([name, value]) => {
                const term = document.createElement("dt");
                const description = document.createElement("dd");
                term.textContent = name;
                description.textContent = value;
                summaryList.append(term, description);
            });
            form.classList.add("hidden");
            summaryPanel.classList.remove("hidden");
        });

        confirmSubmit.addEventListener("click", () => {
            const formData = new FormData(form);
            const details = [...formData.entries()]
                .map(([name, value]) => `${name}: ${value}`)
                .join("%0D%0A");
            const subject = encodeURIComponent("Solicitud de inscripción a un curso");
            window.location.href = `mailto:piterparker12543@gmail.com?subject=${subject}&body=${details}`;

            form.reset();
            summaryPanel.classList.add("hidden");
            if (responsePanel) responsePanel.classList.remove("hidden");
        });

        summaryEdit.addEventListener("click", () => {
            summaryPanel.classList.add("hidden");
            form.classList.remove("hidden");
        });
    }

    function setupResponseButtons(responsePanel) {
        if (!responsePanel) return;

        const message = responsePanel.querySelector(".response-message");
        responsePanel.querySelector(".accept-button").addEventListener("click", () => {
            message.textContent = "Fuiste aceptado, te contactaremos pronto.";
            message.className = "response-message accepted-message";
        });
        responsePanel.querySelector(".reject-button").addEventListener("click", () => {
            message.textContent = "Lo sentimos, ya no hay cupos para el curso.";
            message.className = "response-message rejected-message";
        });
    }

    setupInscripcion(inscribirseBtn, inscripcionForm);
    setupInscripcion(inscribirseBtn2, inscripcionForm2);
    setupFormValidation(inscripcionForm, respuestaCurso1);
    setupFormValidation(inscripcionForm2, respuestaCurso2);
    setupResponseButtons(respuestaCurso1);
    setupResponseButtons(respuestaCurso2);
</script>
<?php
$footerExtra = ob_get_clean();
require_once __DIR__ . '/includes/footer.php';
?>
