<section id="main-content">
    <header class="header" style="position:fixed; background:#000000">
        <div>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="<?= base_url() ?>Dashboard" class="logo"><b>AVANTE TEXTIL</b></a>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" style="background-color: yellow; color: black" href="<?= base_url() ?>Dashboard/logout">CERRAR SESION</a>
                    </li>
                </ul>
                <?php
                foreach ($usernamealtap as $ius) {
                ?>
                <?php
                }
                ?>
                <?php if ($ius->altapaccess == 1) : ?>
                    <!--<ul class="nav pull-right top-menu" style="padding-right:1%;padding-top:14px">
                        <li>
                            <form action="<?= base_url() ?>Dashboard/misProductos" method="post">
                                <button type="submit" style="background:black;color: #ffffff; cursor: pointer; font-size: 1em; padding-top:6px; padding-bottom:6px; border-radius:5px; border:none">REGRESAR</button>
                                <input type="hidden" name="usernamealtap" id="usernamealtap" value="<?= $ius->nombreusuario ?>">
                            </form>
                        </li>
                    </ul>-->
                <?php else : ?>
                <?php endif ?>
                <?php if ($ius->altapaccess == 1) : ?>
                    <ul class="nav pull-right top-menu" style="padding-right:1%;padding-top:14px">
                        <li>
                            <button type="button" id="sendclickupdate" style="background:black;color: #ffffff; cursor: pointer; font-size: 1em; padding-top:6px; padding-bottom:6px; border-radius:5px; border:none">ACTUALIZAR</button>
                        </li>
                    </ul>
                <?php else : ?>
                <?php endif ?>
                <?php if ($ius->altapaccess == 1) : ?>
                    <!--<div style="display:flex; justify-content:flex-start; padding-left:3%;padding-top:14px;">
                        <div style="width:50%">
                            <input type="text" id="buscador_prods" value="" style="width:100%; border:none; border-radius:5px" placeholder="Buscar">
                        </div>
                        <button type="button" id="buscador_prods_btn" style="border-radius:5px; border:none; background-color: black; color: #ffffff; cursor: pointer;"><img src="<?= base_url() ?>assets/img/search_itm1.png" style=" width: 20px"></button>
                    </div>-->
                <?php else : ?>
                <?php endif ?>
            </div>
            <script type="text/javascript">
                function sendclicksave() {
                    document.getElementById('save_compra').click();
                }
            </script>
        </div>
    </header>
    <section class="wrapper">
        <?php
        foreach ($usernamealtap as $ius) {
        ?>
        <?php
        }
        ?>
        <?php if ($ius->altapaccess == 1) : ?>

            <!--<div class="row mt">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <h2 style="justify-content: center; color: black" id="principal" class="mb">ACTUALIZAR</h2>
                        <form action="<?= base_url() ?>Dashboard/actualizarCatalogo" method="post" class="form-horizontal style-form" enctype="multipart/form-data">
                        <input type="hidden" name="usernamealtap2" id="usernamealtap2" value="<?= $ius->nombreusuario ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="font-size: 1.3em; color: black">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="id" id="id" style="color: black" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="font-size: 1.3em; color: black">NOMBRE</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nombreselect" id="nombreselect" style="color: black">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="font-size: 1.3em; color: black">PRECIO MXN</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="precioselect" id="precioselect" style="color: black">
                                <input type="hidden" class="form-control" name="departamentosselect" id="departamentosselect" style="color: black">
                                <input type="hidden" class="form-control" name="subdepartamentosselect" id="subdepartamentosselect" style="color: black">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="font-size: 1.3em; color: black">DEPARTAMENTOS</label>
                            <div class="col-sm-4">
                                <select name="departamentos" id="departamentos" style="width:250px; height: 30px; font-size: 1.3em; color: black" onchange="getdepasinput();">
                                    <option value="">SELECCIONAR</option>
                                    <?php
                                    foreach ($departamentos as $dp) {
                                    ?>
                                        <option class="getsubdepa" value="<?= $dp->nombre ?>"><?= $dp->nombre ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div id="areasudepartamentos">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="font-size: 1.3em; color: black">IMAGEN</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="archivonuevo" id="archivonuevo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="font-size: 1.3em; color: black">DESCRIPCION</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" name="descripcionselect" id="descripcionselect" style="color: black" rows="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" id="btnactualizaproductos" class="btn btn-outline-dark" style="background-color: black; color: #ffffff; cursor: pointer; font-size: 1.5em">ACTUALIZAR</button>
                        </form>
                    </div>
                </div>
            </div>-->
            <div style="padding-top: 2%;"></div>
            <form action="<?= base_url() ?>Dashboard/actualizarCatalogo" method="post">
                <input type="hidden" name="usernamealtap2" id="usernamealtap2" value="<?= $ius->nombreusuario ?>">
                <div style="display: none">
                    <button type="submit" id="btnactualizaproductos"></button>
                </div>
                <table id="productos" class="table" style="color: black;">
                    <thead>
                        <tr style="width:100%; justify-content: center; text-align: center">
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">NOMBRE DEL PRODUCTO</th>
                            <th style="text-align: center">PRECIO</th>
                            <th style="text-align: center">REPROCESO</th>
                            <th style="text-align: center">UNIDAD</th>
                            <th style="text-align: center">CANTIDAD</th>
                            <th style="text-align: center">CC31</th>
                            <th style="text-align: center">CC33</th>
                            <th style="text-align: center">CC34</th>
                            <th style="text-align: center">STATUS</th>
                            <th style="text-align: center">DEPARTAMENTO</th>
                            <th style="text-align: center">SUB DEPARTAMENTO</th>
                            <th style="text-align: center">VISUAL</th>
                            <th style="text-align: center">ACCION</th>
                        </tr>
                    </thead>
                    <tbody id="productoseditar">
                        <?php
                        $filasmodal = 0;
                        foreach ($productos as $t) {
                            $filasmodal++;
                        ?>
                            <tr id="rowproducto<?= $t->id ?>" style="justify-content: center; text-align: center">
                                <td id="td_prod_row_<?= $t->id ?>"><input type="hidden" name="id[]" class="idsf" value="<?= $t->id ?>"><?= $t->id ?></td>
                                <td style="text-align: left">
                                    <h6 style="display:none"><?= $t->nombre ?></h6>
                                    <input size="30" name="nombre[]" style="background:transparent; color:black; border:none; border-bottom:1px solid gray;" value="<?= $t->nombre ?>">
                                    <div>
                                        <textarea name="incluye[]" id="" cols="30" rows="2"><?= $t->incluye ?></textarea>
                                    </div>
                                </td>
                                <td><input size="15" name="precio[]" style="background:transparent; color:black; border:none; border-bottom:1px solid gray;" value="<?= $t->precio ?>"></td>
                                <td><input size="15" name="precioreproceso[]" style="background:transparent; color:black; border:none; border-bottom:1px solid gray;" value="<?= $t->reproceso ?>"></td>
                                <td><input size="8" name="unidad[]" style="background:transparent; color:black; border:none; border-bottom:1px solid gray;" value="<?= $t->unidad ?>"></td>
                                <td><input size="8" name="pieza[]" style="background:transparent; color:black; border:none; border-bottom:1px solid gray;" value="<?= $t->pieza ?>"></td>
                                <td><input size="12" name="cc31[]" style="background:transparent; color:black; border:none; border-bottom:1px solid gray;" value="<?= $t->cc31 ?>"></td>
                                <td><input size="12" name="cc33[]" style="background:transparent; color:black; border:none; border-bottom:1px solid gray;" value="<?= $t->cc33 ?>"></td>
                                <td><input size="12" name="cc34[]" style="background:transparent; color:black; border:none; border-bottom:1px solid gray;" value="<?= $t->cc34 ?>"></td>
                                <td>
                                    <input type="hidden" value="<?= $t->status ?>" id="producto<?= $filasmodal ?>" name="statusproductos[]">
                                    <?php if ($t->status == "Activo") : ?>
                                        <div id="divactivo-<?= $filasmodal ?>" style="display: none;">
                                            <i class="setInputActivo" id="<?= $filasmodal ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/switch_off.png" height="35px" width="35px"></i>
                                        </div>
                                        <div id="divinactivo-<?= $filasmodal ?>">
                                            <i class="setInputInactivo" id="<?= $filasmodal ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/switch_on.png" height="35px" width="35px"></i>
                                        </div>
                                    <?php else : ?>
                                        <div id="divactivo-<?= $filasmodal ?>">
                                            <i class="setInputActivo" id="<?= $filasmodal ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/switch_off.png" height="35px" width="35px"></i>
                                        </div>
                                        <div id="divinactivo-<?= $filasmodal ?>" style="display: none;">
                                            <i class="setInputInactivo" id="<?= $filasmodal ?>" style="cursor: pointer;"><img src="<?= base_url() ?>assets/img/switch_on.png" height="35px" width="35px"></i>
                                        </div>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" style="border: none; background:transparent;text-align: center;" name="departamentos_res[]" class="departamentos_val" value="<?= $t->departamentos ?>" required>
                                    </div>
                                    <div>
                                        <select class="departamentos">
                                            <option value="" style="color: black">SELECCIONAR</option>
                                            <option value="entrada" style="color: black">entrada</option>
                                            <option value="dama y caballero" style="color: black">dama y caballero</option>
                                            <option value="mujer hombre jr" style="color: black">mujer hombre jr</option>
                                            <option value="interior mujer" style="color: black">interior mujer</option>
                                            <option value="infantil niño y niña" style="color: black">infantil niño y niña</option>
                                            <option value="toddler niño niña y bebes" style="color: black">toddler niño niña y bebes</option>
                                            <option value="herrajes" style="color: black">herrajes</option>
                                            <option value="probadores" style="color: black">probadores</option>
                                            <option value="paneles" style="color: black">paneles</option>
                                            <option value="extras" style="color: black">extras</option>
                                            <option value="imagen" style="color: black">imagen</option>
                                            <option value="otros" style="color: black">otros</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" style="border: none; background:transparent;text-align: center;" name="subdepartamentos_res[]" class="subdepartamentos_val" value="<?= $t->subdepartamentos ?>" required>
                                    </div>
                                    <div>
                                        <select class="subdepartamentos">
                                            <option value="">SELECCIONAR</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <i class="abrirModal" data-image="<?= base_url("uploads/" . $t->archivo) ?>" data-id="<?= $t->id ?>" style="cursor: pointer;">
                                        <div id="hide-<?= $t->id ?>">
                                            <img style="border-radius: 15px;" src="<?= base_url("uploads/" . $t->archivo) ?>" height="60px" width="60px">
                                        </div>
                                        <div id="show-<?= $t->id ?>">
                                        </div>
                                    </i>
                                    <div id="miModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 1;">
                                        <div class="modal-content" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 40px; background-color: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);">
                                            <span class="closeModal" id="cerrarModal" style="position: absolute; top: 10px; right: 10px; cursor: pointer; font-size: 24px; color: #333;">&times;</span>
                                            <div id="imgmodal-<?= $t->id ?>">
                                                <img id="modalImage" style="border-radius: 15px;" height="200px" width="200px">
                                            </div>
                                            <div>
                                                <input type="file" id="nuevaImagen" accept="image/*">
                                            </div>
                                            <div>
                                                <input type="hidden" id="modalImageId">
                                                <button type="button" id="cerrarModalBtn" class="closeModalBtn_unique" style="background-color: #f44336; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-top: 20px;">Actualizar</button>
                                            </div>
                                            <i id="<?= $t->id ?>" class="get_row_img_id"></i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <i class="eliminarelproducto" style="cursor: pointer;" id="producto-<?= $t->id ?>"><img src="<?= base_url() ?>assets/img/delete_btn.png" height="35px" width="35px"></i>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <a href="#principal" id="redirectprincipal"></a>
                    </tbody>
                </table>
            </form>
        <?php else : ?>
        <?php endif ?>
    </section>
</section>
<div id="loader_modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 1;">
    <div id="spinner-container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="loader" id="loader-1"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.get_row_img_id').click(function() {
            var get_row_img_id = $(this).attr("id");
            console.log(get_row_img_id);
            $('#hide-' + get_row_img_id).hide();
            $('#imgmodal-' + get_row_img_id).hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        /*$('.subdepartamentos').each(function() {
            var $subdepartamentos = $(this);
            var $td = $subdepartamentos.closest('td');
            var $input = $td.find('input[type="text"]');

            // Obtener el valor del input y establecerlo como el valor seleccionado en el select
            var valorInput = $input.val();
            $subdepartamentos.val(valorInput);
        });

        // Manejar el evento onchange de los select boxes "departamentos"
        $('.departamentos').change(function() {
            var departamentoSeleccionado = $(this).val();
            var $row = $(this).closest('tr'); // Obtener la fila actual
            var $subdepartamentos = $row.find('.subdepartamentos'); // Encuentra el select de "subdepartamentos" en la misma fila
            var $departamentoInput = $row.find('input[type="text"]').eq(0); // Primer input después del select de "departamentos"
            var $subdepartamentoInput = $row.find('input[type="text"]').eq(1); // Segundo input después del select de "departamentos"

            // Actualizar el valor del primer input con el departamento seleccionado
            $departamentoInput.val(departamentoSeleccionado);

            console.log(departamentoSeleccionado);
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>Dashboard/set_depas',
                data: {
                    departamento: departamentoSeleccionado
                },
                dataType: 'json',
                success: function(data) {
                    // Limpiar el select box "subdepartamentos" específico
                    $subdepartamentos.empty();

                    // Agregar la opción "SELECCIONAR" en la primera posición
                    $subdepartamentos.append($('<option>', {
                        value: '',
                        text: 'SELECCIONAR',
                        style: 'color: gray'
                    }));

                    // Agregar las opciones de subdepartamentos obtenidas de la respuesta AJAX
                    $.each(data, function(index, subdepartamento) {
                        $subdepartamentos.append($('<option>', {
                            value: subdepartamento.nombre,
                            text: subdepartamento.nombre
                        }));
                    });

                    // Actualizar el valor del segundo input con el subdepartamento seleccionado
                    $subdepartamentos.change(function() {
                        var subdepartamentoSeleccionado = $(this).val();
                        // Actualizar el valor del segundo input con el subdepartamento seleccionado
                        $subdepartamentoInput.val(subdepartamentoSeleccionado);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error al obtener los subdepartamentos: ' + error);
                }
            });
        });*/
        $('.departamentos').change(function() {
            var selectedValue = $(this).val();
            var currentRow = $(this).closest('tr');
            var opcionesSelect = currentRow.find('.subdepartamentos');
            var departamentos_val = currentRow.find('.departamentos_val');
            opcionesSelect.empty();
            if (selectedValue == 'entrada') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="no aplica">no aplica</option>');
                departamentos_val.val('entrada');
            } else if (selectedValue == 'dama y caballero') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                opcionesSelect.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
                departamentos_val.val('dama y caballero');
            } else if (selectedValue == 'mujer hombre jr') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                opcionesSelect.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
                opcionesSelect.append('<option value="mobiliario perimetro jeans">mobiliario perimetro jeans</option>');
                opcionesSelect.append('<option value="mobiliario perimetro licencias">mobiliario perimetro licencias</option>');
                departamentos_val.val('mujer hombre jr');
            } else if (selectedValue == 'interior mujer') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                opcionesSelect.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
                opcionesSelect.append('<option value="herraje">herraje</option>');
                departamentos_val.val('interior mujer');
            } else if (selectedValue == 'infantil niño y niña') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                opcionesSelect.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
                departamentos_val.val('infantil niño y niña');
            } else if (selectedValue == 'toddler niño niña y bebes') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                opcionesSelect.append('<option value="mobiliario perimetral">mobiliario perimetral</option>');
                departamentos_val.val('toddler niño niña y bebes');
            } else if (selectedValue == 'herrajes') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="no aplica">no aplica</option>');
                departamentos_val.val('herrajes');
            } else if (selectedValue == 'probadores') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                departamentos_val.val('probadores');
            } else if (selectedValue == 'paneles') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                departamentos_val.val('paneles');
            } else if (selectedValue == 'extras') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="mobiliario de piso">mobiliario de piso</option>');
                departamentos_val.val('extras');
            } else if (selectedValue == 'imagen') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="pop">pop</option>');
                opcionesSelect.append('<option value="maniquis">maniquis</option>');
                departamentos_val.val('imagen');
            } else if (selectedValue == 'otros') {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                opcionesSelect.append('<option value="no aplica">no aplica</option>');
                departamentos_val.val('otros');
            } else {
                opcionesSelect.append('<option value="">SELECCIONAR</option>');
                departamentos_val.val('');
            }
        });
        $('.subdepartamentos').change(function() {
            var selectedValue = $(this).val();
            var currentRow = $(this).closest('tr');
            var opcionesSelect = currentRow.find('.subdepartamentos_val');
            opcionesSelect.val(selectedValue);
        });
    });
