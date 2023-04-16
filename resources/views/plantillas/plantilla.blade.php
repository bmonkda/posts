<!DOCTYPE html>
<html lang="es">

    <head>
        
        @include('plantillas.partials.head')

    </head>
    
    <body>

        {{-- header --}}
        {{-- nav --}}
        <div class="container">

            <header class="row">
                @include('plantillas.partials.header')
            </header>

        </div>

        <div id="main" class="row">

            @yield('content')

        </div>

        {{-- footer --}}
        <footer class="row">

            @include('plantillas.partials.footer')
            
        </footer>

        {{-- script --}}

        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            const categoriaSelect = document.getElementById('categoria_id');
            const subcategoriaSelect = document.getElementById('subcategoria_id');
            
            // Obtener las subcategorías disponibles al cargar la página
            categoriaSelect.addEventListener('change', event => {
                subcategoriaSelect.innerHTML = '<option value="">Seleccione una subcategoría</option>';
                
                const categoriaId = event.target.value;
                if (categoriaId) {
                    fetch(`/categorias/${categoriaId}/subcategorias`)
                        .then(response => response.json())
                        .then(subcategorias => {
                            subcategorias.forEach(subcategoria => {
                                const option = document.createElement('option');
                                option.value = subcategoria.id;
                                option.text = subcategoria.nombre;
                                subcategoriaSelect.add(option);
                            });
                        })
                        .catch(error => console.error(error));
                }
            });
            
            // Envío del formulario por AJAX
            const postForm = document.getElementById('post-form');
            postForm.addEventListener('submit', event => {
                event.preventDefault();
                const formData = new FormData(postForm);
                const postId = {{ $post->id ?? 'null' }};
                const url = postId ? `/posts/${postId}` : '/posts';
                fetch(url, {
                    method: postId ? 'PUT' : 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    // Mostrar mensaje de éxito o error y redirigir al listado de posts
                    if (data.success) {
                        alert('El post se ha guardado correctamente.');
                        window.location.href = '/posts';
                    } else {
                        alert('Ha ocurrido un error al guardar el post. Por favor, inténtelo de nuevo.');
                    }
                })
                .catch(error => console.error(error));
            });
        </script>

        @yield('scripts')
        

        {{-- <script>

            let $categories = document.getElementById('categories');
            $categories.addEventListener("change", function() {
                console.log("El id de la categoría es: " + $categories.value)
            });

            $(document).ready(function(){
                $('#categoria').on('change', function(){
                    var categoriaSeleccionada = $(this).val();
                    if(categoriaSeleccionada){
                        $.ajax({
                            url: '/getSubcategorias/' + categoriaSeleccionada,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data){
                                $('#subcategoria').empty();
                                $('#subcategoria').append('<option value="">Seleccione una opción</option>');
                                $.each(data, function(key, value){
                                    $('#subcategoria').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                            }
                        });
                    } else {
                        $('#subcategoria').empty();
                        $('#subcategoria').append('<option value="">Seleccione una opción</option>');
                    }
                });
            });
        </script> --}}
        
    </body>


</html>