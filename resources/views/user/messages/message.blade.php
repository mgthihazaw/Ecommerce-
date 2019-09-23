<script>
	toastr.options.closeButton = true;
	toastr.options.timeOut = 3000;
	@if ($message = Session::get('success'))
toastr.success("{{$message}}")

@endif


@if ($message = Session::get('error'))
toastr.error("{{$message}}")
@endif


@if ($message = Session::get('warning'))

toastr.warning("{{$message}}")
@endif

@if (count($errors) > 0)
         
               @foreach ($errors->all() as $error)
			   toastr.error("{{$error}}")
               @endforeach
            
      @endif
</script>


