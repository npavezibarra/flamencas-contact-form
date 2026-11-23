
<?php if (isset($_GET['enviado'])): ?>
  <div class="mensaje-exito" style="color: green; font-weight: bold; margin-bottom: 1rem;">
    ¡Gracias! Tu solicitud ha sido enviada.
  </div>
<?php endif; ?>

<div class="flamencas-form-wrapper">
<form class="flamencas-form" method="post">
  <input type="hidden" name="flamencas_form_submitted" value="1">

  <div class="form-section">
    <h2>INFO CONTACTO</h2>
    <label>Nombre Contacto</label>
    <input type="text" name="nombre_contacto" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Organización (opcional)</label>
    <input type="text" name="organizacion">

    <label>Celular</label>
    <input type="text" name="celular" required>
  </div>

  <div class="form-section">
    <h2>INFO EVENTO</h2>
    <label>Fecha Evento</label>
    <input type="date" name="fecha_evento" required>

    <label>Número aproximado de personas</label>
    <input type="number" name="numero_personas" required>

    <label>Comuna del Evento</label>
    <input type="text" name="comuna_evento" required>

    <label>Tipo de Evento</label>
    <select name="tipo_evento" required>
      <option value="">Selecciona una opción</option>
      <option value="Aire libre">Aire libre</option>
      <option value="Espacio cerrado">Espacio cerrado</option>
    </select>

    <label>Servicios que requiere</label>
    <div class="checkbox-group">
      <label><input type="checkbox" name="servicios[]" value="Performance" required> Performance</label>
      <label><input type="checkbox" name="servicios[]" value="Sonido"> Sonido</label>
      <label><input type="checkbox" name="servicios[]" value="Tablao"> Tablao</label>
    </div>

    <label>Duración aprox</label>
    <select name="duracion" required>
      <option value="">Selecciona duración</option>
      <option value="20 min">20 min</option>
      <option value="60 min">60 min</option>
    </select>
  </div>

  <label>Mensaje</label>
    <textarea name="mensaje" rows="5" maxlength="3500" placeholder="Cuéntanos sobre tu proyecto (máx. 500 palabras)" required></textarea>
  
    <button type="submit">COTIZAR</button>
</form>
</div>