</script>
<script>
    /*
    $(document).ready(function() {
        $('#departamentos').change(function() {
            var departamentoSeleccionado = $(this).val();
            console.log(departamentoSeleccionado);
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>Dashboard/set_depas',
                data: {
                    departamento: departamentoSeleccionado
                },
                dataType: 'json',
                success: function(data) {
                    // Limpiar el select box "subdepartamentos"
                    $('#subdepartamentos').empty();

                    // Agregar las opciones de subdepartamentos obtenidas de la respuesta AJAX
                    $.each(data, function(index, subdepartamento) {
                        $('#subdepartamentos').append($('<option>', {
                            value: subdepartamento.nombre,
                            text: subdepartamento.nombre
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error al obtener los subdepartamentos: ' + error);
                }
            });
        });
    });*/
</script>
<script>
    /*
    $(document).ready(function() {
        $(".abrirModal2").click(function() {
            var row_id = $(this).attr("id");
            console.log(row_id);
            $("#abrirModal" + row_id).click(function() {
            $("#miModal").fadeIn();
        });
        });

        $("#abrirModal").click(function() {
            $("#miModal").fadeIn();
        });

        // Cerrar el modal cuando se hace clic en la "X" o en el botón "Cerrar"
        $("#cerrarModal, #cerrarModalBtn").click(function() {
            $("#miModal").fadeOut();
        });
    });*/
