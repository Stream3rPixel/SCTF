<section class="content">
   <div class="row">
      <div class="col-md-12">
         <p align="center" style="font-weight: bold;">
            <font size="5" color="#01374C">Nuevo Paciente</font>
         </p>
         <br>
         <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=PacienteAdd" role="form">
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Imagen</label>
               <div class="col-md-6">
                  <input type="file" name="image">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">CURP</label>
               <div class="col-md-6">
                  <input type="text" name="no" class="form-control id=" no" placeholder="CURP" <!--pattern="/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Nombre*</label>
               <div class="col-md-6">
                  <input type="text" name="name" required class="form-control id=" name" placeholder="Nombre" minlength="5" maxlength="30" pattern="[A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ ]+">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Apellido*</label>
               <div class="col-md-6">
                  <input type="text" name="lastname" required class="form-control id=" lastname" placeholder="Apellido" minlength="5" maxlength="30" pattern="[A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ ]+">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Género*</label>
               <div class="col-md-6">
                  <label class="checkbox-inline">
                     <input type="radio" id="inlineCheckbox1" name="gender" required value="h"> Hombre
                  </label>
                  <label class="checkbox-inline">
                     <input type="radio" id="inlineCheckbox2" name="gender" required value="m"> Mujer
                  </label>
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Fec. Nacimiento*</label>
               <div class="col-md-6">
                  <input type="date" name="day_of_birth" required class="form-control  id=" address1" placeholder="Fec. Nacimiento">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Dirección</label>
               <div class="col-md-6">
                  <input type="text" name="address" required class="form-control  id=" address1" placeholder="Dirección" minlength="5" maxlength="60">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Código Postal</label>
               <div class="col-md-6">
                  <input type="postal-code" name="cp" required class="form-control  id=" address1" placeholder="Código Postal" pattern="[0-9]{5}">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Municipio</label>
               <div class="col-md-6">
                  <input type="text" name="pob" required class="form-control id=" address1" placeholder="Municipio" list="municipios" />
                  <datalist id="municipios">
                     <option value="Cozumel" />
                     <option value="Felipe Carrillo Puerto" />
                     <option value="Isla Mujeres" />
                     <option value="Othón P. Blanco" />
                     <option value="Benito Juárez" />
                     <option value="José María Morelos" />
                     <option value="Lázaro Cárdenas" />
                     <option value="Solidaridad" />
                     <option value="Tulum" />
                     <option value="Bacalar" />
                     <option value="Puerto Morelos" />
                  </datalist>
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Email</label>
               <div class="col-md-6">
                  <input type="email" name="email" class="form-control id=" email1" placeholder="Email" minlength="5" maxlength="30" pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Teléfono*</label>
               <div class="col-md-6">
                  <input type="tel" name="phone" required class="form-control id=" phone1" placeholder="Numero de contacto" pattern="[0-9]{7,10}">
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Diagnóstico</label>
               <div class="col-md-6">
                  <textarea name="sick" required class="form-control id=" sick" placeholder="Diagnóstico"></textarea>
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Tratamiento</label>
               <div class="col-md-6">
                  <textarea name="medicaments" required class="form-control id=" sick" placeholder="Tratamiento"></textarea>
               </div>
            </div>
            <div class="form-group">
               <label for="XD" class="col-lg-2 control-label">Tratar en el Área:</label>
               <div class="col-md-6">
                  <textarea name="alergy" required class="form-control id=" sick" placeholder="Seguimiento a cargo del Área Médica"></textarea>
               </div>
            </div>
            <div class="form-group">
               <div class="col-lg-offset-2 col-lg-10">
                  <button type="submit" class="btn btn-success">Agregar Paciente</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>