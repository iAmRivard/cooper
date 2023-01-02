<div>
    <form action="{{ route('cuenta.change-state', $id) }}" method="post" id="change-state">
        @csrf
        <div class="form-control">
            <label class="cursor-pointer">
                <span class="open-moda-lable">@if ($status == 1) Desactivar Cuenta @else Activar Cuenta @endif</span>
                <input
                    type="checkbox"
                    class="toggle" @if ($status == 1) checked @endif
                    value="{{ $id }}"
                    id="check-change-state"
                    name="cuenta"
                    onChange="this.form.submit()"
                />
            </label>
        </div>
    </form>
</div>
