<div>
    <!-- The button to open modal -->
    <label for="my-modal-6" class="open-moda-lable">Editar # Cuenta</label>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal-6" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form action="{{ route('cuenta.update-number', $id) }}" method="post">
                @csrf
                <div class="w-full form-control">
                    <label class="label">
                        <span class="label-text">Número de cuenta</span>
                    </label>
                    <input
                        type="text"
                        placeholder="000000"
                        class="w-full input input-bordered"
                        value="{{ $number }}"
                        name="no_cuenta"
                    />
                </div>
                <div class="modal-action">
                    <label for="my-modal-6" class="btn">Cancelar</label>
                    <button class="btn btn-success" type="submit">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
