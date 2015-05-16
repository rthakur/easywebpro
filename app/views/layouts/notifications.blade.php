@if(Session::has('notification'))
    <script>
   $(document).ready(function(){
      @foreach(Session::get('notification') as $get)
      $.rtnotify({message: "{{$get['message']}}",
        type: "{{$get['type']}}",
        timeout: {{$get['timeout']}}
       });
     @endforeach
    });
  </script>
@endif