</script>
<script>
    $(document).ready(function() {
        $('#sendclickupdate').click(function() {
            $("#btnactualizaproductos").trigger("click");
        });
        $(".abrirModal").click(function() {
            var imageSrc = $(this).data('image');
            var imageId = $(this).data('id');
            $("#modalImage").attr('src', imageSrc);
            $("#modalImageId").val(imageId);
            $("#miModal").fadeIn();
        });
        /*
        $("#cerrarModal, #cerrarModalBtn").click(function() {
            $("#miModal").fadeOut();
        });*/
        $("#cerrarModal").click(function() {
            $("#miModal").fadeOut();
        });

        $("#cerrarModalBtn").click(function() {
            var id_img = $('#modalImageId').val();
            var new_img = $('#nuevaImagen')[0].files[0];
            var fileInput = $("#nuevaImagen")[0];
            console.log('ID de imagen:', id_img);
            console.log('Nueva imagen seleccionada:', new_img);
            if (!new_img) {
                // Si está vacío, muestra una alerta y detiene la ejecución
                alert('Por favor, seleccione una imagen antes de continuar.');
                return;
            }
            var formData = new FormData();
            formData.append('id_img', id_img);
            formData.append('new_img', new_img);
            /*
            var formData = new FormData();
            formData.append('id_img', id_img);
            formData.append('new_img', new_img);*/

            $.ajax({
                url: '<?= base_url() ?>Dashboard/updateImgCat',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('Respuesta del servidor:', response);
                    //alert('Imagen Actualizada');
                    // Cierra el modal después de completar la carga
                    $("#miModal").fadeOut();
                    $("#hide-" + id_img).hide();
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var imageSrc = e.target.result;
                            $("#show-" + id_img).html('<img style="border-radius: 15px;" src="' + imageSrc + '" alt="Imagen cargada" height="100px" width="100px">');
                        };
                        reader.readAsDataURL(fileInput.files[0]);
                    }

                },
                error: function(xhr, status, error) {
                    alert('Error al subir imagen');
                    console.error('Error de solicitud AJAX:', error);
                    console.log('No se pudo actualizar');
                }
            });
        });
        var currentIndex = -1;
        $('#buscador_prods_btn').click(function() {
            var inputval = $('#buscador_prods').val().toLowerCase();
            var matchedInputs = [];
            $("table tbody tr td input").each(function(index, input) {
                var inputValue = $(input).val().toLowerCase();
                if (inputValue.indexOf(inputval) !== -1) {
                    matchedInputs.push(input);
                }
            });
            if (matchedInputs.length > 0) {
                currentIndex = (currentIndex + 1) % matchedInputs.length;
                $("table tbody tr td input").removeClass("highlighted-input");
                $(matchedInputs[currentIndex]).addClass("highlighted-input");
                $(window).scrollTop($(matchedInputs[currentIndex]).offset().top);
            }
        });
    });
