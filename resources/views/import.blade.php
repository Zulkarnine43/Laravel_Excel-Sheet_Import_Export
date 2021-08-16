@extends('headerFooter');


@section('body')


<div>
	{{Session::get('success')}}
</div>

    <form method="post" action="{{route('file.post')}}" enctype="multipart/form-data">
	@csrf
      <div>
      	<label>Send Excel File</label><br>
         <input type="file" name="file" accept=".xlsx"><br>
     </div>
     <input type="submit" name="submit">
 </form>

    <form method="post" action="{{route('file.export')}}">
	@csrf
     <button>Export Data Excel</button>
 </form>

@endsection