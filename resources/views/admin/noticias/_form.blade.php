@include('errors._error_field')
<?php  $errorClass =  $errors->first('title')? ['class' => 'validate invalid']:[]  ?>



    @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.noticias.edit' && isset($noticia))
        <div class="row">
            <div class="input-field col s2">Newsletter?</div>
            <div class="input-field col s8">

                <div class="switch">
                    {!! Form::hidden('newsletter', '0') !!}
                    <label>Não{!! Form::checkbox('newsletter', '1', $noticia->newsletter,  array('id' => 'newsletter')) !!}<span
                                class="lever"></span>Sim</label></div>

            </div>
        </div>

        <div class="row">
            <div class="input-field col s2">Banner?</div>
            <div class="input-field col s8">
                <div class="switch">
                    {!! Form::hidden('state', '0') !!}
                    <label>Off{!! Form::checkbox('state', '1', $noticia->state, array('id' => 'banner')) !!}<span
                                class="lever"></span>On</label></div>

            </div>
        </div>

        <div class="row">
            <div class="input-field col s2">Tweet?</div>
            <div class="input-field col s8">
                <div class="switch">
                    {!! Form::hidden('tweet', '0') !!}
                    <label>Off{!! Form::checkbox('tweet', '1', $noticia->tweet, array('id' => 'tweet')) !!}<span
                                class="lever"></span>On</label></div>


            </div>
        </div>
    @else
        <div class="row">
            <div class="input-field col s2">Newsletter?</div>
            <div class="input-field col s8">

                <div class="switch">
                    {!! Form::hidden('newsletter', '0') !!}
                    <label>Não{!! Form::checkbox('newsletter', '1', true,  array('id' => 'newsletter')) !!}<span
                                class="lever"></span>Sim</label></div>

            </div>
        </div>

        <div class="row">
            <div class="input-field col s2">Banner?</div>
            <div class="input-field col s8">
                <div class="switch">
                    {!! Form::hidden('state', '0') !!}
                    <label>Off{!! Form::checkbox('state', '1', true, array('id' => 'banner')) !!}<span
                                class="lever"></span>On</label></div>

            </div>
        </div>

        <div class="row">
            <div class="input-field col s2">Tweet?</div>
            <div class="input-field col s8">
                <div class="switch">
                    {!! Form::hidden('tweet', '0') !!}
                    <label>Off{!! Form::checkbox('tweet', '1', true, array('id' => 'tweet')) !!}<span
                                class="lever"></span>On</label></div>


            </div>
        </div>
    @endif


<div class="row">
    <div class="input-field col s12">
        {!! Form::number('order', null, ['min' => 0, 'placeholder' => "Inserir a ordem da noticia valores numerico inteiros (0-9999)"]) !!}
        {!! Form::label('order', 'Ordem', ['data-error' => $errors->first('order')]) !!}
    </div>

</div>
<div class="row">
    <div class="input-field col s12">
        {!! Form::text('title', null, $errorClass) !!}
        {!! Form::label('title', 'Título', ['data-error' => $errors->first('title')]) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s12">

        {!! Form::textarea('intro_text', null,
        [
        'class' => 'materialize-textarea',
        'length' => '280',
        'id' => 'intro_text',
        ]) !!}
        {!! Form::label('intro_text', 'Texto de introdução',['data-error' => $errors->first('description')])!!}

    </div>
    <div class="input-field col s12">
        {!! Form::textarea('description', null,['class' => 'materialize-textarea']) !!}
        {!! Form::label('description', 'Descrição', ['data-error' => $errors->first('description')]) !!}
    </div>
</div>
<div class="row">
    <?php
    $edit = "";
    if(isset($noticia->tagList)){
        $edit = $noticia->tagList;}
    ?>
    <div class="input-field col s12">
        {!! Form::text('tags', $edit, ['id' => 'tags', 'length' => '140']) !!}
        {!! Form::label('tags', 'Tags', ['data-error' => $errors->first('tags')]) !!}
    </div>
</div>
<div class="row">
    <div class="file-field input-field col s12">
        <div class="btn">
            <span>Imagem</span>
            {!! Form::file('photo', null, ['data-error' => $errors->first('photo')]) !!}
        </div>
        <div class="file-path-wrapper">
            {!! Form::text('', 'Selecione uma imagem para a notícia', ['class' => 'file-path validate']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        {!! Form::text('video', null, $errorClass) !!}
        {!! Form::label('video', 'Link para o video (http://youtube.com/******)', ['data-error' => $errors->first('video')]) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        {!! Form::text('link', null, $errorClass) !!}
        {!! Form::label('link', 'Link para noticia externa (http://fe.up.pt/****)', ['data-error' => $errors->first('link')]) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        {!! Form::text('active_date', null, ['data-toggle' => 'datepicker']) !!}
        {!! Form::label('active_date', 'Inserir data de publicação no formato -> 2000-01-31', ['data-error' => $errors->first('active_date')]) !!}
    </div>
</div>


@section('javascript')
    <script type="text/javascript">
        $('input#tags, textarea#intro_text').characterCounter();





        // adicionar as tags ao texto de intro
        /*
        let x = 0;
        $('#tags').change(()=> {
        if(x === 0){
            let text_intro = $('#intro_text').val();
            let tags = $('#tags').val();
            let arrayTags = [];
            $.each(tags.split(","), function(){
                arrayTags.push($.trim('#'+this));
            });
            let stringTags = arrayTags.join('');
            $("textarea#intro_text").val(text_intro+ "\n" + stringTags);
        }else{
            let text_intro = $('#intro_text').val();
            text_intro = text_intro.substring(0, text_intro.lastIndexOf("\n"));
            let tags = $('#tags').val();
            let arrayTags = [];
            $.each(tags.split(","), function(){
                arrayTags.push($.trim('#'+this));
            });
            let stringTags = arrayTags.join('');
            $("textarea#intro_text").val(text_intro+ "\n" + stringTags);
        }
        x++;

        });

        $("form").submit(function (e) {
            let text_intro = $('#text_intro').val();
            text_intro = text_intro.substring(0, text_intro.lastIndexOf("\n"));
            $('#text_intro').val(text_intro);

        });*/

    </script>
@endsection