</script>
<script type="text/javascript">
    /*
    $(document).on("ready", inicio);

    function inicio() {
        $("#btnactualizaproductos").click(actualizaproductos);
        $("body").on("click", "#productoseditar i", function(event) {
            event.preventDefault();
            idselect = $(this).attr("id");
            nombreselect = $(this).parent().parent().children("td:eq(1)").text();
            precioselect = $(this).parent().parent().children("td:eq(2)").text();
            departamentosselect = $(this).parent().parent().children("td:eq(4)").text();
            subdepartamentosselect = $(this).parent().parent().children("td:eq(5)").text();
            descripcionselect = $(this).parent().parent().children("td:eq(7)").text();
            //imagenselect = $(this).parent().parent().children("td:eq(6)").text();

            $("#id").val(idselect).css('background-color', '#ECECBF');
            $("#nombreselect").val(nombreselect).css('background-color', '#FFFED0');
            $("#precioselect").val(precioselect).css('background-color', '#FFFED0');
            $("#departamentosselect").val(departamentosselect).css('background-color', '#FFFED0');
            $("#subdepartamentosselect").val(subdepartamentosselect).css('background-color', '#FFFED0');
            $("#descripcionselect").val(descripcionselect).css('background-color', '#FFFED0');
            //$("#imagenselect").val(imagenselect).css('background-color', '#FFFED0');
        });
    }

    function actualizaproductos() {
        $.ajax({
            url: "<?= base_url() ?>Dashboard/actualizarprods",
            type: "POST",
            data: $("#actualizarprods").serialize(),
            success: function(respuestaprods) {}
        });
    }*/
