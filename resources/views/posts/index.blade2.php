<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posts</title>
    </head>
    
    <body>

        <form id="post-form">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" required></textarea>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    <option value="">Seleccione una categoría</option>
                    {{ $categorias }}
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subcategoria_id">Subcategoría</label>
                <select class="form-control" id="subcategoria_id" name="subcategoria_id" required>
                    <option value="">Seleccione una subcategoría</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        


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