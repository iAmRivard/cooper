<div class="overflow-x-auto">
    <table class="table table-zebra">
        <!-- head -->
        <thead>
            <tr>
                <th>Quincena</th>
                <th>Interes</th>
                <th>Capital</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tablaAmor as $t)
            <tr>
                <th>{{ $t['quincena'] }}</th>
                <td>{{ $t['interes'] }}</td>
                <td>{{ $t['capital'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
