@extends("layouts.app")
@section("content")
    <h1>損益計算書</h1>
    
    @if (count($totals) > 0)
    <table class ="table">
        @foreach($totals as $total)
        <tr>
            <td>売上高</td>
            <td class="text-right">{{ $total->total_amount }}</td>
        </tr>
        @endforeach
    </table>
    @endif
@endsection