</script>
<script type="text/javascript">
    /*function redirectfirst() {
        $('.redirectprincipal').trigger('click');
    }*/
</script>
<script type="text/javascript">
    /*
    $(".getsubdepa").click(function() {
        var iddepa = this.id_departamento;
        var res = iddepa.split("-");
        var id_departamento = res[1];
        $.post("<?= base_url() ?>Dashboard/getSubdepartamentos", {
            iddepa: id_departamento
        }).done(function(data) {});
    });

    $("#departamentos").change(function() {
        var departamentos = $("#departamentos").val();
        //alert(departamentos);
        $.ajax({
            type: "POST",
            //url: "<?= base_url() ?>Dashboard/getDepartamentos",
            url: "<?= base_url() ?>Dashboard/getsubdepartamentos",
            data: {
                departamentos: departamentos
            }
        }).done(function(response) {
            document.getElementById("areasudepartamentos").innerHTML = response;
            console.log(response);
            //$( this ).addClass( "done" );
        });

        $("#pnale_sub").css("display", "inline");


    });*/
    /*
    $("#departamentos").change(function(){   
        var subdepartamentos = $("#subdepartamentos").val();
        //alert(subdepartamentos);
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Dashboard/getSubDepartamentos",
            data: { subdepartamentos : subdepartamentos }
        }).done(function() {
          $( this ).addClass( "done" );
        });

        $("#pnale_sub").css("display","inline");
        
        
    });
    */
