<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sistema de Gestión Comercial</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body>
  <div>
    <!-- Header -->
    <header>
      <div class="container">
        <h1>Sistema de Gestión</h1>
        <nav>
          <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Cerrar Sesión</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Main -->
    <main class="container">
      <div class="tabs">
        <ul>
          <li><button id="clients-tab" class="active-tab">Clientes</button></li>
          <li><button id="providers-tab" class="active-tab">Proveedores</button></li>
          <li><button id="sales-tab" class="active-tab">Ventas</button></li>
        </ul>
      </div>


      <!-- Clients Section -->
      <div id="clients-content">
        <div class="section-header">
          <h2>Gestión de Clientes</h2>
          <button class="btn-primary">
            <i class="fas fa-plus"></i> Nuevo Cliente
          </button>
        </div>

        <!-- Client Form -->
        <div id="client-form" class="form-box hidden">
          <form action="guardarCliente.php" method="POST">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="name" required />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" required />
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input type="tel" name="phone" />
            </div>
            <div class="form-actions">
              <button type="button" id="cancel-client" class="btn-secondary">Cancelar</button>
              <button type="submit" class="btn-primary">Guardar</button>
            </div>
          </form>
        </div>

        <!-- Clients Table -->
        <div class="card">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require 'config.php';
              try {
                $stmt = $conn->query("SELECT * FROM clientes ORDER BY id_cliente DESC");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>";
                  echo "<td>".htmlspecialchars($row['id_cliente'])."</td>";
                  echo "<td>".htmlspecialchars($row['nombre'])."</td>";
                  echo "<td>".htmlspecialchars($row['email'])."</td>";
                  echo "<td>".htmlspecialchars($row['phone'])."</td>";
                  echo "<td class='actions'>
                          <button class='edit'><i class='fas fa-edit'></i></button>
                          <button class='delete'><i class='fas fa-trash'></i></button>
                        </td>";
                  echo "</tr>";
                }
              } catch(PDOException $e) {
                echo "<tr><td colspan='5'>Error al cargar los clientes: ".$e->getMessage()."</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Providers Section -->
      <div id="providers-content" class="hidden">
        <div class="section-header">
          <h2>Gestión de Proveedores</h2>
          <button class="btn-primary">
            <i class="fas fa-plus"></i> Nuevo Proveedor
          </button>
        </div>

        <!-- Proveedor Form -->
        <div id="prove-form" class="form-box hidden">
          <form action="guardarProveedor.php" method="POST">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="name" required />
            </div>
            <div class="form-group">
              <label>Ruc</label>
              <input type="text" name="ruc" required />
            </div>
            <div class="form-actions">
              <button type="button" id="cancel-prove" class="btn-secondary">Cancelar</button>
              <button type="submit" class="btn-primary">Guardar</button>
            </div>
          </form>
        </div>

        <!-- proveedor Table -->
        <div class="card">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>RUC</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                $stmt = $conn->query("SELECT * FROM proveedores ORDER BY id_proveedor DESC");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>";
                  echo "<td>".htmlspecialchars($row['id_proveedor'])."</td>";
                  echo "<td>".htmlspecialchars($row['nombre'])."</td>";
                  echo "<td>".htmlspecialchars($row['ruc'] ?? '')."</td>";
                  echo "<td class='actions'>
                          <button class='edit'><i class='fas fa-edit'></i></button>
                          <button class='delete'><i class='fas fa-trash'></i></button>
                        </td>";
                  echo "</tr>";
                }
              } catch(PDOException $e) {
                echo "<tr><td colspan='5'>Error al cargar los clientes: ".$e->getMessage()."</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Sales Section -->
      <div id="sales-content" class="hidden">
        <div class="section-header">
          <h2>Gestión de Todas las Ventas</h2>
          <button class="btn-primary">
            <i class="fas fa-plus"></i> Nueva Venta
          </button>
        </div>

        <!-- Venta Form -->
        <div id="venta-form" class="form-box hidden">
          <form action="guardarVenta.php" method="POST">
            <div class="form-group">
              <label>Proveedor</label>
              <select type="text" name="cbxProve" required>
                <option>Seleccione un proveedor</option>
                <?php
                try {
                  $stmt = $conn->query("SELECT * FROM proveedores ORDER BY id_proveedor DESC");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".htmlspecialchars($row['id_proveedor'])."'>".htmlspecialchars($row['nombre'])."</option>";
                  }
                } catch(PDOException $e) {
                  echo "<option value=''>Error al cargar proveedores: ".$e->getMessage()."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Cliente</label>
              <select type="text" name="cbxCliente" required>
                <option>Seleccione un cliente</option>
                <?php
                try {
                  $stmt = $conn->query("SELECT * FROM clientes ORDER BY id_cliente DESC");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".htmlspecialchars($row['id_cliente'])."'>".htmlspecialchars($row['nombre'])."</option>";
                  }
                } catch(PDOException $e) {
                  echo "<option value=''>Error al cargar clientes: ".$e->getMessage()."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Descripcion</label>
              <input type="text" name="des" required />
            </div>
            <div class="form-actions">
              <button type="button" id="cancel-venta" class="btn-secondary">Cancelar</button>
              <button type="submit" class="btn-primary">Guardar</button>
            </div>
          </form>
        </div>

        <!-- Ventas Table -->
        <div class="card">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Provedor</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                $stmt = $conn->query("SELECT * FROM ventas ORDER BY id_venta DESC");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>";
                  echo "<td>".htmlspecialchars($row['id_venta'])."</td>";
                  echo "<td>".htmlspecialchars($row['id_proveedor'])."</td>";
                  echo "<td>".htmlspecialchars($row['id_cliente'])."</td>";
                  echo "<td>".htmlspecialchars($row['fecha'] ?? '')."</td>";
                  echo "<td>".htmlspecialchars($row['descripcion'])."</td>";
                  echo "<td class='actions'>
                          <button class='edit'><i class='fas fa-edit'></i></button>
                          <button class='delete'><i class='fas fa-trash'></i></button>
                        </td>";
                  echo "</tr>";
                }
              } catch(PDOException $e) {
                echo "<tr><td colspan='5'>Error al cargar los clientes: ".$e->getMessage()."</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer>
      <p>Sistema de gestion Comercial</p>
    </footer>
  </div>

  <script src="crip.js"></script>
</body>
</html>
