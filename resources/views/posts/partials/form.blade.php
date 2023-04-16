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