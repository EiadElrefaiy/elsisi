@foreach ($representativesByDate as $date => $representatives)
    @foreach ($representatives as $representative)
        <tr id="dataRow_{{$representative->id}}">
            <td>{{$representative->name}}</td>
            <td>{{$representative->money->where("operation" , "revenue")->sum("price")}}</td>
            <td>{{$representative->money->where("operation" , "expense")->sum("price")}}</td>
            <td>{{$representative->money->where("operation" , "revenue")->sum("price") - $representative->money->where("operation" , "expense")->sum("price") }}</td>
            <td>{{$date}}</td>
            <td><a style="color: #3e5569;" href="{{ route('edit', ['table' => 'representatives', 'view' => 'representatices_days.day', 'id' => $representative->id, 'date' => $date]) }}"><i class="mdi mdi-eye"></i></a></td>
        </tr>
    @endforeach
@endforeach
