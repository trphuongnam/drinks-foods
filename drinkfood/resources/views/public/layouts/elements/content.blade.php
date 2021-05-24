<div id="templatemo_content">
    	
    {{-- Begin: content left --}}
    @include('public/layouts/elements/content_left')
    
    {{-- Begin: content right --}}
    <div id="templatemo_content_right">
        @section('content')
            
        @show
    </div>
    {{-- End: content right --}}

    <div class="cleaner_with_height">&nbsp;</div>
</div> 