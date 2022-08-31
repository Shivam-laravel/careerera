@extends('auth.layouts.app')@section('scripts')
<script type="text/javascript" src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
<script>

	tinymce.init({
	/* replace textarea having class .tinymce with tinymce editor */
	selector: "textarea#desc",
	fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt 72pt",

	/* theme of the editor */
	theme: "modern",
	skin: "lightgray",

	/* width and height of the editor */
	width: "70%",
	height: 300,

	/* display statusbar */
	statubar: true,

	/* plugin */
	plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons template paste textcolor"
	],

	/* toolbar */
	toolbar: "insertfile undo redo | styleselect | sizeselect | fontselect |  fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

	/* style */
	style_formats: [
		{title: "Headers", items: [
			{title: "Header 1", format: "h1"},
			{title: "Header 2", format: "h2"},
			{title: "Header 3", format: "h3"},
			{title: "Header 4", format: "h4"},
			{title: "Header 5", format: "h5"},
			{title: "Header 6", format: "h6"}
		]},
		{title: "Inline", items: [
			{title: "Bold", icon: "bold", format: "bold"},
			{title: "Italic", icon: "italic", format: "italic"},
			{title: "Underline", icon: "underline", format: "underline"},
			{title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
			{title: "Superscript", icon: "superscript", format: "superscript"},
			{title: "Subscript", icon: "subscript", format: "subscript"},
			{title: "Code", icon: "code", format: "code"}
		]},
		{title: "Blocks", items: [
			{title: "Paragraph", format: "p"},
			{title: "Blockquote", format: "blockquote"},
			{title: "Div", format: "div"},
			{title: "Pre", format: "pre"}
		]},
		{title: "Alignment", items: [
			{title: "Left", icon: "alignleft", format: "alignleft"},
			{title: "Center", icon: "aligncenter", format: "aligncenter"},
			{title: "Right", icon: "alignright", format: "alignright"},
			{title: "Justify", icon: "alignjustify", format: "alignjustify"}
		]}
	]
});




	</script>
@endsection
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">


    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Articles</span></h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"></h5>
          </div>
          <div class="card-body">
            <form action="{{ route('home.manage_articles_process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Language</label>
                <select class="form-control" name="language">
                    <option value="">Select Language</option>
                    <option value="en" {{ $language == "en" ? 'selected' : '' }}>English</option>
                </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Title<span style="color: red">*</span></label>
                    <input type="text" name="title" value="{{ $title }}" required class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Url<span style="color: red">*</span></label>
                    <input type="text" name="url" value="{{ $url }}" required class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Meta Title<span style="color: red">*</span></label>
                    <input type="text" name="meta_title" required value="{{ $meta_title }}" class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Meta Desc<span style="color: red">*</span></label>
                    <textarea  name="meta_desc"  class="form-control"  >{{ $meta_desc }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ $meta_keywords }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-message">TFN</label>
                    <input type="number" name="tfn" class="form-control" value="{{ $tfn }}">
                </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Description<span style="color: red">*</span></label>
                <textarea id="desc" name="desc" class="form-control" >{{ $desc }}</textarea>
              </div>
              <input type="hidden" name="id" value="{{ $id }}">
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Status<span style="color: red">*</span></label>
                <select class="form-control" name="status" required>
                    <option value="">Select Status</option>
                    <option value="active" {{ $status == "active" ? 'selected' : '' }}>Active</option>
                        <option value="inactive {{ $status == "inactive" ? 'selected' : '' }}">Inactive</option>

                </select>
              </div>


              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>

    </div>
</div>
@endsection
