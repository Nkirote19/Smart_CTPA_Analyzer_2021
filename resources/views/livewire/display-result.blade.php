<div>
    {{-- The best athlete wants his opponent at his best. --}}

     <table id="predictionsTable" class="table-bordered table-responsive-ms table-custom" style="width:450px!important;">
        <thead>
        <tr>
            <th>Rank</th>
            <th>Class</th>
            <th>Probability (%)</th>
        </tr>
        </thead>

        @forelse ($predictions as $key => $probability)
        <tbody>
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="pl-2">{{ $key }}</td>
                <td class="text-center">{{ $probability * 100}}</td>
            </tr>
        </tbody>
        @empty
            <p>No predictions available</p>
        @endforelse  
    </table>
</div>
