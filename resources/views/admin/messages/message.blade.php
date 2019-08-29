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
</script>


