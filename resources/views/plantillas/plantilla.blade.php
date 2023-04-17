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

        {{-- <script src="{{ asset('/resources/js/app.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

        

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