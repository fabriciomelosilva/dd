{!! MaterializeCSS::include_full() !!}

<div class="container">

    @if (count($errors) > 0)
        <div class="row">
            <div class="col s12">
                <div class"card red darken-1">
                    <div class="card-content white-text">
                        <span class="card-title"> Erro! </span>
                    </div>
                </div>
            </div>
        </div>

    @endif

    <div class="row">

        <form action="admin" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
          
            <div class="file-field input-field">
                <div class="btn">
                    <span> Faça o upload da edição </span>
                    <input type="file" name="edicao">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validade" type="text">
                </div>
            </div>
            
            <button class="btn" name="button"> Enviar </button>
        </form>
 
    </div>
</div>