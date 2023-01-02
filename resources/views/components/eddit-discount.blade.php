<div>
    <!-- The button to open modal -->
    <label for="edit-discount" class="open-moda-lable">Editar descuento</label>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="edit-discount" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form action="{{ route('cuenta.update-discount', $id) }}" method="post">
                @csrf
                <div class="w-full form-control">
                    <label class="label">
                        <span class="label-text">Descuento Quincenal</span>
                    </label>
                    <input
                        type="number"
                        placeholder="0.00"
                        class="w-full input input-bordered"
                        name="pago_quincenal"
                        value="{{ number_format($discount, 2) }}"
                    />
                </div>
                <div class="modal-action">
                    <label for="edit-discount" class="btn">Cancelar</label>
                    <button class="btn btn-success" type="submit">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
