<div class="flamencas-form-wrapper" id="flamencas-contacto">
<?php if (isset($_GET['enviado'])): ?>
  <div class="flamencas-exito-wrapper">
    <div class="flamencas-exito-icon">
      <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
    </div>
    <h2 class="flamencas-exito-titulo">¡Solicitud recibida con éxito!</h2>
    <p class="flamencas-exito-mensaje">
      Hemos recibido los datos de tu evento. Nuestro equipo revisará la información y te responderemos a la brevedad con la propuesta y cotización personalizada.
    </p>
    <a href="<?php echo esc_url(remove_query_arg('enviado')); ?>#flamencas-contacto" class="flamencas-btn-volver">
      Enviar otra consulta
    </a>
  </div>
<?php else: ?>
  <form class="flamencas-form" method="post">
    <input type="hidden" name="flamencas_form_submitted" value="1">

    <div class="flamencas-grid-2col">
      <!-- INFO CONTACTO -->
      <div class="form-section">
        <h3 class="form-section-title">Info Contacto</h3>
        
        <div class="flamencas-field">
          <label for="flamencas_nombre">Nombre Contacto</label>
          <input type="text" id="flamencas_nombre" name="nombre_contacto" required placeholder="Tu nombre y apellido">
        </div>

        <div class="flamencas-field">
          <label for="flamencas_celular">Celular / WhatsApp</label>
          <input type="text" id="flamencas_celular" name="celular" required placeholder="+56 9 1234 5678">
        </div>

        <div class="flamencas-field">
          <label for="flamencas_email">Email</label>
          <input type="email" id="flamencas_email" name="email" required placeholder="tu@email.com">
        </div>

        <div class="flamencas-field">
          <label for="flamencas_organizacion">Organización / Empresa (opcional)</label>
          <input type="text" id="flamencas_organizacion" name="organizacion" placeholder="Nombre de empresa o particular">
        </div>
      </div>

      <!-- INFO EVENTO -->
      <div class="form-section">
        <h3 class="form-section-title">Info Evento</h3>

        <div class="flamencas-row-2col">
          <div class="flamencas-field">
            <label for="flamencas_fecha">Fecha Evento</label>
            <input type="date" id="flamencas_fecha" name="fecha_evento" required>
          </div>
          <div class="flamencas-field">
            <label for="flamencas_comuna">Comuna</label>
            <input type="text" id="flamencas_comuna" name="comuna_evento" required placeholder="Ej: Las Condes, Santiago...">
          </div>
        </div>

        <div class="flamencas-row-2col">
          <div class="flamencas-field">
            <label for="flamencas_tipo">Tipo de Evento</label>
            <select id="flamencas_tipo" name="tipo_evento" required>
              <option value="">Selecciona espacio</option>
              <option value="Aire libre">Aire libre</option>
              <option value="Espacio cerrado">Espacio cerrado</option>
            </select>
          </div>
          <div class="flamencas-field">
            <label for="flamencas_duracion">Duración aprox</label>
            <select id="flamencas_duracion" name="duracion" required>
              <option value="">Selecciona duración</option>
              <option value="20 min">20 min</option>
              <option value="60 min">60 min</option>
            </select>
          </div>
        </div>

        <div class="flamencas-field">
          <label for="flamencas_personas">N° aproximado de personas</label>
          <input type="number" id="flamencas_personas" name="numero_personas" min="1" required placeholder="Cantidad de asistentes">
        </div>
      </div>
    </div>

    <!-- SERVICIOS -->
    <div class="flamencas-services-section">
      <h3 class="form-section-title">Servicios requeridos</h3>
      <div class="services-grid">
        
        <!-- Performance (siempre incluido) -->
        <label class="service-card service-locked">
          <span class="service-card-check">
            <input type="checkbox" checked disabled>
            <input type="hidden" name="servicios[]" value="Performance">
          </span>
          <span class="service-content">
            <span class="service-title-row">
              <span class="service-title">Performance</span>
              <span class="service-badge">Incluido</span>
            </span>
            <span class="service-desc">Elenco artístico de baile, cante y música en vivo (base de toda cotización).</span>
          </span>
        </label>

        <!-- Sonido -->
        <label class="service-card" for="srv_sonido">
          <span class="service-card-check">
            <input type="checkbox" id="srv_sonido" name="servicios[]" value="Sonido">
          </span>
          <span class="service-content">
            <span class="service-title-row">
              <span class="service-title">Sonido y amplificación</span>
            </span>
            <span class="service-desc">Equipamiento técnico completo: microfonía especializada, mesa de sonido y parlantes acordes al espacio.</span>
          </span>
        </label>

        <!-- Tablao -->
        <label class="service-card" for="srv_tablao">
          <span class="service-card-check">
            <input type="checkbox" id="srv_tablao" name="servicios[]" value="Tablao">
          </span>
          <span class="service-content">
            <span class="service-title-row">
              <span class="service-title">Tablao flamenco</span>
            </span>
            <span class="service-desc">Estructura y tarima de madera profesional especializada para el zapateo y la acústica del baile.</span>
          </span>
        </label>

      </div>
    </div>

    <!-- MENSAJE -->
    <div class="flamencas-message-field">
      <label for="flamencas_mensaje">Mensaje / Requerimientos especiales</label>
      <textarea id="flamencas_mensaje" name="mensaje" rows="3" maxlength="3500" placeholder="Cuéntanos más detalles sobre tu evento, horario estimado o consultas adicionales..." required></textarea>
    </div>

    <button type="submit" class="flamencas-submit-btn">COTIZAR</button>
  </form>
<?php endif; ?>
</div>
