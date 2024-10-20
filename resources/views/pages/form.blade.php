@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <strong>Drag Components</strong>
            </div>
            <div class="card-body" id="grapesjs-sidebar"></div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
            <strong>{{ isset($page) ? 'Edit' : 'Create' }} Page</strong>
            </div>
            <div class="card-body">
                <form id="savePage" action="{{ route('pages.store') }}" method="POST">
                    @csrf
                        <input type="hidden" id="id" value="{{ isset($page->id) ? $page->id : '' }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Page Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', isset($page->title) ? $page->title : '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Page Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', isset($page->slug) ? $page->slug : '') }}" required>
                    </div>

                    <div id="gjs" style="height: 500px;">{!!isset($page->content) ? $page->content : ''!!}</div>

                    <button type="submit" class="btn btn-primary mt-3" id="save">{{isset($page->id) ? 'Update Page' : 'Save Page'}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const SnippetBuilder = function() {
        const editor = grapesjs.init({
                container: '#gjs',
                fromElement: true,
                storageManager: false,
                blockManager: {
                    appendTo: '#grapesjs-sidebar',
                    blocks: [
                        {
                            id: 'text-block',
                            label: 'Text',
                            content: '<div class="text-block">Add your text here</div>',
                            category: 'Basic',
                        },
                        {
                            id: 'image-block',
                            label: 'Image',
                            content: '<img src="https://via.placeholder.com/150" alt="Image" />',
                            category: 'Basic',
                        },
                        {
                            id: 'video-block',
                            label: 'Video',
                            content: '<div><video width="400" controls><source src="movie.mp4" type="video/mp4"></video></div>',
                            category: 'Basic',
                        },
                        {
                            id: 'button-block',
                            label: 'Button',
                            content: '<button class="btn btn-primary">Click Me</button>',
                            category: 'Basic',
                        },
                        {
                            id: 'html-block',
                            label: 'Custom HTML',
                            content: '<div class="custom-html"><code>Write your custom HTML here</code></div>',
                            category: 'Basic',
                        },
                        {
                            id: 'form-block',
                            label: 'Form',
                            content: '<form><input type="text" placeholder="Enter text"></form>',
                            category: 'Forms',
                        },
                        {
                            id: 'input-block',
                            label: 'Text Input',
                            content: '<input type="text" placeholder="Enter text">',
                            category: 'Forms',
                        },
                        {
                            id: 'columns-block',
                            label: 'Columns',
                            content: `<div class="row">
                                        <div class="col-md-4">Column 1</div>
                                        <div class="col-md-4">Column 2</div>
                                        <div class="col-md-4">Column 3</div>
                                    </div>`,
                            category: 'Layouts',
                        }
                    ],
                }
            });

        const slugManager = function() {
            $(document).on('input','#title', function() {
                let title = $(this).val();
                let slug = title.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]/g, '');
                $('#slug').val(slug);
            });

            $(document).on('input','#slug', function() {
                let customSlug = $(this).val();
                customSlug = customSlug.replace(/\s+/g, '-'); 
                $('#slug').val(customSlug);
            });

        }

        const formSubmit = function () {
            $(document).on('submit','#savePage', function(e) {
                e.preventDefault();  

                const target = $(this).attr('action');
                const title = $('#title').val();
                const id = $('#id').val();
                const slug = $('#slug').val();
                const pageContent = editor.getHtml();

                const formData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    title: title,
                    id,id,
                    slug: slug,
                    page_content: pageContent,
                };

                $.ajax({
                    url: target, 
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            setTimeout(function(){
                                location.href = response.redirectTo;
                            },300);
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorMessage = 'Validation errors:\n';

                            $.each(errors, function(field, messages) {
                                errorMessage += `${field}: ${messages.join(', ')}\n`;
                            });

                            alert(errorMessage); 
                        } else {
                            alert('There was an error saving the page. Please try again later.');
                        }
                    }
                });
            });
        }

        return {
            init: () => {
                slugManager();
                formSubmit();
            }
        }
    }
    
    $(document).ready(function() {
        SnippetBuilder().init();

    });
        
</script>
@endsection
