<div
        class="tab-pane fade show active"
        id="centro_costo"
        role="tabpanel"
        aria-labelledby="centro_costo-tab"
>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            <p class="h6">Listado de centros de costos</p>
            <!--            modal button-->
            <button
                    type="button"
                    class="btn btn-primary"
                    data-mdb-toggle="modal"
                    data-mdb-target="#centro_costo_modal"
            >
                Nuevo
            </button>
        </div>
        <!--        table-->
        <div class="row">
            <div class="table-responsive col-12">
                <table class="table align-middle table-hover border">
                    <thead>
                        <tr>
                            <th class="col-3" scope="col">Nombre</th>
                            <th class="col-5" scope="col">Descripcion</th>
                            <th class="col-2 text-center" scope="col">Editar</th>
                            <th class="col-2 text-center" scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <tbody id="centro-costo-data"></tbody>
                    <caption>
                        Cantidad de registros
                    </caption>

                </table>
            </div>
        </div>
<!--        Alerts-->
        <div class="alert alert-success d-none" role="alert" data-mdb-color="success">
            <i class="mdi mdi-check-circle me-3"></i>Centro de costo ingresado correctamente
        </div>
        <div class="alert alert-danger d-none" role="alert" data-mdb-color="danger">
            <i class="mdi mdi-close-octagon me-3"></i>Error al intentar ingresar el centro de costo
        </div>
    </div>
</div>
<!--modal-->
<div
        class="modal fade"
        id="centro_costo_modal"
        tabindex="-1"
        aria-labelledby="centro_costo_modal_label"
        aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="centro_costo_modal_label">Nuevo centro de costo</h5>
            </div>
            <div class="modal-body">
                <form class="py-3" id="centro-costo-form">
                    <input type="hidden" id="centro-costo-id" name="centro-costo-id" value="">
                    <div class="form-outline">
                        <input type="text" id="centro-costo-name" class="form-control" name="centro-costo-name"/>
                        <label class="form-label" for="centro-costo-name">Nombre</label>
                    </div>
                    <div class="form-outline">
                        <input type="text" id="centro-costo-description" class="form-control" name="centro-costo-description"/>
                        <label class="form-label" for="centro-costo-description">Descripcion</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal" id="btnCancelModal">
                    Cancelar
                </button>
                <button type="button" class="btn btn-primary" id="btnSave" data-mdb-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>