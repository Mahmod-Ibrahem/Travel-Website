   @extends('layouts')
   @section('content')
   @component('components.navbar',['home'=>false])
   @endcomponent
<form method="POST" action="{{route('Daytours.store')}}" enctype="multipart/form-data">
    @csrf
   @component('components.tourform')
   @endcomponent
 </form>
@endsection('content')
