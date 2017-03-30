<div class="photo">
	<img src="{{ asset($photo) }}">
	<input type="hidden" name="photos[]" value="{{ $photo }}">
	<i class="fa fa-close fa-4x" aria-hidden="true"></i>
    <div class="wait">
        <div class="loader"></div>
    </div>
</div>