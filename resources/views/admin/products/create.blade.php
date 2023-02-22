<!-- Modal Structure -->
<div id="create" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close waves-effect waves-green btn red right"><i
                class="material-icons">close</i></a><br>
        <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="col s12">
            @csrf
            <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
            <div class="row">
                <div class="input-field col s6">
                    <input name="name" id="name" type="text" class="validate">
                    <label for="name">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input name="price" id="price" type="number" min="1" class="validate">
                    <label for="price">Preço</label>
                </div>
                <div class="input-field col s12">
                    <input name="description" id="description" type="text" class="validate">
                    <label for="description">Descrição</label>
                </div>
                <div class="input-field col s12">
                    <select name="id_category">
                        <option value="" disabled selected>Categorias</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span>Image</span>
                            <input name="url_image" type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>

                <button type="submit" class=" waves-effect waves-green btn blue right">Cadastrar</button><br>
            </div>

        </form>
    </div>

</div>