</script>
<!--
<script type="text/javascript">
    function redirectfirst() {
        const btnredirect = document.getElementById("redirectprincipal");
        btnredirect.click();
    }
</script>
<script type="text/javascript">
    function getdepasinput() {
        var depainputactualizar = document.getElementById('departamentos');
        var resultadodepainputactualizar = depainputactualizar.value;
        var valorvaciosubdepa = "";
        document.getElementById('departamentosselect').value = resultadodepainputactualizar;
        document.getElementById('subdepartamentosselect').value = valorvaciosubdepa;
    }

    function getsubdepasinput() {
        var subdepainputactualizar = document.getElementById('subdepartamentos');
        var resultadosubdepainputactualizar = subdepainputactualizar.value;
        var muestrasubcolor = document.getElementById('muestrasubcolor');
        var muestrasubsincolor = document.getElementById('muestrasubsincolor');
        document.getElementById('subdepartamentosselect').value = resultadosubdepainputactualizar;
        muestrasubcolor.style.display = 'none';
        muestrasubsincolor.style.display = 'block';
    }
</script>-->
<script>
    $(document).ready(function() {
        $('#productos').DataTable({
            searching: true,
            paging: false,
            info: false,
            //scrollY: "1200px", // Altura máxima de la tabla
            scrollY: "600px", // Altura máxima de la tabla
            scrollX: true, // Habilita el scroll horizontal si es necesario
            scrollCollapse: true, // Colapsa el scroll si la tabla es más pequeña que el área definida
            columnDefs: [{
                    type: 'html',
                    targets: [1] //como no reconoce los nombres de busqueda de los productos ya que estan dentro de un input cada uno,
                    // en la columna en la posicion 1 que es donde estan los nombres, se agrego de manera oculta en una etiqueta h6
                    // que contiene el nombre del producto, ya que el datatable solamente reconoce los nombres en etiquetas estaticas
                    // y no en dinamicas como lo son los inputs con entrada de texto.
                },
                {
                    searchable: false,
                    targets: [8] // este numero indica que la columna donde no realizara la busqueda el datatable es en la columna en posicion 8
                    // debido a que ahi se encuentran los departamentos y los selectbox traen la opcion por ejemplo "paneles" y si se busca "panel"
                    // no encontrara los productos que sean solamente o contengan la palabra "panel", si no que como todos los select box conetienen
                    // el departamento "paneles", traera siempre todos y no mostrara los que tienen especificamente "panel" entonces hará la busqueda
                    // en las demas columnas y omitirá esa columna.
                }
            ]
            // Otras configuraciones que desees aplicar a tu DataTable
        });
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.setInputActivo', function() {
        var row_id = $(this).attr("id");
        var row_activo_div = document.getElementById('divactivo-' + row_id);
        var row_inactivo_div = document.getElementById('divinactivo-' + row_id);
        //var status = document.getElementById('producto' + row_id).value;
        var Activo = "Activo";
        document.getElementById('producto' + row_id).value = Activo;
        //document.getElementById('tdstatus' + row_id).innerHTML = Activo;
        //console.log(status);
        //$('#tdstatus' + row_id).css('background-color', 'chartreuse');
        row_activo_div.style.display = 'none';
        row_inactivo_div.style.display = 'block';
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.setInputInactivo', function() {
        var row_id2 = $(this).attr("id");
        var row_activo_div2 = document.getElementById('divactivo-' + row_id2);
        var row_inactivo_div2 = document.getElementById('divinactivo-' + row_id2);
        //var status = document.getElementById('producto' + row_id).value;
        var Inactivo = "Inactivo";
        document.getElementById('producto' + row_id2).value = Inactivo;
        //document.getElementById('tdstatus' + row_id2).innerHTML = Inactivo;
        //console.log(status);
        //$('#tdstatus' + row_id2).css('background-color', '#FFAA00');
        row_activo_div2.style.display = 'block';
        row_inactivo_div2.style.display = 'none';
    });
