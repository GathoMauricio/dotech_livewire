<!-- Modal -->
<div class="modal fade" id="edit_quote_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold color-primary-sys" id="exampleModalLabel">Actualizar cotización para <span id="edit_quote_modal_company"></span> </h5>
          <input type="hidden" id="txt_show_quote_modal_ajax" value="{{ route('show_quote_ajax') }}">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('update_quote') }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="sale_id" id="edit_quote_modal_sale_id">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description" class="font-weight-bold color-primary-sys">
                      Detalles de la venta
                    </label>
                    <textarea name="description" class="form-control" id="edit_quote_modal_description"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="observation" class="font-weight-bold color-primary-sys">
                      Observaciones
                    </label>
                    <textarea name="observation" class="form-control" id="edit_quote_modal_observation"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="delivery_days" class="font-weight-bold color-primary-sys">
                      Tiempo de entrega (Días)
                    </label>
                    <input name="delivery_days" type="number"  id="edit_quote_modal_delivery_days" min="0" value="0" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="shipping" class="font-weight-bold color-primary-sys">
                      Incluye envio
                    </label>
                    <select name="shipping" class="form-control" id="edit_quote_modal_shipping">
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="payment_type" class="font-weight-bold color-primary-sys">
                      Forma de pago
                    </label>
                    <select name="payment_type" class="form-control" id="edit_quote_modal_payment_type">
                      <option value="Efectivo">Efectivo</option>
                      <option value="Deposito">Deposito</option>
                      <option value="Transferencia">Transferencia</option>
                      <option value="Cheque">Cheque</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="credit" class="font-weight-bold color-primary-sys">
                      Crédito
                    </label>
                    <select name="credit" class="form-control" id="edit_quote_modal_credit">
                      <option value="N/A">N/A</option>
                      <option value="15 Días">15 Días</option>
                      <option value="30 Días">30 Dias</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="currency" class="font-weight-bold color-primary-sys">
                      Divisa
                    </label>
                    <select name="currency" class="form-control"  id="edit_quote_modal_currency">
                      <option value="MXN">MXN</option>
                      <option value="USD">USD</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>
      </form>
      </div>
    </div>
  </div>