
@extends('headerFooter');

@section('body')

    {{--<link href="{{asset('/')}}/css/manage.css" rel="stylesheet" type="text/css">--}}
    <div class="row" style="margin-left: 200px">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h3 >Manage farmer Info</h3>
                    <table border="2px solid">
                        <tr>
                            <th>Sl No</th>
                            <th>farmers Name</th>
                            <th>email </th>
                            <th>mobile </th>
                            <th>district</th>
                            <th>zip_code</th>
                            <th>gender</th>
                            <th>Activity</th>
                        </tr>
                        @php($i=1);
                        @foreach($farmers as $farm_info)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$farm_info->f_name}}</td>
                                <td>{{$farm_info->email}}</td>
                                <td>{{$farm_info->phone}}</td>
                                <td>{{$farm_info->district}}</td>
                                <td>{{$farm_info->zip_code}}</td>
                                <td>{{$farm_info->gender}}</td>
                                <td>
                                    <a href="{{route('farmer_deactive',['id'=>$farm_info->id])}}" onclick="return confirm('are you sure to deactive this')">Deactive</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

