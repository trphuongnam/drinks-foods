<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
  <script>
  CKEDITOR.replace( 'content', {
      filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
      filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
      filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123", 
      filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files", 
      filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
      filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
  } );
  </script>
  @include('ckfinder::setup')