</script>
<script type="text/javascript">
    $(".eliminarelproducto").click(function() {
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.confirm({
            title: '¡ELIMINAR!',
            content: '¿Esta seguro de eliminar el producto permanentemente? ¡Esta acción no se podrá deshacer!',
            buttons: {
                Aceptar: {
                    btnClass: 'btn-red',
                    action: function() {
                        $.post("<?= base_url() ?>Dashboard/eliminarProducto", {
                            idproducto: id
                        }).done(function(data) {
                            $("#rowproducto" + id).remove();
                        });
                        $.alert('¡El producto se ha eliminado!');
                    }
                },
                Cancelar: function() {},
                /*
                somethingElse: {
                    text: 'Something else',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function() {
                        $.alert('Something else?');
                    }
                }
                */
            }
        });
        /*
        var idproducto = this.id;
        var res = idproducto.split("-");
        var id = res[1];
        $.post("<?= base_url() ?>Dashboard/eliminarProducto", {
            idproducto: id
        }).done(function(data) {
            $("#rowproducto" + id).remove();
        });
        */
    });
    $('#comprobar_skus').click(function() {
        $('#loader_modal').show();
        $('#comprobar_skus').hide();
        $.ajax({
            url: '<?= base_url() ?>Dashboard/comprobar_skus',
            type: 'get',
            success: function(response) {
                console.log('Comprobracion exitosa');
                if (response.productos != null) {
                    var productosold = response.productos;
                    //mapeamos los arreglos para darles un formato ['1','2','3','4'] de esta manera se interpretara mejor la respuesta del lado del servidor
                    productos = productosold.map(function(obj) {
                        return obj.id; // Tomar solo el valor de la propiedad 'id' que devolvio el response
                    });
                } else {
                    var productos = [];
                }
                if (response.skus != null) {
                    var skusold = response.skus;
                    skus = skusold.map(function(obj) {
                        return obj.id_producto;
                    });
                } else {
                    var skus = [];
                }
                console.log('Catalogo principal: ');
                console.log(productos);
                console.log('Catalogo skus: ');
                console.log(skus);
                // definimos un arreglo vacio para calcular los id faltantes en el catalogo de skus
                var diferencias = [];
                var diferencias = productos.filter(function(obj) {
                    return skus.indexOf(obj) === -1;
                });
                // Mostrando diferencias en la consola
                console.log('Faltantes en catalgo skus: ', diferencias);

                // Si hay algun dato que falte del catalogo principal con el de skus entonces lo inserta en la tabla de skus por tipo de tienda
                if (diferencias.length > 0) {
                    console.log('Al menos hay un dato que falta agregar');
                    $.ajax({
                        url: '<?= base_url() ?>Dashboard/insertar_ids_skus_faltantes',
                        type: 'post', //NUNCA USAR EL ATRIBUTO "METHOD", USAR "TYPE" PARA POSTEAR DATOS
                        data: {
                            "diferencias[]": diferencias
                        },
                        success: function(response) {
                            console.log('Success insert skus');
                            console.log(response);
                            $("#btnactualizaproductos").trigger("click");
                        },
                        error: function(xhr, status, error) {
                            console.log('Error al insertar skus nuevos');
                            $('#loader_modal').hide();
                            $('#comprobar_skus').show();
                        }
                    });
                } else {
                    console.log('no hay datos nuevos por agregar');
                    $("#btnactualizaproductos").trigger("click");
                }
            },
            error: function(xhr, status, error) {
                console.log('Error al comprobar skus');
                $('#loader_modal').hide();
                $('#comprobar_skus').show();
            }
        });
    });
</script>
<style>
    .closeModalBtn_unique:active {
        transform: scale(0.95);
    }

    input.highlighted-input {
        background-color: yellow !important;
    }

    #spinner-container {
        text-align: center;
    }

    .loader {
        width: 100px;
        height: 100px;
        border-radius: 100%;
        position: relative;
        margin: 0 auto;
    }

    #loader-1:before,
    #loader-1:after {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        width: 100%;
        height: 100%;
        border-radius: 100%;
        border: 10px solid transparent;
        border-top-color: #414141;
    }

    #loader-1:before {
        z-index: 100;
        animation: spin 1s infinite;
    }

    #loader-1:after {
        border: 10px solid #fff;
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style>